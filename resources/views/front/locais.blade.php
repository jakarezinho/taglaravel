<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hot maps mapa cololaborativo</title>
    <meta name="description"
        content="Mapa a tendência humorística de uma realidade séria a do relacionamento das localidades, bairros e territórios como os fenômenos como turismo e desenvolvimento urbanístico" />

    <!-- Open Graph Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hot map" />
    <meta property="og:description" content="mapa colaborativo adicionar suas próprias dicas e anotações" />
    <meta property="og:url" content="http://habitar.test/" />
    <meta property="og:site_name" content="Hot map" />
    <meta property="og:image" content="{{ url('template/images/intro.png') }}" />
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

    <!--load auto complete recherche--->
    <link rel="stylesheet" href="{{ asset('template/css/autocomplete.css') }}" />
    <script src="{{ asset('template/js/autocomplete.js') }}"></script>
    <!--css app-->
    <link rel="stylesheet" href="{{ asset('template/css/app.css') }}" />



</head>

<body>
    <!--//nav-->
    <div class="menu">
        <div id="open"></div>
    </div>
    <div id="dc" class="doc">
        <div class="container">
            <div class="header_list">
                <div class="list_imag_top">
                    <svg id="a8904fed-7223-4ff2-9071-b444910320a0" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1137 518.05664">
                        <title>best place</title>
                        <path
                            d="M175.76416,701.583l-1.95117-.43946c21.75586-96.751,76.43017-184.60937,153.95117-247.3916A444.114,444.114,0,0,1,1039.919,699.96289l-1.94922.44336C991.916,498.19727,814.69531,356.97168,607,356.97168,402.02637,356.97168,220.66553,501.90137,175.76416,701.583Z"
                            transform="translate(-31.5 -190.97168)" fill="#3f3d56" />
                        <circle cx="899.63335" cy="219.90276" r="54.31516" fill="#ff6584" />
                        <rect x="877" y="437.05664" width="2" height="79" fill="#3f3d56" />
                        <path
                            d="M928.95773,638.096c.12732,27.62433-19.30786,50.10833-19.30786,50.10833s-19.6416-22.3039-19.76892-49.92823,19.30786-50.10833,19.30786-50.10833S928.83041,610.47163,928.95773,638.096Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <path
                            d="M928.95773,638.096c.12732,27.62433-19.30786,50.10833-19.30786,50.10833s-19.6416-22.3039-19.76892-49.92823,19.30786-50.10833,19.30786-50.10833S928.83041,610.47163,928.95773,638.096Z"
                            transform="translate(-31.5 -190.97168)" opacity="0.1" />
                        <circle cx="501.02166" cy="248.742" r="31.2479" fill="#dc9044" opacity="0.4" />
                        <circle cx="443.18972" cy="263.66637" r="21.92017" fill="#dc9044" opacity="0.4" />
                        <circle cx="208.18972" cy="326.66637" r="21.92017" fill="#dc9044" opacity="0.4" />
                        <circle cx="856.31222" cy="246.17134" r="31.2479" fill="#dc9044" opacity="0.4" />
                        <path
                            d="M88.13058,698.24412c1.694,6.26184,7.4961,10.14,7.4961,10.14s3.05572-6.27434,1.36177-12.53618-7.49609-10.14-7.49609-10.14S86.43664,691.98227,88.13058,698.24412Z"
                            transform="translate(-31.5 -190.97168)" fill="#3f3d56" />
                        <path
                            d="M90.61972,696.89838c4.64821,4.52485,5.216,11.4806,5.216,11.4806s-6.9685-.38049-11.61672-4.90534-5.216-11.48059-5.216-11.48059S85.9715,692.37353,90.61972,696.89838Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <path
                            d="M700.13058,698.24412c1.69395,6.26184,7.4961,10.14,7.4961,10.14s3.05572-6.27434,1.36177-12.53618-7.49609-10.14-7.49609-10.14S698.43664,691.98227,700.13058,698.24412Z"
                            transform="translate(-31.5 -190.97168)" fill="#3f3d56" />
                        <path
                            d="M702.61972,696.89838c4.64821,4.52485,5.216,11.4806,5.216,11.4806s-6.9685-.38049-11.61672-4.90534-5.216-11.48059-5.216-11.48059S697.9715,692.37353,702.61972,696.89838Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <polygon
                            points="68.137 460.203 64 453.308 102.614 420.21 201.908 420.21 201.908 429.863 166.052 468.478 124.679 476.752 68.137 460.203"
                            fill="#3f3d56" />
                        <polygon
                            points="219 439.633 219 418.056 206 418.056 206 424.86 201.908 420.21 168.81 453.308 163.293 458.824 156.398 486.406 168.81 516.745 232.247 516.745 232.247 454.687 219 439.633"
                            fill="#ccc" />
                        <rect x="64" y="453.30771" width="104.80978" height="63.4375" fill="#f2f2f2" />
                        <rect x="132.26427" y="473.30431" width="22.06522" height="19.30707" fill="#3f3d56" />
                        <rect x="103.99321" y="472.61477" width="19.30707" height="44.13043" fill="#ccc" />
                        <polygon
                            points="81.928 479.51 81.928 472.615 73.654 472.615 73.654 479.51 81.238 479.51 81.928 479.51"
                            fill="#3f3d56" />
                        <polygon
                            points="81.238 485.026 73.654 485.026 73.654 491.922 81.928 491.922 81.928 485.026 81.238 485.026"
                            fill="#3f3d56" />
                        <rect x="87.44429" y="472.61477" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="87.44429" y="485.02646" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="198.46 480.2 198.46 473.304 190.185 473.304 190.185 480.2 197.77 480.2 198.46 480.2"
                            fill="#3f3d56" />
                        <polygon
                            points="197.77 485.716 190.185 485.716 190.185 492.611 198.46 492.611 198.46 485.716 197.77 485.716"
                            fill="#3f3d56" />
                        <rect x="203.97622" y="473.30431" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="203.97622" y="485.716" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="467.137 460.203 463 453.308 501.614 420.21 600.908 420.21 600.908 429.863 565.052 468.478 523.679 476.752 467.137 460.203"
                            fill="#3f3d56" />
                        <polygon
                            points="618 439.633 618 418.056 605 418.056 605 424.86 600.908 420.21 567.81 453.308 562.293 458.824 555.398 486.406 567.81 516.745 631.247 516.745 631.247 454.687 618 439.633"
                            fill="#ccc" />
                        <rect x="463" y="453.30771" width="104.80978" height="63.4375" fill="#f2f2f2" />
                        <rect x="531.26427" y="473.30431" width="22.06522" height="19.30707" fill="#3f3d56" />
                        <rect x="502.99321" y="472.61477" width="19.30707" height="44.13043" fill="#ccc" />
                        <polygon
                            points="480.928 479.51 480.928 472.615 472.654 472.615 472.654 479.51 480.238 479.51 480.928 479.51"
                            fill="#3f3d56" />
                        <polygon
                            points="480.238 485.026 472.654 485.026 472.654 491.922 480.928 491.922 480.928 485.026 480.238 485.026"
                            fill="#3f3d56" />
                        <rect x="486.44429" y="472.61477" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="486.44429" y="485.02646" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="597.46 480.2 597.46 473.304 589.185 473.304 589.185 480.2 596.77 480.2 597.46 480.2"
                            fill="#3f3d56" />
                        <polygon
                            points="596.77 485.716 589.185 485.716 589.185 492.611 597.46 492.611 597.46 485.716 596.77 485.716"
                            fill="#3f3d56" />
                        <rect x="602.97622" y="473.30431" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="602.97622" y="485.716" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="280.515 344.361 273.62 338.844 312.234 304.367 410.148 304.367 410.148 334.707 346.711 377.459 280.515 344.361"
                            fill="#3f3d56" />
                        <polygon
                            points="428 323.707 428 305.056 415 305.056 415 309.624 410.148 304.367 378.429 338.844 366.018 347.119 346.773 487.722 375.796 516.745 443.246 516.745 443.246 340.223 428 323.707"
                            fill="#ccc" />
                        <rect x="273.61957" y="338.84439" width="104.80978" height="177.90082" fill="#f2f2f2" />
                        <rect x="314.30231" y="473.30431" width="19.30707" height="43.4409" fill="#ccc" />
                        <polygon
                            points="293.616 485.716 293.616 478.821 285.342 478.821 285.342 485.716 292.927 485.716 293.616 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="292.927 491.232 285.342 491.232 285.342 498.128 293.616 498.128 293.616 491.232 292.927 491.232"
                            fill="#3f3d56" />
                        <rect x="299.13247" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="299.13247" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="350.158 485.716 350.158 478.821 341.884 478.821 341.884 485.716 349.469 485.716 350.158 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="349.469 491.232 341.884 491.232 341.884 498.128 350.158 498.128 350.158 491.232 349.469 491.232"
                            fill="#3f3d56" />
                        <rect x="355.67459" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="355.67459" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="408.079 347.808 408.079 340.913 399.805 340.913 399.805 347.808 407.39 347.808 408.079 347.808"
                            fill="#3f3d56" />
                        <polygon
                            points="407.39 353.325 399.805 353.325 399.805 360.22 408.079 360.22 408.079 353.325 407.39 353.325"
                            fill="#3f3d56" />
                        <rect x="413.59579" y="340.91301" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="413.59579" y="353.32469" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="408.079 386.423 408.079 379.527 399.805 379.527 399.805 386.423 407.39 386.423 408.079 386.423"
                            fill="#3f3d56" />
                        <polygon
                            points="407.39 391.939 399.805 391.939 399.805 398.834 408.079 398.834 408.079 391.939 407.39 391.939"
                            fill="#3f3d56" />
                        <rect x="413.59579" y="379.52714" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="413.59579" y="391.93882" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="408.079 425.037 408.079 418.141 399.805 418.141 399.805 425.037 407.39 425.037 408.079 425.037"
                            fill="#3f3d56" />
                        <polygon
                            points="407.39 430.553 399.805 430.553 399.805 437.448 408.079 437.448 408.079 430.553 407.39 430.553"
                            fill="#3f3d56" />
                        <rect x="413.59579" y="418.14127" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="413.59579" y="430.55295" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="408.079 463.651 408.079 456.755 399.805 456.755 399.805 463.651 407.39 463.651 408.079 463.651"
                            fill="#3f3d56" />
                        <polygon
                            points="407.39 469.167 399.805 469.167 399.805 476.062 408.079 476.062 408.079 469.167 407.39 469.167"
                            fill="#3f3d56" />
                        <rect x="413.59579" y="456.7554" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="413.59579" y="469.16708" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="285.34171" y="347.80839" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="285.34171" y="380.90621" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="285.34171" y="414.00404" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="285.34171" y="447.10187" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <polygon
                            points="683.515 344.361 676.62 338.844 715.234 304.367 813.148 304.367 813.148 334.707 749.711 377.459 683.515 344.361"
                            fill="#3f3d56" />
                        <polygon
                            points="831 323.707 831 305.056 818 305.056 818 309.624 813.148 304.367 781.429 338.844 769.018 347.119 749.773 487.722 778.796 516.745 846.246 516.745 846.246 340.223 831 323.707"
                            fill="#ccc" />
                        <rect x="676.61957" y="338.84439" width="104.80978" height="177.90082" fill="#f2f2f2" />
                        <rect x="717.30231" y="473.30431" width="19.30707" height="43.4409" fill="#ccc" />
                        <polygon
                            points="696.616 485.716 696.616 478.821 688.342 478.821 688.342 485.716 695.927 485.716 696.616 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="695.927 491.232 688.342 491.232 688.342 498.128 696.616 498.128 696.616 491.232 695.927 491.232"
                            fill="#3f3d56" />
                        <rect x="702.13247" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="702.13247" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="753.158 485.716 753.158 478.821 744.884 478.821 744.884 485.716 752.469 485.716 753.158 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="752.469 491.232 744.884 491.232 744.884 498.128 753.158 498.128 753.158 491.232 752.469 491.232"
                            fill="#3f3d56" />
                        <rect x="758.67459" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="758.67459" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="811.079 347.808 811.079 340.913 802.805 340.913 802.805 347.808 810.39 347.808 811.079 347.808"
                            fill="#3f3d56" />
                        <polygon
                            points="810.39 353.325 802.805 353.325 802.805 360.22 811.079 360.22 811.079 353.325 810.39 353.325"
                            fill="#3f3d56" />
                        <rect x="816.59579" y="340.91301" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="816.59579" y="353.32469" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="811.079 386.423 811.079 379.527 802.805 379.527 802.805 386.423 810.39 386.423 811.079 386.423"
                            fill="#3f3d56" />
                        <polygon
                            points="810.39 391.939 802.805 391.939 802.805 398.834 811.079 398.834 811.079 391.939 810.39 391.939"
                            fill="#3f3d56" />
                        <rect x="816.59579" y="379.52714" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="816.59579" y="391.93882" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="811.079 425.037 811.079 418.141 802.805 418.141 802.805 425.037 810.39 425.037 811.079 425.037"
                            fill="#3f3d56" />
                        <polygon
                            points="810.39 430.553 802.805 430.553 802.805 437.448 811.079 437.448 811.079 430.553 810.39 430.553"
                            fill="#3f3d56" />
                        <rect x="816.59579" y="418.14127" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="816.59579" y="430.55295" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="811.079 463.651 811.079 456.755 802.805 456.755 802.805 463.651 810.39 463.651 811.079 463.651"
                            fill="#3f3d56" />
                        <polygon
                            points="810.39 469.167 802.805 469.167 802.805 476.062 811.079 476.062 811.079 469.167 810.39 469.167"
                            fill="#3f3d56" />
                        <rect x="816.59579" y="456.7554" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="816.59579" y="469.16708" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="688.34171" y="347.80839" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="688.34171" y="380.90621" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="688.34171" y="414.00404" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="688.34171" y="447.10187" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <polygon
                            points="904.515 344.361 897.62 338.844 936.234 304.367 1034.148 304.367 1034.148 334.707 970.711 377.459 904.515 344.361"
                            fill="#3f3d56" />
                        <polygon
                            points="1052 323.707 1052 305.056 1039 305.056 1039 309.624 1034.148 304.367 1002.429 338.844 990.018 347.119 970.773 487.722 999.796 516.745 1067.246 516.745 1067.246 340.223 1052 323.707"
                            fill="#ccc" />
                        <rect x="897.61957" y="338.84439" width="104.80978" height="177.90082" fill="#f2f2f2" />
                        <rect x="938.30231" y="473.30431" width="19.30707" height="43.4409" fill="#ccc" />
                        <polygon
                            points="917.616 485.716 917.616 478.821 909.342 478.821 909.342 485.716 916.927 485.716 917.616 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="916.927 491.232 909.342 491.232 909.342 498.128 917.616 498.128 917.616 491.232 916.927 491.232"
                            fill="#3f3d56" />
                        <rect x="923.13247" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="923.13247" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="974.158 485.716 974.158 478.821 965.884 478.821 965.884 485.716 973.469 485.716 974.158 485.716"
                            fill="#3f3d56" />
                        <polygon
                            points="973.469 491.232 965.884 491.232 965.884 498.128 974.158 498.128 974.158 491.232 973.469 491.232"
                            fill="#3f3d56" />
                        <rect x="979.67459" y="478.82062" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="979.67459" y="491.2323" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="1032.079 347.808 1032.079 340.913 1023.805 340.913 1023.805 347.808 1031.39 347.808 1032.079 347.808"
                            fill="#3f3d56" />
                        <polygon
                            points="1031.39 353.325 1023.805 353.325 1023.805 360.22 1032.079 360.22 1032.079 353.325 1031.39 353.325"
                            fill="#3f3d56" />
                        <rect x="1037.59579" y="340.91301" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="1037.59579" y="353.32469" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="1032.079 386.423 1032.079 379.527 1023.805 379.527 1023.805 386.423 1031.39 386.423 1032.079 386.423"
                            fill="#3f3d56" />
                        <polygon
                            points="1031.39 391.939 1023.805 391.939 1023.805 398.834 1032.079 398.834 1032.079 391.939 1031.39 391.939"
                            fill="#3f3d56" />
                        <rect x="1037.59579" y="379.52714" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="1037.59579" y="391.93882" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="1032.079 425.037 1032.079 418.141 1023.805 418.141 1023.805 425.037 1031.39 425.037 1032.079 425.037"
                            fill="#3f3d56" />
                        <polygon
                            points="1031.39 430.553 1023.805 430.553 1023.805 437.448 1032.079 437.448 1032.079 430.553 1031.39 430.553"
                            fill="#3f3d56" />
                        <rect x="1037.59579" y="418.14127" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="1037.59579" y="430.55295" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <polygon
                            points="1032.079 463.651 1032.079 456.755 1023.805 456.755 1023.805 463.651 1031.39 463.651 1032.079 463.651"
                            fill="#3f3d56" />
                        <polygon
                            points="1031.39 469.167 1023.805 469.167 1023.805 476.062 1032.079 476.062 1032.079 469.167 1031.39 469.167"
                            fill="#3f3d56" />
                        <rect x="1037.59579" y="456.7554" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="1037.59579" y="469.16708" width="8.27446" height="6.89538" fill="#3f3d56" />
                        <rect x="909.34171" y="347.80839" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="909.34171" y="380.90621" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="909.34171" y="414.00404" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect x="909.34171" y="447.10187" width="79.98641" height="16.54891" fill="#3f3d56" />
                        <rect y="516.05664" width="1137" height="2" fill="#3f3d56" />
                        <rect x="252" y="437.05664" width="2" height="79" fill="#3f3d56" />
                        <path
                            d="M303.95773,638.096c.12732,27.62433-19.30786,50.10833-19.30786,50.10833s-19.6416-22.3039-19.76892-49.92823,19.30786-50.10833,19.30786-50.10833S303.83041,610.47163,303.95773,638.096Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <rect x="452" y="437.05664" width="2" height="79" fill="#3f3d56" />
                        <path
                            d="M503.95773,638.096c.12732,27.62433-19.30786,50.10833-19.30786,50.10833s-19.6416-22.3039-19.76892-49.92823,19.30786-50.10833,19.30786-50.10833S503.83041,610.47163,503.95773,638.096Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <rect x="851" y="437.05664" width="2" height="79" fill="#3f3d56" />
                        <path
                            d="M902.95773,638.096c.12732,27.62433-19.30786,50.10833-19.30786,50.10833s-19.6416-22.3039-19.76892-49.92823,19.30786-50.10833,19.30786-50.10833S902.83041,610.47163,902.95773,638.096Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <ellipse cx="587.5" cy="163.5" rx="38" ry="8.55" fill="#dc9044" />
                        <path d="M662,234.97168c0,24.30053-44,93-44,93s-44-68.69947-44-93a44,44,0,0,1,88,0Z"
                            transform="translate(-31.5 -190.97168)" fill="#dc9044" />
                        <circle cx="586.5" cy="44" r="25" fill="#f2f2f2" />
                    </svg>
                </div>


            </div>
            <!--/INTRO-->
            <div class="homeintro center">

                @auth
                    <p><strong> Hello {{ Auth::user()->name }} </strong> <small>tags({{ Auth::user()->locais->count() }})</small>  Adicionar anotações ao mapa preferir
                        humor
                        aos insultos... </p>


                @else
                    <p> Para escrever no mapa deve estar conectado <span> <a href="{{ route('login') }}"
                                class="">Login</a></span> <br>

                        @if (Route::has('register'))
                            <small> Não tem conta ? <a href="{{ route('register') }}" class="">Register</a>
                            </small>
                    </p>


                    @endif

                @endauth

            </div>
            <div class="introlist">
                <h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f4cc.png" height="30px" width="30px"> Neste
                    local <span class="beta"> ( 5km a volta) </span></h2>
                <p class="center" id="loading"></p>

                <ul id="intro"></ul>
            </div>
            <hr>
            <p class="love">Hot map mapa colaborativo - 2021</p>
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
    <div class="search">
        <input type="text" autocomplete="off" id="search" class="full-width" placeholder="Procurar">
        <span class="material-icons-two-tone"> search</span>
    </div>

    <div id="vote"> vote</div>
    <div class="main-container">
        <div class="tag-text-box"> <input type="text" minlength="3" maxlength="40" id="tag" placeholder="tag"
                required /> <button id="envia" class="env"> enviar</button>

            <input type="hidden" id="emoji">
            <span class=" icon material-icons-outlined">emoji_emotions</span>

            <div class="display"></div>
            <span class="x">X</span>
        </div>
        <div id="escreve" class="enable escreve"><img src="{{ url('template/images/escreve.png') }}"
                alt="escrever no mapa"></div>
        <div id="stop" class="enable stop"> <img src="{{ url('template/images/stop.png') }}" alt="escrever no mapa">
        </div>
        <div id="map"></div>

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
            badlist
        } from "{{ asset('template/js/helpers.js') }}";


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
        let init = document.querySelector('.map')
        let geral
        let detail
        let active
        let size
        let latlng
        let rot = Math.random() * (20 - -20) + -20;
        let action
        const baseurl = '{{ url('/') }}'

        ///VARS INTRO 
        let intro = document.getElementById('intro')
        let loading = document.getElementById('loading')


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




        /////MENO OPEN///
        let open = document.querySelector('#open')
        let dcm = document.querySelector('#dc')

        open.innerHTML = '<span class="material-icons-two-tone">help_outline </span>'
        open.addEventListener("click", () => {

            open.innerHTML = '<span class="material-icons-two-tone">close</span>'
            if (dcm.classList.contains('dep')) {

                open.innerHTML = '<span class="material-icons-two-tone">help_outline</span>'

            } else {
                getLocaisdislike()

                open.innerHTML = '<span class="material-icons-two-tone">close</span>'


            }

            dc.classList.toggle("dep")

        })


        //// Geo code/////
        let gcs = L.esri.Geocoding.geocodeService();
        let buildingLayers = L.layerGroup().addTo(map);
        let buildingLayersDeslike = L.layerGroup().addTo(map);

        let thisLayer = L.popup({})
        var bounds = L.latLngBounds()


        ////////////// drag mamp load tags //////
        ////// MAP DRAGED///////////
        map.on("dragend", () => {

            tagbox.style.display = 'none'
            let pos = map.getCenter()
            buildingLayers.clearLayers()

            getLocais(pos.lat, pos.lng)

        });



        ///////////////////// GET LOCAIS TAGS  //////////////////
        function getLocais(lat, lng, distance = 5) {
            //// clear list intro
            intro.innerHTML = ''
            ////////////////////
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
                            `<img class="imogim" src="${post.emoji}" width="${size*1.5}" height="${size*1.5}">` :
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
                                ${novo}<span class="tag" style="font-size:${size}px; transform: rotate(20deg);">
                                ${post.title}</span><br>${iconEmoji} <br> By: ${post.name}</div>`,
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
                    gcs.reverse().latlng(e.latlng).run((err, res) => {
                        if (err) return;
                        //Match_addr LongLabel ShortLabel:
                        adress.value = res.address.LongLabel

                    })
                    tagbox.style.display = 'block'

                    let posbox = e.containerPoint.x + 240 > document.documentElement
                        .clientWidth ?
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
                let x = tag.value

                if (x.length <= 3 ) {
                    alert('texto curto..')
                    return

                }else if (x.length > 40){
                    alert('texto longo...')
                    return

                }

                if (badWord(x)) {
                    console.log(badWord(tag.value))
                    alert('BAD WORD!!')
                    tag.value = ''
                    return
                }


                 enviaLocal()
                escreve.classList.remove("active")
                tag.value = ''
                tagbox.style.display = 'none'

            })

            ////envia key up///
            /* tag.addEventListener("keyup", ({
                 key
             }) => {
                 if (key === "Enter") {
                     if (tag.value.length = 0) {
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
             */


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
                    console.log(map.getCenter().lat);
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
                        id: customId
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
