<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies_deal_services extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_id',
        'service_id',
        'deal_id',
    ];
  
}
