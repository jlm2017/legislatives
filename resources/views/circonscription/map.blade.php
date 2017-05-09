@extends('layout')

@section('title')
    Legislatives - France Insoumise
@endsection

@section('head')
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-57940932-3', 'auto');
        ga('send', 'pageview');
    </script>

    <link rel="stylesheet" href="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.5.0/MarkerCluster.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.5.0/MarkerCluster.Default.css">
    <link rel="stylesheet" href="/css/l.geosearch.css">

    <style>
        html, body {
          width: 100%;
          margin: 0;
          min-height: 100%;
        }

        #map {
            width: 100%;
            height: 500px;
        }

        a.maplink {
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
        }

        a.maplink:hover {
            text-decoration: underline;
        }

        .info {
            padding: 0px 8px;
            background: rgba(9, 9, 9, 0.7);
            border-radius: 5px;
            color: #fff;
        }
    </style>
@endsection

@section('data')
        <h3 class= "text-center">Recherche des circonscriptions par département</h3>
        <hr />
        {!! Form::open(['url' => 'circonscriptions','class' => 'form-inline row']) !!}
          <div class="col-xs-7 col-xs-offset-1">
            {!! Form::label('dep', 'Choix du département&nbsp;:', ['class' => 'control-label']); !!}
            {!! Form::select('dep', $deps, null, ['class' => 'form-control']); !!}
           </div>
         {!! Form::submit('Rechercher', array('class' => 'btn btn-large btn-primary openbutton col-xs-3')); !!}
        {!! Form::close() !!}
        <hr />
        <div id="map"></div>

        <script src="https://npmcdn.com/leaflet@0.7.7/dist/leaflet.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.5.0/leaflet.markercluster.js"></script>
        <script>
            /**
            * L.Control.GeoSearch - search for an address and zoom to it's location
            * L.GeoSearch.Provider.OpenStreetMap uses openstreetmap geocoding service
            * https://github.com/smeijer/L.GeoSearch
            */

            L.GeoSearch={},L.GeoSearch.Provider={},L.GeoSearch.Result=function(a,b,c,d,e){this.X=a,this.Y=b,this.Label=c,this.bounds=d,e&&(this.details=e)},L.Control.GeoSearch=L.Control.extend({options:{position:"topleft",showMarker:!0,showPopup:!1,customIcon:!1,retainZoomLevel:!1,draggable:!1},_config:{country:"",searchLabel:"Enter address",notFoundMessage:"Sorry, that address could not be found.",messageHideDelay:3e3,zoomLevel:18},initialize:function(a){L.Util.extend(this.options,a),L.Util.extend(this._config,a)},resetLink:function(a){var b=this._container.querySelector("a");b.className="leaflet-bar-part leaflet-bar-part-single "+a},onAdd:function(a){this._container=L.DomUtil.create("div","leaflet-bar leaflet-control leaflet-control-geosearch");var b=L.DomUtil.create("a","",this._container);b.href="#",b.title=this._config.searchLabel,this.resetLink("glass");var c=L.DomUtil.create("form","",this._container),d=L.DomUtil.create("input",null,c);d.type="text",d.placeholder=this._config.searchLabel,this._searchbox=d;var e=L.DomUtil.create("div","leaflet-bar message displayNone",this._container);return this._msgbox=e,L.DomEvent.on(b,"click",L.DomEvent.stopPropagation).on(b,"click",L.DomEvent.preventDefault).on(b,"click",function(){L.DomUtil.hasClass(c,"displayNone")?(L.DomUtil.removeClass(c,"displayNone"),d.focus()):L.DomUtil.addClass(c,"displayNone")}).on(b,"dblclick",L.DomEvent.stopPropagation),L.DomEvent.addListener(this._searchbox,"keypress",this._onKeyPress,this).addListener(this._searchbox,"keyup",this._onKeyUp,this).addListener(this._searchbox,"input",this._onInput,this),L.DomEvent.disableClickPropagation(this._container),this._container},geosearch:function(a){var b=this;try{var c=this._config.provider;if("function"==typeof c.GetLocations)c.GetLocations(a,function(c){b._processResults(c,a)});else{var d=c.GetServiceUrl(a);this.sendRequest(c,d,a)}}catch(a){this._printError(a)}},cancelSearch:function(){var a=this._container.querySelector("form");L.DomUtil.addClass(a,"displayNone"),this._searchbox.value="",this.resetLink("glass"),L.DomUtil.addClass(this._msgbox,"displayNone"),this._map._container.focus()},startSearch:function(){this.resetLink("spinner"),this.geosearch(this._searchbox.value)},sendRequest:function(a,b,c){function e(a){a+="&callback=parseLocation";var b=document.createElement("script");b.id="getJsonP",b.src=a,b.async=!0,document.body.appendChild(b)}var d=this;if(window.parseLocation=function(b){var e=a.ParseJSON(b);d._processResults(e,c),document.body.removeChild(document.getElementById("getJsonP")),delete window.parseLocation},XMLHttpRequest){var f=new XMLHttpRequest;if("withCredentials"in f){var f=new XMLHttpRequest;f.onreadystatechange=function(){if(4==f.readyState)if(200==f.status){var g=JSON.parse(f.responseText),h=a.ParseJSON(g);d._processResults(h,c)}else 0==f.status||400==f.status?e(b):d._printError(f.responseText)},f.open("GET",b,!0),f.send()}else if(XDomainRequest){var g=new XDomainRequest;g.onerror=function(a){d._printError(a)},g.onload=function(){var b=JSON.parse(g.responseText),e=a.ParseJSON(b);d._processResults(e,c)},g.open("GET",b),g.send()}else e(b)}},_processResults:function(a,b){a.length>0?(this._map.fireEvent("geosearch_foundlocations",{Locations:a}),this._showLocation(a[0],b),this.cancelSearch()):this._printError(this._config.notFoundMessage)},_showLocation:function(a,b){1==this.options.showMarker&&("undefined"==typeof this._positionMarker?(this._positionMarker=L.marker([a.Y,a.X],{draggable:this.options.draggable}).addTo(this._map),this.options.customIcon&&this._positionMarker.setIcon(this.options.customIcon),this.options.showPopup&&this._positionMarker.bindPopup(b).openPopup()):(this._positionMarker.setLatLng([a.Y,a.X]),this.options.showPopup&&this._positionMarker.bindPopup(b).openPopup())),!this.options.retainZoomLevel&&a.bounds&&a.bounds.isValid()?this._map.fitBounds(a.bounds):this._map.setView([a.Y,a.X],this._getZoomLevel(),!1),this._map.fireEvent("geosearch_showlocation",{Location:a,Marker:this._positionMarker})},_isShowingError:!1,_printError:function(a){this._msgbox.innerHTML=a,L.DomUtil.removeClass(this._msgbox,"displayNone"),this._map.fireEvent("geosearch_error",{message:a}),this.resetLink("alert"),this._isShowingError=!0},_onKeyUp:function(a){var b=27;a.keyCode===b&&this.cancelSearch()},_getZoomLevel:function(){return this.options.retainZoomLevel?this._map._zoom:this._config.zoomLevel},_onInput:function(){this._isShowingError&&(this.resetLink("glass"),L.DomUtil.addClass(this._msgbox,"displayNone"),this._isShowingError=!1)},_onKeyPress:function(a){var b=13;a.keyCode===b&&(a.preventDefault(),a.stopPropagation(),this.startSearch())}}),L.GeoSearch.Provider.OpenStreetMap=L.Class.extend({options:{},initialize:function(a){a=L.Util.setOptions(this,a)},GetServiceUrl:function(a){var b=L.Util.extend({q:a,format:"json"},this.options);return("https:"===location.protocol?"https:":"http:")+"//nominatim.openstreetmap.org/search"+L.Util.getParamString(b)},ParseJSON:function(a){for(var b=[],c=0;c<a.length;c++){var d=a[c].boundingbox,e=new L.LatLng(d[1],d[3]),f=new L.LatLng(d[0],d[2]);a[c].address&&(a[c].address.type=a[c].type),b.push(new L.GeoSearch.Result(a[c].lon,a[c].lat,a[c].display_name,new L.LatLngBounds([e,f]),a[c].address))}return b}});

            /**
            * Utilities
            */

            function httpGetJson(url, onSuccess) {
                var r = new XMLHttpRequest();
                r.open('GET', url, true);
                r.setRequestHeader('Accept', 'application/json');
                r.onreadystatechange = function() {
                if (r.readyState != 4 || r.status != 200) return;
                    onSuccess(JSON.parse(r.responseText));
                };
                r.send();
            }

            /**
            * Map code
            */

            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '<a href="http://osm.org/copyright">OpenStreetMap</a>'
            });

            var latlng = L.latLng(47, 2);
            var map = L.map('map', {
                center: latlng,
                zoom: 5,
                layers: [tiles]
            });

            //coordinates which fit the map to the france area
            var limites = [
              [42.783787, 9.587328],
              [50.352263, -4.627801]
            ];
            map.fitBounds(limites);

            new L.Control.GeoSearch({
              provider: new L.GeoSearch.Provider.OpenStreetMap(),
              showMarker: false,
              searchLabel: 'Rechercher une adresse...'
            }).addTo(map);
            /**
            * Polygon des circonscriptions
            * on reutilise la fonction juste au dessus
            **/

            var info = L.control();
            var geojson;

            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
            this._div.innerHTML = (props ?
                '<p><b>Département n°' + props.departement + '<br />' +
                'Circonscription n°' + props.circonscription + '</b></p>'
                : 'Survolez une circonscription.');
            };

            function onEachFeature(feature, layer) {
                function highlightFeature(e) {
                    var layer = e.target;
                    info.addTo(map);

                    layer.setStyle({
                        weight: 5,
                        color: '#ea0e0e',
                        dashArray: '',
                        fillOpacity: 0.0
                    });

                    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                        layer.bringToFront();
                    }
                    info.update(layer.feature.properties);
                }


                function resetHighlight(e) {
                    geojson.resetStyle(e.target);
                    info.update();
                    info.removeFrom(map)
                }

                function zoomToFeature(e) {
                    window.open('/departement/'+e.target.feature.properties.departement+'/circonscription/'+e.target.feature.properties.circonscription, '_blank');
                }

                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            var style = {
                weight: 2,
                opacity: 1,
                color: 'blue',
                dashArray: '3',
                fillOpacity: 0.5
            }

            var circonscriptions = httpGetJson('circo_json.json', function(data) {
                data.forEach(function(element) {
                    if (element.geojson.features[0])
                    {
                        element.geojson.features[0].properties.departement = element.departement;
                        element.geojson.features[0].properties.circonscription = element.numero;
                    }
                    geojson = L.geoJson(element.geojson, {style: style, onEachFeature: onEachFeature}).addTo(map);
                });
            });
        </script>
@endsection
