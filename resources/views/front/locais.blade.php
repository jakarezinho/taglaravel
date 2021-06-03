<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
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

        }

        .leaflet-popup-content-wrapper {
            border-radius: 0px;

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
            top: 20px;
        }

        .active {
            background-color: var(--rouge);
            display: block;
        }

    </style>
</head>

<body>



    <div class="content">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <img class="profil" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <div id="vote"> vote</div>
    </div>
    <div class="main-container">
        <div class="tag-text-box"> <input type="text" id="tag" placeholder="tag" /> <button id="envia" class="enable ">
                enviar</button></div>
        <button id="escreve" class="enable escreve"> escreve</button>
        <button id="stop" class="enable stop"> stop</button>
        <div id="map"></div>

    </div>


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
        let size = 30
        let rot = Math.random() * (20 - -20) + -20;




        //// Geo code/////
        let gcs = L.esri.Geocoding.geocodeService();
        let buildingLayers = L.layerGroup().addTo(map);

        let thisLayer = L.popup({})
        var bounds = L.latLngBounds()


        ///////////// ESCREVE TAGS ////////////////
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

                 
                let posbox = e.containerPoint.x  + 240 > document.documentElement.clientWidth ? e.containerPoint.x -200 : e.containerPoint.x 
                    lat.value = e.latlng.lat
                    lng.value = e.latlng.lng
                    tagbox.style.left = posbox +'px'
                    tagbox.style.top = e.containerPoint.y + 'px'

                    tag.focus()
                    console.log( e.containerPoint.x , document.documentElement.clientWidth)
                    if(e.containerPoint.x  + 240 > document.documentElement.clientWidth){ 
                        console.log('chegou')
                    }

                }




            })
            map.on('mousedown', (e) => {

                tagbox.style.display = 'none'
            })

            ///////ENVIA TAG /////
            envia.addEventListener('click', () => {
                if (tag.value == '') {
                    alert('tag vazio')
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
                    enviaLocal()

                    escreve.classList.remove("active")
                    tag.value = ''
                    tagbox.style.display = 'none'

                }
            })


        }) ///// fim escreve

        ///// stop ecriture tag////
        stop.addEventListener('click', () => {
            active = false
            escreve.classList.remove("active")
            escreve.style.display = 'block'
            stop.style.display = 'none'
            tagbox.style.display = 'none'

        })

        ////////////////// EMVIA LOCAL ////////////
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

        ///////////////////// GET LOCAIS //////////////////
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
                            `<div><span class=""> ${post.title} <br>${post.adress}</span> <br> <strong> By:${post.name}</strong></div>`
                        ///map
                        latlng = [post.lat, post.lng]
                        bounds.extend(latlng)

                        myTextLabel = L.marker([post.lat, post.lng], {
                            icon: L.divIcon({
                                className: 'my-labels', // Set class for CSS styling
                                html: `<div style="transform: rotate(${Math.random() * (20 - -20) +-20}deg);"> ${novo}<span class="tag" style="font-size:${size}px; transform: rotate(20deg);"> ${post.title}</span> <br> By: ${post.name}</div>`,
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

            return days <= 5 ? "<img src='http://habitar.test//storage/images/novo.gif'>" : ""
        }


        /////// oset
        function offset(el) {
            var rect = el.getBoundingClientRect(),
                scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            return {
                top: rect.top + scrollTop,
                left: rect.left + scrollLeft
            }
        }


        /////////////////load map///////
        window.onload = getLocais()

    </script>





</body>

</html>
