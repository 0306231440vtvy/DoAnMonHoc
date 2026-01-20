<?php

namespace App\View\Composer;

use App\Models\Giohang;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavComposer
{
    public function compose(View $view)
    {
        // $cartRequest = clone request();
        // $carts = $this->cartService->pagination($cartRequest->merge([
        //     'user_id' => auth()->id(),
        // ]));
        // request()->merge([
        //     'user_id' => auth()->id(),
        // ]);
        // $carts = Giohang::select();
        // dd($carts);
        $carts = collect();
        $cartTotal = 0;
        if (Auth::check()) {
            $carts = Giohang::where('user_id', Auth::id())->get();
            foreach ($carts as $cart) {
                $cartTotal += $cart->soluong * $cart->giohang;
            }
        }
        $view->with([
            'carts' => $carts,
            'cartTotal' => $cartTotal,
        ]);
    }
}
