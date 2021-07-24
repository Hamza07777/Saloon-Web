<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    public function company_names($id)
    {
        $user=User::findOrFail($id);
        
        $name=$user->name;
     
        return $name;
    }
}
