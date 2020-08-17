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
                                <h3 class="mb-0">Sociedad</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('companies.add_company') }}" class="btn btn-sm btn-primary">Agregar sociedad</a>
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
                            <th>Dirección</th>
                            <th>RFC</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                            <td class="text-center">{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->address}}</td>
                                <td>{{$company->rfc}}</td>
                                <td>{{$company->email}}</td>
                                <td class="td-actions text-center">
                                    <a type="button" href="{{url('company/'.$company->id)}}" rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{url('companies/'.$company->id)}}" method="post">
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