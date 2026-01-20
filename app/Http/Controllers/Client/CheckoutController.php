<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // throw new \Exception('Not implemented');
    }
    public function index(): View
    {
        return view('client.pages.checkout.index');
    }
}
