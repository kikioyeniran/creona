<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:verify-artist']);
    }
    public function index()
    {
        return view('featured.dashboard');
        // return 'Here';
    }
}
