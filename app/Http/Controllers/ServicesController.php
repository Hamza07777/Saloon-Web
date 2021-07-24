<?php

namespace App\Http\Controllers;

use App\Models\category_services;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $category_service=category_services::where('company_id',$id)->get();
        return view('services.list')->with('services',$category_service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('services.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service=new Service();


        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->image->move(public_path('service_image'),$filename);
        $service->name=$request->name;
        $service->description=$request->description;
        $service->price=$request->price;
        $service->image=$filename;
        $service->save();
        return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=category_services::findOrFail($id);
        return view('services.edit')->with('service',$service);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required',
        
        ]);
        category_services::whereId($id)->update([

            'price'=>$request->price,

            ]);
            return redirect('/service');
    }




    public function change_status(Request $request)
    {
        $validatedData = $request->validate([
            'service_status' => 'required',
        
        ]);
        $id=$request->service_id;
        category_services::whereId($id)->update([
            'status'=>$request->service_status,

            ]);
            return redirect('/service');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
