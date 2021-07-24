<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\company;

class companies_business_hours extends Model
{
    use HasFactory;

    public function company_name($id){
        $user=company::where('user_id',$id)->first();
        
        $name=$user->name;
     
        return $name;
    }
}
