<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardServerController extends Controller
{
    public function __construct() {}
    public function index(): View
    {
        $breadcrumb = $this->breadcrumb();
        return view('server.layout', compact(
            'breadcrumb'
        ));
    }
    private function breadcrumb()
    {
        return [
            [
                'title' => 'Trang chủ',
                'route' => 'layouts'
            ],
            [
                'title' => 'Trang chủ',
                'route' => 'layouts'
            ],
            [
                'title' => 'Trang chủ',
                'route' => 'layouts'
            ],
        ];
    }
}
