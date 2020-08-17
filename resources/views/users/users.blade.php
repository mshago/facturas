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
                                <h3 class="mb-0">Usuarios</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.add_user') }}" class="btn btn-sm btn-primary">Agregar usuario</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Sociedad emisora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->company_name}}</td>
                            <td class="td-actions text-center">
                                <a href="{{url('users/'.$user->id)}}" type="button" rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{url('users/'.$user->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button  type="submit" rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection