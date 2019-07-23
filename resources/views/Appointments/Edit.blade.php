@extends('layout')


@section('content')
    <br>
    <h2 class="text-center"> Editar consulta dental {{$Appointment->id}}</h2>
    <br>
    <form method="POST" action="/Appointment/{{ $Appointment->id }}"  role="form">
       
        <input name="_method" type="hidden" value="PUT">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
    
        <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <label for="service_id" class="col-sm-2 col-form-label">Servicio:</label>
            <div class="col-sm-4">
                <select id="service_id" name="service_id" class="browser-default custom-select">
                    <option >Seleccione servicio</option>
                    @foreach($services as $service)
                        @if($Appointment->service_id == $service->id)
                            <option selected value="{{$service->id}}">{{$service->name}}</option> 
                        @else
                            <option value="{{$service->id}}">{{$service->name}}</option> 
                        @endif
                        
                    @endforeach
                </select>
            </div>
            <select id="prices" style="visibility:hidden">
                <option selected>0</option>
                @foreach($services as $service)
                        <option value="{{$service->price}}">{{$service->price}}</option> 
                @endforeach
            </select>
            
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <label for="dentist_id" class="col-sm-2 col-form-label">Médico tratante:</label>
            <div class="col-sm-4">
                <select id="dentist_id" name="dentist_id" class="browser-default custom-select">
                    <option selected>Seleccione medico</option>
                    @foreach($dentists as $dentist)
                        @if($Appointment->dentist_id == $dentist->id)
                            <option selected value="{{$dentist->id}}">{{$dentist->name}}</option> 
                        @else
                            <option value="{{$dentist->id}}">{{$dentist->name}}</option> 
                        @endif
                            
                    @endforeach
                </select>
            </div>
            
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <label for="patient_id" class="col-sm-2 col-form-label">Nombre Paciente:</label>
            <div class="col-sm-4">
            <select id="patient_id" name="patient_id" class="browser-default custom-select">
                <option selected>Seleccione paciente</option>
                @foreach($patients as $patient)
                    @if($Appointment->patient_id == $patient->id)
                        <option selected value="{{$patient->id}}">{{$patient->name}}</option>
                    @else
                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endif                         
                @endforeach
            </select>
            </div>
           
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <label for="price" class="col-sm-2 col-form-label">Costo tratamiento:</label>
            <div class="col-sm-4">
                <input class="form-control"  id="price" name="price" placeholder="0" value="{{$Appointment->price}}">
            </div>
           
        </div>

        <div class="form-group row">
            <div class="col-sm-3">
            </div>
            <label for="date" class="col-sm-2 col-form-label">Fecha Servicio:</label>
            <div class="col-sm-4">
                <input id="Date" name="date" value="{{$Appointment->date}}" />
            </div>
           
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
            </div>
            
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Editar consulta</button>
            </div>
            
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/Form.js')}}"></script>
    
@endsection