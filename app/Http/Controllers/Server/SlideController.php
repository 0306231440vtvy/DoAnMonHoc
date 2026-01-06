<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SlideController extends Controller
{
   
    public function index()
    {
       return view('server.pages.slides.index');
    }
}