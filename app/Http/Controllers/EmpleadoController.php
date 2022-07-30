<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Rol;
use App\Empleado_Rol;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = DB::select("SELECT emp.id AS id, 
        emp.nombre AS nombre, 
        emp.email AS  email, 
        (CASE
            WHEN emp.sexo = 'M' THEN 'Masculino'
            ELSE 'Femenino'
        END) AS sexo, 
        ar.nombre AS area,
        (CASE
            WHEN emp.boletin = 1 THEN 'Si'
            ELSE 'No'
        END) AS boletin
        FROM empleado AS emp
        LEFT JOIN areas AS ar ON emp.area_id = ar.id");
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = DB::select("SELECT * FROM areas");
        $roles = DB::select("SELECT * FROM roles");
        return view('empleados.create',compact('areas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nombre = $request->nombre;
        $email = $request->email;
        $sexo = $request->sexo;
        $area = intval($request->area);
        $desc = $request->descripcion;
        $boletin = intval($request->boletin);
        $rol = $request->rol;

        $campos = [
            'nombre' => 'required|string',
            'email' => 'required|email:dns',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
            'rol' => 'required'

        ];

        $mensaje=[
            'nombre.required' => 'El nombre es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email' => 'El correo electrónico debe ser valido',
            'sexo.required' => 'El sexo es requerido',
            'area_id.required' => 'El area es requerida',
            'descripcion.required' => 'La descripción es requerida',
            'rol.required' => 'El rol es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        
        try{
            $empleado = new Empleado();
            $empleado->nombre = $nombre;
            $empleado->email = $email;
            $empleado->sexo = $sexo;
            $empleado->area_id = $area;
            $empleado->boletin = $boletin;
            $empleado->descripcion = $desc;
            $empleado->save();
            $empleado->roles()->attach($rol);
        }catch (QueryException $ex){
            return back()->with('error', 'Ocurrio un error, intente nuevamente.');
        }
        

        return redirect('/')->with('success', 'Se creo el empleado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return $id;
        $empleado = DB::select("SELECT * FROM empleado
        WHERE id =".$id);
        $empleado = $empleado[0];
        $empleado_rol = DB::select("SELECT * FROM empleado_rol WHERE empleado_id =".$id);
        $areas = DB::select("SELECT * FROM areas");
        $roles = DB::select("SELECT * FROM roles");
        return view('empleados.edit',compact('areas','roles','empleado','empleado_rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return $request->all();
        $nombre = $request->nombre;
        $email = $request->email;
        $sexo = $request->sexo;
        $area = intval($request->area);
        $desc = $request->descripcion;
        $boletin = intval($request->boletin);
        $rol = $request->rol;

        $campos = [
            'nombre' => 'required|string',
            'email' => 'required|email:dns',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
            'rol' => 'required'

        ];

        $mensaje=[
            'nombre.required' => 'El nombre es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email' => 'El correo electrónico debe ser valido',
            'sexo.required' => 'El sexo es requerido',
            'area_id.required' => 'El area es requerida',
            'descripcion.required' => 'La descripción es requerida',
            'rol.required' => 'El rol es requerido'
        ];

        // $this->validate($request,$campos,$mensaje);
        
        try{
            Empleado::where('id','=',intval($id))->update(array(
                'nombre' => $nombre,
                'email' => $email,
                'sexo' => $sexo,
                'area_id' => $area,
                'descripcion' => $desc,
                'boletin' => $boletin
                )
            );

            foreach ($rol as $key => $value) {
                # code...
                Empleado_Rol::where('empleado_id','=',intval($id))->update(array(
                    'rol_id' => $value
                    )
                );
            }
        }catch (QueryException $ex){
            return back()->with('error', 'Ocurrio un error, intente nuevamente.');
        }
        

        return redirect('/')->with('success', 'Se actualizó el empleado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('/')
        ->with('success', 'El empleado se eliminó.');
    }
}
