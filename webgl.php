<?php ?>
<!DOCTYPE html>

<html>
    <head>
    <style>
    </style>
    <link href='css/q3demo.css' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <h2 id="mapTitle"></h2>

        <div id="viewport-frame">
            <canvas id="viewport">
                Sorry, but your browser does not support WebGL or does not have it enabled.
                To get a WebGL-enabled browser, please see:<br/>
                <a href="http://get.webgl.org/" target="_blank">
                    http://get.webgl.org/
                </a>
            </canvas>
            <div id="loading">
                Loading...
            </div>
        </div>

        <div id="webgl-error" style="display: none; text-align: center; vertical-align: middle;">
            Sorry, but your browser does not support WebGL or does not have it enabled.<br/>
            To get a WebGL-enabled browser, please see:<br/>
            <a href="http://get.webgl.org/" target="_blank">
                http://get.webgl.org/
            </a>
        </div>

        <img style="display: none;" src="images/vr_goggles_sm.png" id="mobileVrBtn"/>
        <img src="images/fullscreen_sm.png" id="mobileFullscreenBtn"/>

        <div id="viewport-info" style="display: none;">
            <div id="controls" style="display:none;">
                <h3>Controls</h3>
                <ul>
                    <li><b>Look:</b> Click and Drag</li>
                    <li><b>Movement:</b> W,A,S,D</li>
                    <li><b>Jump:</b> Space</li>
                    <li><b>Respawn:</b> R</li>
                </ul>
            </div>

            <div id="config" style="display:none;">
                <h3>Settings</h3>
                <ul>
                    <li><b>Show FPS:</b> <input type="checkbox" id="showFPS" checked/></li>
                    <li style="display: none;" id="vrToggle"><b>VR:</b> <img src="images/vr_goggles_sm.png" id="vrBtn"/></li>
                    <!--li><b>Background Music:</b> <input type="checkbox" id="playMusic" checked="true"/></li-->
                    <li><b>Fullscreen:</b> <img src="images/fullscreen_sm.png" id="fullscreenBtn"/></li>
                </ul>
            </div>
            <!-- <a href="http://blog.tojicode.com/">See more WebGL demo's at my blog</a> -->
        </div>
    </body>

        <script>
          var mapName = '<?=$_GET['mapName'] ?>';
        </script>
        <!-- Common Utilities -->
        <script type="text/javascript" src="js/util/game-shim.js"></script>
        <script type="text/javascript" src="js/util/gl-matrix-min.js"></script>
        <script type="text/javascript" src="js/util/stats.min.js"></script>

        <!-- Quake3 Map Specific files -->
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/q3bsp.js"></script>
        <script type="text/javascript" src="js/q3shader.js"></script>
        <script type="text/javascript" src="js/q3glshader.js"></script>
        <script type="text/javascript" src="js/q3movement.js"></script>
</html>
