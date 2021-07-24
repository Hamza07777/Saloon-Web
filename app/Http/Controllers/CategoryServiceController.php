<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\category_services;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services_of_category.new')->with('category',Category::all())->with('service',Service::all())->with('service_category',category_services::all())->with('service_categoryy',category_services::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
         
            'price' => 'required',
        ]);
        $id= Auth::user()->id;

        $lenght=count((array)$request->get('services')) ;
        for ($i=0; $i <$lenght ; $i++) {
            $service = explode(",", $request->services[$i]);
            $dervice=category_services::where('company_id',$id)->where('category_id',$service[0])->where('services',$service[1])->count();
            if($dervice==0){


                category_services::create([
                    'company_id' => $id,
                    'category_id' =>$service[0],
                    'services' => $service[1],
                    'price' => $request->price[$i],
                ]);

            }
            else{
                continue;
            }


        }
        return redirect('/service');
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
        //
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
        //
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
