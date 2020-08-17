@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users'
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
                                <h3 class="mb-0">Agregar usuario</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>

                    <div class="card-body">
                        <form class="form" method="POST" action="{{ url('/users') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                {{csrf_field()}}
                                <label for="exampleInputEmail1">Nombre</label>
                                <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Ingrese un nombre">
                              </div>
                              <div class="row">
                                  <div class="col">
                                    <label for="inputEmail">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingrese un email">
                                  </div>
                                  <div class="col">
                                    <label for="exampleInputPassword1">Contraseña</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSA">Sociedad anónima</label>
                                <select name="company" id="inputSA" class="form-control" style="height: calc(2.25rem + 10px)">
                                    <option selected>Elegir sociedad anónima...</option>
                                    @foreach($companies as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
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