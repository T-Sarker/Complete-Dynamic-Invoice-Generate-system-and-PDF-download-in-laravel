<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->get();
        return view('pages.service.add',['category'=>$category]);
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
        'category'=> 'required',
        'name'=> 'required|min:3|max:520',
        'price'=> 'required',
        ]);

        $result = Service::create([
            'name'=>$req->name,
            'price'=>$req->price,
            'category'=>$req->category,
            'slug'=>Str::slug($req->name,'-'),
            'status'=>true,
            ]);

            if ($result) {
                return redirect('admin/service/')->with('success','Service Created Successfully');
            } else {
                return redirect()->back()->with('err','Ohh! Service couldn\'t be created');
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
        $result = Service::where('status',1)->with('getCategory')->get();

        if (!$result->isEmpty()) {
            // return the data
            return view('pages/service/show')->with('services', $result);
        } else {
            return view('pages/service/show')->with('services', '');
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
        $result = Service::where('id',$id)->first();

        //get categories
        $category = Category::where('status',1)->get();

        if (!empty($result)) {
            // if hs value then return
            return view('pages/service/edit')->with('service', $result)->with('categories', $category);
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
        $service = Service::where('id',$req->id)->first();

        if (!empty($service)) {
            // if hs value then update
            $service->name = $req->name;
            $service->price = $req->price;
            $service->category = $req->category;
            $service->slug = Str::slug($req->name,'-');

            $service->save();
            return redirect('admin/service/show')->with('success',"Data Updated");
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
        $category = Service::where('id',$id)->delete();

        if ($category) {
            // if hs value then return
            return redirect('admin/service/show')->with('success', "Item Deleted");
        } else {
            return redirect('/404')->with('error',"Data Update failed");
        }
    }
}
