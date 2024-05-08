<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = FileUpload::all();
        return view('file.index', compact('files'));

    }

public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file.*' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size limit as needed
        ]);

        // Handle file upload
        if($request->hasFile('file')) {
            foreach($request->file('file') as $uploadedFile) {
                // Save file to storage and get its path
                $filePath = $uploadedFile->store('files');
                FileUpload::create([
                    'name' => $uploadedFile->getClientOriginalName(),
                    'path' => $filePath,
                ]);
            }
        }

        // Redirect back with success message
        return back()->with('success', 'Files uploaded successfully.');
    }

    public function destroy(FileUpload $file)
    {
        $file->delete();

        return redirect()->route('file.index')
            ->with('success', 'article deleted successfully.');
    }

    public function downloadFile($id)
    {
        $path = FileUpload::where("id", $id)->value("file_path");
        return Storage::download($path);
    }



}
