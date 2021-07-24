<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function category_service()
    {
        return $this->hasMany(Service::class,'category_id');
    }

    public function categories()
    {
        return $this->hasMany(category_services::class,'category_id');
    }

    public function services_detail()
    {
        $service=Service::all();
        
     
        return $service;
    }
    
}