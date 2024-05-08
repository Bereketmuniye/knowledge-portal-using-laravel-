<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KnowledgeBase;

class KnowledgeBaseController extends Controller
{
    public function index()
{
    $knowledgebases = KnowledgeBase::all();

    return view('knowledgeBase.index', compact('knowledgebases'));
}

    public function create()
    {
        return view('knowledgeBase.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        KnowledgeBase::create($request->all());

        return redirect()->route('knowledgeBase.index')
            ->with('success', 'Knowledge Base created successfully.');
    }

    public function edit(KnowledgeBase $knowledgeBase)
    {
        return view('knowledgeBase.edit', compact('knowledgeBase'));
    }

    public function update(Request $request, KnowledgeBase $knowledgeBase)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $knowledgeBase->update($request->all());

        return redirect()->route('knowledgeBase.index')
            ->with('success', 'Knowledge Base updated successfully.');
    }

    public function destroy(KnowledgeBase $knowledgeBase)
    {
        $knowledgeBase->delete();

        return redirect()->route('knowledgeBase.index')
            ->with('success', 'Knowledge Base deleted successfully.');
    }
}
