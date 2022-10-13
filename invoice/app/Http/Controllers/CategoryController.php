<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages/category/add');
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
        ]);

        $result = Category::create([
            'name'=>$req->name,
            'slug'=>Str::slug($req->name,'-'),
            'status'=>true,
            ]);

            if ($result) {
                return redirect('admin/category/')->with('success','Category Created Successfully');
            } else {
                return redirect()->back()->with('err','Ohh! Category couldn\'t be created');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //gettting all the data from the category field
        $result = Category::where('status',1)->get();

        if (!$result->isEmpty()) {
            // return the data
            return view('pages/category/show')->with('categories', $result);
        } else {
            return view('pages/category/show')->with('categories', '');
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
        $category = Category::where('id',$id)->first();

        if (!empty($category)) {
            // if hs value then return
            return view('pages/category/edit')->with('category', $category);
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
        $category = Category::where('id',$req->id)->first();

        if (!empty($category)) {
            // if hs value then update
            $category->name = $req->name;
            $category->slug = Str::slug($req->name,'-');

            $category->save();
            return redirect('admin/category/show')->with('success',"Data Updated");
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
        $category = Category::where('id',$id)->delete();

        if ($category) {
            // if hs value then return
            return redirect('admin/category/show')->with('success', "Item Deleted");
        } else {
            return redirect('/404')->with('error',"Data Update failed");
        }
    }
}
