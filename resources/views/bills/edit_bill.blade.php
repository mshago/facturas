@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'bills'
])
@section('content')
<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Editar factura</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>

                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('bill.update',$bill->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Razón social</label>
                                <input value="{{$bill->social_reason}}" name="social_reason" type="text" class="form-control" id="inputRS" aria-describedby="nameHelp" placeholder="Ingrese una razón social">
                              </div>
                            <div class="row form-group">
                                  <div class="col">
                                    <label for="inputEmail">RFC</label>
                                    <input value="{{$bill->rfc}}" maxlength="12" name="rfc" type="text" class="form-control" id="inputRFC" aria-describedby="emailHelp" placeholder="Ingrese el RFC del receptor">
                                  </div>
                                  <div class="col">
                                    <label for="exampleInputPassword1">Folio</label>
                                    <input value={{$bill->folio}} maxlength="10" name="folio" type="text" class="form-control" id="exampleFolio" placeholder="Ingrese el folio de la factura">
                                  </div>
                            </div>
                            <div class="">
                                <label for="inputFiles">Archivos</label>
                                <br>
                                <input value="" name="files[]" type="file" multiple accept="application/pdf,text/xml">
                              </div>
                          
                            <button type="submit" style="" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection