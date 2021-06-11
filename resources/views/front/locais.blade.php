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
            --tableau: #E6E4E0;
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
            background-color: var(--tableau);
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

        /* TAGS EDIT*/
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

        .destroy {
            cursor: pointer;

        }

        .content {
            position: absolute;
            z-index: 90;
            left: 20px;
            top: 72px;
            text-align: center;

            width: 288px;
            background-color: var(--blanc);
            border-radius: 5px;
            text-align: center;
        }

        .content form {
            display: inline;
        }

        .content span {
            margin-right: 5px;
            margin-left: 5px;
            font-size: 11px;
        }

        .content a {
            color: var(--noir)
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

        /*PESQUISA*/

        .search {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
            background-color: var(--blanc);
            box-shadow: 1px 2px 4px rgb(0 0 0 / 3%);
            border-radius: 5px;
        }

        .search span {
            position: fixed;
            left: 30px;
            top: 35px;
        }

        .search input {
            border: none;
            outline: none;
            padding: 10px;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 1.35em;
            text-align: center;
            font-weight: 800;
            border-radius: 5px;
        }

        .result {
            display: none;
            width: 300px;
            padding: 10px;
            list-style-type: none;
        }

        .result li {
            padding: 5px;
            text-align: center;
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
                <svg id="b90746aa-ab89-4048-b48f-88833dcede4a" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                    width="700" height="300" viewBox="0 0 888.24409 478.03289">
                    <title>quite_town</title>
                    <path d="M347.878,687.98355h-2a94,94,0,0,0-188,0h-2a96,96,0,0,1,192,0Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path d="M1043.878,687.98355h-2a94,94,0,1,0-188,0h-2a96,96,0,1,1,192,0Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M808.878,458.98355h-2c0-94.8413-77.15918-172-172-172-94.84131,0-172,77.1587-172,172h-2c0-95.94384,78.05616-174,174-174C730.82229,284.98355,808.878,363.03971,808.878,458.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <circle cx="145.5" cy="39.5" r="39.5" fill="#ff6584" />
                    <polygon
                        points="153.891 311.384 221.752 230.567 355.171 230.567 436.705 309.983 435.058 311.042 435.646 311.042 435.646 476.227 153.984 476.227 153.984 311.042 153.891 311.384"
                        fill="#3f3d56" />
                    <rect x="350.59718" y="433.98355" width="15.38295" height="53.24868"
                        transform="translate(560.69936 710.23224) rotate(-180)" fill="#3f3d56" />
                    <polygon
                        points="220.694 229.508 304.345 327.581 304.345 476.227 153.984 476.227 153.984 308.924 220.694 229.508"
                        fill="#6c63ff" />
                    <rect x="254.30616" y="347.0438" width="30.70751" height="31.3983" fill="#3f3d56" />
                    <rect x="254.30616" y="389.767" width="30.70751" height="31.39834" fill="#3f3d56" />
                    <rect x="254.30616" y="347.0438" width="30.70751" height="31.3983" fill="#fff" />
                    <rect x="254.30616" y="389.767" width="30.70751" height="31.39834" fill="#fff" />
                    <rect x="211.83775" y="347.0438" width="30.70751" height="31.3983" fill="#3f3d56" />
                    <rect x="211.83775" y="389.767" width="30.70751" height="31.39834" fill="#3f3d56" />
                    <rect x="211.83775" y="347.0438" width="30.70751" height="31.3983" fill="#fff" />
                    <rect x="211.83775" y="389.767" width="30.70751" height="31.39834" fill="#fff" />
                    <rect x="169.36934" y="347.0438" width="30.70751" height="31.3983" fill="#3f3d56" />
                    <rect x="169.36934" y="389.767" width="30.70751" height="31.39834" fill="#3f3d56" />
                    <rect x="169.36934" y="347.0438" width="30.70751" height="31.3983" fill="#fff" />
                    <rect x="169.36934" y="389.767" width="30.70751" height="31.39834" fill="#fff" />
                    <rect x="485" y="40" width="14" height="35" fill="#6c63ff" />
                    <rect x="379" y="72" width="119" height="405" fill="#6c63ff" />
                    <rect x="498" y="72" width="48" height="405" fill="#3f3d56" />
                    <rect x="400.5" y="107" width="18" height="18" fill="#fff" />
                    <rect x="429.5" y="107" width="18" height="18" fill="#fff" />
                    <rect x="458.5" y="107" width="18" height="18" fill="#fff" />
                    <rect x="401" y="148" width="18" height="18" fill="#fff" />
                    <rect x="430" y="148" width="18" height="18" fill="#fff" />
                    <rect x="459" y="148" width="18" height="18" fill="#fff" />
                    <rect x="401.5" y="189" width="18" height="18" fill="#fff" />
                    <rect x="430.5" y="189" width="18" height="18" fill="#fff" />
                    <rect x="459.5" y="189" width="18" height="18" fill="#fff" />
                    <rect x="402" y="230" width="18" height="18" fill="#fff" />
                    <rect x="431" y="230" width="18" height="18" fill="#fff" />
                    <rect x="460" y="230" width="18" height="18" fill="#fff" />
                    <rect x="402.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="431.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="460.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="403" y="312" width="18" height="18" fill="#fff" />
                    <rect x="432" y="312" width="18" height="18" fill="#fff" />
                    <rect x="461" y="312" width="18" height="18" fill="#fff" />
                    <rect x="403.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="432.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="461.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="404" y="394" width="18" height="18" fill="#fff" />
                    <rect x="433" y="394" width="18" height="18" fill="#fff" />
                    <rect x="433" y="442" width="18" height="34" fill="#fff" />
                    <rect x="462" y="394" width="18" height="18" fill="#fff" />
                    <rect x="498" y="40" width="8" height="34" fill="#3f3d56" />
                    <rect x="635" y="218" width="14" height="20.74371" fill="#6c63ff" />
                    <rect x="529" y="236.96568" width="119" height="240.03432" fill="#6c63ff" />
                    <rect x="648" y="236.96568" width="48" height="240.03432" fill="#3f3d56" />
                    <rect x="552.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="581.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="610.5" y="271" width="18" height="18" fill="#fff" />
                    <rect x="553" y="312" width="18" height="18" fill="#fff" />
                    <rect x="582" y="312" width="18" height="18" fill="#fff" />
                    <rect x="611" y="312" width="18" height="18" fill="#fff" />
                    <rect x="553.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="582.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="611.5" y="353" width="18" height="18" fill="#fff" />
                    <rect x="554" y="394" width="18" height="18" fill="#fff" />
                    <rect x="583" y="394" width="18" height="18" fill="#fff" />
                    <rect x="583" y="442" width="18" height="34" fill="#fff" />
                    <rect x="612" y="394" width="18" height="18" fill="#fff" />
                    <rect x="648" y="218" width="8" height="20.15103" fill="#3f3d56" />
                    <rect x="0.24409" y="475.79217" width="888" height="2.24072" fill="#3f3d56" />
                    <circle cx="732.65969" cy="404.04057" r="26.04057" fill="#6c63ff" />
                    <path
                        d="M907.90824,597.63107A26.0426,26.0426,0,0,1,864.517,625.19165a26.04282,26.04282,0,1,0,43.39129-27.56058Z"
                        transform="translate(-155.87795 -210.98355)" opacity="0.2" />
                    <polygon points="732.731 404.041 732.803 404.041 734.09 477.87 731.372 477.87 732.731 404.041"
                        fill="#3f3d56" />
                    <rect x="890.2546" y="653.36959" width="1.28772" height="4.86472"
                        transform="translate(900.27893 -649.01245) rotate(62.23413)" fill="#3f3d56" />
                    <circle cx="809.21843" cy="365.59931" r="39.59931" fill="#6c63ff" />
                    <path
                        d="M994.55282,550.13364a39.6024,39.6024,0,0,1-65.98417,41.91075,39.60273,39.60273,0,1,0,65.98417-41.91075Z"
                        transform="translate(-155.87795 -210.98355)" opacity="0.2" />
                    <polygon points="809.327 365.599 809.436 365.599 811.394 477.87 807.26 477.87 809.327 365.599"
                        fill="#3f3d56" />
                    <rect x="967.70733" y="634.89394" width="1.95821" height="7.39767"
                        transform="translate(926.60095 -727.03592) rotate(62.23413)" fill="#3f3d56" />
                    <circle cx="26.65969" cy="403.04057" r="26.04057" fill="#6c63ff" />
                    <path
                        d="M201.90824,596.63107A26.0426,26.0426,0,0,1,158.517,624.19165a26.04282,26.04282,0,1,0,43.39129-27.56058Z"
                        transform="translate(-155.87795 -210.98355)" opacity="0.2" />
                    <polygon points="26.731 403.041 26.803 403.041 28.09 476.87 25.372 476.87 26.731 403.041"
                        fill="#3f3d56" />
                    <rect x="184.2546" y="652.36959" width="1.28772" height="4.86472"
                        transform="translate(522.29096 -24.83639) rotate(62.23413)" fill="#3f3d56" />
                    <path
                        d="M762.29138,248.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,762.29138,248.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M300.29138,285.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,300.29138,285.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M902.29138,323.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,902.29138,323.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M376.29138,265.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,376.29138,265.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M393.29138,345.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,393.29138,345.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M751.29138,387.31933l9.20569-7.36279c-7.15149-.789-10.08991,3.11126-11.29248,6.19836-5.587-2.32-11.66919.72046-11.66919.72046l18.41888,6.68671A13.93789,13.93789,0,0,0,751.29138,387.31933Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <polygon
                        points="106 456 44 456 44 458 53.669 458 53.669 477 55.669 477 55.669 458 93.331 458 93.331 477 95.331 477 95.331 458 106 458 106 456"
                        fill="#3f3d56" />
                    <path
                        d="M324.878,674.98355a13.91769,13.91769,0,0,0-6.96954,1.86975A14.98176,14.98176,0,0,0,292.878,687.98355h45.94953A13.99046,13.99046,0,0,0,324.878,674.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M561.878,674.98355a13.91769,13.91769,0,0,0-6.96954,1.86975A14.98176,14.98176,0,0,0,529.878,687.98355h45.94953A13.99046,13.99046,0,0,0,561.878,674.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M716.878,674.98355a13.91769,13.91769,0,0,0-6.96954,1.86975A14.98176,14.98176,0,0,0,684.878,687.98355h45.94953A13.99046,13.99046,0,0,0,716.878,674.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M920.878,674.98355a13.91769,13.91769,0,0,0-6.96954,1.86975A14.98176,14.98176,0,0,0,888.878,687.98355h45.94953A13.99046,13.99046,0,0,0,920.878,674.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <path
                        d="M1018.878,674.98355a13.91769,13.91769,0,0,0-6.96954,1.86975A14.98176,14.98176,0,0,0,986.878,687.98355h45.94953A13.99046,13.99046,0,0,0,1018.878,674.98355Z"
                        transform="translate(-155.87795 -210.98355)" fill="#3f3d56" />
                    <polygon
                        points="129 407 113 407 113 423 120.417 423 120.417 476.912 122.417 476.912 122.417 423 129 423 129 407"
                        fill="#3f3d56" />
                    <rect x="44.12205" y="450.01645" width="62" height="2" fill="#3f3d56" />
                    <rect x="44.12205" y="445.01645" width="62" height="2" fill="#3f3d56" />
                    <rect x="44.12205" y="440.01645" width="62" height="2" fill="#3f3d56" />
                </svg>

                <p class="love">HOT MAP Sonho e realidade </p>
            </div>

        </div>
    </div>
    <!--//-->
    <div class="content">
        
        @if (Route::has('login'))

            @auth
                <span> Hello {{ Auth::user()->name }} tags({{Auth::user()->locais->count()}})</span>
                <span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     this.closest('form').submit();">
                            sair
                        </a>
                    </form>
                </span>

                <span> <a href="{{ url('/dashboard') }}" class="">Dashboard</a></span>
            @else
                <span> <a href="{{ route('login') }}" class="">Log in</a></span>

                @if (Route::has('register'))
                    <span> <a href="{{ route('register') }}" class="">Register</a></span>
                @endif
            @endauth

        @endif
        <input type="hidden" id="lat" placeholder="latitude" />
        <input type="hidden" id="lng" placeholder="longitude" />
        <input type="hidden" id="adress" placeholder="morada" />

    </div>
    <!---/search/-->
    <div class="search"> <input type="text" autocomplete="off" id="cherche" placeholder="Procurar"><span
            class="material-icons-two-tone">
            search
        </span>
        <ul id="r" class="result"></ul>
    </div>
    <div id="vote"> vote</div>
    <div class="main-container">
        <div class="tag-text-box"> <input type="text" maxlength="40" id="tag" placeholder="tag" /> <button id="envia"
                class="enable ">
                enviar</button></div>
        <button id="escreve" class="enable escreve"> Escreve</button>
        <button id="stop" class="enable stop"> Stop</button>
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
        let size
        let rot = Math.random() * (20 - -20) + -20;
        let action
        const baseurl = '{{ url('/') }}'



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

            if (typeof user_id == 'undefined') {
                alert('deve estar connectado enviar um local!')
                return
            }
            escreve.classList.add("active")
            active = escreve.classList.contains('active')

            map.on('click', (e) => {
                if (active) {

                    stop.style.display = 'block'
                    escreve.style.display = 'none'
                    gcs.reverse().latlng(e.latlng).run((err, res) => {
                        if (err) return;
                        adress.value = res.address.ShortLabel
                        console.log(res.address)
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
                if (tag.value.length <= 3) {
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
                    if (tag.value.length <= 3) {
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

            fetch("{{ route('addlocal') }}", requestOptions)

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
            buildingLayers.clearLayers()
            let thisLayer = L.popup({})

            var bounds = L.latLngBounds()
            var myHeaders = new Headers();

            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                // body: urlencoded,
            };

            fetch("{{ route('locais') }}", requestOptions)
                .then(response => response.json())
                .then(posts => {
                    vote.style.display = 'none'
                    posts.data.map((post, indice) => {
                        novo = novidade(post.created_at)
                        hot = hotTag(post.likes)
                        size = sizeTag(20, post.likes)


                        let destroy = typeof user_id != 'undefined' && user_id == post.user_id ?
                            `<span class="destroy" id="destroy"  data-id="${post.id}">delete</span>` : ''



                        let content_window =
                            `<div> <strong>${post.title}</strong><br>${post.adress} <br>  By:${post.name}<p>VOTE:<br>
                            <span id="likes"  data-id="${post.id}" class="material-icons-two-tone">thumb_up</span> | 
                            <span id="dislike" data-id="${post.id}"  class="material-icons-two-tone">thumb_down</span><br>${post.likes}</p>${destroy} </div>`
                        ///map
                        latlng = [post.lat, post.lng]
                        bounds.extend(latlng)

                        myTextLabel = L.marker([post.lat, post.lng], {
                            icon: L.divIcon({
                                className: 'my-labels', // Set class for CSS styling
                                html: `<div style="transform: rotate(${Math.random() * (20 - -20) +-20}deg);">${hot}<br>
                                ${novo}<span class="tag" style="font-size:${size}px; transform: rotate(20deg);">
                                ${post.title}</span> <br> By: ${post.name}</div>`,
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


        ///////////////// FUNCTIONS HELPER/////////////////

        /////// function novidade //////////////
        function novidade(post_date) {
            var countDownDate = new Date(post_date).getTime()
            var now = new Date().getTime();
            var distance = now - countDownDate
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));

            return days <= 5 ? "<img src='http://habitar.test/storage/images/novo.gif'>" : ""
        }

        ///////////////// function hot //////////
        function hotTag(likes) {
            return likes > 1 ? "<img src='http://habitar.test/storage/images/hot.gif'>" : ""

        }
        ////// function size texte *******
        function sizeTag(size, postlike) {
            return postlike == 0 ? size = 14 : size + postlike * 3

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
            fetch("{{ route('like') }}", requestOptions)
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
            let deletetag = document.getElementById('destroy')

            ///action like///
            like.addEventListener('click', (e) => {
                if (typeof user_id == 'undefined') {
                    alert('deve estar connectado para poder votar')
                    return
                }

                action = 'like'

                console.log(like.dataset.id + action + user_id)
                //post_id user_id action
                adlike(like.dataset.id, user_id, action)

                vote.style.display = 'block'
                vote.innerHTML = 'obrigado / thank you'

                setTimeout(() => {
                    getLocais()
                    vote.style.display = 'none'
                }, 2000);

            })
            ////// action like ////
            dislike.addEventListener('click', (e) => {
                if (typeof user_id == 'undefined') {
                    alert('deve estar connectado para poder votar')
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
                    getLocais()
                    vote.style.display = 'none'
                }, 2000);

            })


            //// END LIKES////

            //// delete tag ///
            if (typeof destroy != 'undefined') {
                deletetag.addEventListener('click', (e) => {


                    console.log(deletetag.dataset.id)
                    //delete tag
                    deleteTag(deletetag.dataset.id)

                    vote.style.display = 'block'
                    vote.innerHTML = 'tag removido com sucesso'
                    /// map.closePopup()

                    setTimeout(() => {
                        getLocais()
                        vote.style.display = 'none'
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
            fetch(baseurl + "/destroy/" + tag_id, requestOptions)
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



        /////////////////// PESQUISA  CIDADES///////////////
        const locations = [{
                name: 'Baleal',
                lat: '39.37328872711334',
                lng: '-9.338089240589285',
                hab: '27.753',

            }, {
                name: 'Caldas da rainha',
                lat: '39.40383605302325',
                lng: '-9.133737087249758',
                hab: '51.729'
            }, {
                name: 'Foz do arelho',
                lat: '39.43243509336661',
                lng: '-9.227501741383778',
                hab: '1.339'

            }, {
                name: 'São martinho do porto',
                lat: '39.50956201385417',
                lng: '-9.134005308151247',
                hab: '2.868',

            }, {
                name: 'Obidos',
                lat: '39.36073092757501',
                lng: '-9.157614081770232',
                hab: '11.772',

            }, {
                name: 'Nazaré',
                lat: '39.60093504721288',
                lng: '-9.070909023284914',
                hab: '14.173'

            },
            {
                name: 'Peniche',
                lat: '39.356043983908506',
                lng: '-9.380811452865602',
                hab: '14.173'

            },

        ]
        ///// VARS 
        let zoom = 16
        let cherche = document.getElementById('cherche')
        let r = document.getElementById('r')
        let listIntro = document.getElementById('listintro')
        infoslocal = document.getElementById('infoslocal')
        typeof zoomDevice !== 'undefined' ? zoom = zoomDevice : zoom
        let courantlocal
        const liItem = r.getElementsByTagName("li");




        //// CHERCHE VILE 
        cherche.addEventListener('focus', (e) => {
            localidades(locations)
            cherche.value = ''


        })

        cherche.addEventListener("keyup", (e) => {
            processResults(r)
        });

        cherche.addEventListener('focusout', (e) => {
            if (!cherche.contains(e.relatedTarget))
                setTimeout(function() {
                    r.innerHTML = ''
                    r.style.display = 'none'
                }, 500);


        });

        ///// DISPLAY VILES

        function localidades(locations) {

            locations.map((city, index) => {
                r.style.display = 'block'
                let li = document.createElement('li')
                let a = document.createElement('a')
                a.setAttribute('href', '#')
                a.innerHTML = city.name
                li.append(a)
                if (a.innerHTML == courantlocal) {
                    li.style.display = 'none'

                }
                r.appendChild(li)


                li.addEventListener('click', (e) => {
                    li.dataset.lat
                    cherche.value = city.name
                    r.innerHTML = ''
                    r.style.display = 'none'
                    map.setView([city.lat, city.lng], zoom);
                    courantlocal = city.name
                    cherche.value = courantlocal
                    displayInfos(city.name, city.hab, city.lat, city.lng)

                })


            })


        }

        ///// filtre resultats
        function processResults(r) {
            Array.from(liItem).forEach(element => {
                links = element.getElementsByTagName("a")[0];
                filterSearch = cherche.value.toUpperCase();

                if (links.innerHTML.toUpperCase().indexOf(filterSearch) > -1) {
                    element.style.display = "";
                } else {
                    element.style.display = "none";
                }
            })
        }

        ////Display infos


        function displayInfos(name, hab, lat, lng) {

            const booking =
                `<a target="_new" href="https://www.booking.com/searchresults.html?latitude=${lat};longitude=${lng};" class="booking-link"><img src="https://logo.clearbit.com/booking.com" width="30" height="30"></a>`
            const airbnb =
                `<a target="_new" href="https://www.airbnb.com/s/homes?ne_lat=${lat}&ne_lng=${lng}&sw_lat=${lat-0.0002}&sw_lng=${lng-0.0002}&zoom=12&search_by_map=true&search_type=unknown&screen_size=large&map_toggle=true" class="airbnb-link"><img src="https://logo.clearbit.com/airbnb.com" width="30" height="30"></a>`
            const google =
                `<a target="_new" href="https://www.google.com/maps/search/hotels/@${lat},${lng},16z" class="gmaps-link"><img src="https://logo.clearbit.com/google.com" width="30" height="30"></a>`
            // infoslocal.innerHTML = `${airbnb}  ${booking}  ${google}`
            courantlocal = name
            cherche.value = courantlocal





        }

        /////////////////load map e search ///////
        window.onload = getLocais(), displayInfos('Caldas da rainha', '14000', '39.4039', '-9.1336')

    </script>





</body>

</html>
