<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\companies_brands;
use App\Models\company;
use App\Models\companies_header_images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\companies_business_hours;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id= Auth::user()->id;
        $company=Company::where('user_id',$id)->first();
        $company_header=companies_header_images::where('company_id',$id)->first();
        $company_bussines=companies_business_hours::where('company_id',$id)->get();
        $location=Company::all('latitude','longitude');
      //  dd($location);
        return view('home')->with('company',$company)
        ->with('company_header',$company_header)
        ->with('brand',brand::all())->with('company_brand',companies_brands::where('company_id',$id)->get())
        ->with('company_bussines',$company_bussines)
        ->with('location',$location);
       
    }


    public function change_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed','alpha_num'],

        ]);
        $id= Auth::user()->id;

            User::whereId($id)->update([
                'password' => Hash::make($request['password']),
                 ]);
                 return redirect('/home');

    }
    public function update_brands(Request $request)
    {
        $id= Auth::user()->id;
        $initial=companies_brands::where('company_id',$id)->pluck('brand_id')->toArray();
        //  dd($initial);
        $final=(array)$request->get('brand');
        // dd($final);

        $result=array_diff($initial,$final);

        //  dd($result);
        $dlenght=count($result);
        // dd($dlenght);
        foreach ($result as $items) {

            $iddd=companies_brands::where('company_id',$id)->where('brand_id',$items)->value('id');
            // dd($iddd);
            $branch=companies_brands::findOrFail($iddd);
             $branch->delete();
        }


        $lenght=count((array)$request->get('brand'));
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
    public function change_password_view()
    {

        return view('company_detail.change_password');
    }



public function search(Request $request)
{

                    if($request->ajax())
                    {

                        $output="";
                        $products=DB::table('raw_companies')->where('company_name','LIKE','%'.$request->search."%")->get();
                       $output = '<ul class="dropdown-menu" style="display:block; position:relative;padding: 7px; width: 100%;">';
                                    foreach($products as $row)
                                    {
                                    $output .= '
                                    <li style="margin: 10px 0px;"><a href="#">'.$row->company_name.'</a></li>
                                    ';
                                    }
                                    $output .= '</ul>';
                        return Response($output);
                    }
                }

    public function company_detail_Select(Request $request)
                {

                    if($request->ajax())
                    {

                        $products=DB::table('raw_companies')->where('company_name',$request->search)->first();

                        echo json_encode($products);
                        exit;

                    }
                }


}
