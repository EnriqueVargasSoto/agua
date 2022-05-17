@extends('web.layouts.layout')

@section('content')
    <!-- Banner Section-->
    <section class="banner-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp">
                        <div class="title-box">
                            <h3>Consulte sus <br>Recibos</h3>
                        </div>
        
                        <!-- Job Search Form -->
                        <div class="job-search-form">
                            <form method="post" action="https://creativelayers.net/themes/superio/job-list-v10.html">
                                <div class="row">
                                    <div class="form-group col-lg-9 col-md-12 col-sm-12">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="field_name" placeholder="Ingrese su Código de Suministro">
                                    </div>
                                    <!-- Form Group 
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                        <span class="icon flaticon-map-locator"></span>
                                        <input type="text" name="field_name" placeholder="City or postcode">
                                    </div>-->
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 text-right">
                                        <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Buscar Código</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Job Search Form -->
        
        
                        <!--<div class="bottom-box">
                            <div class="count-employers">
                                <span class="title">10k+ Candidates</span>
                                <img src="images/resource/multi-peoples.png" alt="">
                            </div>
                            <a href="#" class="upload-cv"><span class="icon flaticon-file"></span> Upload your CV</a>
                        </div>-->
                    </div>
                </div>
    
                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image anm" data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2"><img src="{{ asset('web/images/resource/banner-img-2.png')}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section-->
@endsection