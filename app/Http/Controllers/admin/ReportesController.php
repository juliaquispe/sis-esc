<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clinica;
use App\Models\Admin\Enfermeria;
use App\Models\Admin\Ficha;
use App\Models\Admin\Internacion;
use App\Models\Admin\Paciente;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index()
    {
        return view('admin.reportes.index');
    }
    public function imprimir(Request $request)
    {
        //dd($request->all());
        $clinica = Clinica::findOrFail(1);
        if($clinica->logo==null)
        $image = base64_encode(file_get_contents(public_path("assets/ace/assets/images/avatars/logo.jpg")));
        else
        $image = base64_encode(file_get_contents(public_path("storage/Datos/Clinica/$clinica->logo")));
        if ($request->t_fecha=="especifico") {
            $fecha_esp=$request->fecha_esp;
            $fecha_ini=null;
            $fecha_fin=null;
            if ($request->informe=="paciente") {
                if ($request->t_paciente=="activos") {
                    $titulo="Activos";
                    $datos=Paciente::where([
                        ['created_at',$fecha_esp],
                        ['estado', 1]
                    ])->get();
                } else {
                    $titulo="Dados de Baja";
                    $datos=Paciente::where([
                        ['updated_at',$fecha_esp],
                        ['estado', 0]
                    ])->get();
                }
                $pdf=PDF::loadview('admin.reportes.imprimir_paciente', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                return $pdf->stream('reporte.pdf');
            } else {
                if ($request->informe=="consulta") {
                    if ($request->t_consulta=="atendido") {
                        $titulo="Atendidas";
                        $datos=Ficha::where([
                            # tabla ficha con estado 0
                            ['fecha',$fecha_esp],
                            ['estado', 1]
                        ])->get();
                    } else {
                        if ($request->t_consulta=="espera") {
                            $titulo="En Espera";
                            # tabla ficha con estado 0
                            $datos=Ficha::where([
                                ['fecha',$fecha_esp],
                                ['estado', 0]
                            ])->get();
                        } else {
                            if ($request->t_consulta=="falta") {
                                $titulo="Con Falta";
                                # tabla ficha estado 2
                                $registros=Ficha::where('estado',0)->get();
                                $fecha_actual = new \DateTime();
                                $fecha_actual=$fecha_actual->format('Y-m-d');
                                foreach($registros as $registro){
                                    if($registro->fecha<$fecha_actual){
                                        $registro->update([
                                            'estado'=>2
                                        ]);
                                    }
                                }
                                $datos=Ficha::where([
                                    ['fecha',$fecha_esp],
                                    ['estado', 2]
                                ])->get();
                            } else {
                                $titulo="Todas";
                                # tabla ficha todos
                                $registros=Ficha::where('estado',0)->get();
                                $fecha_actual = new \DateTime();
                                $fecha_actual=$fecha_actual->format('Y-m-d');
                                foreach($registros as $registro){
                                    if($registro->fecha<$fecha_actual){
                                        $registro->update([
                                            'estado'=>2
                                        ]);
                                    }
                                }
                                $datos=Ficha::where([
                                    ['fecha',$fecha_esp],
                                ])->get();
                            }
                        }
                    }
                    $pdf=PDF::loadview('admin.reportes.imprimir_consulta', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                    return $pdf->stream('reporte.pdf');
                } else {
                    if ($request->informe=="enfermeria") {
                         if ($request->t_enfermeria=="curacion") {
                            # tabla enfermeria con atencion curacion
                            $titulo="Curaciones";
                            $datos=Enfermeria::where([
                                ['fecha',$fecha_esp],
                                ['atencion_c', 1]
                            ])->get();
                        } else {
                            if ($request->t_enfermeria=="inyectable") {
                                # tabla enfermeria con atencion inyect
                                $titulo="Inyectables";
                                $datos=Enfermeria::where([
                                    ['fecha',$fecha_esp],
                                    ['atencion_i', 1]
                                ])->get();

                            } else {
                                if ($request->t_enfermeria=="sueros") {
                                    # tabla enfermeria con atencion sueros
                                    $titulo="Sueros";
                                    $datos=Enfermeria::where([
                                        ['fecha',$fecha_esp],
                                        ['atencion_s', 1]
                                    ])->get();
                                } else {
                                    # tabla enfermeria
                                    $titulo="Todas";
                                    $datos=Enfermeria::where([
                                        ['fecha',$fecha_esp],
                                    ])->get();
                                }
                            }
                        }
                        $pdf=PDF::loadview('admin.reportes.imprimir_enfermeria', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                        return $pdf->stream('reporte.pdf');
                    } else {
                        if ($request->t_internacion=="activos") {
                            $titulo="Activos";
                            $datos=Internacion::where([
                                ['fecha_ingreso',$fecha_esp],
                                ['estado', 0]
                            ])->get();
                        } else {
                            $titulo="Dados de Alta";
                            $datos=Internacion::where([
                                ['fecha_ingreso',$fecha_esp],
                                ['estado', 1]
                            ])->get();
                        }
                        $pdf=PDF::loadview('admin.reportes.imprimir_internacion', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                        return $pdf->stream('reporte.pdf');
                    }
                }
            }
        } else {
            $fecha_esp=null;
            $fecha_ini=$request->fecha_ini;
            $fecha_fin=$request->fecha_fin;
            if ($request->informe=="paciente") {
                if ($request->t_paciente=="activos") {
                    $titulo="Activos";
                    $datos=Paciente::where([
                        ['created_at','>=',$fecha_ini],
                        ['created_at','<=',$fecha_fin],
                        ['estado', 1]
                    ])->get();
                } else {
                    $titulo="Dados de Baja";
                    $datos=Paciente::where([
                        ['updated_at','>=',$fecha_ini],
                        ['updated_at','<=',$fecha_fin],
                        ['estado', 0]
                    ])->get();
                }
                $pdf=PDF::loadview('admin.reportes.imprimir_paciente', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                return $pdf->stream('reporte.pdf');
            } else {
                if ($request->informe=="consulta") {
                    if ($request->t_consulta=="atendido") {
                        $titulo="Atendidas";
                        $datos=Ficha::where([
                            # tabla ficha con estado 1
                            ['fecha','>=',$fecha_ini],
                            ['fecha','<=',$fecha_fin],
                            ['estado', 1]
                        ])->orderBy('fecha')->get();
                    } else {
                        if ($request->t_consulta=="espera") {
                            $titulo="En Espera";
                            $datos=Ficha::where([
                                # tabla ficha con estado 0
                                ['fecha','>=',$fecha_ini],
                                ['fecha','<=',$fecha_fin],
                                ['estado', 0]
                            ])->orderBy('fecha')->get();
                        } else {
                            if ($request->t_consulta=="falta") {
                                $titulo="Con Falta";
                                # tabla ficha con estado 2
                                $registros=Ficha::where('estado',0)->get();
                                $fecha_actual = new \DateTime();
                                $fecha_actual=$fecha_actual->format('Y-m-d');
                                foreach($registros as $registro){
                                    if($registro->fecha<$fecha_actual){
                                        $registro->update([
                                            'estado'=>2
                                        ]);
                                    }
                                }
                                $datos=Ficha::where([
                                    ['fecha','>=',$fecha_ini],
                                    ['fecha','<=',$fecha_fin],
                                    ['estado', 2]
                                ])->orderBy('fecha')->get();
                            } else {
                                $titulo="Todas";
                                # tabla ficha
                                $registros=Ficha::where('estado',0)->get();
                                $fecha_actual = new \DateTime();
                                $fecha_actual=$fecha_actual->format('Y-m-d');
                                foreach($registros as $registro){
                                    if($registro->fecha<$fecha_actual){
                                        $registro->update([
                                            'estado'=>2
                                        ]);
                                    }
                                }
                                $datos=Ficha::where([
                                    ['fecha','>=',$fecha_ini],
                                    ['fecha','<=',$fecha_fin],
                                ])->orderBy('fecha')->get();
                            }
                        }
                    }
                    $pdf=PDF::loadview('admin.reportes.imprimir_consulta', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                    return $pdf->stream('reporte.pdf');
                } else {
                    if ($request->informe=="enfermeria") {
                        if ($request->t_enfermeria=="curacion") {
                            # tabla enfermeria con atencion curacion
                            $titulo="Curaciones";
                            $datos=Enfermeria::where([
                                ['fecha','>=',$fecha_ini],
                                ['fecha','<=',$fecha_fin],
                                ['atencion_c', 1]
                            ])->orderBy('fecha')->get();
                        } else {
                            if ($request->t_enfermeria=="inyectable") {
                                # tabla enfermeria con atencion inyect
                                $titulo="Inyectables";
                                $datos=Enfermeria::where([
                                    ['fecha','>=',$fecha_ini],
                                    ['fecha','<=',$fecha_fin],
                                    ['atencion_i', 1]
                                ])->orderBy('fecha')->get();
                            } else {
                                if ($request->t_enfermeria=="sueros") {
                                    # tabla enfermeria con atencion sueros
                                    $titulo="Sueros";
                                    $datos=Enfermeria::where([
                                        ['fecha','>=',$fecha_ini],
                                        ['fecha','<=',$fecha_fin],
                                        ['atencion_s', 1]
                                    ])->orderBy('fecha')->get();
                                } else {
                                    # tabla enfermeria
                                    $titulo="Todas";
                                    $datos=Enfermeria::where([
                                        ['fecha','>=',$fecha_ini],
                                        ['fecha','<=',$fecha_fin],
                                    ])->orderBy('fecha')->get();
                                }
                            }
                        }
                        $pdf=PDF::loadview('admin.reportes.imprimir_enfermeria', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                        return $pdf->stream('reporte.pdf');
                    } else {
                        if ($request->t_internacion=="activos") {
                            $titulo="Activos";
                            $datos=Internacion::where([
                                ['fecha_ingreso','>=',$fecha_ini],
                                ['fecha_ingreso','<=',$fecha_fin],
                                ['estado', 0]
                            ])->get();
                        } else {
                            $titulo="Dados de Alta";
                            $datos=Internacion::where([
                                ['fecha_ingreso','>=',$fecha_ini],
                                ['fecha_ingreso','<=',$fecha_fin],
                                ['estado', 1]
                            ])->get();
                        }
                        $pdf=PDF::loadview('admin.reportes.imprimir_internacion', compact('clinica','image', 'datos', 'fecha_esp', 'fecha_ini', 'fecha_fin', 'titulo'));
                        return $pdf->stream('reporte.pdf');
                    }
                }
            }
        }
    }
}
