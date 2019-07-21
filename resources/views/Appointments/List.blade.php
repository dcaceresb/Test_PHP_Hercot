@extends('layout')

@section('content')
    <h2 class="text-center"> Historial de Servicios </h2>
    <table class="table table-hover table-stripped">
        <thead>
            <th>Fecha consulta</th>
            <th>Paciente</th>
            <th>Servicio</th>
            <th>Medico</th>
            <th>Precio</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td> {{ $appointment->date }}</td>
                    <td> {{ $appointment->patient_name }}</td>
                    <td> {{ $appointment->service_name }}</td>
                    <td> {{ $appointment->dentist_name }}</td>
                    <td> {{ $appointment->price }}</td>
                    <td> algo </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    {!! $appointments->render() !!}
@endsection