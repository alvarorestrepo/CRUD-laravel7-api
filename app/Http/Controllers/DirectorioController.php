<?php

namespace App\Http\Controllers;

use App\Directorio;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDirectorioRequest;
use App\Http\Requests\UpdateDirectorioRequest;


class DirectorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request -> has ('txtBuscar')){
            $directorios = Directorio::where ('nombre','like','%'.$request -> txtBuscar.'%')
            ->orWhere('telefono',$request -> txtBuscar)->get();
        }else{
            $directorios = Directorio::all();
        }
        return $directorios;
    }

    private function subirArchivo($file)
    {
        $nombreArchivo = time(). '.'. $file->getClientOriginalExtension();
        $file->move(public_path('fotografias'), $nombreArchivo);
        return $nombreArchivo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //POST se va a insertar datos
    public function store(CreateDirectorioRequest $request)
    {
        $input = $request->all();
        if($request->has('foto'))
            $input['foto'] = $this->subirArchivo($request->foto);

        Directorio::create($input);
        return response()->json([
            'res'=>true,
            'message'=>'registro creado correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //retornar por GET un solo elemento
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //PUT actualizar registros
    public function update(UpdateDirectorioRequest $request, Directorio $directorio)
    {
        $input = $request->all();
        // if($request->has('foto'))
        //     $input['foto'] = $this->subirArchivo($request->foto);

        $directorio->update($input);
        return response()->json([
            'res'=>true,
            'message'=>'registro Actualizado correctamente'
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //DELETE eliminar registro
    public function destroy($id)
    {
        Directorio::destroy($id);
        return response()->json([
            'res'=>true,
            'message'=>'registro Eliminado correctamente'
        ],200);

    }
}
