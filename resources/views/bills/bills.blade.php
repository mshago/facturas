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
                                <h3 class="mb-0">Facturas</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('bills.add_bill') }}" class="btn btn-sm btn-primary">Agregar factura</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Razón social</th>
                            <th>RFC receptor</th>
                            <th>Folio</th>
                            <th>Sociedad emisora</th>
                            <th>Archivos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr>
                            <td>{{$bill->id}}</td>
                            <td>{{$bill->social_reason}}</td>
                            <td>{{$bill->rfc}}</td>
                            <td>{{$bill->folio}}</td>
                            <td>{{$bill->company}}</td>
                            <td>
                                @if($bill->file)
                                    <a target="_blank" href="{{Storage::url($bill->file)}}">Archivo</a>
                                @endif

                            </td>
                                <td class="td-actions text-center">
                                    <a type="button" href="{{url('bill/'.$bill->id)}}" rel="tooltip" class="btn btn-success btn-simple btn-icon btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{url('bills/'.$bill->id)}}" method="post">
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