<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\companies_business_hours;
use Illuminate\Http\Request;

class CompanydaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $company=companies_business_hours::where('company_id',$id)->get();
        return view('company_bussines_hours.list')->with('company',$company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_bussines_hours.new');
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
            'day' => 'required|numeric|between:1,6',
            'from' => 'required',
            'to' => 'required',
            'is_off_day' => 'required',

        ]);
   
        $id= Auth::user()->id;
        $comoany=new companies_business_hours();
        $comoany->day=$request->day;
        $comoany->company_id=$id;
        $comoany->from=$request->from;
        $comoany->to=$request->to;
        $comoany->is_off_day=$request->is_off_day;
        $comoany->save();
        return redirect('/');
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
        $company=companies_business_hours::findOrFail($id);
        return view('company_bussines_hours.edit')->with('company',$company);
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
            'day' => 'required|numeric|between:1,6',
            'from' => 'required',
            'to' => 'required',
            'is_off_day' => 'required',

        ]);
        $id= Auth::user()->id;
        companies_business_hours::whereId($id)->update([

            'day'=>$request->day,
            'company_id'=>$id,
            'from'=>$request->from,
            'to'=>$request->to,
            'is_off_day'=>$request->is_off_day,

                ]);
                return redirect('/');
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
