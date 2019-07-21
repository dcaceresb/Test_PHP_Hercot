<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'date','price','dentist_id','patient_id','service_id',
    ];
}
