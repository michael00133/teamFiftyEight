<!DOCTYPE html>
<html>
<head> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8"> 
    <title>TraceMe</title>
</head>
<body>
<?php include "navbar.php"; ?>
<div class="wrapper">
<a id="banner">
    <img id="banner_notxt" src="images/banner_noblue.jpg" alt="Banner" />
    <img id="banner_txt" src="images/banner_texts.png" alt="BannerText" />
</a>

<script> 
    $(document).ready(function(){
        $("#banner_notxt").hover(function(){
            $("#banner_txt").animate({
                left: '0',
                duration: 'slow' ,
                
            });
        });
    });
</script> 
<div class="howtoimg">
    <img id="imgstepone" src="images/HowTo_StepOne.png" alt="HowToStepOne" />
    <img id="imgsteptwo" src="images/HowTo_StepTwo.png" alt="HowToStepTwo" />
</div>
    
</div>
    
    
</div>
<?php include "footer.php"; ?>
</body>
</html>
