@extends('layout')

@section('title')
    Circonscription
@endsection

@section('data')

    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="circonscription">
        <h3>Département {{$nomDep}} - {{$ordinal}} circonscription</h3>
    </div>
    <hr />
    <div class="candidats text-center container">
        <div class="candidat col-sm-6">
            <div class="nom">
                <h4>{{$circonscription->prenomTitu}} {{$circonscription->nomTitu}}</h4>
                Titulaire
            </div>
            <div class="photo">
                @if(file_exists('/photos/'.$circonscription->numDep.'_'.$circonscription->numCirco.'_T.jpeg'))
                    <img src='/photos/{{$circonscription->numDep}}_{{$circonscription->numCirco}}_T.jpeg' alt="">
                @endif
            </div>
            <div class="bio">
                <p class="text-center">{{$circonscription->bioTitu}}</p>
            </div>
        </div>

        <div class="candidat col-sm-6">
            <div class="nom">
                <h4>{{$circonscription->prenomSupp}} {{$circonscription->nomSupp}}</h4>
                Suppléant
            </div>
            <div class="photo">
                @if(file_exists('/photos/'.$circonscription->numDep.'_'.$circonscription->numCirco.'_S.jpeg'))
                    <img src='/photos/{{$circonscription->numDep}}_{{$circonscription->numCirco}}_S.jpeg' alt="">
                @endif

            </div>
            <div class="bio">
                <p class="text-center">{{$circonscription->bioSupp}}</p>
            </div>
        </div>
    </div>

    <hr />

    <div class="social">
        <div class="row">
            <div class="col-xs-6 text-center">
                <div class="fb-page" data-href="{{$circonscription->facebook}}" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="{{$circonscription->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{$circonscription->facebook}}"></a></blockquote></div>
            </div>
            <div class="col-xs-6 text-center">
                <a class="twitter-timeline" data-lang="fr" data-width="400" data-height="550" data-dnt="true" data-link-color="#E81C4F" href="{{$circonscription->twitter}}"></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>

    <div class="liens text-center">
        @if(isset($circonscription->blog))
            <div class="row">
                <div class="col-xs-6 text-center">
                    <a class="btn btn-lg" href="{{$circonscription->blog}}" target="_blank">En savoir plus</a>
                </div>
                <div class="col-xs-6 text-center">
                    <a class="btn btn-lg" href="mailto:{{$circonscription->email}}">{{$circonscription->email}}</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6 text-center">
                    <a class="btn btn-lg" href="mailto:{{$circonscription->email}}">{{$circonscription->email}}</a>
                </div>
            </div>
        @endif
    </div>

    <div class="map text-center">
      <h4>Événements et groupes d'appui dans cette circonscription</h4>
        <iframe
            style="border: none; margin: 0 0; padding: 0 0; width: 80%; height: 400px"
            src="https://jlm2017.github.io/map/?hide_address=1&borderfit={{$coords['maxlat']}},{{$coords['maxlong']}},{{$coords['minlat']}},{{$coords['minlong']}}">
        </iframe>
    </div>

    <style media="screen">
        .circonscription{
            display: block;
            text-align: center;
            margin: auto;
        }
        .candidats{
            display: block;
            margin: auto;
        }
        .candidat{
            display: inline-block;
            margin: auto;
            max-width: 600px;
        }
        .photo{
            margin: 25px;
        }
        .bio{
            text-align: left;
        }
    </style>
@endsection
