<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard')}}" target="_blank">
            
                <img src="{{ asset('web/images/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo" style="margin-bottom: 30px;">
            <br>
            <span class="ms-1 font-weight-bold" style="margin-top: 30px;">
                <?php $perfil = App\Models\Perfil::find(auth()->user()->idPerfil); 
                echo('hola, '.$perfil->nombres);
                ?>
            </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" style="margin-top: 60px!important;">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if (auth()->user()->idRol == 1)
            <li class="nav-item">
                <a href="{{ route('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboards</span>
                </a>
            </li>
            <!--<li class="nav-item mt-3">
                <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PAGES</h6>
            </li>-->
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link {{ (request()->is('solicitudes')) || (request()->is('usuarios')) ? 'active' : '' }}" aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Usuarios</span>
                </a>
                <div class="collapse " id="pagesExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link  {{ (request()->is('solicitudes')) ? 'active' : '' }}" href="{{ route('solicitudes')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Solicitudes <b class="caret"></b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('usuarios')) ? 'active' : '' }}" href="{{ route('usuarios')}}">
                                <span class="sidenav-mini-icon"> RP </span>
                                <span class="sidenav-normal"> Usuarios <b class="caret"></b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('suministros.admin')}}" class="nav-link {{ (request()->is('admin/suministros')) || (request()->is('subcategorias')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Suministros</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('conceptos')}}" class="nav-link {{ (request()->is('conceptos')) || (request()->is('subcategorias')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Conceptos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reclamos.index')}}" class="nav-link {{ (request()->is('reclamos')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reclamos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('gastos.index')}}" class="nav-link {{ (request()->is('gatos')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gastos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('documentos.index')}}" class="nav-link {{ (request()->is('documentos-list')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Documentos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('ciclos.index')}}" class="nav-link {{ (request()->is('ciclos')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ciclos</span>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('suministros.index')}}" class="nav-link {{ (request()->is('suministros')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Suministros</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('datos.index')}}" class="nav-link {{ (request()->is('mis-datos')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mis Datos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('seguridad.index')}}" class="nav-link {{ (request()->is('seguridad')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Seguridad</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contactanos.index')}}" class="nav-link {{ (request()->is('contactanos')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Contacto</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reclamos.create')}}" class="nav-link {{ (request()->is('reclamo-create')) ? 'active' : '' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reclamo</span>
                </a>
            </li>
            @endif
            {{--<li class="nav-item">
                <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link {{ (request()->is('sliders')) ? 'active' : '' }}" aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ecommerce</span>
                </a>
                <div class="collapse " id="ecommerceExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{ (request()->is('sliders')) ? 'active' : '' }}" href="{{ route('sliders')}}">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Slider </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>--}}
        </ul>
    </div>
</aside>