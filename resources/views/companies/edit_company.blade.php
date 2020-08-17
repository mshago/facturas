@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'companies'
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
                                <h3 class="mb-0">Editar sociedad emisora</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.update',$company->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Nombre</label>
                                <input value="{{$company->name}}" type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Ingrese un nombre">
                              </div>
                              <div class="row">
                                  <div class="col">
                                    <label for="inputAddress">Dirección</label>
                                    <input value="{{$company->address}}" type="text" name="address" class="form-control" id="inputAddress" aria-describedby="emailHelp" placeholder="Ingrese una dirección">
                                  </div>
                                  <div class="col">
                                    <label for="exampleInputPassword1">RFC</label>
                                    <input value="{{$company->rfc}}" type="text" name="rfc" class="form-control" id="exampleInputPassword1" maxlength="12" placeholder="Ingrese el RFC de la empresa">
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                    <input value="{{$company->email}}" type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingrese un email">
                              </div>
                          
                            <button type="submit" style="" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection