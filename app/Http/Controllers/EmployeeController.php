<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\employee;
use App\Models\employees_services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $employee=employee::where('company_id',$id)->get();


        return view('employee.list')->with('employee',$employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.new')->with('category',Category::all());
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
            'name' => 'required|alpha|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:15|unique:employees|starts_with:+',
            'whatsapp_number' => 'required|string|min:10|max:15|unique:employees|starts_with:+',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'designation' => 'required|alpha',
            // 'services' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
        ]);
        //  dd($request);
        $id= Auth::user()->id;

        $employee=new employee();


        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('employee_image'),$filename);
        $services = implode(",", $request->get('services'));
         $employee->company_id=$id;
        // $employee->company_id=1;
        $employee->name=$request->name;
        $employee->email =$request->email;
        $employee->address=$request->address;
        $employee->phone_number=$request->phone_number;
        $employee->whatsapp_number=$request->whatsapp_number;
        // $employee->working_hours=$request->working_hours;
        $employee->start_time=$request->start_time;
        $employee->end_time=$request->end_time;
        $employee->designation=$request->designation;
        $employee->services=$services;
        $employee->image=$filename;
        $employee->save();

        $emp_id=employee::max('id');
        $lenght=count((array)$request->get('services')) ;
        for ($i=0; $i <$lenght ; $i++) {
            employees_services::create([
                'company_id' => $id,
                'employee_id' =>$emp_id,
                'service_id' => $request->services[$i],
            ]);
        }
        return redirect('/employee');
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
        $idd= Auth::user()->id;
        $employee=employee::findOrFail($id);

        return view('employee.edit')->with('category',Category::all())->with('employee',$employee);

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
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'name'=>'regex:/^[a-zA-Z ]+$/',

        //     'user_contact' => 'required|string',
        //     'user_contact' =>'regex:/^[0-9+]{13}$/',
        //     'user_address' => 'required|string|max:255',
        // ],[
        //     'name.required'=>"The name field is required",
        //     'name.regex'=>"name should be in alphabetic",
        //    'user_contact.required'=>"The user_contact field is required",
        //    'user_contact.regex'=>"The user_contact is required 13 digits according to pakistan format like this : +923107263877",
        //    'user_address.required'=>"The user_address field is required",




        // ]);
        $validatedData = $request->validate([
            'name' => 'required|alpha|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10|max:15|unique:employees|regex:/^([0-9\s\-\+\(\)]*)$/',
            'whatsapp_number' => 'required|string|min:10|max:15|unique:employees|regex:/^([0-9\s\-\+\(\)]*)$/',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'designation' => 'required|alpha',
            // 'services' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
        ],[
            'phone_number.regex'=>"Phone number not match",
        ]);
        $idd= Auth::user()->id;
        // if(!empty($request->get('services'))){
        // $services = implode(",", $request->get('services'));
        // }
        // else{
        //     $services='';
        // }
        if($request->hasFile('image')){
            $extension=$request->image->extension();
    	          $filename=time()."_.".$extension;
                  $request->image->move(public_path('employee_image'),$filename);

        // $employee->company_id=$id;
        // $employee->company_id=1;


        employee::whereId($id)->update([

        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'phone_number'=>$request->phone_number,
        'whatsapp_number'=>$request->whatsapp_number,
        'working_hours'=>$request->working_hours,
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time,
        'designation'=>$request->designation,
        // 'services'=>$services,
        'image'=>$filename,

            ]);
            $initial=employees_services::where('company_id',$idd)->where('employee_id',$id)->pluck('service_id')->toArray();

            $final=(array)$request->get('services');

            $result=array_diff($initial,$final);

            foreach ($result as $items) {

                $iddd=employees_services::where('company_id',$idd)->where('employee_id',$id)->where('service_id',$items)->value('id');
                // dd($iddd);
                $branch=employees_services::findOrFail($iddd);
                 $branch->delete();
            }
            $lenght=count((array)$request->get('services')) ;
            for ($i=0; $i <$lenght ; $i++) {

                $dervice=employees_services::where('company_id',$idd)->where('employee_id',$id)->where('service_id',$request->services[$i])->count();
                if($dervice==0){


                    employees_services::create([
                        'company_id' => $idd,
                        'employee_id' =>$id,
                        'service_id' => $request->services[$i],
                    ]);

               }
               else{
                   continue;
               }


            }
            return redirect('/employee');
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch=employee::findOrFail($id);
        $branch->delete();
        return redirect('/employee');
    }
}
