<?php
// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\KnowledgeBase;
use App\Models\FileUpload;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in articles
        $articles = Article::where('title', 'like', "%$query%")
                           ->orWhere('content', 'like', "%$query%")
                           ->get();

        // Search in categories
        $categories = Category::where('name', 'like', "%$query%")
                             ->get();

        // Search in knowledge base
        $knowledgeBase = KnowledgeBase::where('title', 'like', "%$query%")
                                      ->orWhere('content', 'like', "%$query%")
                                      ->get();

        // Search in file uploads
        $fileUploads = FileUpload::where('name', 'like', "%$query%")
                                 ->get();

        return response()->json(compact('articles', 'categories', 'knowledgeBase', 'fileUploads'));
    }
}
