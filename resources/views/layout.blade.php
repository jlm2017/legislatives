<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://jlm2017.github.io/theme/dist/theme.css" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <h1 class="text-center">Legislatives - France Insoumise</h1>
    </header>

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div id="supporter-nav-collapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav" role="group">
            <li><a href="/">Accueil</a></li>
            <li><a href="/circonscriptions">Les circonscriptions</a>
            <li><a href="/circonscriptions/create">Importer</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('data')
    </div>

    <footer>
      <div class="container">
          Footer
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/dist/components.js"></script>
</body>
</html>
