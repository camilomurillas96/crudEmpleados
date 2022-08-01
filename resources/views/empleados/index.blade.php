@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Empleados') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                <i class="fas fa-plus-circle"></i>
                                {{ __('Crear empleado') }}
                            </a>
                            
                          </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div id="alerta" class="alert alert-info">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Area</th>
                                <th>Boletin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado )                            
                            <tr>            
                                <td>{{$empleado->id}}</td>
                                <td>{{$empleado->nombre}}</td>
                                <td>{{$empleado->email}}</td>
                                <td>{{$empleado->sexo}}</td>
                                <td>{{$empleado->area}}</td>
                                <td>{{$empleado->boletin}}</td>
                                <td style="display: flex;">
                                    <a class="btn btn-warning" style="margin: 5px;" href="{{ route('empleado.edit',['id'=>$empleado->id],'/edit') }}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    
                                    <form action="{{ route('empleado.destroy',['id'=>$empleado->id]) }}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" style="margin: 5px;" type="submit" onclick="confirm('¿Quieres borrar este registro?')">
                                            <i class="fas fa-trash-alt"></i></button>
                                        {{-- <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar este registro?')" value="Eliminar"> --}}
                                    </form>                    
                                </td>
                            </tr>
                            @endforeach     
                        </tbody>
                    </table>
                </div>
                
            </div>            
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/empleados/index.js') }}"></script>

@endsection