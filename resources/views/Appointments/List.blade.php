@extends('layout')


@section('content')
    @php
        $total = 0;
    @endphp

    
    
    <br>
    <h2 class="text-center"> Historial de Servicios </h2>
    <br>
    <form class="form-inline">
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                Desde: <input id="Desde" width="276" />
                </div>
                <div class="col">
                </div>
                <div class="col">
                Hasta: <input id="Hasta" width="276" />
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        
        
    </form>
    <br>
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead class="thead-light">
            <th>Fecha consulta</th>
            <th>Paciente</th>
            <th>Servicio</th>
            <th>Medico</th>
            <th>Precio</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                @php
                    $total += (int)$appointment->price;
                @endphp
                <tr>
                    <td> {{ $appointment->date }}</td>
                    <td> {{ $appointment->patient_name }}</td>
                    <td> {{ $appointment->service_name }}</td>
                    <td> {{ $appointment->dentist_name }}</td>
                    <td> ${{ number_format($appointment->price, 0, '', '.')}}</td>
                    <td> 
                        
                        
                        
                        
                        <form id="form" action= "{{ route ('Appointment.destroy', $appointment->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">  
                                <a href="{{ route ('Appointment.edit',$appointment->id) }} " class="btn btn-default"><i class="fa fa-pencil"></i></a> 
                                <button class="btn btn-default " type="submit"><i class="fa fa-trash-o fa-lg"> </i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
  
    <h2 id="Ganancias"> Ganancias totales: ${{number_format($total, 0, '', '.')  }}.- </h2>
   
@endsection

@section('scripts')
    <script src="{{ asset('js/Historial.js')}}"></script>
@endsection
