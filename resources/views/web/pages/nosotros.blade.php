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
                    <li>Sobre Nosotros</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- About Section Three -->
    <section class="about-section-three">
        <div class="auto-container">
            <div class="images-box">
                <div class="row">
                    <div class="column col-lg-3 col-md-6 col-sm-6">
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-1.jpg')}}" alt=""></figure>
                    </div>
                    <div class="column col-lg-3 col-md-6 col-sm-6">
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-2.jpg')}}" alt=""></figure>
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-3.jpg')}}" alt=""></figure>
                    </div>
                    <div class="column col-lg-3 col-md-6 col-sm-6">
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-4.jpg')}}" alt=""></figure>
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-5.jpg')}}" alt=""></figure>
                    </div>
                    <div class="column col-lg-3 col-md-6 col-sm-6">
                        <figure class="image"><img src="{{ asset('web/images/resource/about-img-6.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
    
            <!-- Fun Fact Section -->
            <div class="fun-fact-section">
                <div class="row">
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="4">0</span>M</div>
                        <h4 class="counter-title">4 million daily active users</h4>
                    </div>
        
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="12">0</span>k</div>
                        <h4 class="counter-title">Over 12k open job positions</h4>
                    </div>
        
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="20">0</span>M</div>
                        <h4 class="counter-title">Over 20 million stories shared</h4>
                    </div>
                </div>
            </div>
            <!-- Fun Fact Section -->
    
            <div class="text-box">
                <h4>About Superio</h4>
                <p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much.</p>
                <p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>
            </div>
        </div>
    </section>
    <!-- End About Section Three -->
@endsection