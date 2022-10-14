<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.company.add');
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
        'address'=> 'required',
        'phone'=> 'required',
        ]);

        $result = Company::create([
            'name'=>$req->name,
            'address'=>$req->address,
            'phone'=>$req->phone,
            'cart'=>'',
            'status'=>true,
            ]);

            if ($result) {
                return redirect('admin/company/')->with('success','Data Created Successfully');
            } else {
                return redirect()->back()->with('err','Ohh! Data couldn\'t be created');
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
        $result = Company::where('status',1)->get();

        if (!$result->isEmpty()) {
            // return the data
            return view('pages/company/show')->with('companies', $result);
        } else {
            return view('pages/company/show')->with('companies','');
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
        $result = Company::where('id',$id)->first();


        if (!empty($result)) {
            // if hs value then return
            return view('pages/company/edit')->with('company', $result);
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
        $company = Company::where('id',$req->id)->first();

        if (!empty($company)) {
            // if hs value then update
            $company->name=$req->name;
            $company->address=$req->address;
            $company->phone=$req->phone;
            $company->status=true;

            $company->save();
            return redirect('admin/company/show')->with('success',"Data Updated");
        } else {

            // redirect to 404
            return redirect('/404')->with('error',"Data Update failed");
        }
        
    }


    public function profile($id)
    {
        $result = Company::where('id',$id)->with('getCarts')->first();
        if (!empty($result)) {
            // if hs value then return
            return view('pages/company/profile')->with('company', $result);
        } else {
            return redirect('pages/404')->with('error',"Data Update failed");
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
        $company = Company::where('id',$id)->delete();

        if ($company) {
            // if hs value then return
            return redirect('admin/company/show')->with('success', "Item Deleted");
        } else {
            return redirect('/404')->with('error',"Data Update failed");
        }
    }
}
