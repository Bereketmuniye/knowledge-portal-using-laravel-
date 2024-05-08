<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $registrations = User::selectRaw('DATE(created_at) AS registration_date, COUNT(*) AS registration_count')
        ->groupBy('registration_date')
        ->get();

    return view('admin.index', compact('registrations'));
}
}
