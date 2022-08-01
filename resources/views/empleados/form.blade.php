<div class="form-group row inputs">
    <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre *') }}</label>
    <div class="col-md-6">
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}" autocomplete="nombre" autofocus>
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row inputs">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico *') }}</label>
    <div class="col-md-6">
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{isset($empleado->email)?$empleado->email:old('email')}}" autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row inputs @error('sexo') is-invalid @enderror">
    <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo *') }}</label>
        @if(isset($empleado) && $empleado->sexo == "M")
        <div class="col-md-6">
            <div class="form-check">
                <input class="col-md-4 form-check-input" type="radio" value="M" name="sexo" checked id="sexo1">
                <label class="col-md-4 form-check-label" for="sexo1">
                Masculino
                </label>
            </div>
            <div class="form-check">
                <input class="col-md-4 form-check-input" type="radio" value="F" name="sexo" id="sexo2" >
                <label class="col-md-4 form-check-label" for="sexo2">
                Femenino
                </label>
            </div>            
        </div>
        @else
            <div class="col-md-6">
                <div class="form-check">
                    <input class="col-md-4 form-check-input" type="radio" value="M" name="sexo" id="sexo1">
                    <label class="col-md-4 form-check-label" for="sexo1">
                    Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="col-md-4 form-check-input" type="radio" value="F" name="sexo" id="sexo2" checked>
                    <label class="col-md-4 form-check-label" for="sexo2">
                    Femenino
                    </label>
                </div>
            </div>
        @endif
    
    @error('sexo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group row inputs">
    <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area *') }}</label>
    <div class="col-md-6">
        <select class="form-control @error('area_id') is-invalid @enderror" id="area" name="area" aria-label=".form-select-lg example">
            {{-- <option value="{{}}">{{($concept->area)?$concept->area:''}}</option> --}}
            <option value="">Seleccione el area</option>
            @foreach ($areas as $area)            
                @if(isset($empleado) && $area->id == $empleado->area_id)
                    <option value="{{$area->id}}" selected>{{$area->nombre}}</option>
                @else
                    <option value="{{$area->id}}">{{$area->nombre}}</option>
                @endif                           
            @endforeach
        </select>
        @error('area_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row inputs">
    <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción *') }}</label>
    <div class="col-md-6">
        <div class="form-floating">
            <textarea  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="floatingTextarea">{{isset($empleado->descripcion)?$empleado->descripcion:old('descripcion')}}</textarea>
            @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
    </div>
</div>

<div class="form-group row inputs">
    <label for="boletin" class="col-md-4 col-form-label text-md-right"></label>
    <div class="col-md-6">
        <div class="form-check">
            
            @if(isset($empleado) && $empleado->boletin == 1)
            <input class="form-check-input boletin" checked type="checkbox"  value="">
            <input class="form-check-input boletinSend" type="hidden" name="boletin" value="1">
            @else
            <input class="form-check-input boletin" type="checkbox"  value="">
            <input class="form-check-input boletinSend" type="hidden" name="boletin" value="0">
            @endif
            <label class="form-check-label" for="flexCheckDefault">
              Deseo recibir boletín informativo
            </label>
          </div>
        @error('boletin')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row inputs">
    <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Roles *') }}</label>
    
    <div class="col-md-6">
        {{-- // foreach --}}
        @if(isset($empleado_rol))
            @foreach ($roles as $rol)
                @foreach ($empleado_rol as $emp_rol)
                    @if($emp_rol->rol_id == $rol->id)
                        <div class="form-check">
                            <input class="form-check-input roles" type="checkbox" id="rol{{$rol->id}}" checked name="rol[]" value="{{$rol->id}}">
                            <label class="form-check-label" for="inlineCheckbox{{$rol->id}}">{{$rol->nombre}}</label>
                        </div>
                        @continue
                    @endif                    
                @endforeach
                {{-- @continue --}}
                <div class="form-check">
                    <input class="form-check-input roles" type="checkbox" id="rol{{$rol->id}}" name="rol[]" value="{{$rol->id}}">
                    <label class="form-check-label" for="inlineCheckbox{{$rol->id}}">{{$rol->nombre}}</label>
                </div>
            @endforeach
        @else
            @foreach ($roles as $rol)
                <div class="form-check">
                    <input class="form-check-input roles" type="checkbox" id="rol{{$rol->id}}" name="rol[]" value="{{$rol->id}}">
                    <label class="form-check-label" for="inlineCheckbox{{$rol->id}}">{{$rol->nombre}}</label>
                </div>
            @endforeach
        @endif
        <input type="hidden" class="form-control @error('rol') is-invalid @enderror">
        @error('rol')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>



