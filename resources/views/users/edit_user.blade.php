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
                                <h3 class="mb-0">Editar usuario</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$user->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                            <input value="{{$user->name}}" name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Ingrese un nombre">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail">Email</label>
                                    <input  value="{{$user->email}}" name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Ingrese un email">
                                </div>
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