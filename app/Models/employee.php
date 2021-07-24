<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class employee extends Model
{
    use HasFactory;

    public function get_services($id)
    {
        $items = array();
        $count = 0;
        $idd= Auth::user()->id;
        $service=employees_services::where('company_id',$idd)->where('employee_id',$id)->get();

      foreach ($service as $service) {

        $services=Service::where('id',$service->service_id)->value('name');
        $items[$count++] = $services;
      }

        return implode(",",$items);
    }
}
