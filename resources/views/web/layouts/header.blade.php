<header class="main-header header-style-two">
    <div class="auto-container">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo"><a href="{{ route('/')}}"><img src="{{ asset('web/images/logo.png')}}" alt="" title=""></a></div>
                </div>

                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li class="current dropdown">
                            <a href="{{ route('/')}}"><span>Inicio</span></a>
                        </li>

                        <li class="dropdown has-mega-menu" id="has-mega-menu">
                            <a href="{{ route('nosotros')}}"><span>Sobre Nosotros</span></a>
                        </li>

                        <li class="">
                            <a href="{{ route('comite')}}"><span>Comité</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('reclamos.web')}}"><span>Reclamos</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('contactanos')}}"><span>Contáctanos</span></a>
                        </li>

                        <!-- Only for Mobile View -->
                        <li class="mm-add-listing">
                            <a href="add-listing.html" class="theme-btn btn-style-one">Job Post</a>
                            <span>
                            <span class="contact-info">
                                <span class="phone-num"><span>Call us</span><a href="tel:1234567890">123 456 7890</a></span>
                                <span class="address">329 Queensberry Street, North Melbourne VIC <br>3051, Australia.</span>
                                <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                            </span>
                            <span class="social-links">
                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                                <a href="#"><span class="fab fa-linkedin-in"></span></a>
                            </span>
                            </span>
                        </li>
                    </ul>
                </nav>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="btn-box">
                    <a href="{{ route('login')}}" class="theme-btn btn-style-six ">Login</a>
                    <a href="{{ route('form.afiliacion')}}" class="theme-btn btn-style-five"><span class="btn-title">Afíliate</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
      <div class="logo"><a href="index-2.html"><img src="{{ asset('web/images/logo.png')}}" alt="" title=""></a></div>

      <!--Nav Box-->
      <div class="nav-outer clearfix">

        <div class="outer-box">
          <!-- Login/Register -->
          <div class="login-box">
            <a href="login-popup.html" class="call-modal"><span class="icon-user"></span></a>
          </div>

          <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
        </div>
      </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>