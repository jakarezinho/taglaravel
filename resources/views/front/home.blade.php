<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hot map</title>
    <meta name="description"
        content="Mapa a tendência humorística de uma realidade séria a do relacionamento das localidades, bairros e territórios como os fenômenos como turismo e desenvolvimento urbanístico" />
    <!-- Open Graph Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hot map" />
    <meta property="og:description" content="mapa colaborativo adicionar suas próprias dicas e anotações" />
    <meta property="og:url" content="http://habitar.test/" />
    <meta property="og:site_name" content="Hot map" />
    <meta property="og:image" content="{{ url('template/images/intro.jpg') }}" />
    <meta property="og:locale" content="pt_PT" />
    <meta name="twitter:creator" content="@pequenoeu" />
    <meta property="og:image:width" content="1000px" />
    <meta property="og:image:height" content="875px" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@pequenoeu" />
    <meta property="fb:app_id" content="" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <!--css app-->
    <link rel="stylesheet" href="{{ asset('template/css/app.css') }}" />
</head>


<body>
    <div class="container">

        <div class="nav">
            <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f3e1.png" width="24px" height="24px">

            @if (Route::has('login'))


                @auth
                    <p> <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></p>
                @else
                    <p><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></p>

                    @if (Route::has('register'))
                        <p> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        </p>
                    @endif
                @endauth

            @endif
        </div>
        <div class="header">
            <div class="disclamer">
              <img src="{{ asset('template/images/home.png') }} " width="100%" height="auto">
            </div>
            <div class="hometitle">

                <h1>A vida da cidade <span class="beta">(Beta)</span></h1>
                <h2>Conhecer melhor cidades e bairros</h2>

                <p>Mapa colaborativo adicionar suas próprias dicas e anotações <img
                        src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f680.png" width="24px" height="24px" alt="bairros">. Votar e
                    comfirmar as outras anotações
                </p>
                <div class="homeintro">
                    @if (Route::has('login'))
                        @auth
                            <p><strong> Hello {{ Auth::user()->name }} </strong> Anotações e dicas perto de si insultos
                                prefira o humor </p>


                        @else
                            <p> Para escrever no mapa deve estar conectado <span> <a href="{{ route('login') }}"
                                        class="">Login</a></span> </p>

                            @if (Route::has('register'))
                                <p><small>Não tem conta ? <a href="{{ route('register') }}">Register </a> (grátis)</small> </p>

                            @endif
                        @endauth


                    @endif
                    <p class="map"> <a href="{{ route('map') }}"> Ver dicas no mapa »</a></p>
                </div>

                


            </div>


        </div>



    </div>

<!--/disclamer/-->
        <div class="homeintro description">
<h2> <img src ="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f3e1.png" width="30px" height="30ps"> Bairros e territórios</h2>
            <p> Mapa a tendência humorística de uma realidade séria o
                relacionamento das localidades, bairros e territórios com fenômenos como turismo e
                desenvolvimento urbanístico. Os centros turísticos são uma área falsa que muitas vezes não tem
                nada
                a ver com a realidade local.</p>
        </div>



    <div class="infos">
        <div>
            <p> <img src="{{ url('template/images/mapa.png') }}" alt="escrever no mapa"></p>
            <h2>Mapa colaborativo</h2>
            <p>Pesquisar cidades e bairros no mapa ver dicas e anotações de outros utilizadores. </p>

        </div>
        <div>
            <p> <img src="{{ url('template/images/escreve.png') }}" alt="escrever no mapa"></p>
            <h2> Escrever no mapa</h2>
            <p>Escrever anotações e dicas no mapa sobre locais que conhece bem, preferir o humor aos insultos...</p>
              <p>  <strong> pode utilisar emojis!</strong> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f601.png"
                    width="24px" height="24px"> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f680.png"
                    width="24px" height="24px"> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26a1.png"
                    width="24px" height="24px">
            </p>
        </div>
        <div>
            <p> <img src="{{ url('template/images/vote.png') }}" alt="escrever no mapa"></p>
            <h2> Votar</h2>
            <p>Votar nas dicas de outros utilizadores, quantos mais votos tiveram as anotaçõs maior será o tamnaho
                do texto e a importância da anotação. </p>
        </div>



    </div>
    <!--/INTRO-->
    <div class="container">

<div class="introlist">
        <div id="vote"></div>
        <h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26a1.png" height="30px" width="30px"> Ultimos
            tags </h2>
        <p id="loading"></p>

        <ul id="intro"></ul>
    </div>

    </div>
    
    <div class="love">
        <p><strong>INFOS:</strong><br> O mapa é conteudo produsido pelos utilizadores não podemos responsabolisar pelas
            informações introduzidas. Insultos o spam serão removidos automáticamente.</p>
    </div>
    <p class="love">Hot map mapa colaborativo - {{ date('Y') }}</p>


    </div>

    <script type="module">
        let loading = document.getElementById('loading')
        const baseurl = '{{ url('/') }}'

        ///VARS INTRO 
        let intro = document.getElementById('intro')
        //// VARS 

        //intro 
        import {
            getLocaisIntro,
        } from "{{ asset('template/js/intro.js') }}";

        getLocaisIntro(baseurl)
    </script>

</body>

</html>
