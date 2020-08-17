<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use App\Companies;
use App\Bills;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{
    public function crearPDF($datos, $vista){
        // procesamiento de datos [opcional por si hay que pasarle otra capa de proceso]
        $data = $datos;
        
        // generación de la vista
        $pdf = PDF::loadView( $vista, compact('data') );

        // lanzamos la descarga del fichero
        return $pdf->download('informe.pdf');
    }

    public function reporteUsuarios(){
        // preparación de los datos que se van a pasar
        $users = User::select('users.id','users.name','users.email','companies.name as company_name')
        ->join('companies_user','users.id','=','companies_user.user_id')
        ->join('companies','companies_user.companies_id','=','companies.id')
        ->get();

        // preparación de la ruta a la vista
        $vistaurl = 'reportes.usuarios';

        // llamada a la función que genera el PDF
        return $this->crearPDF($users, $vistaurl);
    }

    public function reporteEmpresas(){
        // preparación de los datos que se van a pasar
        $companies = Companies::get();

        // preparación de la ruta a la vista
        $vistaurl = 'reportes.empresas';

        // llamada a la función que genera el PDF
        return $this->crearPDF($companies, $vistaurl);
    }

    public function reporteFacturas(){
        // preparación de los datos que se van a pasar
        $bills = Bills::select('bills.id','bills.social_reason','bills.rfc','bills.folio','companies.name as company')
        ->join('companies','bills.company_id','=','companies.id')
        ->get();

        // preparación de la ruta a la vista
        $vistaurl = 'reportes.facturas';

        // llamada a la función que genera el PDF
        return $this->crearPDF($bills, $vistaurl);
    }
}
