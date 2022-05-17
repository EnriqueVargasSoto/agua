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
                    <li>Comité</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
  
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-12">
                    <div class="ls-outer">
                        
        
                        <div class="row">
                            <!-- Candidate block Four -->
                            <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <ul class="job-other-info">
                                        <li class="green">Featured</li>
                                    </ul>
                                    <span class="thumb"><img src="{{ asset('web/images/resource/candidate-1.png')}}" alt=""></span>
                                    <h3 class="name"><a href="#">Floyd Miles</a></h3>
                                    <span class="cat">UI Designer</span>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                    </ul>
                                    <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                    </ul>
                                    <a href="#" class="theme-btn btn-style-three">View Profile</a>
                                </div>
                            </div>
            
                            <!-- Candidate block Four -->
                            <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <ul class="job-other-info">
                                        <li class="green">Featured</li>
                                    </ul>
                                    <span class="thumb"><img src="{{ asset('web/images/resource/candidate-2.png')}}" alt=""></span>
                                    <h3 class="name"><a href="#">Darrell Steward</a></h3>
                                    <span class="cat">UI Designer</span>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                    </ul>
                                    <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                    </ul>
                                    <a href="#" class="theme-btn btn-style-three">View Profile</a>
                                </div>
                            </div>
            
                            <!-- Candidate block Four -->
                            <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <ul class="job-other-info">
                                        <li class="green">Featured</li>
                                    </ul>
                                    <span class="thumb"><img src="{{ asset('web/images/resource/candidate-3.png')}}" alt=""></span>
                                    <h3 class="name"><a href="#">Brooklyn Simmons</a></h3>
                                    <span class="cat">UI Designer</span>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                        <li><span class="icon flaticon-money"></span> $99 / hour</li>
                                    </ul>
                                    <ul class="post-tags">
                                        <li><a href="#">App</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Digital</a></li>
                                    </ul>
                                    <a href="#" class="theme-btn btn-style-three">View Profile</a>
                                </div>
                            </div>
            
                            
                        </div>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Listing Page Section -->
@endsection