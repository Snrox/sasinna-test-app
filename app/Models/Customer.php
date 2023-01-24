<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = []; 
    
    
    public function province($province_id)
    {
       $name = Province::find($province_id)->name_en;

       return $name;

    }

    public function district($district_id)
    {
       $name = District::find($district_id)->name;

       return $name;

    }

    public function town($town_id)
    {
       $name = Town::find($town_id)->name;

       return $name;

    }

}
