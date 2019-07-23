<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Dentist;
use App\Service;
use App\Patient;
use DB;

class AppointmentController extends Controller
{
    
    public function index()
    {
        $appointments = DB::table('Appointments')
                        ->join('Dentists', 'Appointments.dentist_id', '=', 'Dentists.id')
                        ->join('Services', 'Appointments.service_id', '=', 'Services.id')
                        ->join('Patients', 'Appointments.patient_id', '=', 'Patients.id')
                        ->select('Appointments.*', 'Dentists.name as dentist_name', 'Services.name as service_name','Services.price as service_price','Patients.name as patient_name')
                        ->get();
   
        //return $appointments;
        return view("Appointments.List",compact('appointments') );
    }

    public function edit($id)
    {
        $dentists = Dentist::orderBy('id','ASC')->paginate();
        $services = Service::orderBy('id','ASC')->paginate();
        $patients = Patient::orderBy('id','ASC')->paginate();

        $Appointment = Appointment::find($id);
        return view ("Appointments.Edit",compact('Appointment','dentists','services','patients'));

    }

    public function create()
    {
        $dentists = Dentist::orderBy('id','ASC')->paginate();
        $services = Service::orderBy('id','ASC')->paginate();
        $patients = Patient::orderBy('id','ASC')->paginate();
        
        return view("Appointments.Create",compact('dentists','services','patients'));
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return back()->with('info','La cita ha sido eliminada');
    }

    public function store(Request $request)
    {
        $Appointment = new Appointment;
        $Appointment->date = $request->date;
        $Appointment->price = str_replace(".","",$request->price);
        $Appointment->dentist_id = $request->dentist_id;
        $Appointment->patient_id = $request->patient_id;
        $Appointment->service_id = $request->service_id;
        $Appointment->save();
        
        $appointments = DB::table('Appointments')
                        ->join('Dentists', 'Appointments.dentist_id', '=', 'Dentists.id')
                        ->join('Services', 'Appointments.service_id', '=', 'Services.id')
                        ->join('Patients', 'Appointments.patient_id', '=', 'Patients.id')
                        ->select('Appointments.*', 'Dentists.name as dentist_name', 'Services.name as service_name','Services.price as service_price','Patients.name as patient_name')
                        ->get();
   
        
        return view("Appointments.List",compact('appointments') )->with('info','La cita ha sido Guardada');
    }

    public function update(Request $request, $id)
    {
        $Appointment = Appointment::find($id);
        $Appointment->date = $request->date;
        $Appointment->price = str_replace(".","",$request->price);
        $Appointment->dentist_id = $request->dentist_id;
        $Appointment->patient_id = $request->patient_id;
        $Appointment->service_id = $request->service_id;
        $Appointment->save();

        $appointments = DB::table('Appointments')
                        ->join('Dentists', 'Appointments.dentist_id', '=', 'Dentists.id')
                        ->join('Services', 'Appointments.service_id', '=', 'Services.id')
                        ->join('Patients', 'Appointments.patient_id', '=', 'Patients.id')
                        ->select('Appointments.*', 'Dentists.name as dentist_name', 'Services.name as service_name','Services.price as service_price','Patients.name as patient_name')
                        ->get();
   
        
        return view("Appointments.List",compact('appointments') )->with('info','La cita ha sido Guardada');
    }
}
