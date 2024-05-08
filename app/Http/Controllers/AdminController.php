<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
{
    $registrations = User::selectRaw('DATE(created_at) AS registration_date, COUNT(*) AS registration_count')
        ->groupBy('registration_date')
        ->get();

    return view('admin.index', compact('registrations'));
}
}
