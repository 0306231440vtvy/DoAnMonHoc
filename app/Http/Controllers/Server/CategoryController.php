<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Category\StoreCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected $service;
    public function __construct(
        CategoryService $service
    ) {
        $this->service = $service;
    }
    public function create(): View
    {
        return view('server.pages.categories.save');
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->service->create($request);
        return redirect()->route('admin.layouts')->with('success', 'Thêm danh mục thành công');
    }
}
