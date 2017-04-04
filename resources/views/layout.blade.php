<!doctype html>
<html lang="fr">
<head>
    <style>
      .full-height-body {
          min-height: 75vh;
        }
    </style>
    <script type="text/javascript">
    // Vous savez coder et vous voulez aider ? RDV sur https://chat.coders.jlm2017.fr/
    // Ctrl+F "Map code" to skip libraries code
    </script>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://jlm2017.github.io/theme/dist/theme.css" media="screen">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
        <nav class="navbar navbar-supporter" style="margin-top: 0px; margin-bottom: 20px;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#supporter-nav-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="supporter-nav-collapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav" role="group">
                <li><a href="/">Accueil</a></li>
                <li><a href="/circonscriptions">Les circonscriptions</a></li>
                <li><a href="https://avenirencommun.fr/" target="_blank">Programme</a></li>
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

    <div class="container full-height-body">
      @yield('data')
    </div>

    <footer class="content-info footer-bottom-fixed">
      <div class="container">
        <section class="widget text-19 widget_text">
          <div class="textwidget">
            <div class="row social text-center bottom-margin">
              <div class="col-sm-2 col-sm-offset-3 col-xs-4">
                <a href="https://twitter.com/JLMelenchon" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
              </div>
              <div class="col-sm-2 col-xs-4">
                <a href="https://www.facebook.com/JLMelenchon" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
              </div>
              <div class="col-sm-2 col-xs-4">
                <a href="https://www.youtube.com/user/PlaceauPeuple" target="_blank"><i class="fa fa-youtube-play fa-3x"></i></a>
              </div>
            </div>
            <hr />
            <div class="row bottom-margin">
              <div class="col-sm-3">Je m’implique&nbsp;:<br>
                <a href="http://www.jlm2017.fr/agir">J’agis</a><br>
                <a href="http://www.jlm2017.fr/donner">Je donne</a><br>
                <a href="http://www.jlm2017.fr/inscription_detail">J’en dis plus sur moi</a><br>
                <a href="http://www.jlm2017.fr/signup">Je crée un compte</a><br>
                <a href="http://www.jlm2017.fr/parrainages">Les parrainages</a>
              </div>

              <div class="col-sm-3">Réseaux sociaux&nbsp;:<br>
                <a href="https://www.facebook.com/JLMelenchon/">Facebook</a><br>
                <a href="https://twitter.com/JLMelenchon">Twitter</a><br>
                <a href="https://www.youtube.com/user/PlaceauPeuple">Youtube</a><br>
                <a href="http://plus.google.com/+JLMelenchon/">Google+</a><br>
                <a href="http://instagram.com/jlmelenchon/">Instagram</a><br>
              </div>

              <div class="col-sm-3">Groupes d’appui&nbsp;:<br>
                <a href="http://www.jlm2017.fr/groupes_appui">La carte des groupes</a><br>
                <a href="http://www.jlm2017.fr/actualites-groupes-appui">L'actu des groupes d'appui</a><br>
                <a href="http://www.jlm2017.fr/creer_ou_rejoindre_un_groupe_d_appui">Créer ou rejoindre un groupe</a>
                <hr>
                <a href="http://www.jlm2017.fr/materiel">Matériel</a>
              </div>

              <div class="col-sm-3">Evènements&nbsp;:<br>
                <a href="http://www.jlm2017.fr/agenda_melenchon">L’agenda de JLM</a><br>
                <a href="http://www.jlm2017.fr/evenements_locaux">Evènements locaux</a><br>
                <hr>
                <a href="https://actus.jlm2017.fr/formulaire-de-contact/">Contact</a> - <a href="http://www.jlm2017.fr/mentions_legales">Mentions légales</a>
              </div>
            </div>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-57940932-5', 'auto');
              ga('send', 'pageview');

            </script>
          </div>
        </section>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://jlm2017.github.io/theme/dist/components.js"></script>
</body>
</html>
