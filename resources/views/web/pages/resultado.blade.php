@extends('web.layouts.layout')

@section('content')
    <section class="banner-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp" style="padding-top: 0px!important;">
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Resultados</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('/')}}">Inicio</a></li>
                    <li>Resultados</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">



                <!-- Filters Column -->
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                    

                        <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5>{{$perfil->nombres}} {{$perfil->apellidoPaterno}} {{$perfil->apellidoMaterno}}</h5>
                            <span>Código : {{$suministro->codigo}}</span><br>
                            <span>Direccion : {{$perfil->direccion}}</span><br><br>
                            <a href="{{ route('login')}}" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Ingresar</span></a>
                            <div class="image" style="background-image: url(images/resource/ads-bg-4.png);"></div>
                        </div>
                        <!-- End Call To Action -->
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <!-- Job Block -->
                        @foreach ($recibos as $recibo)
                        <div class="job-block">
                            <div class="inner-box">
                                <div class="content">
                                    <span class="company-logo"><img src="{{ asset('web/images/resource/company-logo/1-1.png')}}" alt=""></span>
                                    <h4>{{$recibo->concepto}}</h4>
                                    <ul class="job-info">
                                        @if ($recibo->concepto == 'Pago por instalacion de suministro')
                                        <li><span class="icon flaticon-money"></span> Total : S/ {{$recibo->total}}</li>
                                            
                                        @else
                                        <li><span class="icon flaticon-drop"></span> Cantidad : {{$recibo->cantidad}} uc</li>
                                        <li><span class="icon flaticon-money"></span> Precio Unitario : S/ {{$recibo->valor}}</li>
                                        <li><span class="icon flaticon-clock-3"></span> Fecha de Vencimiento : {{$recibo->fechaVencimiento}}</li>
                                        <li><span class="icon flaticon-money"></span> Total : S/ {{$recibo->total}}</li>
                                        @endif
                                        
                                    </ul>
                                    <ul class="job-other-info">
                                        <li class="time">
                                            <a href="#">Pagar</a>
                                        </li>
                                        <li class="privacy">
                                            <a href="{{route('recibo.ver', $recibo->id)}}" target="_blank">Ver Recibo</a>
                                        </li>
                                        <!--<li class="required">Urgent</li>-->
                                    </ul>
                                    <!--<button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>-->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                        <!-- Listing Show More 
                        <div class="ls-show-more">
                            <p>Showing 36 of 497 Jobs</p>
                            <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                            <button class="show-more">Show More</button>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
@endsection