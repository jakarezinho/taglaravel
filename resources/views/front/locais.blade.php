<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BAIRROS mapa cololaborativo</title>
    <meta name="description"
        content="Mapa a tendência humorística de uma realidade séria a do relacionamento das localidades, bairros e territórios como os fenômenos como turismo e desenvolvimento urbanístico" />

    <!-- Open Graph Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Bairros" />
    <meta property="og:description" content="mapa colaborativo adicionar suas próprias dicas e anotações" />
    <meta property="og:url" content="http://habitar.test/" />
    <meta property="og:site_name" content="Bairros" />
    <meta property="og:image" content="{{ url('template/images/intro.jpg') }}" />
    <meta property="og:locale" content="pt_PT" />
    <meta name="twitter:creator" content="@pequenoeu" />
    <meta property="og:image:width" content="1000px" />
    <meta property="og:image:height" content="875px" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@pequenoeu" />
    <meta property="fb:app_id" content="" />

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
        integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
        crossorigin=""></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js"
        integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w=="
        crossorigin="">

    </script>

    <!--load auto complete recherche--->
    <link rel="stylesheet" href="{{ asset('template/css/autocomplete.css') }}" />
    <!--css app-->
    <link rel="stylesheet" href="{{ asset('template/css/app.css') }}" />
    <style>
        .arp {
            text-align: center;
            font-size: 0.9em;

        }

        .arp img {
            vertical-align: text-bottom;
        }

        .ar {
            padding: 5px;
            border-radius: 5px;
            line-height: 250%;

        }

        .good {
            background-color: #60e519;
            color: #ffffff;

        }

        .nogood {
            background-color: #fff01b;
           
        }

        .mau {
            background-color: #ff631b;
            color: #ffffff;
        }

    </style>

</head>

<body class="light-theme">
    <!--//nav-->
    <div class="menu">
        <div id="open"></div>
    </div>
    <div id="dc" class="doc">
        <div class="container">
            <div class="header_list">
                <div class="list_imag_top">
                    <img src="{{ asset('template/images/listtag.png') }} " width="245" height="auto">
                </div>

            </div>
            <!--/INTRO-->
            <div class="homeintro center">

                @auth
                    <p><strong> Hello {{ Auth::user()->name }} </strong>
                        <small>tags({{ Auth::user()->locais->count() }})</small> Adicionar anotações ao mapa preferir
                        humor
                        aos insultos...
                    </p>
                @else
                    <p> Para escrever no mapa deve estar conectado <span> <a href="{{ route('login') }}">Login</a></span>
                        <br>

                        @if (Route::has('register'))
                            <small> Não tem conta ? <a href="{{ route('register') }}">Register</a>
                            </small>
                    </p>

                    @endif

                @endauth

            </div>
            <!--/lista de tags-->
            <div class="introlist">
                <h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f4cc.png" height="30px" width="30px"> Neste
                    local <span class="beta"> ( 5km a volta) </span></h2>
                <p class="center" id="loading"></p>
                <ul id="intro"></ul>
            </div>
            <!--//municipios//-->
            <div class="introlist_2">
                <h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f3db.png" height="30px" width="30px"> Infos do
                    municipio </h2>
                <munip-list id="municipios"> </munip-list>
                <!--//qualidade ar //--->
                <air-quality id="ar"> </air-quality>
                <!--//tempo//-->
                <tempo-hoje id="tempo"> </tempo-hoje>
                <!--/receitas municipios/-->
                <map-receitas id='receitas'></map-receitas>
            </div>
            <hr>
            <p class="love">BAIRROS mapa colaborativo -{{ date('Y') }}</p>
        </div>

    </div>
    <!--//-->
    <div class="content">

        @if (Route::has('login'))

            @auth
                <span> Hello {{ Auth::user()->name }} tags({{ Auth::user()->locais->count() }})</span>
                <span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </span>

                <span> <a href="{{ url('/dashboard') }}">Dashboard </a></span>
            @else
                <span> <a href="{{ route('login') }}">Log in</a></span>

                @if (Route::has('register'))
                    <span> <a href="{{ route('register') }}">Register</a></span>
                @endif
            @endauth

        @endif
        <input type="hidden" id="lat" placeholder="latitude" />
        <input type="hidden" id="lng" placeholder="longitude" />
        <input type="hidden" id="adress" placeholder="morada" />

        <theme-switcher class="theme-switcher">
            <label class="switch" for="darckmode">
                <input type="checkbox" id="darckmode">
                <span class="slider round"></span>
                <svg class=" iconsiwch icon-moon" xmlns="http://www.w3.org/2000/svg" id="moon" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>
                <svg class=" iconsiwch icon-sun" xmlns="http://www.w3.org/2000/svg" id="sun" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1-1zm0 17v1-1zm9-8h-1 1zM4 12H3h1zm14.364 6.364l-.707-.707.707.707zM6.343 6.343l-.707-.707.707.707zm12.021-.707l-.707.707.707-.707zM6.343 17.657l-.707.707.707-.707zM16 12a4 4 0 11-8 0 4 4 0 018 0v0z">
                    </path>
                </svg>
            </label>
        </theme-switcher>

    </div>
    <!---/search/-->
    <div class="search notranslate">
        <input type="text" autocomplete="off" id="search" class="full-width" placeholder="Procurar">
        <span class="material-icons-two-tone"> search</span>
    </div>

    <div id="vote"> vote</div>
    <div class="main-container">
        <div class="tag-text-box notranslate"> <input type="text" maxlength="40" id="tag" placeholder="tag" />
            <button id="envia" class="env"> enviar</button>

            <input type="hidden" id="emoji">
            <span class=" icon material-icons-outlined">emoji_emotions</span>

            <div class="display"></div>
            <span class="x">X</span>
        </div>
        <div id="escreve" class="enable escreve"><img src="{{ url('template/images/escreve.png') }}"
                alt="escrever no mapa"></div>
        <div id="stop" class="enable stop"> <img src="{{ url('template/images/stop.png') }}"
                alt="escrever no mapa">
        </div>


        <div class id="map"></div>
    </div>



    @auth
        <script>
            let user_id = '{{ Auth::user()->id }}'
        </script>

    @else

        <script>
            let user_id = null
        </script>

    @endauth

    <script type="module">
        ///IMPORTS
        //intro 
        import {
            getLocaisIntro,
        } from "{{ asset('template/js/intro.js') }}";


        //bad word
        import {
            filterWords,
            rgx,
            badWord
        } from "{{ asset('template/js/badwords.js') }}";

        //confetti
        import confetti from 'https://cdn.skypack.dev/canvas-confetti';

        //emojis
        import {
            EmojiButton
        } from 'https://cdn.skypack.dev/@joeattardi/emoji-button';

        ///helpers 

        import {
            sizeTag,
            novidade,
            hotTag,
            truncateString,
            badlist,
            villeName,
            detectDevise,
            municipios,
            fetchReceitas,
            airPolution,
            meteoOpenWhather,
        } from "{{ asset('template/js/helpers.js') }}";

        ///api key
        import {
            apiKeygeo,
            apiTempo

        } from "{{ asset('template/js/apikey.js') }}"

        ////autocomplete pesquisa
        import {Autocomplete
        }from "{{ asset('template/js/autocomplete.js') }}"


        ///// map var
        var map = L.map('map', {
            zoomControl: false
        }).setView([39.4039, -9.1336], 16);
        ///// MAP VARS 
        var options = {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 19,
            minZoom: 15,
            id: 'mapbox/streets-v11', /// dark-v10, streets-v11, satellite-streets-v11
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFwYXVyYmFubyIsImEiOiJja215cm8xYzIwNHp1Mnh0M2QwZ3puZmkwIn0.ig4jIr-gZzUfuIX8YZB0ug'
        }
        const urltiles = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}'

        //// MAPA DIA
        const dia = L.tileLayer(urltiles, options)
        dia.addTo(map);

        ///// MAPA NOITE
        options.id = "mapbox/dark-v10"
        const noite = L.tileLayer(urltiles, options)

        ///zoom control
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);


        //// VARS /// 

        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let vote = document.getElementById('vote')
        let tag = document.getElementById('tag')
        let tagbox = document.querySelector('.tag-text-box')
        let lat = document.getElementById('lat')
        let lng = document.getElementById('lng')
        let escreve = document.getElementById('escreve')
        let adress = document.getElementById('adress')
        let stop = document.getElementById('stop')
        let init = document.querySelector('.map')
        let thememode = document.querySelector('body')
        let geral
        let detail
        let active
        let size
        let latlng
        let rot = Math.random() * (20 - -20) + -20;
        let action
        let piclocal = {}
        const baseurl = '{{ url('/') }}'
        ///VARS CLIMA
        const ar = document.getElementById('ar')
        const tempo = document.getElementById('tempo')

        const sinalicon = L.icon({
            iconUrl: 'https://twemoji.maxcdn.com/v/13.0.0/72x72/1f4cc.png',
            iconSize: [45, 45], // size of the icon

        });
        const iconsherch = L.icon({
            iconUrl: 'https://twemoji.maxcdn.com/v/13.0.0/72x72/1f6a9.png',
            iconSize: [45, 45], // size of the icon
            iconAnchor: [15, 52],

        });



        ///VARS INTRO 
        let intro = document.getElementById('intro')
        let loading = document.getElementById('loading')




        /////DARCK MODE
        const themeSwitch = document.querySelector('#darckmode')
        themeSwitch.addEventListener('change', () => {
            document.body.classList.toggle('dark-theme')
            if (thememode.classList.contains('dark-theme')) {
                map.removeLayer(dia)
                noite.addTo(map)
            } else {
                map.removeLayer(noite)
                dia.addTo(map)

            }

        });

        ///// EMOJI
        const trigger = document.querySelector('.icon');
        let emojis = document.querySelector('#emoji')
        const display = document.querySelector('.display')
        const close = document.querySelector('.x');


        ///// RESET ICON EMOJI
        function resetEmoji() {
            close.style.display = 'none'
            display.innerHTML = ''
            emojis.value = '';
        }
        close.addEventListener('click', () => {
            resetEmoji()

        })


        const picker = new EmojiButton({
            style: 'twemoji',
            position: 'bottom-start',
            twemojiOptions: {

            }

        });

        picker.on('emoji', selection => {
            // Remove the old image
            emojis.value = '';
            close.style.display = 'block';
            display.innerHTML = ''

            // Add the new image for the new Twemoji
            const img = document.createElement('img');
            img.src = selection.url;
            img.alt = selection.emoji + ' ' + selection.name;
            //container.appendChild(img)
            emojis.value = selection.url
            // display.innerHTML= container.value
            display.appendChild(img)


        });

        trigger.addEventListener('click', () => {
            picker.togglePicker(trigger);
        });




        /////MENU OPEN///
        let open = document.querySelector('#open')
        let dcm = document.querySelector('#dc')

        open.innerHTML = '<span class="material-icons-two-tone notranslate">help_outline </span>'
        open.addEventListener("click", () => {

            open.innerHTML = '<span class="material-icons-two-tone notranslate">close</span>'
            if (dcm.classList.contains('dep')) {

                open.innerHTML = '<span class="material-icons-two-tone notranslate">help_outline</span>'

            } else {
                getLocaisdislike()

                open.innerHTML = '<span class="material-icons-two-tone notranslate">close</span>'
            }

            dc.classList.toggle("dep")

        })


        //// Geo code/////
        let gcs = L.esri.Geocoding.geocodeService({
            apikey: apiKeygeo
        })

        let buildingLayers = L.layerGroup().addTo(map);
        let buildingLayersDeslike = L.layerGroup().addTo(map);

        let thisLayer = L.popup({})
        var bounds = L.latLngBounds()


        ////////////// drag map load tags //////
        ////// MAP DRAGED///////////
        let viewportHeight = window.innerHeight;
        let viewportWidth
        detectDevise() ? viewportWidth = window.innerWidth * 50 / 100 : viewportWidth = window.innerWidth * 30 / 100;

        map.on('dragend', (e) => {
            tagbox.style.display = 'none'
            marker_sinal()
            // Drag event
            let distance = e.target.dragging._draggable._newPos.distanceTo(e.target.dragging._draggable
                ._startPos);

            if (distance >= viewportWidth) {
                tag.value = ''

                let pos = map.getCenter()
                buildingLayers.clearLayers()
                getLocais(pos.lat, pos.lng)
            }

        });


        ///////////////////// GET LOCAIS TAGS  //////////////////
        function getLocais(lat, lng, distance = 3) {
            //// clear list intro
            intro.innerHTML = ''
            ////////////////////
            vote.style.display = 'block'
            vote.innerHTML = 'Loading...'
            buildingLayers.clearLayers()
            //////ville name
            villeName(gcs, lat, lng)

            ///qualidade do ar meteo
            meteoOpenWhather(lat, lng)
            airPolution(lat, lng)

            let thisLayer = L.popup({})

            var bounds = L.latLngBounds()
            var myHeaders = new Headers();

            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                // body: urlencoded,
            };

            fetch(`${baseurl}/avolta/${lat}/${lng}/${distance}`, requestOptions)
                .then(response => response.json())
                .then(posts => {
                    vote.style.display = 'none'
                    ///// sem tags //////
                    if (posts.data.length == 0) {
                        vote.style.display = 'block'
                        intro.innerHTML = 'SEM TAGS'
                        vote.innerHTML = 'SEM TAGS'
                    }
                    ////////////////////////

                    posts.data.map((post, indice) => {
                        let novo = novidade(baseurl, post.created_at)
                        let hot = hotTag(baseurl, post.likes)
                        size = sizeTag(20, post.likes)

                        let destroy = user_id == post.user_id || user_id == 1 ?
                            `<span class="destroy" id="destroy"  data-id="${post.id}">X delete</span>` :
                            ''
                        let iconEmoji = post.emoji ?
                            `<img class="imogim" src="${post.emoji}" width="${size*1.6}" height="${size*1.6}">` :
                            ''


                        let content_window =
                            `<div> <strong>${post.title}</strong><br>  By:${post.name}<p class="textcenter">VOTE:<br>
                            <span id="likes"  data-id="${post.id}" class="material-icons-two-tone">thumb_up</span> | 
                            <span id="dislike" data-id="${post.id}"  class="material-icons-two-tone">thumb_down</span><br>${post.likes}</p>${destroy} </div>`
                        ///map
                        latlng = [post.lat, post.lng]
                        bounds.extend(latlng)

                        let myTextLabel = L.marker([post.lat, post.lng], {
                            icon: L.divIcon({
                                className: 'my-labels', // Set class for CSS styling
                                html: `<div style="transform: rotate(${Math.random() * (20 - -20) +-20}deg);">${hot}<br>
                                ${novo}<span class="tag" data-theme="dark" style="font-size:${size}px; transform: rotate(20deg);">
                                ${post.title}</span><br>${iconEmoji} </div>`,
                                iconAnchor: [100, 0]
                            }),

                        });

                        buildingLayers.addLayer(myTextLabel);

                        myTextLabel.addEventListener('click', (e) => {
                            thisLayer.setLatLng([post.lat, post.lng])
                                .setContent(content_window)

                            //buildingLayers.clearLayers(); // remove existing markers
                            map.panTo([post.lat, post.lng]);
                            //thisLayer.addTo(mymap);

                            buildingLayers.addLayer(thisLayer);
                        })



                        ////////// display tags  list intro /////////

                        let def = post.emoji != null ?
                            `<img src="${post.emoji}" width="40px" height="40px"> </img>` :
                            `<img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26aa.png" width="45px" height="45px"> </img>`
                        let list = document.createElement('li')
                        list.innerHTML =
                            `${def} <p class="prim"> <span class="bad" id="dis-${post.id}"></span> ${post.title} ${hot} ${novo} </p><span class="adress"> ${truncateString(post.adress, 50)} <strong>likes:(${post.likes})</strong>  </span>`
                        intro.appendChild(list)
                        //////////////////////////////////////////////
                    })



                }).catch(error => console.log('error', error));

            ///// GET MUNICIPIOS
            municipios(lat, lng)



        }

        ///////////////////// GET LOCAIS TAGS DISLIKE  //////////////////
        function getLocaisdislike() {

            buildingLayersDeslike.clearLayers()
            let thisLayer = L.popup({})

            var bounds = L.latLngBounds()
            var myHeaders = new Headers();

            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                // body: urlencoded,
            };

            fetch("{{ route('dislikes') }}", requestOptions)
                .then(response => response.json())
                .then(posts => {

                    posts.data.map((post, indice) => {

                        let bad = post.dislikes > 1 ? '<h1>Bad!!</h1>' : ''
                        post.dislikes > 1 ? badlist(post.id) : null

                        ///map
                        latlng = [post.lat, post.lng]
                        bounds.extend(latlng)
                        let mydislike = L.marker([post.lat, post.lng], {
                            icon: L.divIcon({
                                className: 'my-labels', // Set class for CSS styling
                                html: bad,
                                iconAnchor: [10, 20]
                            }),

                        });

                        buildingLayersDeslike.addLayer(mydislike);

                    })
                }).catch(error => console.log('error', error));

        }


        ////TAGS///// 
        /////////////////////////////// ESCREVE TAGS /////////////////////////////

        //////// Add remove marker sinal
        function marker_sinal() {
            if (piclocal != undefined) {
                map.removeLayer(piclocal);
            }
        }
        ////escreve
        escreve.addEventListener('click', () => {

            if (user_id == null) {
                alert('Deve estar conectado para enviar uma anotação !')
                return
            }
            escreve.classList.add("active")
            active = escreve.classList.contains('active')

            map.on('click', (e) => {
                if (active) {
                    stop.style.display = 'block'
                    escreve.style.display = 'none'
                    tagbox.style.display = 'block'
                    gcs.reverse().latlng(e.latlng).run((err, res, rep) => {
                        if (err) {
                            return;
                        }
                        //Match_addr LongLabel ShortLabel:
                        adress.value = res.address.LongLabel

                    })
                    //// postion tagbox device type
                    let posbox, posboxh
                    if (!detectDevise()) {
                        posbox = e.containerPoint.x + 240 > document.documentElement.clientWidth ?
                            document.documentElement.clientWidth - 245 : e.containerPoint.x
                        posboxh = e.containerPoint.y
                    } else {
                        posbox = document.documentElement.clientWidth / 2 - tagbox.offsetWidth / 2
                        posboxh = document.documentElement.clientHeight / 2
                    }

                    lat.value = e.latlng.lat
                    lng.value = e.latlng.lng
                    tagbox.style.left = posbox + 'px'
                    tagbox.style.top = posboxh + 'px'
                    tag.focus()

                    /////// marker sinal
                    marker_sinal()
                    piclocal = L.marker(e.latlng, {
                            title: 'aqui',
                            icon: sinalicon,
                        })
                        .addTo(map)
                    ///////////
                }


            })

            ////////// ENVIA TAG VALIDATOR ////////////////
            envia.addEventListener('click', () => {
                let x = tag.value

                if (x.length <= 3) {
                    alert('texto curto...')
                    return

                } else if (x.length > 40) {
                    alert('texto longo max 40 caracters...')
                    return

                } else if (badWord(x)) {
                    console.log(badWord(tag.value))
                    alert('BAD WORD!!')
                    tag.value = ''
                    return
                } else {
                    enviaLocal()
                    escreve.classList.remove("active")
                    tag.value = ''
                    tagbox.style.display = 'none'
                    marker_sinal()

                }
            })
            ////////


        }) ///// fim escreve/////

        ///// stop ecriture tag////
        stop.addEventListener('click', () => {
            active = false
            escreve.classList.remove("active")
            escreve.style.display = 'block'
            stop.style.display = 'none'
            marker_sinal()
            tagbox.style.display = 'none'

        })

        //////////// EMVIA LOCAL TAG ////////////
        function enviaLocal() {
            let data = new URLSearchParams();
            data.append("title", tag.value);
            data.append("lat", lat.value);
            data.append("lng", lng.value);
            data.append("adress", adress.value);
            data.append("emoji", emojis.value);


            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", token);
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'POST',
                credentials: "same-origin",
                headers: myHeaders,
                body: data,

            };

            fetch("{{ route('addlocal') }}", requestOptions)

                .then(response => response.text())
                .then(result => {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.6
                        }
                    });
                    buildingLayers.clearLayers(); // remove existing marke
                    getLocais(map.getCenter().lat, map.getCenter().lng)
                    resetEmoji()


                })
                .catch(error => console.log('error', error));

        }
        //// FIN escreve tags /////


        ///////////////////////////////////LIKES //////////////////////////////

        //// ENVIA LIKE //////
        function adlike(post_id, user_id, action) {
            let data = new URLSearchParams();
            data.append("habitars_id", post_id);
            data.append("user_id", user_id);
            data.append("action", action);


            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", token);
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");


            var requestOptions = {
                method: 'POST',
                credentials: "same-origin",
                headers: myHeaders,
                body: data,

            };
            //  fetch
            fetch("{{ route('like') }}", requestOptions)
                .then(function(response) {
                    return response.text();
                })
                .then(function(text) {

                })
                .catch(function(error) {
                    console.log(error)
                });

            return false;

        }


        ///////////// CLICK VOTE ////////////////
        map.on('popupopen', () => {
            let like = document.getElementById('likes')
            let dislike = document.getElementById('dislike')
            let deletetag = document.getElementById('destroy')

            ///action like///
            like.addEventListener('click', (e) => {
                if (user_id == null) {
                    alert('Deve estar conectado para poder votar!')
                    return
                }

                action = 'like'

                console.log(like.dataset.id + action + user_id)
                //post_id user_id action
                adlike(like.dataset.id, user_id, action)

                vote.style.display = 'block'
                vote.innerHTML = 'obrigado / thank you'

                setTimeout(() => {
                    getLocais(map.getCenter().lat, map.getCenter().lng)
                    vote.style.display = 'none'
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.6
                        }
                    });
                }, 2000);

            })
            ////// action like ////
            dislike.addEventListener('click', (e) => {
                if (user_id == null) {
                    alert('Deve estar conectado para poder votar!')
                    return
                }

                action = 'dislike'
                console.log(like.dataset.id + action + user_id)
                //post_id user_id action
                adlike(like.dataset.id, user_id, action)

                vote.style.display = 'block'
                vote.innerHTML = 'obrigado / thank you'
                // map.closePopup()

                setTimeout(() => {
                    getLocais(map.getCenter().lat, map.getCenter().lng)
                    vote.style.display = 'none'
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.6
                        }
                    });
                }, 2000);

            })


            //// END LIKES////

            //////////////////////// DELETE TAGS ///////////////////

            if (typeof destroy != 'undefined') {
                deletetag.addEventListener('click', (e) => {

                    let result = confirm("Quer mesmo remover este tag?")
                    if (!result) {
                        return
                    }
                    //console.log(deletetag.dataset.id)

                    //delete tag
                    deleteTag(deletetag.dataset.id)

                    vote.style.display = 'block'
                    vote.innerHTML = 'tag removido com sucesso'
                    /// map.closePopup()

                    setTimeout(() => {
                        getLocais(map.getCenter().lat, map.getCenter().lng)
                        vote.style.display = 'none'
                        confetti({
                            particleCount: 100,
                            spread: 70,
                            origin: {
                                y: 0.6
                            }
                        });
                    }, 2000);

                })

            }





        })


        ///////////// DELETE TAGS ////////////

        function deleteTag(tag_id) {

            let data = new URLSearchParams();
            data.append("habitar", tag_id);
            data.append("_methode", "DELETE");


            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", token);
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");


            var requestOptions = {
                method: 'POST',
                credentials: "same-origin",
                headers: myHeaders,
                body: data,

            };
            //  fetch 
            fetch(`${baseurl}/destroy/${tag_id}`, requestOptions)
                .then(function(response) {
                    return response.text();
                })
                .then(function(text) {
                    console.log('destroy')



                })
                .catch(function(error) {
                    console.log(error)
                });

            return false;

        }


        ////// /////////////////// PESQUISA  CIDADES//////////////////////
        // minimal configure
        var marker = {};
        new Autocomplete('search', {
            // default selects the first item in
            // the list of results
            selectFirst: true,

            // The number of characters entered should start searching
            howManyCharacters: 2,

            // onSearch
            onSearch: ({
                currentValue
            }) => {
                // You can also use static files
                // const api = '../static/search.json'
                const api =
                    `https://nominatim.openstreetmap.org/search?format=geojson&limit=5&city=${encodeURI(currentValue)}`;
                //const api = `https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?text=${encodeURI(currentValue)}&maxSuggestions=5&f=pjson`;

                return new Promise((resolve) => {
                    fetch(api)
                        .then(response => response.json())
                        .then(data => {
                            resolve(data.features)


                        })
                        .catch(error => {
                            console.error(error);
                        })
                })
            },
            // nominatim GeoJSON format parse this part turns json into the list of
            // records that appears when you type.
            onResults: ({
                currentValue,
                matches,
                template
            }) => {
                const regex = new RegExp(currentValue, 'gi');

                // if the result returns 0 we
                // show the no results element
                return matches === 0 ? template : matches
                    .map((element) => {
                        return `
          <li class="loupe">
            <p>
              ${element.properties.display_name.replace(regex, (str) => `<b>${str}</b>`)}
            </p>
          </li> `;
                    }).join('');
            },

            // we add an action to enter or click
            onSubmit: ({
                object
            }) => {
                const {
                    display_name
                } = object.properties;
                const cord = object.geometry.coordinates;

                if (marker != undefined) {
                    map.removeLayer(marker);
                };

                // custom id for marker
                const customId = Math.random();

                // create marker and add to map
                marker = L.marker([cord[1], cord[0]], {
                        title: display_name,
                        id: customId,
                        icon: iconsherch,
                    })
                    .addTo(map)
                // .bindPopup(display_name);

                // sets the view of the map
                map.setView([cord[1], cord[0]], 15);
                getLocais(cord[1], cord[0])


                // removing the previous marker
                // if you want to leave markers on
                // the map, remove the code below
                /* map.eachLayer(function(layer) {
                        if (layer.options && layer.options.pane === "markerPane") {
                            if (layer.options.id !== customId) {
                                map.removeLayer(layer);
                            }
                        }
                        console.log('layer')
                    });
                  */
            },

            // get index and data from li element after
            // hovering over li with the mouse or using
            // arrow keys ↓ | ↑
            onSelectedItem: ({
                index,
                element,
                object
            }) => {
                console.log('onSelectedItem:', index, element, object);
            },

            // the method presents no results element
            noResults: ({
                currentValue,
                template
            }) => template(`<li>No results found: "${currentValue}"</li>`),
        });

        /////////////////load map  ///////
        window.onload = getLocais('39.4039', '-9.1336'), getLocaisdislike()
    </script>


</body>

</html>
