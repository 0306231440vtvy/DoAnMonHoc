<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{

    public function index(): View
    {
        return view('server.pages.brands.index');
    }
    public function create(): View
    {
        return view('server.pages.brands.index');
    }
    public function store(): View
    {
        return view('server.pages.brands.index');
    }
}
