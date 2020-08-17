<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Obtenemos las empresas y regresamos la vista con todas estas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::get();
        return view('companies.companies',compact('companies'));
    }

    /* Obtenemos una lista de las empresas para mostrarlas en
        el componente para buscar una factura  */
    public function list(){
        return Companies::select('id','name')
        ->get();
    }

    //Método que regresa la vista para agregar una nueva empresa
    public function add(){
        return view('companies.add_company');
    }
    /**
     * Guardamos una nueva empresa en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Companies::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'rfc' => $request['rfc'],
            'email' => $request['email'],
        ]);
        return view('companies.companies');
    }

    /**
     * Obtenemos los datos que vamos a editar
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Actualizamos los datos en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Elimina la empresa seleccionada
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Companies::destroy($id);

        return redirect('companies');
    }
}
