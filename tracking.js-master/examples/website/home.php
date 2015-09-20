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
                duration: '100000' ,
                
            });
        });
    });
</script> 
<h1 class="heading">How to Get Started</h1>
<div class="howtoimg">
    <div id="stepone">
        <img id="StepOneImg" src="images/HowTo_StepOne.png" alt="HowToStepOne" />
        <h1 id="StepOneTxt">Step One:</h1>
        <h1 id="StepOneTxt">Choose a lesson.</h1>
    </div>
    <div id="steptwo">
        <img id="StepTwoImg" src="images/HowTo_StepTwo.png" alt="HowToStepTwo" />
        <h1 id="StepTwoTxt">Step Two: </h1>
        <h1 id="StepTwoTxt">Start TRACEME.</h1>
    </div>
    <div id="stepthree">
        <img id="StepThreeImg" src="images/HowTo_StepThree.png" alt="HowToStepThree" />
        <h1 id="StepThreeTxt">Step Three:</h1>
        <h1 id="StepThreeTxt">Turn on GLOVEME.</h1>
    </div>
    <div id="stepfour">
        <img id="StepFourImg" src="images/HowTo_StepFour.png" alt="HowToStepFour" />
        <h1 id="StepFourTxt">Step Four:</h1>
        <h1 id="StepFourTxt">Trace dotted lines.</h1>
    </div>
</div>
    
</div>
    
    
</div>
<?php include "footer.php"; ?>
</body>
</html>
