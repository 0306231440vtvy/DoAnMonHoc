<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Services\SlideService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SlideController extends Controller
{
    protected $slideService;
    public function __construct(SlideService $slideService)
    {
        $this->slideService = $slideService;
    }
    public function index(Request $request): View
    {
        $slide = $this->slideService->pagination($request);
        return view('server.pages.slides.index', compact(
            'slide'
        ));
    }
    public function create()
    {
        $slides = $this->slideService->index();
        dd($slides);
        return view('server.pages.slides.save', compact(
            'slides'
        ));
    }
    public function store() {}
}
