<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProvinceRepository;
use App\Repositories\WardRepository;

class CheckoutController extends Controller
{
    protected $wardRepository;
    protected $provinceRepository;
    public function __construct(
        WardRepository $wardRepository,
        ProvinceRepository $provinceRepository
    ) {
        $this->wardRepository = $wardRepository;
        $this->provinceRepository = $provinceRepository;
    }
    public function index()
    {
        $wards = $this->wardRepository->index();
        $provinces = $this->provinceRepository->index();
        // dd($wards);
        return view(
            'client.pages.checkout.index',
            compact(
                'wards',
                'provinces'
            )
        );
    }
    public function store() {}
}