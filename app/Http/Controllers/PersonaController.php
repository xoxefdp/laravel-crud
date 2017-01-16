<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Persona;

class PersonaController extends Controller
{
  protected $personas;

  /**
   * [__construct description]
   * @param Persona $personas [description]
   */
  public function __construct(Persona $personas)
  {
      $this->personas = $personas;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
      $titulo = 'Laravel '.App::version();
      $personas = $this->personas->latest('created_at')->paginate(5);

      if ($request->ajax()) {
          return view('list', ['personas' => $personas])->render();
      }

      return view('index', compact('titulo','personas') );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
      if ($request->ajax()) {
          return view('form-insert')->render();
      }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'nombres' => 'required|regex:/^[a-zA-Z. ]*$/',
      'apellidos' => 'required|regex:/^[a-zA-Z. ]*$/',
      'cedula' => 'required|numeric|unique:persona,cedula',
      'correo' => 'required|email|unique:persona,correo',
      'telefono' => 'required|regex:/^[0-9 ]+$/'
    ]);

    try {
      $persona = new Persona;
      $persona->nombres = $request->nombres;
      $persona->apellidos = $request->apellidos;
      $persona->cedula = $request->cedula;
      $persona->correo = $request->correo;
      $persona->telefono = $request->telefono;
      $persona->save();
      return response()->json( $persona );
    } catch(Exception $e) {
      return response()->json( $e->getMessage() );
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request,$id)
  {
    if ($request->ajax()) {
        $persona = Persona::find($id);
        return view('form-delete', ['persona' => $persona])->render();
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request,$id)
  {
      if ($request->ajax()) {
          $persona = Persona::find($id);
          return view('form-update', ['persona' => $persona])->render();
      }
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
    $this->validate($request, [
      'nombres' => 'required|regex:/^[a-zA-Z. ]*$/',
      'apellidos' => 'required|regex:/^[a-zA-Z. ]*$/',
      'cedula' => 'required|numeric',
      'correo' => 'required|email',
      'telefono' => 'required|regex:/^[0-9 ]+$/'
    ]);

    try {
      $persona = Persona::find($id);
      $persona->nombres = $request->nombres;
      $persona->apellidos = $request->apellidos;

      if ($persona->cedula != $request->cedula) {
        $persona->cedula = $request->cedula;
      } else {
        $persona->cedula;
      }

      if ($persona->correo != $request->correo) {
        $persona->correo = $request->correo;
      } else {
        $persona->correo;
      }

      $persona->telefono = $request->telefono;
      $persona->save();
      return response()->json( $persona );
    } catch(Exception $e) {
      return response()->json( $e->getMessage() );
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $persona = Persona::find($id);
      $persona->delete();
      return response()->json( $persona );
    } catch(Exception $e) {
      return response()->json( $e->getMessage() );
    }
  }

  /**
   * Response whether the specified resource exist or not.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function existCedula(Request $request)
  {
      if ($request->ajax()) {
          if( Persona::where('cedula', '=', $request->cedula )->exists() ){
              return response()->json('true');
          }else{
              return response()->json('false');
          }
      }
  }

  /**
   * Response whether the specified resource exist or not.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function existEmail(Request $request)
  {
      if ($request->ajax()) {
          if( Persona::where('correo', '=', $request->correo )->exists() ){
              return response()->json('true');
          }else{
              return response()->json('false');
          }
      }
  }
}
