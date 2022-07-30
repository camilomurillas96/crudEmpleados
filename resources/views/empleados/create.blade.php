@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Crear empleado') }}</div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post">
                    @if ($message = Session::get('error'))
                        <div id="alerta" class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @csrf                    
                    @include('empleados.form')
                
                <div class="row acciones">    
                    <div class="col-6">
                        <button type="submit" class="btn btn-success p-2 enviar" id="guardar">
                            <i class="fas fa-save"></i>
                            Guardar
                        </button>
                    </div>
                </form>
                    <div class="col-6">
                        <a href="{{ route('index') }}" class="btn btn-danger p-2" id="salir">
                            <i class="fas fa-chevron-left"></i>
                            Regresar
                        </a>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/empleados/create.js') }}"></script>

@endsection