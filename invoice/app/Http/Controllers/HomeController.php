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
        $services = Service::where('status',1)->get();
        $products = Products::where('status',1)->get();
        return view('pages/home',['company'=>$company,'services'=>$services,'products'=>$products]);
    }

    
}
