<?php

namespace App;

use App\Student;
use App\Price;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }
}
