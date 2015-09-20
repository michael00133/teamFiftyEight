<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8"> 
    <title>TraceMe</title>
</head>
<body>
<?php include "navbar.php"; ?>
<div class="wrapper">

<video id="DemoVideo" autoplay loop>
  <source src="images/DemoVideo.mp4" type="video/mp4">
  mp4 not suppored
</video>

<script>
	var vid = document.getElementById("DemoVideo");
	vid.playbackRate = 0.7;
</script>

<h1 class="heading">Our Team</h1>
<div class="banner">
    <img class="bannerimg" src="images/TeamPhoto.png" alt="Team LHHEM">
</div>
<div class="banner">
    <img id="TeamPhotoSS" src="images/TeamPhoto2.png" alt="Team Photos">
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
