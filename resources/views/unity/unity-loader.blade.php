﻿{{--<link rel="shortcut icon" href="{{ asset('unity/TemplateData/favicon.ico') }}">--}}
{{--<link rel="stylesheet" href="{{ asset('unity/TemplateData/style.css') }}">--}}
<div class="col-12">
    <div id="unity-container" class="unity-desktop">
        <canvas id="unity-canvas" width=600 height=300></canvas>
        <div id="unity-loading-bar">
            <div id="unity-logo"></div>
            <div id="unity-progress-bar-empty">
                <div id="unity-progress-bar-full"></div>
            </div>
        </div>
        <div id="unity-warning"> </div>
        <div id="unity-footer">
            <div id="unity-webgl-logo"></div>
            <div id="unity-fullscreen-button"></div>
            <div id="unity-build-title">ChessLikeGame</div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function ()
    {
        let container = document.querySelector("#unity-container");
        let canvas = document.querySelector("#unity-canvas");
        let loadingBar = document.querySelector("#unity-loading-bar");
        let progressBarFull = document.querySelector("#unity-progress-bar-full");
        let fullscreenButton = document.querySelector("#unity-fullscreen-button");
        let warningBanner = document.querySelector("#unity-warning");

        // Shows a temporary message banner/ribbon for a few seconds, or
        // a permanent error message on top of the canvas if type=='error'.
        // If type=='warning', a yellow highlight color is used.
        // Modify or remove this function to customize the visually presented
        // way that non-critical warnings and error messages are presented to the
        // user.
        function unityShowBanner(msg, type) {
            function updateBannerVisibility() {
                warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
            }
            let div = document.createElement('div');
            div.innerHTML = msg;
            warningBanner.appendChild(div);
            if (type === 'error') div.style = 'background: red; padding: 10px;';
            else {
                if (type === 'warning') div.style = 'background: yellow; padding: 10px;';
                setTimeout(function() {
                    warningBanner.removeChild(div);
                    updateBannerVisibility();
                }, 5000);
            }
            updateBannerVisibility();
        }

        let buildUrl = "Unity/@yield('build-folder')";
        let fileName = "@yield('file-name-structure')";
        let loaderUrl = buildUrl + "/" + fileName + ".loader.js";
        console.log(loaderUrl);
        let config = {
            dataUrl: buildUrl + "/" + fileName + ".data.unityweb",
            frameworkUrl: buildUrl + "/" + fileName + ".framework.js.unityweb",
            codeUrl: buildUrl + "/" + fileName + ".wasm.unityweb",
            symbolsUrl: buildUrl + "/" + fileName + ".symbols.json.unityweb",
            streamingAssetsUrl: "StreamingAssets",
            companyName: "Sarah Rawlinson",
            productName: "@yield('product-name')",
            productVersion: "@yield('product-version')",
            showBanner: unityShowBanner,
        };

        // By default Unity keeps WebGL canvas render target size matched with
        // the DOM size of the canvas element (scaled by window.devicePixelRatio)
        // Set this to false if you want to decouple this synchronization from
        // happening inside the engine, and you would instead like to size up
        // the canvas DOM size and WebGL render target sizes yourself.
        // config.matchWebGLToCanvasSize = false;

        if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
            // Mobile device style: fill the whole browser client area with the game canvas:

            let meta = document.createElement('meta');
            meta.name = 'viewport';
            meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
            document.getElementsByTagName('head')[0].appendChild(meta);
            container.className = "unity-mobile";

            // To lower canvas resolution on mobile devices to gain some
            // performance, uncomment the following line:
            // config.devicePixelRatio = 1;

            canvas.style.width = window.innerWidth + 'px';
            canvas.style.height = window.innerHeight + 'px';

            unityShowBanner('WebGL builds are not supported on mobile devices.');
        } else {
            // Desktop style: Render the game canvas in a window that can be maximized to fullscreen:

            canvas.style.width = "@yield('width')";
            canvas.style.height = "@yield('height')";
        }

        loadingBar.style.display = "block";

        let script = document.createElement("script");
        script.src = loaderUrl;
        script.onload = () => {
            createUnityInstance(canvas, config, (progress) => {
                progressBarFull.style.width = 100 * progress + "%";
            }).then((unityInstance) => {
                loadingBar.style.display = "none";
                fullscreenButton.onclick = () => {
                    unityInstance.SetFullscreen(1);
                };
            }).catch((message) => {
                alert(message);
            });
        };
        document.body.appendChild(script);
    });
</script>