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
include_once "../db/donate.php";
$donate = new Donate();
if ($donate->isDonated == true) {
  echo "donated";
}
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
      </div >
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
      <div class="info-text">
        <h2 style="padding:10%;font-weight:bold">
          There are many facets to the plastic pollution problem.
        </h2>
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
      <div style="background-color: black;height: 100vh">
        <h3 style="text-align: center;color:white;padding:5%;">Follow on Social</h3>
        <div style="position:absolute;width: 100%;">
          <nav class="navbar navbar-default" style="text-align: center;margin:0 auto;max-width: 300px">
            <a class="hover-link" href="#">
              <svg class="svg-icon" id="facebook" viewBox="0 0 20 20">
                <path fill="none"
                  d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z">
                </path>
              </svg>
            </a>
            <a>
              <svg class="svg-icon" id="twitter" viewBox="0 0 20 20">
                <path fill="none"
                  d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266">
                </path>
              </svg>
            </a>
            <a href="#">
              <svg class="svg-icon" id="youtube" viewBox="0 0 20 20">
                <path fill="none"
                  d="M9.426,7.625h0.271c0.596,0,1.079-0.48,1.079-1.073V4.808c0-0.593-0.483-1.073-1.079-1.073H9.426c-0.597,0-1.079,0.48-1.079,1.073v1.745C8.347,7.145,8.83,7.625,9.426,7.625 M9.156,4.741c0-0.222,0.182-0.402,0.404-0.402c0.225,0,0.405,0.18,0.405,0.402V6.62c0,0.222-0.181,0.402-0.405,0.402c-0.223,0-0.404-0.181-0.404-0.402V4.741z M12.126,7.625c0.539,0,1.013-0.47,1.013-0.47v0.403h0.81V3.735h-0.81v2.952c0,0-0.271,0.335-0.54,0.335c-0.271,0-0.271-0.202-0.271-0.202V3.735h-0.81v3.354C11.519,7.089,11.586,7.625,12.126,7.625 M6.254,7.559H7.2v-2.08l1.079-2.952H7.401L6.727,4.473L6.052,2.527H5.107l1.146,2.952V7.559z M11.586,12.003c-0.175,0-0.312,0.104-0.405,0.204v2.706c0.086,0.091,0.213,0.18,0.405,0.18c0.405,0,0.405-0.451,0.405-0.451v-2.188C11.991,12.453,11.924,12.003,11.586,12.003 M14.961,8.463c0,0-2.477-0.129-4.961-0.129c-2.475,0-4.96,0.129-4.96,0.129c-1.119,0-2.025,0.864-2.025,1.93c0,0-0.203,1.252-0.203,2.511c0,1.252,0.203,2.51,0.203,2.51c0,1.066,0.906,1.931,2.025,1.931c0,0,2.438,0.129,4.96,0.129c2.437,0,4.961-0.129,4.961-0.129c1.117,0,2.024-0.864,2.024-1.931c0,0,0.202-1.268,0.202-2.51c0-1.268-0.202-2.511-0.202-2.511C16.985,9.328,16.078,8.463,14.961,8.463 M7.065,10.651H6.052v5.085H5.107v-5.085H4.095V9.814h2.97V10.651z M9.628,15.736h-0.81v-0.386c0,0-0.472,0.45-1.012,0.45c-0.54,0-0.606-0.515-0.606-0.515v-3.991h0.809v3.733c0,0,0,0.193,0.271,0.193c0.27,0,0.54-0.322,0.54-0.322v-3.604h0.81V15.736z M12.801,14.771c0,0,0,1.03-0.742,1.03c-0.455,0-0.73-0.241-0.878-0.429v0.364h-0.876V9.814h0.876v1.92c0.135-0.142,0.464-0.439,0.878-0.439c0.54,0,0.742,0.45,0.742,1.03V14.771z M15.973,12.39v1.287h-1.688v0.965c0,0,0,0.451,0.405,0.451s0.405-0.451,0.405-0.451v-0.45h0.877v0.708c0,0-0.136,0.901-1.215,0.901c-1.08,0-1.282-0.901-1.282-0.901v-2.51c0,0,0-1.095,1.282-1.095S15.973,12.39,15.973,12.39 M14.69,12.003c-0.405,0-0.405,0.45-0.405,0.45v0.579h0.811v-0.579C15.096,12.453,15.096,12.003,14.69,12.003">
                </path>
              </svg>
            </a>
            <a href="#">
              <svg class="svg-icon" id="instagram" viewBox="0 0 20 20">
                <path fill="none"
                  d="M14.52,2.469H5.482c-1.664,0-3.013,1.349-3.013,3.013v9.038c0,1.662,1.349,3.012,3.013,3.012h9.038c1.662,0,3.012-1.35,3.012-3.012V5.482C17.531,3.818,16.182,2.469,14.52,2.469 M13.012,4.729h2.26v2.259h-2.26V4.729z M10,6.988c1.664,0,3.012,1.349,3.012,3.012c0,1.664-1.348,3.013-3.012,3.013c-1.664,0-3.012-1.349-3.012-3.013C6.988,8.336,8.336,6.988,10,6.988 M16.025,14.52c0,0.831-0.676,1.506-1.506,1.506H5.482c-0.831,0-1.507-0.675-1.507-1.506V9.247h1.583C5.516,9.494,5.482,9.743,5.482,10c0,2.497,2.023,4.52,4.518,4.52c2.494,0,4.52-2.022,4.52-4.52c0-0.257-0.035-0.506-0.076-0.753h1.582V14.52z">
                </path>
              </svg>
            </a>
          </nav>
          <div style="text-align: center;display: block;margin: 3%;">
            <img src="../image/plastic3.png" />
          </div>
          <?php include_once '../page/commom/footer.php'?>
        </div>
      </div>
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