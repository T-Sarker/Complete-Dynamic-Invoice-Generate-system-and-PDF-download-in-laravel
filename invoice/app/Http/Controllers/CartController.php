<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Products;
use App\Models\CartService;
use App\Models\CartParts;
use App\Models\Company;
use App\Traits\uniqueCodeGen;
use Barryvdh\DomPDF\Facade\Pdf;


class CartController extends Controller
{
    use UniqueCodeGen;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->get();
        $products = Products::where('status',1)->get();
        $companies = Company::where('status',1)->get();
        return view('pages/cart/cart',['categories'=>$category, 'products'=>$products, 'companies'=>$companies]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseService($id)
    {
        //gettting all the data from the Service field
        $result = Service::where('status',1)->where('category',$id)->select('id','name')->get();

        if (!$result->isEmpty()) {
            // return the data
            return $result;
        } else {
            return false;
        }
        
    }


    public function addServicetoCart(Request $req){

        $cartUniqueId = $req->cartUniqueId;
        $getService = Service::where('id',$req->service)->first();

        if (!empty($getService)) {
            //inserting the cart service data to the CartService model
            $insertCartService = CartService::create([
                'cartId'=>$cartUniqueId,
                'service'=> $getService->name,
                'price'=> $getService->price,
                'status'=> 0
            ]);
            // return the data
            return $insertCartService;
        } else {
            return false;
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteServicetoCart(Request $req)
    {
         $cartUniqueId = $req->serviceDelete;

         $result=CartService::where('id',$cartUniqueId)->delete();

          if ($result) {
            // return the data
            
            return true;
        } else {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPartstoCart(Request $req)
    {
        $cartUniqueId = $req->cartUniqueId;
        $pquantity = $req->pquantity;
        $getParts = Products::where('id',$req->part)->first();

        if (!empty($getParts)) {
            //inserting the cart service data to the CartParts model
            $insertCartParts = CartParts::create([
                'cartId'=>$cartUniqueId,
                'name'=> $getParts->name,
                'company'=> $getParts->company,
                'price'=> $getParts->price,
                'quantity'=> $pquantity,
                'status'=> 0
            ]);
            // return the data
            return $insertCartParts;
        } else {
            return false;
        }
    }


      public function deletePartstoCart(Request $req)
    {
         $cartUniqueId = $req->partsDelete;

         $result=CartParts::where('id',$cartUniqueId)->delete();

          if ($result) {
            // return the data
            
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */


        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function generateInvoice($companyId,$invoiceid)
    {
        //getting the data from the cart service and cart prats table filtered by invoice id
        $company = Company::where('id',$companyId)->first();
        $services = CartService::where('cartId',$invoiceid)->get();
        $products = CartParts::where('cartId',$invoiceid)->get();

        

        $pdf = Pdf::loadView('pages.invoice.invoice',['company'=>$company, 'services'=>$services, 'products'=>$products, 'uId'=>$invoiceid]);

        $Uservices = CartService::where('status',0)->where('cartId',$invoiceid)->update(['status'=>1]);
        $Uproducts = CartParts::where('status',0)->where('cartId',$invoiceid)->update(['status'=>1]);

        $InsertCompanyData = Cart::firstOrNew([
                'cartId'=>$invoiceid,
                'companyId'=> $companyId,
                'status'=> 0
            ]);
        return $pdf->stream('invoice.pdf');
        // return view('pages/cart/cart',['services'=>$services, 'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
