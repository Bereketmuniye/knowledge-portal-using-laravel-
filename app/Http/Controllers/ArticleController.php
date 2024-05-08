<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
class ArticleController extends Controller
{
     public function index()
    {
        $articles = Article::with('category')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('article.index', compact('articles'));
    }
     public function create()
{
    $categories = Category::all(); // Assuming you have a "Category" model

    return view('article.create', compact('categories'));
}
   public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
            'short_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->full_text = $validatedData['full_text'];
        $article->short_text = $validatedData['short_text'];
        $article->category_id = $validatedData['category_id'];
        $article->save();
        return redirect()->route('article.index')->with('success', 'Article created successfully.');
    }

   public function edit(Article $article)
{
    $categories = Category::all(); // Assuming you have a "Category" model

    return view('article.edit', compact('article', 'categories'));
}

public function update(Request $request, Article $article)
{
    $request->validate([
        'title' => 'required|string',
        'full_text' => 'required|string',
        'short_text' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    $article->title = $request->input('title');
    $article->full_text = $request->input('full_text');
    $article->short_text = $request->input('short_text');
    $article->category_id = $request->input('category_id');

    $article->save();

    return redirect()->route('article.index')
        ->with('success', 'Article updated successfully.');
}

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index')
            ->with('success', 'article deleted successfully.');
    }


    private function getCategoryCount($categoryId)
    {
        // Replace this code with your own logic to retrieve the count from the database
        $category = Category::find($categoryId);
        if ($category) {
            return $category->count;
        }

        return 0; // Return a default count if the category is not found
    }

}
