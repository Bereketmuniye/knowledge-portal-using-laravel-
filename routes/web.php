<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AdminController;



Route::get('/',function()
{
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('lang/{locale}',[LanguageController::class,'changeLanguage']);

Route::get('/', [ChatController::class, 'welcome'])->name('welcome');
Route::get('/', [ChatController::class, 'welcome'])->name('welcome');

Route::get('admin/index',[AdminController::class,'index'])->name('admin.index');

Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('article/index',[ArticleController::class,'index'])->name('article.index');
Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');
Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{article}/edit', [articleController::class, 'edit'])->name('article.edit');
Route::put('/article/{article}', [articleController::class, 'update'])->name('article.update');
Route::delete('/article/{article}', [articleController::class, 'destroy'])->name('article.destroy');

Route::get('file/index',[FileController::class,'index'])->name('file.index');
Route::post('/file', [FileController::class,'store'])->name('store');
Route::post('uploads', [FileController::class,'uploads'])->name('uploads');
Route::get('file/{id}', [FileController::class, 'downloadFile'])->name('file.download');
Route::delete('/file/{file}',[FileController::class,'destroy'])->name('file.destroy');

Route::get('/knowledgeBase', [KnowledgeBaseController::class, 'index'])->name('knowledgeBase.index');
Route::get('/knowledgeBase/create', [KnowledgeBaseController::class, 'create'])->name('knowledgeBase.create');
Route::post('/knowledgeBase', [KnowledgeBaseController::class, 'store'])->name('knowledgeBase.store');
Route::get('/knowledgeBase/{knowledgeBase}/edit', [KnowledgeBaseController::class, 'edit'])->name('knowledgeBase.edit');
Route::put('/knowledgeBase/{knowledgeBase}', [KnowledgeBaseController::class, 'update'])->name('knowledgeBase.update');
Route::delete('/knowledgeBase/{knowledgeBase}', [KnowledgeBaseController::class, 'destroy'])->name('knowledgeBase.destroy');

Route::get('/chat/chat', [ChatController::class, 'index'])->name('chat.chat');
Route::post('/chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.sendMessage');

Route::get('/meeting',[MeetingController::class,'index'])->name('meeting.index');
Route::post('/meeting',[MeetingController::class,'store'])->name('meeting.store');
Route::get('/meeting/meeting/{id}', [MeetingController::class,'show'])->name('meeting.show');
Route::get('/meeting/create', [MeetingController::class, 'create'])->name('meeting.create');
Route::post('/meeting',[MeetingController::class,'store'])->name('meeting.store');

Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::get('/user/create', [UserController::class,'create'])->name('user.create');
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class,'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class,'update'])->name('user.update');
Route::get('/user/{user}', [UserController::class,'show'])->name('user.show');
Route::delete('/user/{user}', [UserController::class,'destroy'])->name('user.destroy');

Route::get('/roles', [RoleController::class,'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class,'create'])->name('roles.create');
Route::post('/roles', [RoleController::class,'store'])->name('roles.store');
Route::get('/roles/{role}', [RoleController::class,'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RoleController::class,'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class,'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class,'destroy'])->name('roles.destroy');

Route::get('/permissions', [PermissionController::class,'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class,'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class,'store'])->name('permissions.store');
Route::get('/permissions/{permission}', [PermissionController::class,'show'])->name('permissions.show');
Route::get('/permissions/{permission}/edit', [PermissionController::class,'edit'])->name('permissions.edit');
Route::PUT('/permissions/{permission}', [PermissionController::class,'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class,'destroy'])->name('permissions.destroy');


Route::get('/questions', [QuestionController::class,'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class,'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class,'store'])->name('questions.store');
Route::get('/questions/{question}', [QuestionController::class,'show'])->name('questions.show');
Route::post('/questions/{question}/answers', [AnswerController::class,'store'])->name('answers.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
