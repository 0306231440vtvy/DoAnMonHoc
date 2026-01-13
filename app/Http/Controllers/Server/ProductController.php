<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Category\StoreCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function index(): View
    {
        return view('server.pages.products.index');
    }
}
