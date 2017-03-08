<!doctype html>
<html lang="fr">
<head>
    <script type="text/javascript">
    // Vous savez coder et vous voulez aider ? RDV sur https://chat.coders.jlm2017.fr/
    // Ctrl+F "Map code" to skip libraries code
    </script>
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
    @yield('head')
</head>
<body>
    <header>
        <!-- <h1 class="text-center">Legislatives - France Insoumise</h1> -->
        <nav class="navbar navbar-supporter" style="margin-top: 0px; margin-bottom: 0px;">
          <div class="container">
            <div id="supporter-nav-collapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav" role="group">
                <li><a href="/">Accueil</a></li>
                <li><a href="/circonscriptions">Les circonscriptions</a>
              </ul>
              <ul class="nav navbar-nav pull-right">
                @if (!Auth::guest())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </li>
                      <li><a href="/circonscriptions/create">Importer</a></li>
                    </ul>
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </nav>
        <ul class="nav navbar-nav navbar-right">
      </ul>
    </header>

    <hr />

    <div class="container">
      @yield('data')
    </div>

    <hr>

    <footer>
      <div class="container">

      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://jlm2017.github.io/theme/dist/components.js"></script>
</body>
</html>
