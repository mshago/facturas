@extends('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
])

@section('content')
<!-- Componente que muestra el formulario para consultar las facturas -->
<div id="app" style="padding-top: 15vh;">
    <example-component></example-component>
</div>
<!--Script para componente vue-->
<script src="{{asset('js/app.js')}}"></script> 
@endsection