<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function showContent()
    {
        $contents = Content::all();

        return view('content', compact('contents'));
    }
}
