@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
<div class="content col-md-12 ml-auto mr-auto">
    <div class="header py-5 pb-7 pt-lg-9">
        <div class="container col-md-10">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 pt-5">
                        <h1>{{ __('Bienvenido al sistema')}}</h1>

                        <p class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                            {{ __('Aquí puede consultar los usuarios, empresas y facturas dadas de alta al sistema') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush