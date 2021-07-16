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
            <div class="header">
                <div class="disclamer">
                    <svg id="ROAD" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 1400">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                }

                                .cls-2 {
                                    fill: #262424;
                                }

                                .cls-3 {
                                    fill: #86bec0;
                                }

                                .cls-4 {
                                    fill: #dc9044;
                                }

                            </style>
                        </defs>
                        <title>Roadmapping</title>
                        <path class="cls-1"
                            d="M328.67,1078.21H735.23a60.36,60.36,0,0,0,43-18h0a60.36,60.36,0,0,0,14.44-61L775,944.6a178.86,178.86,0,0,1,44.22-182.08h0a178.86,178.86,0,0,1,126-51.86h270.39L1011,752.8a120.53,120.53,0,0,0-64.85,40.91h0a120.53,120.53,0,0,0-18.88,120l61.87,158.39a156.07,156.07,0,0,1-30.3,162.22h0A156.07,156.07,0,0,1,843.76,1285H328.67V1078.21Z" />
                        <path class="cls-2"
                            d="M843.76,1287.69H328.67a2.69,2.69,0,0,1,0-5.39H843.76a153.37,153.37,0,0,0,142.86-209.18L924.74,914.74a123.22,123.22,0,0,1,85.6-164.55l178.76-36.84h-244A176.17,176.17,0,0,0,777.52,943.77l17.7,54.67a63.05,63.05,0,0,1-60,82.47H328.67a2.69,2.69,0,0,1,0-5.39H735.23a57.66,57.66,0,0,0,54.86-75.42l-17.7-54.67A181.56,181.56,0,0,1,945.13,708h270.39a2.69,2.69,0,0,1,.54,5.33l-204.54,42.15a117.83,117.83,0,0,0-81.77,157.33l61.87,158.39A158.76,158.76,0,0,1,843.76,1287.69Z" />
                        <path class="cls-3"
                            d="M1140.5,754.83a83.41,83.41,0,0,0-81.64,100.31c0.26,1.62,12.55,74.17,81.63,121.67a199.69,199.69,0,0,0,66.64-78c11.74-24.28,14.88-42.82,15-43.63A83.41,83.41,0,0,0,1140.5,754.83Zm0,133.94a50.57,50.57,0,1,1,50.57-50.57A50.57,50.57,0,0,1,1140.49,888.77Z" />
                        <circle class="cls-3" cx="1140.5" cy="838.2" r="34" />
                        <path class="cls-4"
                            d="M1243.54,438.72A90.43,90.43,0,0,0,1155,547.46c0.28,1.76,13.61,80.41,88.5,131.91a216.49,216.49,0,0,0,72.24-84.6c12.73-26.33,16.13-46.42,16.27-47.31A90.43,90.43,0,0,0,1243.54,438.72Zm0,145.2a54.82,54.82,0,1,1,54.83-54.83A54.83,54.83,0,0,1,1243.53,583.92Z" />
                        <circle class="cls-4" cx="1243.53" cy="529.1" r="36.86" />
                        <path class="cls-3"
                            d="M857.1,494a69.66,69.66,0,0,0-68.19,83.78c0.22,1.35,10.48,61.94,68.18,101.62a166.78,166.78,0,0,0,55.65-65.17c9.8-20.28,12.43-35.76,12.54-36.44A69.66,69.66,0,0,0,857.1,494Zm0,111.86a42.23,42.23,0,1,1,42.24-42.24A42.24,42.24,0,0,1,857.09,605.84Z" />
                        <circle class="cls-3" cx="857.09" cy="563.6" r="28.4" />
                        <polygon class="cls-1"
                            points="651.44 1056.49 657.5 1106.39 691.82 1106.39 691.82 1053.32 651.44 1056.49" />
                        <path class="cls-2"
                            d="M691.82,1109.08H657.49a2.69,2.69,0,0,1-2.67-2.37l-6.06-49.9a2.69,2.69,0,0,1,2.46-3l40.38-3.17a2.69,2.69,0,0,1,2.9,2.69v53.07A2.69,2.69,0,0,1,691.82,1109.08Zm-31.94-5.39h29.24v-47.46L654.45,1059Z" />
                        <path class="cls-3"
                            d="M706.83,860.21c-0.2,4.46-.45,9.29-0.72,14.39-3,57.7-9.26,150.35-9.26,150.35h-63L617.73,844.27S506.47,675.09,500,650.84c-4.54-17-2.7-64.22-1.22-90.92,1-18.49,9.44-36,23.79-47.7,8.87-7.24,20.26-12.84,34-12.24,36.64,1.62,54.77,43.64,54.77,43.64S675.6,734.88,699,804.71c0.28,0.82.55,1.63,0.81,2.41,4.44,13.21,7.23,21.54,7.59,22.6C708,831.26,707.63,843.07,706.83,860.21Z" />
                        <path class="cls-1"
                            d="M706.83,860.21c-0.2,4.46-.45,9.29-0.72,14.39-10.38-6-18.08-17.7-19.55-31.79-1.49-14.44,3.94-27.77,13.3-35.68,4.44,13.21,7.23,21.54,7.59,22.6C708,831.26,707.63,843.07,706.83,860.21Z" />
                        <path class="cls-1"
                            d="M517.07,582h38.61a5.75,5.75,0,0,1,5.75,5.75v33.33a8.49,8.49,0,0,1-4.85,7.67l-16.9,8a8.49,8.49,0,0,1-7.59-.16L515.85,628a8.49,8.49,0,0,1-4.53-7.51V587.73A5.75,5.75,0,0,1,517.07,582Z" />
                        <path class="cls-2"
                            d="M671.63,1022.61a2.69,2.69,0,0,1-2.69-2.69V835.19l-93.4-192a2.69,2.69,0,1,1,4.84-2.36L674,833.39a2.69,2.69,0,0,1,.27,1.18v185.34A2.69,2.69,0,0,1,671.63,1022.61Z" />
                        <path class="cls-4"
                            d="M695.73,1066.52H633.48a5.47,5.47,0,0,1-5.44-5L624.22,1021a5.47,5.47,0,0,1,5.44-6h69.89a5.47,5.47,0,0,1,5.44,6l-3.82,40.52A5.47,5.47,0,0,1,695.73,1066.52Z" />
                        <path class="cls-3"
                            d="M782.33,1195.56H644.67s-1-6.31-1.63-17.78a430.85,430.85,0,0,1,3.51-79.37h56s14,36.27,36.1,50.28c17.72,11.23,37.15,10.52,42.5,29.09C782.52,1182.37,783,1188.14,782.33,1195.56Z" />
                        <path class="cls-1"
                            d="M782.33,1195.56H644.67s-1-6.31-1.63-17.78H781.19C782.52,1182.37,783,1188.14,782.33,1195.56Z" />
                        <path class="cls-2"
                            d="M782.33,1198.25H644.67A2.69,2.69,0,0,1,642,1196c0-.26-1-6.58-1.65-18a2.69,2.69,0,0,1,2.69-2.85H781.19a2.69,2.69,0,0,1,2.59,1.95c1.48,5.11,1.88,11.25,1.24,18.76A2.69,2.69,0,0,1,782.33,1198.25ZM647,1192.87H779.82a47,47,0,0,0-.73-12.39H645.91C646.29,1186.27,646.74,1190.48,647,1192.87Z" />
                        <path class="cls-3"
                            d="M722.53,559.9s-3.23,97-15.09,141.16c-8.36,31.16-45.41,136.32-66.51,195.58-8.81,24.74-14.85,41.49-14.85,41.49L614.9,955.24,545.81,1061l-52.8-36.1,46.34-111L582.44,672s-30.71-88.9,18.86-146.55S719.83,476.38,722.53,559.9Z" />
                        <path class="cls-1"
                            d="M640.93,896.64c-8.81,24.74-14.85,41.49-14.85,41.49L614.9,955.24c-7.66-8.1-10.08-21.92-5.16-35.2C615.3,905,628.42,895.58,640.93,896.64Z" />
                        <path class="cls-2"
                            d="M632.11,924a2.7,2.7,0,0,1-2.54-3.6C641,888.61,662.72,827.52,680.34,776a2.69,2.69,0,0,1,5.1,1.74C667.8,829.3,646,890.41,634.65,922.25A2.69,2.69,0,0,1,632.11,924Z" />
                        <path class="cls-2"
                            d="M568.29,754.11a2.73,2.73,0,0,1-.48,0,2.69,2.69,0,0,1-2.18-3.12l14-78.77a210.45,210.45,0,0,1-9.08-51.72c-2-39.21,7.94-72.68,28.67-96.79a2.69,2.69,0,1,1,4.08,3.51c-25,29.07-28.68,66.54-27.38,92.86a206.18,206.18,0,0,0,9,51.06,2.69,2.69,0,0,1,.11,1.35l-14.16,79.45A2.7,2.7,0,0,1,568.29,754.11Z" />
                        <path class="cls-1"
                            d="M600,582h38.61a5.75,5.75,0,0,1,5.75,5.75v33.33a8.49,8.49,0,0,1-4.85,7.67l-16.9,8a8.49,8.49,0,0,1-7.59-.16L598.82,628a8.49,8.49,0,0,1-4.53-7.51V587.73A5.75,5.75,0,0,1,600,582Z" />
                        <path class="cls-2"
                            d="M685.15,617.56H684.2a2.69,2.69,0,0,1,.15-5.39c6.21,0.17,11.38-1.66,15.34-5.43,8.76-8.34,9.19-23.4,9.19-23.55a2.69,2.69,0,0,1,2.69-2.63h0.06a2.69,2.69,0,0,1,2.63,2.75c0,0.71-.5,17.47-10.87,27.33C698.57,615.23,692.43,617.56,685.15,617.56Z" />
                        <path class="cls-2"
                            d="M533.41,1045a2.69,2.69,0,0,1-2.34-4c0.66-1.16,66.14-116.47,71.8-127.09,5.48-10.27,51.85-157.95,63.68-212,11.33-51.71,20-122.25,20.07-123a2.69,2.69,0,0,1,5.35.65c-0.09.71-8.77,71.49-20.16,123.45C660.73,753.68,614,904.39,607.63,916.4c-5.7,10.69-69.17,122.46-71.87,127.22A2.69,2.69,0,0,1,533.41,1045Z" />
                        <path class="cls-4"
                            d="M498.13,1002c14.72-.6,55.92,1.4,68.13,40.85a8.19,8.19,0,0,1-1.2,7.3l-28.65,38.77a8.09,8.09,0,0,1-7.4,3.24c-11.85-1.32-42.87-7.08-56.61-31.65a8.16,8.16,0,0,1-.44-7.07l19-46.42A8.11,8.11,0,0,1,498.13,1002Z" />
                        <path class="cls-1"
                            d="M486,1055.48l-19.76,46.7,28.38,18.32L524.79,1077S512.22,1047.1,486,1055.48Z" />
                        <path class="cls-2"
                            d="M494.62,1123.18a2.68,2.68,0,0,1-1.46-.43l-28.38-18.32a2.69,2.69,0,0,1-1-3.31l19.76-46.7a2.69,2.69,0,0,1,1.66-1.52c28.24-9,42,22.75,42.1,23.08a2.69,2.69,0,0,1-.27,2.58L496.83,1122A2.69,2.69,0,0,1,494.62,1123.18Zm-25-22,24.29,15.68,27.81-40.06c-2.63-5.36-13.64-24.62-33.71-19.06Z" />
                        <path class="cls-3"
                            d="M560.4,1243.13c-0.25,6.37-.6,11.84-0.6,11.84H465.24s-50.65-90-50.65-97.52c0-3,6.29-13.53,13.89-25.18,11.59-17.77,26.25-38.12,26.25-38.12s44.45-21,57.38,29.63l9.16,75.16s36.64,22.63,38.52,24.78C560.87,1224.94,560.73,1234.81,560.4,1243.13Z" />
                        <path class="cls-1"
                            d="M560.4,1243.13c-0.25,6.37-.6,11.84-0.6,11.84H465.24s-50.65-90-50.65-97.52c0-3,6.29-13.53,13.89-25.18,6.42-1.53,13.19-1.4,19.51,2,21.75,11.75,39.58,52.25,64.7,101l4.72,7.8h43Z" />
                        <path class="cls-2"
                            d="M559.8,1257.66H465.24a2.69,2.69,0,0,1-2.35-1.37c-12-21.25-51-91.19-51-98.84,0-1.52,0-4.69,14.33-26.66a2.69,2.69,0,0,1,1.63-1.15c7.93-1.89,15.14-1.13,21.42,2.27,19.37,10.46,35.28,41.92,55.42,81.75,3.33,6.58,6.77,13.38,10.35,20.35l3.89,6.42H560.4a2.7,2.7,0,0,1,2.69,2.8c-0.25,6.33-.6,11.86-0.61,11.91A2.69,2.69,0,0,1,559.8,1257.66Zm-93-5.39h90.45c0.09-1.62.22-3.9,0.33-6.45H517.42a2.69,2.69,0,0,1-2.31-1.3l-4.72-7.8-0.09-.16q-5.42-10.52-10.41-20.46c-19.72-39-35.29-69.79-53.17-79.44-4.81-2.6-10.39-3.27-16.58-2-11.73,18.07-12.81,22-12.85,22.81C417.78,1163.22,447.6,1218.08,466.82,1252.27Z" />
                        <path class="cls-1"
                            d="M508.17,1255H465.24s-50.65-90-50.65-97.52c0,0,5.39-15.36,21.28-11.31s25.86,24.25,40.68,51.45C487.78,1218.21,502,1243.79,508.17,1255Z" />
                        <path class="cls-2"
                            d="M508.17,1257.66H465.24a2.7,2.7,0,0,1-2.35-1.37c-12-21.25-51-91.19-51-98.84a2.69,2.69,0,0,1,.15-0.89c2.15-6.12,10-16.71,24.49-13,16,4.06,25.83,22.25,39.47,47.42l2.91,5.36c11.37,20.88,25.89,47.07,31.61,57.36A2.69,2.69,0,0,1,508.17,1257.66Zm-41.36-5.39H503.6c-6.7-12.07-19.3-34.83-29.41-53.4l-2.91-5.37c-13-24-22.37-41.28-36.06-44.76-12-3-16.84,6.62-17.87,9.07C418.86,1165.21,447.95,1218.7,466.82,1252.27Z" />
                        <path class="cls-1"
                            d="M418.47,326.67s20.11,89.44,30.89,110.27,48.49,19,70.76-15.09l-38.43-36.64-40.95-71.48Z" />
                        <path class="cls-2"
                            d="M474.13,453.19q-1,0-1.91,0c-11.43-.58-20.63-6-25.25-15-10.81-20.9-30.3-107.25-31.13-110.92a2.69,2.69,0,0,1,1.28-2.92l22.27-12.93a2.69,2.69,0,0,1,3.69,1l40.75,71.14L522,419.91a2.69,2.69,0,0,1,.4,3.42C508,445.41,488.38,453.19,474.13,453.19ZM421.54,328c3,13.12,20.59,89.09,30.22,107.7,3.72,7.18,11.27,11.58,20.73,12.06,12.49,0.64,30.45-5.8,44.13-25.52l-36.79-35.07a2.68,2.68,0,0,1-.48-0.61l-39.6-69.13Z" />
                        <polygon class="cls-3"
                            points="553.64 331.4 520.37 358.79 477.5 344.26 445.63 376.4 403.63 366.75 376.41 400.15 331.52 394.34 266.08 208.04 319.18 214.9 351.39 175.39 401.06 186.81 438.77 148.8 489.47 165.98 528.83 133.58 553.64 331.4" />
                        <path class="cls-1"
                            d="M370.29,383a2.69,2.69,0,0,1-2.57-1.9l-45-145.63a2.69,2.69,0,1,1,5.15-1.59l45,145.63A2.7,2.7,0,0,1,370.29,383Z" />
                        <path class="cls-1"
                            d="M398.66,351.24a2.69,2.69,0,0,1-2.6-2L353.76,194.3a2.69,2.69,0,1,1,5.2-1.42l42.31,154.95A2.7,2.7,0,0,1,398.66,351.24Z" />
                        <path class="cls-1"
                            d="M441.72,362.48a2.69,2.69,0,0,1-2.62-2.08L402.35,204a2.69,2.69,0,1,1,5.25-1.23l36.75,156.36A2.7,2.7,0,0,1,441.72,362.48Z" />
                        <path class="cls-1"
                            d="M473.57,327.12a2.7,2.7,0,0,1-2.64-2.17L440.06,169.16a2.69,2.69,0,1,1,5.29-1L476.21,323.9A2.7,2.7,0,0,1,473.57,327.12Z" />
                        <path class="cls-1"
                            d="M516.84,337.9a2.69,2.69,0,0,1-2.66-2.26L490.3,188a2.69,2.69,0,0,1,5.32-.86l23.89,147.68A2.7,2.7,0,0,1,516.84,337.9Z" />
                        <path class="cls-4"
                            d="M559,257.26S530.54,268.48,510.07,299s-48.49,83-48.49,83,8.26,58.91,67.53,44.54c0,0,47.41-90.52,56.75-126.08S579.57,248.55,559,257.26Z" />
                        <path class="cls-2"
                            d="M523.55,422.25c-37.87,0-55.65-40-55.83-40.45a2.69,2.69,0,0,1,4.94-2.14c0.22,0.5,17.21,38.5,52.74,37.17a2.69,2.69,0,0,1,.2,5.38C524.92,422.24,524.23,422.25,523.55,422.25Z" />
                        <path class="cls-1"
                            d="M630.84,205.53s5.39,14.82,27.48,22.63c24.6,8.7,36.64-26.13,36.91-56.84S617.91,142.5,630.84,205.53Z" />
                        <path class="cls-2"
                            d="M665.77,232.23a25,25,0,0,1-8.35-1.53c-23-8.14-28.87-23.59-29.11-24.25a2.68,2.68,0,0,1-.11-0.38c-5.75-28,6.27-42.09,14-48,13.91-10.69,32.41-10.7,43.5-5.17,8,4,12.33,10.52,12.27,18.44-0.17,19.92-5.53,46.78-20.05,57A20.73,20.73,0,0,1,665.77,232.23Zm-32.33-27.46c0.68,1.65,6.29,14,25.78,20.85,5.85,2.07,10.94,1.5,15.56-1.74,12-8.42,17.58-32.48,17.75-52.58,0.07-7.75-5.78-11.83-9.28-13.57-9.36-4.66-25.79-4.62-37.82,4.62C637.31,168.6,628.64,181,633.44,204.77Z" />
                        <polygon class="cls-1"
                            points="633.45 209.75 625.91 242.8 661.47 245.49 663.44 210.83 633.45 209.75" />
                        <path class="cls-2"
                            d="M661.47,248.19h-0.2l-35.56-2.69a2.69,2.69,0,0,1-2.42-3.29l7.54-33a2.71,2.71,0,0,1,2.72-2.09l30,1.08a2.69,2.69,0,0,1,2.59,2.85l-2,34.66A2.69,2.69,0,0,1,661.47,248.19Zm-32.24-7.84,29.7,2.25,1.66-29.18-25-.9Z" />
                        <path class="cls-2"
                            d="M651,127.95s-18.32-10-37.72,8.35-0.81,62.77,17,78.93h33.4l21.82-39.33,10.37,10.37a40.67,40.67,0,0,0,7.41-41.89C693.88,119.6,658.59,125.25,651,127.95Z" />
                        <path class="cls-1"
                            d="M685.41,176.27l0.12-.37s8.08-14,20.2-5.66-2.42,40.41-21.82,28.56h0A47.28,47.28,0,0,1,685.41,176.27Z" />
                        <path class="cls-2"
                            d="M692.44,204.07a19,19,0,0,1-9.93-3,2.69,2.69,0,0,1-1.25-1.83,50.17,50.17,0,0,1,1.58-23.81h0l0.12-.37a2.69,2.69,0,0,1,.23-0.53c0.18-.31,4.49-7.66,11.88-9.33,4.06-.92,8.16,0,12.19,2.8,7.79,5.36,6.67,17.82,1.17,26.29C704.29,200.71,698.53,204.07,692.44,204.07Zm-6.07-7c9.55,5,15.82-3,17.55-5.72,4.14-6.38,5.25-15.5.29-18.92-2.77-1.91-5.37-2.56-7.94-2-4.47,1-7.6,5.51-8.27,6.55l0,0.05A44.79,44.79,0,0,0,686.37,197.1Z" />
                        <path class="cls-3" d="M611.54,253l5-18.86s22.45-9.34,53.88,1.62l4,19Z" />
                        <path class="cls-4"
                            d="M559,257.26s33.4-13.74,85.13-10,83,18.86,83,18.86,18.59,87.46,18.95,112.25S716.24,424,716.24,424L729,565.72H489.23S493,344.81,559,257.26Z" />
                        <path class="cls-2"
                            d="M502.73,424.77a2.7,2.7,0,0,1-2.66-3.13c12.53-76.78,31.63-132.64,56.79-166a2.69,2.69,0,0,1,4.3,3.24c-24.62,32.66-43.39,87.72-55.78,163.63A2.69,2.69,0,0,1,502.73,424.77Z" />
                        <path class="cls-2"
                            d="M722.53,552.78H497.13a2.69,2.69,0,0,1,0-5.39H722.53A2.69,2.69,0,1,1,722.53,552.78Z" />
                        <path class="cls-1"
                            d="M599.91,145.65l-2.45,14.63a4.31,4.31,0,0,0,3.43,4.94l11.57,2.24a4.31,4.31,0,0,0,5.09-3.69l1.93-15.28a4.31,4.31,0,0,0-3.66-4.8l-11.05-1.59A4.31,4.31,0,0,0,599.91,145.65Z" />
                        <path class="cls-2"
                            d="M613.27,170.23a6.92,6.92,0,0,1-1.32-.13l-11.57-2.24a7,7,0,0,1-5.57-8l2.45-14.63h0a7,7,0,0,1,7.9-5.77L616.21,141a7,7,0,0,1,5.95,7.81l-1.93,15.28A7,7,0,0,1,613.27,170.23Zm-10.7-24.14-2.45,14.63a1.6,1.6,0,0,0,1.28,1.85L613,164.81a1.61,1.61,0,0,0,1.91-1.38l1.93-15.28a1.62,1.62,0,0,0-1.37-1.8l-11.05-1.59a1.62,1.62,0,0,0-1.82,1.33h0Z" />
                        <path class="cls-2"
                            d="M556.85,341.87c-70.43,33.28-90.91-43.37-71.52-51.71s48.74-25.59,34-57.93-24.17-85.67,14.88-107.08,72.38,21.9,72.39,21.92c0.13,0.36.3,6.23-3.15,14.55-15.85,2.54-24,15.93-14.51,47.37C599,242.58,627.28,308.59,556.85,341.87Z" />
                        <path class="cls-1"
                            d="M785.3,357.2l31.52-54.69,1.8-92.74a4.6,4.6,0,0,1,4.6-4.51h0a4.6,4.6,0,0,1,4.57,4.08l4.93,43.87s29.63,0.54,34.48,8.62c4.26,7.1-5.12,28.56-5.12,28.56s0.27,12.12-2.42,16.7-12.12,9.16-12.12,9.16S828.13,458,796.88,456.61s-64.65-54.69-64.65-54.69Z" />
                        <path class="cls-2"
                            d="M797.34,459.31h-0.57c-32.29-1.39-65.43-53.72-66.82-55.95a2.69,2.69,0,0,1,.55-3.49l52.71-44.41,30.94-53.68,1.78-92a7.29,7.29,0,0,1,14.54-.67l4.67,41.54c8.25,0.32,29.61,1.91,34.38,9.86,4.54,7.57-2.67,25.67-4.73,30.48,0,2.78-.08,12.9-2.8,17.53-2.47,4.2-9.08,8-12,9.56-1,6.93-5.75,38.5-13.46,69.57C824.56,435.83,811.73,459.31,797.34,459.31Zm-61.55-56.87c6.33,9.5,35,50.34,61.21,51.47h0.33c20.85,0,40.2-84.47,47.53-138a2.7,2.7,0,0,1,1.49-2.06c3.37-1.64,9.32-5.29,11-8.1s2.15-10.89,2.05-15.28a2.7,2.7,0,0,1,.22-1.14c3.66-8.39,7.72-22,5.28-26.09-2.81-4.69-20.54-7.1-32.22-7.31a2.69,2.69,0,0,1-2.63-2.39l-4.93-43.87a1.9,1.9,0,0,0-3.8.18l-1.8,92.74a2.7,2.7,0,0,1-.36,1.29l-31.52,54.69a2.69,2.69,0,0,1-.6.71ZM785.3,357.2h0Z" />
                        <path class="cls-4"
                            d="M727.11,266.15l76.51,90c0.73,42.28-16.4,67.88-64.92,64.12,0,0-49-62.5-61.15-104S705.29,253.76,727.11,266.15Z" />
                        <path class="cls-2"
                            d="M727.09,407.37a2.69,2.69,0,0,1-2.19-1.12c-15-20.82-41.43-60.09-49.95-89.24-8.3-28.4,6.31-47.89,24.47-54.6a2.69,2.69,0,1,1,1.87,5.05c-15.81,5.85-28.49,23-21.17,48,8.29,28.37,34.35,67.06,49.15,87.6A2.69,2.69,0,0,1,727.09,407.37Z" />
                        <path class="cls-2"
                            d="M748.62,410.36a53.46,53.46,0,0,1-10.5-1,2.69,2.69,0,0,1,1.14-5.27c0.27,0.06,20.9,4.28,36.09-7.45,10.26-7.93,15.88-21.34,16.69-39.87a2.69,2.69,0,1,1,5.38.24c-0.89,20.21-7.22,35-18.82,43.93C768.59,408.69,756.87,410.36,748.62,410.36Z" />
                        <path class="cls-3"
                            d="M365.91,577.63a37.24,37.24,0,0,0-37.24,37.24,37.24,37.24,0,0,0-37.24-37.24,37.24,37.24,0,0,0,37.24-37.24A37.24,37.24,0,0,0,365.91,577.63Z" />
                        <path class="cls-4"
                            d="M981.51,144.53a26.29,26.29,0,0,0-26.28,26.28,26.29,26.29,0,0,0-26.28-26.28,26.29,26.29,0,0,0,26.28-26.28A26.29,26.29,0,0,0,981.51,144.53Z" />
                        <circle class="cls-4" cx="1027.96" cy="454.62" r="10.72" />
                        <circle class="cls-4" cx="408.77" cy="850.74" r="15.45" />
                    </svg>

                </div>
                <div class="hometitle">

                    <h1>A vida da cidade <span class="beta">(Beta)</span></h1>
                    <h2>Conhecer melhor cidades e bairros</h2>

                    <p>Mapa colaborativo adicionar suas próprias dicas e anotações <img
                            src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f680.png" width="24px" height="24px">. Votar
                        e
                        comfirmar as outras anotações
                    </p>

                    <div class="homeintro">

                        @auth
                            <p><strong> Hello {{ Auth::user()->name }} </strong> Adicionar anotações ao mapa preferir
                                humor
                                aos insultos </p>


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
                    <div class="homeintro">

                        <p> Mapa a tendência humorística de uma realidade séria a do
                            relacionamento das localidades, bairros e territórios como os fenômenos como turismo e
                            desenvolvimento urbanístico. Os centros turísticos são uma área falsa que muitas vezes não
                            tem
                            nada
                            a ver com a realidade local.</p>

                    </div>

                    <p> Pode utilisar emojis! <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f601.png"
                            width="24px" height="24px"> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/1f680.png"
                            width="24px" height="24px"> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26a1.png"
                            width="24px" height="24px"></p>

                </div>

            </div>
            <!--/INTRO-->
            <div class="introlist">
                <h2> <img src="https://twemoji.maxcdn.com/v/13.0.0/72x72/26a1.png" height="30px" width="30px"> Ultimos
                    tags </h2>

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
        <div class="tag-text-box"> <input type="text" maxlength="40" id="tag" placeholder="tag" /> <button id="envia"
                class="env"> enviar</button>

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
            hotTag
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
                open.innerHTML = '<span class="material-icons-two-tone">close</span>'
                getLocaisIntro(baseurl)

            }

            dc.classList.toggle("dep")

        })


        //// Geo code/////
        let gcs = L.esri.Geocoding.geocodeService();
        let buildingLayers = L.layerGroup().addTo(map);

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

                    posts.data.map((post, indice) => {
                        let novo = novidade(baseurl, post.created_at)
                        let hot = hotTag(baseurl, post.likes)
                        size = sizeTag(20, post.likes)

                        let destroy = user_id == post.user_id || user_id == 1 ?
                            `<span class="destroy" id="destroy"  data-id="${post.id}">delete</span>` :
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

                    })
                }).catch(error => console.log('error', error));
            getLocaisdislike()


        }

        ///////////////////// GET LOCAIS TAGS DISLIKE  //////////////////
        function getLocaisdislike() {
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

            fetch("{{ route('dislikes') }}", requestOptions)
                .then(response => response.json())
                .then(posts => {
                    vote.style.display = 'none'
                    posts.data.map((post, indice) => {


                        let bad = post.dislikes > 1 ? '<h1>Bad!!</h1>' : ''
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

                        buildingLayers.addLayer(mydislike);



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

                if (tag.value == '') {
                    alert('Tag vazio')
                    return

                }
                if (tag.value.length <= 3) {
                    alert('Pouco texto...')
                    return

                }


                if (badWord(tag.value)) {
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
        window.onload = getLocais('39.4039', '-9.1336')
    </script>


</body>

</html>
