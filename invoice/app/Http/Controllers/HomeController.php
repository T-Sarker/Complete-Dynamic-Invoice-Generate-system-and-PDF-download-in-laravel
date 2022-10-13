<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Products;
use App\Models\Company;
use App\Models\CartService;
use App\Models\CartParts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        $company = Company::where('status',1)->get();
        $services = CartService::where('status',0)->where('cartId',$invoiceid)->get();
        $products = CartParts::where('status',0)->where('cartId',$invoiceid)->get();
        return view('pages/home');
    }

    
}
