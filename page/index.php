<!DOCTYPE html>
<?php
include_once "../page/commom/navbar.php";
if (!isset($_SESSION['attampts'])) {
    $_SESSION['attampts'] = 0;
}
?>

<!-- print_r($_SESSION); -->
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
  <link rel="stylesheet" text="text/css" href="style.css" />
</head>

<body>
  <?php
if (isset($_SESSION['error'])) {?>
  <?php
if ($_SESSION['attampts'] >= 1) {?>
  <div style="margin:30px;" id="error-alert" class="alert alert-danger" role="alert">
    <?php echo $_SESSION['error']; ?> <p class="countdown"></p>
  </div>
  <?php } else {?>
  <div style="margin:30px;" id="error-alert" class="alert alert-danger" role="alert">
    <?php echo $_SESSION['error']; ?>
  </div>
  <?php }?>
  <?php }
?>
  <?php

?>
  <div class="modal fade" id="openDonateForm" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background: black">
        <div class="modal-header">
          <p style="text-align:center;color: white">Donation Form</p>
          <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../db/donate.php" method="POST">
            <div class="form-group">
              <label style="color: white" for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#openDonateForm"
    style="text-decoration:none;position: fixed;top:50%;right: 2px;margin: 0 auto;background: red;padding:10px;color:white;width: 130px;text-align: center;z-index: 1000">Donate</a>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="z-index:1">
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
          <h3 style="color: aqua;font-size: 20px;margin-top: 20px;" class="slider-bg-dark-label">
            For A Better Planet. For A Better You.<br>
            <span style="color: white;font-size: 15px">Serving our oceans and the public to end plastic
              pollution.</span>
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
        <img style="background-color: blue" src="../image/pig.jpeg" class="d-block w-100" alt="...">
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
  <div>
    <div class="content-frame">
      <div class="mission">
        <!-- <h1>THE MISSION</h1> -->
        <h2>THE MISSION</h2>
        <div class="info-text">
          <p style="text-align: center;color:gray">
            <span style="font-weight: bold; color: black">Plastic pollution</span> is a growing global alliance of
            individuals, organizations, businesses, and
            policymakers working toward a world free of plastic pollution and its toxic impacts on humans, animals,
            waterways, oceans, and the environment
          </p>
        </div>
      </div>
      <div class="row" style="margin-top:10%;">
        <iframe width="100%" height="550" src="https://www.youtube.com/embed/9znvqIkIM-A">
        </iframe>
      </div>
      <div class="row" style="height: 400px">
        <div class="col-md-6" id="overflowTest">
          <a class="twitter-timeline" href="https://twitter.com/PlasticPollutes?ref_src=twsrc%5Etfw">Tweets by
            PlasticPollutes</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-md-6 info-text">
          <h2 style="padding:10%;font-weight:bold;margin-top: 20px">
            There are many facets to the plastic pollution problem.
          </h2>
        </div>
      </div>
      <div class="hero" style="background-image: url('../image/plastic_1.jpg');">
        <div class="hero-overlay">
        </div>
        <div class="info-text">
          <h1>
            Worldwide reliance on disposable plastic packaging is overwhelming our planet.
          </h1>
          <p>
            By 2050, the oceans will contain more plastic than fish by weight.
          </p>
        </div>
      </div>
      <div class="hero" style="background-image: url('../image/child.jpg');">
        <div class="hero-overlay">
        </div>
        <div class="info-text">
          <h1>
            Plastic pollution is toxic to human health.
          </h1>
          <p>
            Even babies are born pre-polluted.
          </p>
        </div>
      </div>
      <div class="hero" style="background-image: url('../image/mechine.jpg');">
        <div class="hero-overlay">
        </div>
        <div class="info-text">
          <h1>
            Plastic pollution and climate change are parallel global emergencies.
          </h1>
          <p>
            Plastic is a petroleum product; to truly divest from fossil fuels, we must reduce our collective plastic
            footprint.
          </p>
        </div>
      </div>

      <div class="hero" style="background-image: url('../image/plastic2.jpg');">
        <div class="hero-overlay">
        </div>
        <div class="info-text">
          <h1>
            Plastic pollution is an environmental and social justice issue. </h1>
          <p>
            Fenceline communities are most adversely affected by plastic pollution at every stage of its lifecycle. </p>
        </div>
      </div>
      <?php include_once '../page/commom/footer.php'?>

    </div>
    <script type="text/javascript" id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" data-bg="#645862"
      data-fg="#FFFFFF" data-height="50px" data-link="#F1D600" data-cookie="CookieInfoScript" data-text-align="left"
      data-close-text="Got it!">
      </script>
    <script>
      $(document).ready(function () {
        var timer2 = localStorage.getItem('timer');
        if (timer2 === null) timer2 = "0:10";
        $('.countdown').html(timer2);
        var interval = setInterval(function () {
          var timer = timer2.split(':');
          var minutes = parseInt(timer[0], 10);
          var seconds = parseInt(timer[1], 10);
          --seconds;
          minutes = (seconds < 0) ? --minutes : minutes;
          if (minutes < 0) {

            // <?php echo "alert('message ');";
            $_SESSION[
              'test'
            ] = 'teste32';
            ($_SESSION['attampts'] = 0);
?>
          clearInterval(interval);
        localStorage.removeItem('timer');
        $('.countdown').html("finish");
        $('#error-alert').hide();
      }else {
          seconds = (seconds < 0) ? 59 : seconds;
          seconds = (seconds < 10) ? '0' + seconds : seconds;
          $('.countdown').html(minutes + ':' + seconds);
          timer2 = minutes + ':' + seconds;
          localStorage.setItem('timer', timer2);
        }
          }, 1000);
      });

    </script>
</body>

</html>
<?php
if ($_SESSION['attampts'] < 3) {
    unset($_SESSION['error']);
}
?>