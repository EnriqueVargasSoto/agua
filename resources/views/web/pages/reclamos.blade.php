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
                <h1>Reclamos</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('/')}}">Inicio</a></li>
                    <li>Reclamos</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->



    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
    
    
            <!-- Contact Form -->
            <div class="contact-form default-form">
                <!--Contact Form-->
                <form method="post" action="{{route ('reclamos.web.store')}}" id="email-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="response"></div>
                        </div>
        
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Nombres y Apellidos</label>
                            <input type="text" name="nombres" class="nombres" placeholder="Nombres y Apellidos*" required>
                        </div>
        
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>DNI</label>
                            <input type="email" name="dni" class="email" placeholder="DNI*" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Código de Suministro</label>
                            <input type="email" name="codigo" class="email" placeholder="Código de Suministro" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="email" placeholder="Email*" required>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label>Asunto</label>
                            <input type="text" name="asunto" class="subject" placeholder="Asunto*" required>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label>Mensaje</label>
                            <textarea name="mensaje" placeholder="Escribe tu Mensaje..." required=""></textarea>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="theme-btn btn-style-one" type="submit" id="submit" name="submit-form">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Contact Form -->
        </div>
    </section>
    <!-- Contact Section -->
@endsection