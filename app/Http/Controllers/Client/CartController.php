<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(
        CartService $cartService,
    ) {
        $this->cartService = $cartService;
    }
    public function index(Request $request): View
    {
        $request->merge(
            [
                'user_id' => auth()->id(),
                // 'with' => ['users', 'sanpham'],
            ]
        );
        $carts = $this->cartService->pagination($request);
        // dd($carts);
        return view('client.pages.carts.index', compact(
            'carts'
        ));
    }
}
