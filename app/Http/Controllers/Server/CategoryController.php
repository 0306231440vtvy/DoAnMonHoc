<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Category\StoreCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }
    public function index(Request $request): View
    {
        $categories = $this->categoryService->pagination($request);
        return view('server.pages.categories.index', compact(
            'categories'
        ));
    }
    public function create(): View
    {
        return view('server.pages.categories.save');
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->create($request);
        return redirect()->route('admin.layouts')->with('success', 'Thêm danh mục thành công');
    }
    public function edit() {}
    public function destroy() {}
}
