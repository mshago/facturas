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
                                <h3 class="mb-0">Agregar sociedad emisora</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/companies') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputName">Nombre</label>
                                <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Ingrese un nombre">
                              </div>
                              <div class="row">
                                  <div class="col">
                                    <label for="inputAddress">Dirección</label>
                                    <input type="text" name="address" class="form-control" id="inputAddress" aria-describedby="emailHelp" placeholder="Ingrese una dirección">
                                  </div>
                                  <div class="col">
                                    <label for="exampleInputPassword1">RFC</label>
                                    <input type="text" name="rfc" class="form-control" id="exampleInputPassword1" maxlength="12" placeholder="Ingrese el RFC de la empresa">
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingrese un email">
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