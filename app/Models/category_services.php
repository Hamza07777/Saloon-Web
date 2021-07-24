<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_services extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'services',
        'price',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function serviess()
    {
        return $this->belongsTo(Service::class,'services');
    }
   
   
}
