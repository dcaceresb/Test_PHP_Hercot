<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use DB;

class AppointmentController extends Controller
{
    public function index()
    {
      
        $appointments = DB::table('Appointments')
                        ->join('Dentists', 'Appointments.dentist_id', '=', 'Dentists.id')
                        ->join('Services', 'Appointments.service_id', '=', 'Services.id')
                        ->join('Patients', 'Appointments.patient_id', '=', 'Patients.id')
                        ->select('Appointments.*', 'Dentists.name as dentist_name', 'Services.name as service_name','Patients.name as patient_name')
                        ->paginate();
   
        //return $appointments;
        return view("Appointments.List",compact('appointments') );
    }
}
