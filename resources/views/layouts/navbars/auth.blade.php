<div class="sidebar" data-color="black" data-active-color="info">
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="" class="simple-text logo-normal">
            {{ __('Sistema facturas') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            {{-- Editar Perfil --}}
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Perfil de usuario') }}</p>
                </a>
            </li>

            {{-- Registro y listado de usuarios --}}
            <li class="{{ $elementActive == 'user' || $elementActive == 'users' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#userManagment">
                    <i class="nc-icon nc-single-02"></i>
                    <p>
                        {{ __('Usuarios') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="userManagment">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                            <a href="{{ route('users.users') }}">
                                <span class="sidebar-mini-icon">{{ __('LU') }}</span>
                                <span class="sidebar-normal">{{ __(' Listado de usuarios ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'users' ? 'active' : '' }}">
                            <a href="{{ route('users.add_user') }}">
                                <span class="sidebar-mini-icon">{{ __('AU') }}</span>
                                <span class="sidebar-normal">{{ __(' Agregar usuario ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Registro y listado de sociedad emisora --}}
            <li class="{{ $elementActive == 'companies' || $elementActive == 'companies' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#companyManagment">
                    <i class="nc-icon nc-shop"></i>
                    <p>
                        {{ __('Empresas') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="companyManagment">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'companies' ? 'active' : '' }}">
                            <a href="{{ route('companies.companies') }}">
                                <span class="sidebar-mini-icon">{{ __('LE') }}</span>
                                <span class="sidebar-normal">{{ __(' Listado de empresas ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'companies' ? 'active' : '' }}">
                            <a href="{{ route('companies.add_company') }}">
                                <span class="sidebar-mini-icon">{{ __('AE') }}</span>
                                <span class="sidebar-normal">{{ __(' Agregar empresa ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Registro y listado de facturas --}}
            <li class="{{ $elementActive == 'bills' || $elementActive == 'bills' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#billManagment">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>
                        {{ __('Facturas') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="billManagment">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'bills' ? 'active' : '' }}">
                            <a href="{{ route('bills.bills') }}">
                                <span class="sidebar-mini-icon">{{ __('LF') }}</span>
                                <span class="sidebar-normal">{{ __(' Listado de facturas ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'bills' ? 'active' : '' }}">
                            <a href="{{ route('bills.add_bill') }}">
                                <span class="sidebar-mini-icon">{{ __('AF') }}</span>
                                <span class="sidebar-normal">{{ __(' Agregar factura ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <br>

            {{-- Reportes usuarios, empresas y facturas --}}
            <li class="{{ $elementActive == 'reporte-usuario' ? 'active' : '' }}">
                <a href="{{ route('reportes.usuarios') }}">
                    <small>Reporte usuarios</small>
                </a>
            </li>

            <li class="{{ $elementActive == 'reporte-empresa' ? 'active' : '' }}">
                <a href="{{ route('reportes.empresas') }}">
                    <small>Reporte empresas</small>
                </a>
            </li>

            <li class="{{ $elementActive == 'reporte-facturas' ? 'active' : '' }}">
                <a href="{{ route('reportes.facturas') }}">
                    <small>Reporte facturas</small>
                </a>
            </li>
        </ul>
    </div>
</div>
