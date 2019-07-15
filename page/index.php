<!DOCTYPE html>
<?php
    include_once("../page/commom/navbar.php");
    if(isset($_SESSION['attampts'])){
      if($_SESSION['attampts'] >= 0) { echo "Over three time"?>
      <script>
// Set the date we're counting down to
var d1 = new Date (),
countDownDate = new Date ( d1 );
    countDownDate.setMinutes ( d1.getMinutes() + 30 );
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="demo"
  document.getElementById("count").innerHTML = minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("c").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
     <?php }} ?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<?php 

      if(isset($_SESSION['error'])){ ?>
<div style="margin:30px;" class="alert alert-danger" role="alert">
          <?php echo $_SESSION['error']; ?>
        </div>
     <?php }
?>
<p id="count"></p>
<form action="index.php" name="form1" id="form1">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

    </ol>
    <div style="max-height: 500px" class="carousel-inner">
      <div class="carousel-item active">
        <div class="slider-label">
          <h4 style="color: white;"><span style="font-size: 30px;font-weight: 600">
              #RethinkPlastic</span><br><br>
            Our Mission Is To Inform, Inspire and Incite On The Issue of Plastic Pollution.</h4>
        </div>
        <img src="../image/ocean.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <div class="slider-bg-dark">
          <h3 style="color: aqua;font-size: 30px" class="slider-bg-dark-label">
            For A Better Planet. For A Better You.<br>
            <span style="color: white;font-size: 15px">Serving our oceans and the public to end plastic pollution.</span>
          </h3>
        </div>
        <img src="../image/reduce-plastic.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
          <div style="position: absolute;height: 100%;width: 100%;background-color: rgba(0, 0, 0, 0.2)">
            <h4 style="color: white;font-size: 40px;margin-left: 20px;font-weight: 300 ;margin-top: 10%;">
                IT’S <span style="color: aqua">NOT</span> JUST ABOUT <span style="color: aqua">US</span><br>
            </h4>
            <p style="padding-left: 20px; font-size: 20px;color: white">
              Humans created the problem, but it impacts all living creatures and the entire planet.
            </p>
          </div>
          <img style="background-color: blue"  src="../image/pig.jpeg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">



    <div class="content-frame">
        <p>
        Plastic pollution is the accumulation of plastic objects (e.g.: plastic bottles and much more) in the Earth's
        environment that adversely affects wildlife, wildlife habitat, and humans.[1][2] Plastics that act as pollutants
        are categorized into micro-, meso-, or macro debris, based on size.[3] Plastics are inexpensive and durable, and
        as a result levels of plastic production by humans are high.[4] However, the chemical structure of most plastics
        renders them resistant to many natural processes of degradation and as a result they are slow to degrade.[5]
        Together, these two factors have led to a high prominence of plastic pollution in the environment.
        Plastic pollution can afflict land, waterways and oceans. It is estimated that 1.1 to 8.8 million metric tons
        (MT) of plastic waste enters the ocean from costal communities each year.[6] Living organisms, particularly
        marine animals, can be harmed either by mechanical effects, such as entanglement in plastic objects, problems
        related to ingestion of plastic waste, or through exposure to chemicals within plastics that interfere with
        their physiology. Effects on humans include disruption of various hormonal mechanisms.
      </p>
    </div>
  </div>
  <script type="text/javascript" 
  id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" 
  data-bg="#645862"
    data-fg="#FFFFFF" data-height="50px"
     data-link="#F1D600" 
     data-cookie="CookieInfoScript" 
     data-text-align="left"
    data-close-text="Got it!">
    </script>
</body>
</html>
<?php
   unset($_SESSION['error']);
?>