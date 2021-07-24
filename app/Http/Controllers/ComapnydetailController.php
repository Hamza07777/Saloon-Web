<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\companies_brands;
use App\Models\company;
use App\Models\User;
use App\Notifications\NewCompanyNotification;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Support\Facades\Auth;


class ComapnydetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_detail.new')->with('brand',brand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $this->validate($request, [
            // 'avatar' => 'dimensions:width=100,height=100'
                //  'hero_image' => 'required|mimes:jpeg,bmp,png|size:5000',
    //    ]);
        // dd($request);

        $validatedData = $request->validate([

            'name' => 'required|string|max:255',
            'currency' => 'required',
            'country' => 'required',
            'city' => 'required|string|max:250',
            'address' => 'required|string|max:250',
            'description' => 'required|string|max:250',
            'phone_number' => 'required|string|min:6|max:15|starts_with:+',
            'whatsapp_number' => 'required|string|min:6|max:15|starts_with:+',
            'latitude' => 'required|string|max:250',
            'longitude' => 'required|string|max:250',
            'website' => 'required|url',
            'business_hours' => 'required|string|max:250',
            'saloon_type' => 'required',
            'license_path' => 'required|mimes:jpg,jpeg,png,pdf |max:4096',
            'logo_path' => 'required|mimes:jpg,jpeg,png |max:4096',
        ]);

        // dd($request);
        $id= Auth::user()->id;
        $users=Auth::user();
        $company=new company();


        if($request->hasFile('logo_path') & $request->hasFile('license_path')){
                  $extension=$request->logo_path->extension();
    	          $filename=time()."_.".$extension;
                  $request->logo_path->move(public_path('company_image'),$filename);

                  $extension1=$request->license_path->extension();
    	          $filename1=time()."_.".$extension1;
                  $request->license_path->move(public_path('company_license'),$filename1);


                //   if(!empty($request->get('brand'))){
                //     $brand = implode(",", $request->get('brand'));
                //     }
                //     else{
                //         $brand='';
                //     }
        $company->user_id=$id;
        $company->name=$request->name;
        $company->currency=$request->currency;
        $company->country =$request->country;
        $company->city=$request->city;
        $company->address=$request->address;
        $company->phone_number=$request->phone_number;
        $company->whatsapp_number=$request->whatsapp_number;
        $company->latitude=$request->latitude;
        $company->longitude=$request->longitude;
        $company->website=$request->website;
        $company->business_hours=$request->business_hours;
        $company->saloon_type=$request->saloon_type;
        // $company->brand=$brand;
        $company->license_path=$filename1;
        $company->logo_path=$filename;
        $company->rating=$request->rating;
        $company->total_reviews=$request->total_reviews;
        $company->description=$request->description;
        $company->save();

        Notification::send($users,new NewCompanyNotification());
        $lenght=count((array)$request->get('brand')) ;
        for ($i=0; $i <$lenght ; $i++) {
             $dervice=companies_brands::where('company_id',$id)->where('brand_id',$request->brand[$i])->count();
             if($dervice==0){


                companies_brands::create([
                    'company_id' => $id,
                    'brand_id' =>  $request->brand[$i],
                ]);

            }
            else{
                continue;
            }


        }
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


         $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
        //     'namee' => 'required',
        //     'currency' => 'required',
        //     'country' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'phone_number' => 'required',
        //     'whatsapp_number' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //     'website' => 'required',
        //     'business_hours' => 'required',
        //     'saloon_type' => 'required',
        //     'license_path' => 'required',
        //     'logo_path' => 'required',

        'namee' => 'required|string|max:255',
        'currency' => 'required',
        'country' => 'required',
        'city' => 'required|string|max:250',
        'address' => 'required|string|max:250',
        'description' => 'required|string|max:250',
        'phone_number' => 'required|string|min:6|max:15|starts_with:+',
        'whatsapp_number' => 'required|string|min:6|max:15|starts_with:+',
        'latitude' => 'required|string|max:250',
        'longitude' => 'required|string|max:250',
        'website' => 'required|url',
        'business_hours' => 'required|string|max:250',
        'saloon_type' => 'required',
        'license_path' => 'required|mimes:jpg,jpeg,png,pdf |max:4096',
        'logo_path' => 'required|mimes:jpg,jpeg,png |max:4096',


         ]);

        if($request->hasFile('logo_path') & $request->hasFile('license_path')){
                  $extension=$request->logo_path->extension();
    	          $filename=time()."_.".$extension;
                  $request->logo_path->move(public_path('company_image'),$filename);

                  $extension1=$request->license_path->extension();
    	          $filename1=time()."_.".$extension1;
                  $request->license_path->move(public_path('company_license'),$filename1);
        }

                company::where('user_id',$id)->update([
                    'name'=>$request->namee,
                    'currency'=>$request->currency,
                    'country'=>$request->country,
                    'city'=>$request->city,
                    'address'=>$request->address,
                    'phone_number'=>$request->phone_number,
                    'whatsapp_number'=>$request->whatsapp_number,
                    'latitude'=>$request->latitude,
                    'longitude'=>$request->longitude,
                    'website'=>$request->website,
                    'business_hours'=>$request->business_hours,
                    'description'=>$request->description,
                    'saloon_type'=>$request->saloon_type,
                    'license_path'=>$filename1,
                    'logo_path'=>$filename,
               'rating'=>$request->rating,
                    'total_reviews'=>$request->total_reviews,
                        ]);
                        User::whereId($id)->update([

                            'name'=>$request->name,
                            'email'=>$request->email,
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
