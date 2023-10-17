<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $contents = Content::all();

        return view('welcome', compact('contents'));
    }
}
