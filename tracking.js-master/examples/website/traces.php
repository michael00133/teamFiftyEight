<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="../assets/demo.css">

    <script src="../../build/tracking.js"></script>
    <script src="../assets/splines.min.js"></script>


  <style>

    #image {
      position: relative;
      margin: auto auto;
      z-index = 2;
      display: block;
      margin-top: 100px;
    }

    #canvas {
      height: 600px;
      position: absolute;
      width: 800px;
      z-index = 3;
    }

    #video {
      height: 600px;
      position: absolute;
      width: 800px;
      z-index = 1;
    }

    canvas, video {
      -moz-transform: scale(-1, 1);
      -o-transform: scale(-1, 1);
      -webkit-transform: scale(-1, 1);
      filter: FlipH;
      transform: scale(-1, 1);
    }
  </style>


    <meta charset="utf-8"> 
    <title>TraceMe</title>
</head>
<body>
<?php include "navbar.php"; ?>
<div class="wrapper" id="tracespage">


    <div style="margin: auto; padding: 15px; height: 600px; width: 800px; background-color: #88d5f1;">
        <video id="video" style="left:0; right:0; margin: 0 auto;" preload autoplay loop muted></video>
        <canvas id="canvas" style="left:0; right:0; margin: 0 auto;"  width="800" height="600"></canvas>
       <div style="height: 600px; width: 800px;"> <img id="image" style="width:300px; height:350px; visibility: hidden;" src="images/0.png"></img></div>
    </div>

    <div style="text-align: center">
        <br><br><br>
        <button id="next-button" onclick="projectLetter()">Let's try writing 0!</button>
    </div>

  <script>
    var del = false;
    var imgList = ["0", "1", "2","3","4","5","6","7","8","9"];
    var idx = 0;

    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');

    var drawSegments = [[]];
    var segment = 0;

    var tracker = new tracking.ColorTracker(['red', 'green']);

    function projectLetter() {
        var image = document.getElementById('image');
        var button = document.getElementById('next-button');
        image.style.visibility="visible"
        image.src = "images/"+imgList[idx]+".png";
        idx++;
        button.innerHTML = "Let's try writing "+String(idx)+"!";
        clear();
      }

    tracking.track('#video', tracker, { camera: true });

    tracker.on('track', function(event) {
      if (event.data.length === 0 && drawSegments[segment].length > 0) {
        segment++;
        if (!drawSegments[segment]) {
          drawSegments[segment] = [];
        }
      }

      event.data.forEach(function(rect) {
        if (rect.color === 'red') {
          draw(rect);
        }
        else if (rect.color === 'green') {
          erase(rect);
        }
      });
    });

    function draw(rect) {
      drawSegments[segment].push(rect.x + rect.width / 2, rect.y + rect.height / 2);
      console.log(drawSegments);
    }

    function clear(){
      context.clearRect(0, 0, canvas.width, canvas.height);
    }

    function erase(rect) {
      context.clearRect(rect.x, rect.y, rect.width, rect.height);
    }

    function isInsideRect(x, y, rect) {
      return rect.x <= x && x <= rect.x + rect.width &&
          rect.y <= y && y <= rect.y + rect.height;
    }

    (function loop() {
        for (var i = 0, len = drawSegments.length; i < len; i++) {
            drawSpline(context, drawSegments[i], 0.3, false);
        }

        drawSegments = [drawSegments[drawSegments.length - 1]];
        segment = 0;

        requestAnimationFrame(loop);
    }());

  </script>

</div>
<?php include "footer.php"; ?>
</body>
</html>
