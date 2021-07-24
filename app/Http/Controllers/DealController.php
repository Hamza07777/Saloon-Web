<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\companies_deal_services;
use App\Models\companies_deals;
use App\Models\company;
use App\Models\employees_services;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $deal=companies_deals::where('company_id',$id)->get();
        return view('deals.list')->with('deal',$deal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('deals.new')->with('category',Category::all());
    }
    public function get_services($id)
    {

        if($id==0){
            $service = Service::orderby('id','asc')->select('*')->get();
         }else{
            $service = Service::select('*')->where('category_id',$id)->get();
         }
         // Fetch all records
         $userData['data'] = $service;

         echo json_encode($userData);
         exit;


    }
    public function get_services_edit(Request $request, $id)
    {
      
         $idd= Auth::user()->id;
         $emp_id=$request->employee_id;
        
        if($id==0){
            $service = Service::orderby('id','asc')->select('*')->get();
         }else{
            $service = Service::select('*')->where('category_id',$id)->get();
         }
         $empoloyee_service=employees_services::where('company_id',$idd)->where('employee_id',$emp_id)->get();
        
         // Fetch all records
        return view('employee.services')->with('service',$service)->with('empoloyee_service',$empoloyee_service)->render();


    }

    public function get_deal_edit(Request $request, $id)
    {
         
         $idd= Auth::user()->id;
         $emp_id=$request->employee_id;
         
        if($id==0){
            $service = Service::orderby('id','asc')->select('*')->get();
         }else{
            $service = Service::select('*')->where('category_id',$id)->get();
         }
         $empoloyee_service=companies_deal_services::where('company_id',$idd)->where('deal_id',$emp_id)->get();
     
         // Fetch all records
        return view('deals.services')->with('service',$service)->with('empoloyee_service',$empoloyee_service)->render();


    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todayDate = date('Y/m/d');
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:'.$todayDate,
            'end_date' => 'required|date|after:start_date',
            'banner' => 'required|mimes:jpg,jpeg,png,pdf |max:4096',

        
        ]);
        $id= Auth::user()->id;
        $company=company::where('user_id',$id)->first();


        $company_deals=companies_deals::where('company_id',$id)->count();

        if($company_deals>10){
            $branch=companies_deals::where('company_id',$id)->first();
            $branch->delete();
        }

        $deal=new companies_deals();


        if($request->hasFile('banner')){

            $extension=$request->banner->extension();
    	          $filename=time()."_.".$extension;
                  $request->banner->move(public_path('deals_banner'),$filename);
             
         $deal->company_id=$id;
        // dd('jrrlo');
        // $deal->company_id=1;
        $deal->title=$request->title;
        $deal->description =$request->description;
        $deal->price =$request->price;
        $deal->start_date =$request->start_date;
        $deal->end_date =$request->end_date;

         $deal->currency=$company->currency;
        // $deal->currency='$';
        $deal->banner=$filename;
        $deal->save();
        $deal_id=companies_deals::max('id');
        $lenght=count((array)$request->get('services')) ;
        for ($i=0; $i <$lenght ; $i++) {
            companies_deal_services::create([
                'company_id' => $id,
                'deal_id' =>$deal_id,
                'service_id' => $request->services[$i],
            ]);
        }
        return redirect('/company_deals');

        }
        else{
            return redirect()->back();
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
        $companies_deals=companies_deals::findOrFail($id);
        return view('deals.edit')->with('deal',$companies_deals)->with('category',Category::all());
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
        $todayDate = date('Y/m/d');
        $idd= Auth::user()->id;
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:'.$todayDate,
            'end_date' => 'required|date|after:start_date',
            'banner' => 'required|mimes:jpg,jpeg,png,pdf |max:4096',
        ]);

        if($request->hasFile('banner')){
            $extension=$request->banner->extension();
    	          $filename=time()."_.".$extension;
                  $request->banner->move(public_path('deals_banner'),$filename);
    

        companies_deals::whereId($id)->update([

            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
           'banner'=>$filename,
            ]);
        }

        $initial=companies_deal_services::where('company_id',$idd)->where('deal_id',$id)->pluck('service_id')->toArray();

        $final=(array)$request->get('services');

        $result=array_diff($initial,$final);

        foreach ($result as $items) {

            $iddd=companies_deal_services::where('company_id',$idd)->where('deal_id',$id)->where('service_id',$items)->value('id');
            // dd($iddd);
            $branch=companies_deal_services::findOrFail($iddd);
             $branch->delete();
        }
        $lenght=count((array)$request->get('services')) ;
        for ($i=0; $i <$lenght ; $i++) {

            $dervice=companies_deal_services::where('company_id',$idd)->where('deal_id',$id)->where('service_id',$request->services[$i])->count();
            if($dervice==0){

                companies_deal_services::create([
                    'company_id' => $idd,
                    'deal_id' =>$id,
                    'service_id' => $request->services[$i],
                ]);

           }
           else{
               continue;
           }
        

    }
    return redirect('/company_deals');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch=companies_deals::findOrFail($id);
        $branch->delete();
        return redirect('/company_deals');
    }
}
