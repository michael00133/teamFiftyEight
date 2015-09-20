<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="../assets/demo.css">

    <script src="../../build/tracking.js"></script>
    <script src="../assets/splines.min.js"></script>


  <style>
    #canvas_img,
    #canvas_draw {
      height: 600px;
      position: absolute;
      width: 800px;
      z-index = 2;
    }

    #video {
      height: 600px;
      position: absolute;
      width: 800px;
      z-index = 1;
    }

    video {
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
        <canvas id="canvas_img" style="left:0; right:0; margin: 0 auto;"  width="800" height="600"></canvas>
        <canvas id="canvas_draw" style="left:0; right:0; margin: 0 auto; filter: FlipH;
         -moz-transform: scale(-1, 1); -o-transform: scale(-1, 1);
         -webkit-transform: scale(-1, 1); transform: scale(-1, 1);" width="800" height="600"></canvas>
    </div>

    <div style="text-align: center">
        <br><br><br>
        <button id="next-button" onclick="projectLetter()">Let's try writing 0!</button>
        <p><button id="check-button" onclick="computeScore()">Let's check!</button></p>
    </div>

  <script>
    var del = false;
    var imgList = ["0", "1", "2","3","4","5","6","7","8","9"];
    var idx = 0;
    var image = new Image();
    var button = document.getElementById('next-button');
    var button2 = document.getElementById('check-button');

    var video = document.getElementById('video');
    var canvas_draw = document.getElementById('canvas_draw');
    var context_draw = canvas_draw.getContext('2d');
    var canvas_img = document.getElementById('canvas_img');
    var context_img = canvas_img.getContext('2d');

    var drawSegments = [[]];
    var segment = 0;
    var tracker = new tracking.ColorTracker(['red', 'green']);

    var img_data;
    var draw_data;
    var img_pixel;
    var draw_pixel;
    var diff_pixel;

    function projectLetter() {
      clear(context_img);
      image.onload = function (){
        context_img.drawImage(image, 240, 115, 300, 350);
      }
      image.src = "images/"+imgList[idx]+".png";
      img_data = context_img.getImageData(0, 0, canvas_img.width, canvas_img.height);
      img_pixel = img_data.data;
      img_pixel.map(function(elm){
        return (elm < 220 ? 0 : 1)
      });
      console.log(img_pixel);
      idx++;
      button.innerHTML = "Let's try writing "+String(idx)+"!";
      button2.innerHTML = "Let's check!";
      clear(context_draw);
    }

    function computeScore() {
      draw_data = context_draw.getImageData(0, 0, canvas_draw.width, canvas_draw.height);
      draw_pixel = draw_data.data;
      draw_pixel.map(function(elm){
        return (elm < 245 ? 0 : 1)
      });

      var sum = 0;

      if (idx == 0){
      }else{
        for (var j=0, len=draw_pixel.length; j<len; j++){
          sum += Math.pow((draw_pixel[j]-img_pixel[j]),2);
        }

        if (sum > draw_pixel.length/2){
<<<<<<< HEAD
          console.log("yay");
	  console.log(sum);
	  console.log(draw_pixel.length/2);
=======
          button2.innerHTML = "Let's try one more time!";
>>>>>>> 6b1cfd6d53ef12ba7d1580eadb2234a113ed35f8
        }else{
          button2.innerHTML = "You got it!";
        }
      }
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
    }

    function clear(context){
      context.clearRect(0, 0, canvas_draw.width, canvas_draw.height);
    }

    function erase(rect) {
      context_draw.clearRect(rect.x, rect.y, rect.width, rect.height);
    }

    function isInsideRect(x, y, rect) {
      return rect.x <= x && x <= rect.x + rect.width &&
          rect.y <= y && y <= rect.y + rect.height;
    }

    (function loop() {
        for (var i = 0, len = drawSegments.length; i < len; i++) {
            drawSpline(context_draw, drawSegments[i], 0.3, false);
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
