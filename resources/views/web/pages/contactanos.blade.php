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
                <h1>Sobre Nosostros</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('/')}}">Inicio</a></li>
                    <li>Contáctanos</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-outer">
            <div style="height: 215px!important;" class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/icons/contact-map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div>
        </div>
    </section>
    <!-- End Map Section -->

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="upper-box">
                <div class="row">
                    <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <span class="icon"><img src="{{ asset('web/images/icons/placeholder.svg')}}" alt=""></span>
                            <h4>Address</h4>
                            <p>329 Queensberry Street, North<br> Melbourne VIC 3051, Australia.</p>
                        </div>
                    </div>
                    <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <span class="icon"><img src="{{ asset('web/images/icons/smartphone.svg')}}" alt=""></span>
                            <h4>Call Us</h4>
                            <p><a href="#" class="phone">123 456 7890</a></p>
                        </div>
                    </div>
                    <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <span class="icon"><img src="{{ asset('web/images/icons/letter.svg')}}" alt=""></span>
                            <h4>Email</h4>
                            <p><a href="#">contact.london@example.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
    
    
            <!-- Contact Form -->
            <div class="contact-form default-form">
                <h3>Dejanos un mensaje</h3>
                <!--Contact Form-->
                <form method="post" action="#" id="email-form">
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="response"></div>
                        </div>
        
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Nombres y Apellidos</label>
                            <input type="text" name="nombres" class="username" placeholder="Nombres y Apellidos*" required>
                        </div>
        
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="email" placeholder="Email*" required>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label>Asunto</label>
                            <input type="text" name="subject" class="subject" placeholder="Asunto*" required>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label>Mensaje</label>
                            <textarea name="message" placeholder="Escribe tu Mensaje..." required=""></textarea>
                        </div>
        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <button class="theme-btn btn-style-one" type="button" id="submit" name="submit-form">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Contact Form -->
        </div>
    </section>
    <!-- Contact Section -->
@endsection