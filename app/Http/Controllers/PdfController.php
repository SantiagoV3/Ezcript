<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\Pdf;

class PdfController extends Controller
{
    public function generarPdfAlumno($alu_id)
    {
        try
        {
            // Datos de alumno
            $alumno = Usuario::findOrFail($alu_id);
            $nombre = $alumno->pef_nombre;
            $apellidop = $alumno->pef_apellido_p;
            $apellidom = $alumno->pef_apellido_m;
            $rut = $alumno->pef_rut;
            $correo = $alumno->pef_correo;
            $telefono = $alumno->pef_telefono;

            // Curso
            $cursox = Usuario::where('pef_id',$alu_id)->select('cur_id')->first();
            $curso = Curso::findOrFail($cursox->cur_id);
            $nombre_c = $curso->cur_nombre;

            $ruta_plantilla = Storage::disk('local')->path('/pdf');


            // borrar el array (segundo argumento del new pdf($ruta_plantilla, BORRAR EL ARRAY))
            // RECORDAR DESCARGAR EL PDFTK EN EL SERVIDOR (SUDO APK PDFTK?) Y DESCARGAR CON COMPOSER EN EL ARCHIVO DEL SERVIDOR
            $pdf = new Pdf($ruta_plantilla.'\plantilla_alumno.pdf');
            $resultado = $pdf->fillForm([
                'nombre'=> $nombre ,
                'apellidop'=> $apellidop, 
                'apellidom'=> $apellidom,
                'rut'=> $rut ,
                'correo'=> $correo ,
                'telefono'=> $telefono,
            ])->needAppearances()->saveAs($ruta_plantilla.'\pdfllenado.pdf');

            if($resultado === false)
            {
                dd($pdf->getError());
            }
            $headers = ['Content-Type: application/pdf'];

            $newName = 'ficha_alumno.pdf';

            return response()->download($ruta_plantilla.'\pdfllenado.pdf', $newName, $headers)->deleteFileAfterSend();
        }
        catch(\Exception $e)
        {
            dd($e);
        }
    }
}
