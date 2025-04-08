<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        return view('admin.products');
    }

    public function popular()
    {
        return view('admin.popular');
    }

    public function doubts()
    {
        return view('admin.doubts');
    }

    public function guys()
    {
        return view('admin.guys');
    }
}
