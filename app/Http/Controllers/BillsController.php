<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Companies;
use App\Bills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $bills = Bills::select('bills.id','bills.social_reason','bills.rfc','bills.folio','companies.name as company')
        ->join('companies','bills.company_id','=','companies.id')
        ->join('companies_user','companies_user.companies_id','=','companies.id')
        ->where('companies_user.user_id','=',$user)
        ->get();

        $files = DB::table('files_bills')->get();
        
        return view('bills.bills',compact('bills'),compact('files'));
    }

    /* Obtenemos una lista de las empresas para mostrarlas en
    el componente para buscar una factura  */
    public function list(Request $request){
        return Bills::select('bills.id','bills.social_reason','bills.rfc','bills.folio')
        ->where('company_id','=',$request['company_id'])
        ->where('social_reason','=',$request['social_reason'])
        ->where('rfc','=',$request['rfc'])
        ->orWhere('folio','=',$request['folio'])
        ->get();
    }

    /* Obtenemos una lista de las empresas para mostrarlas en
    el componente para buscar una factura  */
    public function files(){
        return DB::table('files_bills')->get();
    }


    /** Vista agregar con la compañia del usuario */
    public function add(){
        $user = Auth::id();
        $company=Companies::select('companies.id','companies.name')
        ->join('companies_user','companies.id','=','companies_user.companies_id')
        ->where('companies_user.user_id','=',$user)
        ->firstOrFail();
        return view('bills.add_bill',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = Bills::create([
            'social_reason' => $request['social_reason'],
            'rfc' => $request['rfc'],
            'folio' => $request['folio'],
            'company_id' => $request['company_id']
        ]);

        if($request->hasFile('file1')){
            DB::table('files_bills')->insert([
                'bill_id' => $bill->id,
                'file' => $request->file1->store('public'),
            ]);
        }
        if($request->hasFile('file2')){
            DB::table('files_bills')->insert([
                'bill_id' => $bill->id,
                'file' => $request->file2->store('public'),
            ]);
        }
        return redirect('bills');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bills::findOrFail($id);
        $files = DB::table('files_bills')->where('bill_id','=',$id)->get();

        return view('bills.edit_bill',compact('bill'),compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $bill = Bills::findOrFail($id);
        $bill->update([
            'social_reason' => $request['social_reason'],
            'rfc' => $request['rfc'],
            'folio' => $request['folio']
        ]);
        if($request->hasFile('file1')){

            //Obtenemos los archivos de la base de datos
            $file = DB::table('files_bills')
            ->where('bill_id',$id)
            ->get();

            //Si hay los eliminamos para agregar los nuevos
            if($files){
                DB::table('files_bills')
                ->where('bill_id','=',$id)
                ->delete();
            }

            //Agregamos los nuevos archivos
            foreach($request->file('files') as $file){
                DB::table('files_bills')->insert([
                    'bill_id' => $bill->id,
                    'file' => $file->store('public'),
                ]);
            }
        }

        return redirect('bills');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bills::destroy($id);
        DB::table('files_bills')
        ->where('bill_id','=',$id)
        ->delete();

        return redirect('bills');
    }
}
