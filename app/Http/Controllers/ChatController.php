<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;

//remember to use
use App\Events\MessageSent;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\KnowledgeBase;
use App\Models\FileUpload;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
        $users = User::all(); // Fetch all users

        return view('chat.chat', compact('messages', 'users'));
    }

    public function welcome()
    {
        $latestArticles = Article::latest()->take(5)->get();
        $allArticles = Article::all();
        $financeCategory = Category::where('name', 'Finance')->first();
        $bookCategory = Category::where('name', 'Book')->first();
        $financeArticles = $financeCategory ? $financeCategory->articles()->latest()->take(5)->get() : collect();
        $bookArticles = $bookCategory ? $bookCategory->articles()->latest()->take(5)->get() : collect();
        $faqs = KnowledgeBase::latest()->take(5)->get();

        // Retrieve all file information from the database
        $files = FileUpload::all();

        return view('welcome', [
            'latestArticles' => $latestArticles,
            'allArticles' => $allArticles,
            'financeArticles' => $financeArticles,
            'bookArticles' => $bookArticles,
            'faqs' => $faqs,
            'files' => $files // Pass all files to the view
        ]);
    }

public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}





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

    // public function fetchMessages()
    // {
    //     return Message::with('user')->get();
    // }

    // public function sendMessage(Request $request)
    // {
    //     $user = Auth::user();

    //     $message = $user->messages()->create([
    //         'message' => $request->input('message')
    //     ]);

    //     event(new NewMessage($message));

    //     return response()->json(['status' => 'Message Sent!']);
    // }
}
