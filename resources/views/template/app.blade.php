{{--
  templates/app
--}}

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

  <head>
    @include('template.partials.head')
  </head>

  <body>

    <!--[if lt IE 7]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <!-- Header -->
      @include('template.partials.header')

    <!-- Main content -->
      @section('contenu')
      @show

    <!-- Footer -->
  	  @include('template.partials.footer')

    <!-- Scripts -->
  	  @include('template.partials.scripts')

  </body>
</html>
