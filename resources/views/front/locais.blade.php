<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Maps</title>
    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.5.0/dist/esri-leaflet.js"
        integrity="sha512-ucw7Grpc+iEQZa711gcjgMBnmd9qju1CICsRaryvX7HJklK0pGl/prxKvtHwpgm5ZHdvAil7YPxI1oWPOWK3UQ=="
        crossorigin=""></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
        integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
        crossorigin=""></script>

    <style>
        :root {
            --blanc: #FFF;
            --noir: #000;
            --rouge: #ee1a1a;
            --shadow: #131111;
            --tableau: #83786a;
            --shadow_map: text-shadow: 1px 1px 0 var(--shadow), 1px 2px 0 var(--shadow), 3px 3px 0 var(--shadow), -1px -1px 0 var(--shadow), 1px -1px 0 var(--shadow), -1px 1px 0 var(--shadow), 0 1px 0 var(--shadow);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
        }

        .main-container {
            position: relative;
            overflow: hidden;
            height: 100%;
            width: 100%;
        }

        #map {
            position: relative;
            width: 100vw;
            height: 100vh;
            left: 0;
            top: 0;
            overflow: hidden;
            z-index: 0;

        }

        .leaflet-popup-content-wrapper {
            border-radius: 0px;

        }

        /* ////// NAVIGATION /////  */
        .menu {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2000;
        }

        .menu span {
            width: 45px;
            height: 45px;
            padding: 5px;
            border-radius: 50%;
            font-size: 35px;
            background-color: var(--blanc);
            cursor: pointer;
        }

        .doc {
            background-color: var(--blanc);
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            position: fixed;
            /* left: 100vw;*/
            z-index: 1000;
            opacity: 0;
            transition: opacity 300ms;
            z-index: 0;
            overflow: auto;
        }

        .dep {
            /*transform: translateX(-100vw);*/
            opacity: 1;
            z-index: 1000;
        }

        .header {
           
            margin: 20px;
            padding-top: 50px;
            font-size: 20px;
            display: flex;
        }

        .list {
            list-style: none;
            font-size: 13px;
        }

        .header p,
        h1,
        h2 {
            padding-bottom: 15px;
        }


        /* ////// STYLE TAGS /////// */

        .my-labels div {
            box-shadow: none;
            border: none;
            width: 200px;
            border-width: 2px;
            text-align: center;

        }

        .my-labels p {
            padding: 0;
            margin: 0;
        }

        .my-labels span.tag {
            text-shadow: 1px 1px 0 var(--shadow), 1px 2px 0 var(--shadow), 3px 3px 0 var(--shadow), -1px -1px 0 var(--shadow), 1px -1px 0 var(--shadow), -1px 1px 0 var(--shadow), 0 1px 0 var(--shadow);
            font-weight: bold;
            line-height: 100%;
            white-space: normal;
            color: var(--blanc);


        }

        /* tags edita*/
        .tag-text-box {
            position: absolute;
            z-index: 900;
            display: none;
            white-space: nowrap
        }

        #tag {
            padding: 8px;
            background-color: var(--blanc);
            box-shadow: 1px 1px 1px rgb(0 0 0 / 75%);
            border-radius: 10px;
            margin-left: -.5em;
            margin-top: -.5em;
            border: none;
            outline: none;
            font-size: 1em;
            font-weight: 400;
        }

        .content {
            position: absolute;
            z-index: 900;
            left: 20px;
            top: 20px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        .content a {
            color: var(--blanc)
        }

        .profil {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .enable {
            padding: 10px;
            background-color: var(--noir);
            color: var(--blanc);
            border: none;
            outline: none;
        }

        .enable.stop {
            position: absolute;
            z-index: 900;
            right: 20px;
            top: 100px;
            display: none;
        }

        .enable.escreve {
            position: absolute;
            z-index: 900;
            right: 20px;
            top: 100px;
        }

        .active {
            background-color: var(--rouge);
            display: block;
        }

        /* VOTE*/
        #likes,
        #dislike {
            font-size: 30px;
            cursor: pointer;
            color: var(--rouge);
        }

        #vote {
            position: absolute;
            border-radius: 5px;
            left: 0;
            right: 0;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 25px;
            z-index: 900;
            text-align: center;
            padding: 5px;
            background-color: var(--noir);
            color: var(--blanc);
            display: none;
        }
        

    </style>
</head>

<body>
    <!--//nav-->
    <div class="menu">
        <div id="open"></div>
    </div>
    <div id="dc" class="doc">
        <div class="header">
            <div class="disclamer">
                <p></p>
                <h1>Sonho e realidade</h1>

                <p><i class="twa twa-1x twa-hotel"></i> Cada vez que vou para um novo lugar é difícil descobrir para que
                    partes da cidade devo ir. Muitas vezes acabo no centro turístico. Sei que 90% das pessoas que vão
                    para um novo local ou cidade não terá
                    nenhuma ideia sobre a realidade de um local porque apenas ficam no centro turístico. É uma área
                    falsa que não tem nada a ver com a realidade local. Então o que eu quero? Quero obter uma visão
                    geral rápida do que é a região. </p>
                <p><i class="twa twa-1x twa-beach-with-umbrella"></i>Vista da região Oeste de Portugal fora do prisma
                    marketing oficial das regiões de turismo com algum humor pelo meio também, por vezes nem tudo é
                    paraíso </p>
                <h2> lista de cidades em vista </h2>
                <p> <i class="twa twa-1x twa-sun-with-face"></i>Região Oeste</p>
                <ul id="listintro" class="list"></ul>
                <p><i class="twa twa-1x twa-high-voltage"></i> <small>Mapa em continua actualização</small></p>
                <p class="love">HOT MAP Sonho e realidade </p>
            </div>

        </div>
    </div>

    <!--//-->
    <div class="content">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <img class="profil" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <br> Hello {{ Auth::user()->name }}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                            this.closest('form').submit();">
                            sair
                        </a>
                    </form>

                    <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <input type="hidden" id="lat" placeholder="latitude" />
        <input type="hidden" id="lng" placeholder="longitude" />
        <input type="hidden" id="adress" placeholder="morada" />

    </div>
      <div id="vote"> vote</div>
    <div class="main-container">
        <div class="tag-text-box"> <input type="text" id="tag" placeholder="tag" /> <button id="envia" class="enable ">
                enviar</button></div>
        <button id="escreve" class="enable escreve"> escreve</button>
        <button id="stop" class="enable stop"> stop</button>
        <div id="map"></div>

    </div>

    @auth
        <script>
            let user_id = '{{ Auth::user()->id }}'

        </script>

    @endauth
    <script>
        var map = L.map('map', {
            zoomControl: false
        }).setView([39.4039, -9.1336], 16);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            minZoom: 15,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFwYXVyYmFubyIsImEiOiJja215cm8xYzIwNHp1Mnh0M2QwZ3puZmkwIn0.ig4jIr-gZzUfuIX8YZB0ug'
        }).addTo(map);
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
        let geral
        let detail
        let active
        let size = 20
        let rot = Math.random() * (20 - -20) + -20;
        let action

        /////MENO OPEN///
        let open = document.querySelector('#open')
        let dcm = document.querySelector('#dc')


        open.innerHTML = '<span class="material-icons-two-tone">help_outline </span>'
        open.addEventListener("click", () => {

            open.innerHTML = '<span class="material-icons-two-tone">close</span>'
            if (dcm.classList.contains('dep')) {
                open.innerHTML = '<span class="material-icons-two-tone">help_outline</span>'
            } else {
                open.innerHTML = '<span class="material-icons-two-tone">close</span>'
            }

            dc.classList.toggle("dep")

        })


        //// Geo code/////
        let gcs = L.esri.Geocoding.geocodeService();
        let buildingLayers = L.layerGroup().addTo(map);

        let thisLayer = L.popup({})
        var bounds = L.latLngBounds()


        ////TAGS/////
        /////////////////////////////// ESCREVE TAGS /////////////////////////////
        escreve.addEventListener('click', () => {
            escreve.classList.add("active")
            active = escreve.classList.contains('active')

            map.on('click', (e) => {
                if (active) {

                    stop.style.display = 'block'
                    escreve.style.display = 'none'
                    gcs.reverse().latlng(e.latlng).run((err, res) => {
                        if (err) return;
                        adress.value = res.address.ShortLabel
                    })
                    tagbox.style.display = 'block'

                    let posbox = e.containerPoint.x + 240 > document.documentElement.clientWidth ?
                        document.documentElement.clientWidth - 245 : e.containerPoint.x
                    lat.value = e.latlng.lat
                    lng.value = e.latlng.lng
                    tagbox.style.left = posbox + 'px'
                    tagbox.style.top = e.containerPoint.y + 'px'
                    tag.focus()

                }
            })
            map.on('mousedown', (e) => {

                tagbox.style.display = 'none'
            }) //


            ///ENVIA TAG /////
            envia.addEventListener('click', () => {
                if (tag.value == '') {
                    alert('Tag vazio')
                    return

                }
                if (tag.value.length < 3) {
                    alert('Pouco texto...')
                    return

                }
                 enviaLocal()
                escreve.classList.remove("active")
                tag.value = ''
                tagbox.style.display = 'none'

            })

            ////envia key up///
            tag.addEventListener("keyup", ({
                key
            }) => {
                if (key === "Enter") {
                    if (tag.value == '') {
                        alert('tag vazio')
                        return
                    }
                    if (tag.value.length < 3) {
                        alert('pouco texto?')
                        return

                    }
                     enviaLocal()

                    escreve.classList.remove("active")
                    tag.value = ''
                    tagbox.style.display = 'none'

                }
            })


        }) ///// fim escreve/////

        ///// stop ecriture tag////
        stop.addEventListener('click', () => {
            active = false
            escreve.classList.remove("active")
            escreve.style.display = 'block'
            stop.style.display = 'none'
            tagbox.style.display = 'none'

        })



        //////////// EMVIA LOCAL  ////////////
        function enviaLocal() {
            let data = new URLSearchParams();
            data.append("title", tag.value);
            data.append("lat", lat.value);
            data.append("lng", lng.value);
            data.append("adress", adress.value);

            var myHeaders = new Headers();
            myHeaders.append("X-CSRF-TOKEN", token);
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'POST',
                credentials: "same-origin",
                headers: myHeaders,
                body: data,

            };

            fetch("http://habitar.test/addlocal", requestOptions)

                .then(response => response.text())
                .then(result => {
                    buildingLayers.clearLayers(); // remove existing marke
                    getLocais()

                })
                .catch(error => console.log('error', error));

        }
        //// FIN escreve tags /////


        ///////////////////// GET LOCAIS TAGS  //////////////////
        function getLocais() {
            vote.style.display = 'block'
            vote.innerHTML = 'Loading...'
            let thisLayer = L.popup({})

            var bounds = L.latLngBounds()
            var myHeaders = new Headers();

            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                // body: urlencoded,
            };

            fetch("http://habitar.test/locais", requestOptions)
                .then(response => response.json())
                .then(posts => {
                    vote.style.display = 'none'
                    posts.data.map((post, indice) => {
                        novo = novidade(post.created_at)


                        let content_window =
                            `<div> ${post.title}<br>${post.adress} <br> <strong> By:${post.name}</strong><p>VOTE:<br>
                            <span id="likes"  data-id="${post.id}" class="material-icons-two-tone">thumb_up</span> | 
                            <span id="dislike" data-id="${post.id}"  class="material-icons-two-tone">thumb_down</span><br>${post.likes}</p></div>`
                        ///map
                        latlng = [post.lat, post.lng]
                        bounds.extend(latlng)

                        myTextLabel = L.marker([post.lat, post.lng], {
                            icon: L.divIcon({
                                className: 'my-labels', // Set class for CSS styling
                                html: `<div style="transform: rotate(${Math.random() * (20 - -20) +-20}deg);">
                                ${novo}<span class="tag" style="font-size:${size*1.3+post.likes}px; transform: rotate(20deg);">
                                ${post.title}</span> <br> By: ${post.name}'>"</div>`,
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

                    })
                }).catch(error => console.log('error', error));

        }

        ////////////////// FUNCTION NOVIDADE /////////////////////
        function novidade(post_date) {
            var countDownDate = new Date(post_date).getTime()
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = now - countDownDate
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));

            return days <= 5 ? "<img src='http://habitar.test/storage/images/novo.gif'>" : ""
        }

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
            fetch("http://habitar.test/like", requestOptions)
                .then(function(response) {
                    return response.text();
                })
                .then(function(text) {
                    console.log('like enviado')



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
            like.addEventListener('click', (e) => {

                action = 'like'

                console.log(like.dataset.id + action + user_id)
                //post_id user_id action
                adlike(like.dataset.id, user_id, action)

                vote.style.display = 'block'
                vote.innerHTML = 'obrigado / thank you'
                // map.closePopup()
                setTimeout(() => {
                    vote.style.display = 'none'
                }, 2000);

            })
            dislike.addEventListener('click', (e) => {

                action = 'dislike'
                console.log(like.dataset.id + action + user_id)
                //post_id user_id action
                adlike(like.dataset.id, user_id, action)

                vote.style.display = 'block'
                vote.innerHTML = 'obrigado / thank you'
                // map.closePopup()
                setTimeout(() => {
                    vote.style.display = 'none'
                }, 2000);

            })




            //// REMOVE LIKE   
            map.on('popupclose', () => {

                action = 'dislike'

            })
        })

       
        //// END LIKES////

        /////////////////load map///////
        window.onload = getLocais()

    </script>





</body>

</html>
