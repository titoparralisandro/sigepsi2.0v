<!doctype html>
<html lang="en">

  <link rel="icon" type="image/png" sizes="16x16" href="vendor/adminlte/dist/img/AdminLTELogo.png">

  <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link href="{{ asset('css/style-starter.css') }}" rel="stylesheet">


    <!-- Template JavaScript -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SIGEPSI 2.0v</title>

  </head>
  <body>

  <!--header-->
<header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark stroke">
        <h1>
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="vendor/adminlte/dist/img/AdminLTELogo.png" alt="Your logo" title="Universidad" style="height:36px;" />
            Mariscal Sucre <span class="logo">UPTEC "MS"</span></a>
        </h1>

        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mx-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @@courses__active">
              <a class="nav-link" href="{{ url('courses') }}">Biblioteca digital</a>
            </li>
            <li class="nav-item @@about__active">
              <a class="nav-link" href="{{ url('about') }}">Acerca de</a>
            </li>
            <li class="nav-item @@contact__active">
              <a class="nav-link" href="{{ url('contact') }}">Contacto</a>
            </li>
          </ul>

          <div class="top-quote mr-lg-2 text-center">
            <a href="{{ route('login') }}" class="btn login mr-2"><span class="fa fa-user"></span> Ingresar</a>
          </div>
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container py-1">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!--/header-->

<!-- contenido -->
     @yield('content')
<!--/contenido-->

  <!-- footer -->
<section class="w3l-footer-29-main">
  <div class="footer-29 py-5">
    <div class="container py-md-4">
      <div class="row footer-top-29">
        <div class="col-lg-5 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
          <h6 class="footer-title-29">Información de Contacto</h6>
          <p>Dirección : Antiguo edificio La Fosforera, Av. Intercomunal de Antímano, Caracas 1000, Distrito Capital.</p>
          <p>Correo : <a href="mailto:info@example.com">soporte.sigepsi@gmail.com</a></p>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5 ">
          <h2 style="color:#fff;">Universidad Politécnica Territorial de Caracas "Mariscal Sucre"</h2>
          <p>Sistema de Gestión de Proyectos Socio Integradores / SIGEPSI 2.0v (2019/2022)</p>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <section class="w3l-copyright text-center">
    <div class="container">
      <p class="copy-footer-29">© 2022 | SIGEPSI 2.0v | Todos los derechos reservados Universidad Politécnica Territorial de Caracas "Mariscal Sucre" (UPTECMS)</p>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- //copyright -->
</section>
<!-- //footer -->

<!-- stats number counter-->

<script>
  $('.counter').countUp();
</script>

<!-- script for banner slider-->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        667: {
          items: 1
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    })
  })
</script>
<!-- //script -->

<!-- script for tesimonials carousel slider -->
<script>
  $(document).ready(function () {
      $("#owl-demo1").owlCarousel({
          loop: true,
          margin: 20,
          nav: false,
          responsiveClass: true,
          responsive: {
              0: {
                  items: 1,
                  nav: false
              },
              768: {
                  items: 2,
                  nav: false
              },
              1000: {
                  items: 3,
                  nav: false,
                  loop: false
              }
          }
      })
  })
</script>
<!-- //script for tesimonials carousel slider -->

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>


<!-- Template JavaScript -->
<script src="{{ asset('js/theme-change.js') }}"></script>

<!-- //stats number counter -->
  <script src="{{ asset('js/owl.carousel.js') }}"></script>

<!-- stats number counter-->
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.countup.js') }}"></script>

<!--//MENU-JS-->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
