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
                    <svg id="ba5bbdf1-ea7e-4527-9dc4-6b83a9019784" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 921.17587 727.90229">
                        <title>urban_design</title>
                        <circle cx="209.62933" cy="318.19554" r="55.04156" fill="#ff6584" />
                        <path
                            d="M690.03184,466.56673c0,108.36448-64.421,146.20131-143.88825,146.20131S402.25533,574.93121,402.25533,466.56673,546.14359,220.34552,546.14359,220.34552,690.03184,358.20224,690.03184,466.56673Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <polygon
                            points="401.49 510.143 402.963 419.451 464.292 307.253 403.194 405.225 403.857 364.446 446.124 283.272 404.032 353.655 404.032 353.655 405.224 280.313 450.485 215.688 405.411 268.78 406.155 134.297 401.477 312.328 401.862 304.984 355.844 234.547 401.124 319.082 396.836 400.993 396.708 398.819 343.659 324.694 396.548 406.499 396.011 416.743 395.915 416.897 395.959 417.738 385.081 625.552 399.615 625.552 401.359 518.212 454.118 436.607 401.49 510.143"
                            fill="#3f3d56" />
                        <path
                            d="M828.86406,568.91749c0,108.36448-64.421,146.20131-143.88826,146.20131S541.08755,677.282,541.08755,568.91749,684.9758,322.69628,684.9758,322.69628,828.86406,460.553,828.86406,568.91749Z"
                            transform="translate(-139.41207 -86.04886)" fill="#3f3d56" />
                        <polygon
                            points="540.322 612.493 541.796 521.802 603.124 409.604 542.027 507.575 542.689 466.797 584.957 385.623 542.864 456.005 542.864 456.006 544.056 382.663 589.317 318.039 544.243 371.131 544.988 236.647 540.309 414.679 540.694 407.335 494.676 336.898 539.956 421.433 535.668 503.343 535.54 501.169 482.491 427.045 535.38 508.85 534.844 519.094 534.747 519.248 534.791 520.089 523.913 727.902 538.447 727.902 540.191 620.562 592.95 538.958 540.322 612.493"
                            fill="#f2f2f2" />
                        <path
                            d="M558.29324,568.91749c0,108.36448-64.421,146.20131-143.88826,146.20131S270.51673,677.282,270.51673,568.91749,414.405,322.69628,414.405,322.69628,558.29324,460.553,558.29324,568.91749Z"
                            transform="translate(-139.41207 -86.04886)" fill="#3f3d56" />
                        <polygon
                            points="269.751 612.493 271.225 521.802 332.554 409.604 271.456 507.575 272.118 466.797 314.386 385.623 272.294 456.005 272.294 456.006 273.485 382.663 318.746 318.039 273.672 371.131 274.417 236.647 269.739 414.679 270.123 407.335 224.106 336.898 269.385 421.433 265.097 503.343 264.97 501.169 211.92 427.045 264.809 508.85 264.273 519.094 264.177 519.248 264.221 520.089 253.342 727.902 267.876 727.902 269.62 620.562 322.38 538.958 269.751 612.493"
                            fill="#f2f2f2" />
                        <path
                            d="M549.80682,813.03539a297.461,297.461,0,1,1,210.33569-87.12431A295.51307,295.51307,0,0,1,549.80682,813.03539Zm0-592.64986c-162.76768,0-295.18931,132.42108-295.18931,295.18931S387.03914,810.7647,549.80682,810.7647,844.99613,678.34307,844.99613,515.57484,712.5745,220.38553,549.80682,220.38553Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <polygon
                            points="653.626 599.234 653.626 725.905 167.207 725.905 167.207 599.234 410.416 472.562 410.923 472.825 653.626 599.234"
                            fill="#f2f2f2" />
                        <polygon
                            points="653.626 599.234 653.626 725.905 410.923 725.905 410.923 472.825 653.626 599.234"
                            opacity="0.1" />
                        <polygon
                            points="389.642 550.085 371.402 556.972 371.402 529.818 389.642 521.823 389.642 550.085"
                            fill="#3f3d56" />
                        <polygon
                            points="187.981 626.088 181.901 628.387 181.901 611.901 187.981 609.213 187.981 626.088"
                            fill="#3f3d56" />
                        <polygon points="209.262 618.994 202.168 621.653 202.168 603.794 209.262 600.68 209.262 618.994"
                            fill="#3f3d56" />
                        <polygon points="232.569 609.874 224.462 612.923 224.462 593.66 232.569 590.092 232.569 609.874"
                            fill="#3f3d56" />
                        <polygon points="260.944 598.727 250.81 602.552 250.81 582.513 260.944 578.067 260.944 598.727"
                            fill="#3f3d56" />
                        <polygon
                            points="295.398 585.553 283.238 590.149 283.238 568.326 295.398 562.992 295.398 585.553"
                            fill="#3f3d56" />
                        <polygon points="336.947 570.352 322.76 575.697 322.76 551.098 336.947 544.879 336.947 570.352"
                            fill="#3f3d56" />
                        <polygon
                            points="187.981 659.529 181.901 661.058 181.901 644.329 187.981 642.406 187.981 659.529"
                            fill="#3f3d56" />
                        <polygon
                            points="209.262 654.463 202.168 656.239 202.168 638.249 209.262 636.013 209.262 654.463"
                            fill="#3f3d56" />
                        <polygon
                            points="232.569 648.382 224.462 650.419 224.462 631.155 232.569 628.598 232.569 648.382"
                            fill="#3f3d56" />
                        <polygon points="260.944 641.289 250.81 643.834 250.81 623.048 260.944 619.859 260.944 641.289"
                            fill="#3f3d56" />
                        <polygon
                            points="295.398 632.168 283.238 635.237 283.238 612.914 295.398 609.089 295.398 632.168"
                            fill="#3f3d56" />
                        <polygon
                            points="336.947 622.035 321.746 625.858 321.746 600.754 336.947 595.971 336.947 622.035"
                            fill="#3f3d56" />
                        <polygon
                            points="389.642 608.861 371.402 613.446 371.402 585.553 389.642 579.831 389.642 608.861"
                            fill="#3f3d56" />
                        <polygon
                            points="389.642 666.623 371.402 668.945 371.402 641.289 389.642 637.839 389.642 666.623"
                            fill="#3f3d56" />
                        <polygon
                            points="187.981 691.957 181.901 692.739 181.901 676.757 187.981 675.598 187.981 691.957"
                            fill="#3f3d56" />
                        <polygon
                            points="209.262 689.931 202.168 690.825 202.168 673.717 209.262 672.386 209.262 689.931"
                            fill="#3f3d56" />
                        <polygon points="232.569 686.89 224.462 687.916 224.462 668.65 232.569 667.105 232.569 686.89"
                            fill="#3f3d56" />
                        <polygon points="260.944 682.837 250.81 684.132 250.81 663.583 260.944 661.65 260.944 682.837"
                            fill="#3f3d56" />
                        <polygon
                            points="295.398 678.783 283.238 680.326 283.238 657.503 295.398 655.187 295.398 678.783"
                            fill="#3f3d56" />
                        <polygon
                            points="336.947 673.717 321.746 675.638 321.746 650.409 336.947 647.524 336.947 673.717"
                            fill="#3f3d56" />
                        <polygon
                            points="633.865 626.088 639.946 628.387 639.946 611.901 633.865 609.213 633.865 626.088"
                            fill="#3f3d56" />
                        <polygon points="612.584 618.994 619.678 621.653 619.678 603.794 612.584 600.68 612.584 618.994"
                            fill="#3f3d56" />
                        <polygon points="589.277 609.874 597.384 612.923 597.384 593.66 589.277 590.092 589.277 609.874"
                            fill="#3f3d56" />
                        <polygon
                            points="560.902 598.727 571.036 602.552 571.036 582.513 560.902 578.067 560.902 598.727"
                            fill="#3f3d56" />
                        <polygon
                            points="526.448 585.553 538.608 590.149 538.608 568.326 526.448 562.992 526.448 585.553"
                            fill="#3f3d56" />
                        <polygon
                            points="484.899 570.352 499.087 575.697 499.087 551.098 484.899 544.879 484.899 570.352"
                            fill="#3f3d56" />
                        <polygon
                            points="633.865 659.529 639.946 661.058 639.946 644.329 633.865 642.406 633.865 659.529"
                            fill="#3f3d56" />
                        <polygon
                            points="612.584 654.463 619.678 656.239 619.678 638.249 612.584 636.013 612.584 654.463"
                            fill="#3f3d56" />
                        <polygon
                            points="589.277 648.382 597.384 650.419 597.384 631.155 589.277 628.598 589.277 648.382"
                            fill="#3f3d56" />
                        <polygon
                            points="560.902 641.289 571.036 643.834 571.036 623.048 560.902 619.859 560.902 641.289"
                            fill="#3f3d56" />
                        <polygon
                            points="526.448 632.168 538.608 635.237 538.608 612.914 526.448 609.089 526.448 632.168"
                            fill="#3f3d56" />
                        <polygon points="484.899 622.035 500.1 625.858 500.1 600.754 484.899 595.971 484.899 622.035"
                            fill="#3f3d56" />
                        <polygon
                            points="432.204 608.861 450.445 613.446 450.445 585.553 432.204 579.831 432.204 608.861"
                            fill="#3f3d56" />
                        <polygon
                            points="432.204 666.623 450.445 668.945 450.445 641.289 432.204 637.839 432.204 666.623"
                            fill="#3f3d56" />
                        <polygon
                            points="633.865 691.957 639.946 692.739 639.946 676.757 633.865 675.598 633.865 691.957"
                            fill="#3f3d56" />
                        <polygon
                            points="612.584 689.931 619.678 690.825 619.678 673.717 612.584 672.386 612.584 689.931"
                            fill="#3f3d56" />
                        <polygon points="589.277 686.89 597.384 687.916 597.384 668.65 589.277 667.105 589.277 686.89"
                            fill="#3f3d56" />
                        <polygon points="560.902 682.837 571.036 684.132 571.036 663.583 560.902 661.65 560.902 682.837"
                            fill="#3f3d56" />
                        <polygon
                            points="526.448 678.783 538.608 680.326 538.608 657.503 526.448 655.187 526.448 678.783"
                            fill="#3f3d56" />
                        <polygon points="484.899 673.717 500.1 675.638 500.1 650.409 484.899 647.524 484.899 673.717"
                            fill="#3f3d56" />
                        <polygon points="449.431 557.179 431.191 550.3 431.191 521.711 449.431 529.709 449.431 557.179"
                            fill="#3f3d56" />
                        <rect x="619.22047" y="703.34943" width="1.48683" height="23.78929" fill="#2f2e41" />
                        <rect x="637.17106" y="709.82471" width="1.05356" height="16.8569" fill="#2f2e41" />
                        <rect x="652.86574" y="711.88336" width="0.92596" height="14.81543" fill="#2f2e41" />
                        <polygon
                            points="577.116 695.808 577.116 726.412 557.356 726.382 537.595 726.351 537.595 691.957 557.356 693.883 577.116 695.808"
                            fill="#3f3d56" />
                        <polygon points="244.73 726.412 284.251 726.349 284.251 691.957 244.73 695.804 244.73 726.412"
                            fill="#3f3d56" />
                        <rect y="725.39869" width="885.5" height="2.02675" fill="#2f2e41" />
                        <polygon
                            points="577.116 695.808 577.116 726.412 557.356 726.382 557.356 693.883 577.116 695.808"
                            opacity="0.1" />
                        <rect x="406.36292" y="698.54429" width="2.02675" height="28.37447" fill="#2f2e41" />
                        <path
                            d="M558.4842,774.49149c0,9.94289-5.31121,18.24029-11.69584,18.52532-6.20727.27711-11.11411-7.16322-11.11411-16.61156s12.12748-35.38718,12.12748-35.38718S558.4842,764.54861,558.4842,774.49149Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <rect x="168.74636" y="707.63783" width="1.2089" height="16.92457" fill="#2f2e41" />
                        <path
                            d="M315.73912,787.66134c0,5.93065-3.168,10.87982-6.97624,11.04983-3.70246.16529-6.62926-4.27266-6.62926-9.90832s7.2337-21.10746,7.2337-21.10746S315.73912,781.73069,315.73912,787.66134Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <path
                            d="M767.55352,790.3367c0,5.64038-3.55458,10.04606-8.17757,9.82918-4.909-.2303-9.117-5.52544-9.117-11.81381s9.117-21.99966,9.117-21.99966S767.55352,784.69631,767.55352,790.3367Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <path
                            d="M782.90447,796.53852c0,3.99673-2.51875,7.11856-5.79456,6.96488-3.47844-.16319-6.46025-3.91528-6.46025-8.37117s6.46025-15.58878,6.46025-15.58878S782.90447,792.54179,782.90447,796.53852Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <path
                            d="M797.83359,798.51664c0,3.5127-2.21371,6.25645-5.09281,6.12139-3.05718-.14343-5.67787-3.44112-5.67787-7.35737s5.67787-13.70089,5.67787-13.70089S797.83359,795.00393,797.83359,798.51664Z"
                            transform="translate(-139.41207 -86.04886)" fill="#dc9044" />
                        <path
                            d="M805.03008,249.29959s-9.86369,29.59108-4.38386,36.16687-32.879-19.72738-32.879-19.72738l20.82335-24.11125Z"
                            transform="translate(-139.41207 -86.04886)" fill="#a0616a" />
                        <circle cx="643.12413" cy="113.99581" r="49.20683" fill="#2f2e41" />
                        <polygon points="834.397 496.424 809.19 516.152 794.942 493.136 820.149 475.601 834.397 496.424"
                            fill="#a0616a" />
                        <path
                            d="M938.18993,730.97658l6.57579,31.783,18.63142,25.20722s50.41443,15.34352,16.43949,23.01528-41.6467-5.47983-41.6467-5.47983L914.07868,784.6789V813.174H898.73516l-3.2879-40.55073s-2.19193-12.05563,7.67176-25.20722l2.19193-19.72738Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <path
                            d="M811.05789,337.52484l8.76773,50.41443s93.15709-9.86369,99.73289,8.76772,8.76773,24.11125,8.76773,24.11125l-18.63142,6.5758-8.76773-16.43949a20.81584,20.81584,0,0,0-16.43949,1.096c-8.76772,4.38386-85.48533,15.34352-90.96516,1.096s-20.82335-66.85391-20.82335-66.85391l23.01528-18.63142Z"
                            transform="translate(-139.41207 -86.04886)" fill="#a0616a" />
                        <path
                            d="M811.05789,337.52484l8.76773,50.41443s93.15709-9.86369,99.73289,8.76772,8.76773,24.11125,8.76773,24.11125l-18.63142,6.5758-8.76773-16.43949a20.81584,20.81584,0,0,0-16.43949,1.096c-8.76772,4.38386-85.48533,15.34352-90.96516,1.096s-20.82335-66.85391-20.82335-66.85391l23.01528-18.63142Z"
                            transform="translate(-139.41207 -86.04886)" opacity="0.1" />
                        <path
                            d="M862.56829,483.2883l7.67176,26.30318,19.72738,100.82885s2.19193,74.52568,5.47983,83.29341,3.2879,9.86369,0,13.15159-9.86369,14.24755,0,20.82335,44.9346,14.24755,46.03057,6.57579,1.096-19.72738,0-25.20721,3.28789-90.96517,3.28789-90.96517L931.61413,487.67216l-44.9346-20.82335Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <path
                            d="M862.56829,483.2883l7.67176,26.30318,19.72738,100.82885s2.19193,74.52568,5.47983,83.29341,3.2879,9.86369,0,13.15159-9.86369,14.24755,0,20.82335,44.9346,14.24755,46.03057,6.57579,1.096-19.72738,0-25.20721,3.28789-90.96517,3.28789-90.96517L931.61413,487.67216l-44.9346-20.82335Z"
                            transform="translate(-139.41207 -86.04886)" opacity="0.1" />
                        <path
                            d="M909.69482,380.26751l24.11125,46.03056s138.09169,61.37409,126.03607,86.5813-78.90954,72.33375-78.90954,72.33375-3.2879,18.63142-13.15159,13.15159-33.97494-33.97494-31.783-37.26284,9.86369-10.95966,13.15159-9.86369,41.6467-28.49511,41.6467-28.49511l-65.758-16.43949s-78.90954-2.19193-83.29341-39.45477,0-43.83863,0-43.83863l-5.47982-12.05563L881.1997,383.5554Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <path
                            d="M943.66976,562.19784l-23.01528,20.82335s-19.72739-8.76773-31.783-5.47983-32.879,5.47983-32.879,5.47983l3.2879,18.63142,27.96228-5.15881-22.48245,31.462s0,49.31846,14.24755,49.31846,9.8637-29.59108,9.8637-29.59108l43.83863-33.97494s21.91932-8.76773,24.11125-8.76773S943.66976,562.19784,943.66976,562.19784Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <circle cx="661.23415" cy="134.75562" r="37.26284" fill="#a0616a" />
                        <path
                            d="M763.93136,249.84757s17.53545-4.38386,23.01528,0,6.5758,14.24756,14.24756,15.34352,14.24755,1.096,15.34352,2.19194,26.30318,31.783,26.30318,31.783,15.34352,8.76772,18.63142,20.82335,36.16687,52.60636,40.55074,56.99022-28.49512,26.30318-39.45477,33.97494-42.74267,10.95966-52.60636-6.57579S746.39591,272.86286,763.93136,249.84757Z"
                            transform="translate(-139.41207 -86.04886)" fill="#575a89" />
                        <path
                            d="M805.57806,321.08535l8.76773,50.41443s93.1571-9.86369,99.73289,8.76773,8.76773,24.11125,8.76773,24.11125L904.215,410.95455l-8.76773-16.43949a20.81589,20.81589,0,0,0-16.43949,1.096c-8.76772,4.38386-85.48533,15.34352-90.96516,1.096s-20.82335-66.85391-20.82335-66.85391l23.01528-18.63142Z"
                            transform="translate(-139.41207 -86.04886)" fill="#a0616a" />
                        <path
                            d="M784.63435,254.45864s26.42354,55.66705,24.23161,71.01058-9.86369,4.38386-9.86369,4.38386-9.8637-15.34352-14.24756-6.5758-9.86369,20.82335-14.24755,19.72739-28.49512-82.19744-15.34353-89.8692S784.63435,254.45864,784.63435,254.45864Z"
                            transform="translate(-139.41207 -86.04886)" fill="#575a89" />
                        <circle cx="589.81674" cy="49.20683" r="49.20683" fill="#2f2e41" />
                        <path
                            d="M686.78529,176.0021a49.2095,49.2095,0,0,0,75.98837-25.83768,49.20954,49.20954,0,1,1-95.98926-20.17936A49.19136,49.19136,0,0,0,686.78529,176.0021Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
                        <circle cx="633.00232" cy="122.19694" r="36.08501" fill="#2f2e41" />
                        <ellipse cx="660.34652" cy="108.66504" rx="31.98443" ry="25.01347" fill="#2f2e41" />
                        <ellipse cx="661.78213" cy="138.5915" rx="7.12378" ry="12.60361" fill="#a0616a" />
                        <path
                            d="M898.9811,410.47561s19.4016-11.13122,23.00341-8.34005,5.20206,11.52529,5.20206,11.52529l-22.4236,8.80134-6.57579-12.05562Z"
                            transform="translate(-139.41207 -86.04886)" fill="#2f2e41" />
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
        window.onload = getLocais('39.4039', '-9.1336'), getLocaisdislike()
    </script>


</body>

</html>
