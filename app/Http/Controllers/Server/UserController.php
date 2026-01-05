<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        // throw new \Exception('Not implemented');
    }
    public function index(): View
    {
        return view('server.pages.users.index');
    }
}
