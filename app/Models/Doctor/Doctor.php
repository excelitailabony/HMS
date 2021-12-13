<?php

namespace App\Models\Doctor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
     protected $guarded = [];

      public function docdept(){
        return $this->belongsTo("App\Models\DoctorDept",'doc_dept');
    }
}
