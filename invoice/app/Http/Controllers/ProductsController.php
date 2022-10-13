<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.products.add');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
        'name'=> 'required|min:3|max:520',
        'price'=> 'required',
        'company'=> 'required',
        'details'=> 'required',
        'quantity'=> 'required',
        ]);

        $result = Products::create([
            'name'=>$req->name,
            'price'=>$req->price,
            'company'=>$req->company,
            'details'=>$req->details,
            'quantity'=>$req->quantity,
            'status'=>true,
            ]);

            if ($result) {
                return redirect('admin/products/')->with('success','Product Created Successfully');
            } else {
                return redirect()->back()->with('err','Ohh! Product couldn\'t be created');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //gettting all the data from the Service field
        $result = Products::where('status',1)->get();

        if (!$result->isEmpty()) {
            // return the data
            return view('pages/products/show')->with('products', $result);
        } else {
            return view('pages/products/show')->with('products','');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //getting the id and get data according to it
        $result = Products::where('id',$id)->first();


        if (!empty($result)) {
            // if hs value then return
            return view('pages/products/edit')->with('product', $result);
        } else {
            return redirect('pages/404')->with('error',"Data Update failed");
        }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //update
         //getting the id and get data according to it
        $product = Products::where('id',$req->id)->first();

        if (!empty($product)) {
            // if hs value then update
            $product->name=$req->name;
            $product->price=$req->price;
            $product->company=$req->company;
            $product->details=$req->details;
            $product->quantity=$req->quantity;
            $product->status=true;

            $product->save();
            return redirect('admin/products/show')->with('success',"Data Updated");
        } else {

            // redirect to 404
            return redirect('/404')->with('error',"Data Update failed");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destroy
        $product = Products::where('id',$id)->delete();

        if ($product) {
            // if hs value then return
            return redirect('admin/products/show')->with('success', "Item Deleted");
        } else {
            return redirect('/404')->with('error',"Data Update failed");
        }
    }
}
