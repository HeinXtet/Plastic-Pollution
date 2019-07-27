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

  <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" text="text/css" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>

<body>

<?php

if (isset($_SESSION['user_wrong_password'])) {?>

      <script>
      Swal.fire({
          type: 'error',
          title: 'Warning',
          text: '<?php echo $_SESSION['user_wrong_password'] ?>',
        })
      </script>
  <?php }

if (isset($_SESSION['chnage_password_success'])) {?>
  <script>
  Swal.fire({
      type: 'success',
      title: 'Successful',
      text: '<?php echo $_SESSION['chnage_password_success'] ?>',
    })
  </script>
<?php }

?>





<?php
if (isset($_SESSION['user_update_success'])) {?>
      <script>
      Swal.fire({
          type: 'success',
          title: 'Profile Update',
          text: 'Your profile is update successfully',
        })
      </script>
  <?php }
?>

<?php
if (isset($_SESSION['attampts'])) {
    if ($_SESSION['attampts'] > 3) {
      echo '<script> Swal.fire({
        type: "error",
        title: "Warning",
        text: "Your login fail please wait 3 mins",
      })</script>';
    }
}
?>

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"])) {
        $email = $_POST['email'];
        include_once '../db/donate.php';
        $donate = new Donate();
        $isSuccess = $donate->donate();
        if ($isSuccess) {
            echo '<script> Swal.fire({
                type: "success",
                title: "Donation Successful",
                text: "Thank for your donation and contribute",
              })</script>';
        }
    }
}
?>
  <div class="modal fade" id="openDonateForm" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background: white">
        <div class="modal-header">
          <p>Donation Form</p>
          <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
              aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button style="margin-left:20px;margin-bottom:20px;" type="submit" class="btn btn-primary">Donate Now</button>
      </form>
      </div>
    </div>
  </div>
  </div>

  <?php
if (isset($_SESSION['email'])) {?>
  <a href="#" data-toggle="modal" data-target="#openDonateForm" style="text-decoration:none;position: fixed;
    top:50%;right: 2px;margin: 0 auto;background: red;
    padding:10px;color:white;width: 130px;text-align: center;z-index: 1000">Donate</a>
  <?php } else {?>
  <a href="#" onclick="donateClick()" style="text-decoration:none;position: fixed;
    top:50%;right: 2px;margin: 0 auto;background: red;
    padding:10px;color:white;width: 130px;text-align: center;z-index: 1000">Donate</a>
  <?php }
?>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>


    <!-- Wrapper for slides -->
    <div style="max-height:600px" class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="slider-label">
          <h4 style="color: white;"><span style="font-size: 30px;font-weight: 600">
              #RethinkPlastic</span><br><br>
            Our Mission Is To Inform, Inspire and Incite On The Issue of Plastic Pollution.</h4>
        </div>
        <img src="../image/ocean.jpeg" class="d-block w-100" alt="...">

      </div>
      <div class="item">
        <div class="slider-bg-dark">
          <h3 style="color: aqua;font-size: 20px;margin-top: 20px;" class="slider-bg-dark-label">
            For A Better Planet. For A Better You.<br>
            <span style="color: white;font-size: 15px">Serving our oceans and the public to end plastic
              pollution.</span>
          </h3>
        </div>
        <img src="../image/reduce-plastic.jpg" class="d-block w-100" alt="...">
      </div>

      <div class="item">
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
      ...
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
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
      <div class="row">
        <div class="col-md-6" id="overflowTest">
          <a class="twitter-timeline" href="https://twitter.com/PlasticPollutes?ref_src=twsrc%5Etfw">Tweets by
            PlasticPollutes</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="col-md-6" id="fact-text">
          <h2 style="padding:10%;font-weight:bold;margin-top: 20px">
            There are many facets to the plastic pollution problem.
          </h2>
        </div>
      </div>
      <div class="row hero" style="background-image: url('../image/plastic_1.jpg');">
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
      <div class="row hero" style="background-image: url('../image/child.jpg');">
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
      <div class="row hero" style="background-image: url('../image/mechine.jpg');">
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

      <div class="row hero" style="background-image: url('../image/plastic2.jpg');">
        <div class="hero-overlay">
        </div>
        <div class="info-text">
          <h1>
            Plastic pollution is an environmental and social justice issue. </h1>
          <p>
            Fenceline communities are most adversely affected by plastic pollution at every stage of its lifecycle. </p>
        </div>
      </div>
      <div class="row">
          <?php include_once '../page/commom/footer.php'?>

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
    <script>
      function donateClick() {
        Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'Please Login or Sign Up to Donate.',
        })

        return false;
      }
    </script>
</body>

</html>
<?php
if ($_SESSION['attampts'] < 3) {
    unset($_SESSION['error']);
}
?>

<?php
unset($_SESSION['user_update_success']);
?>

<?php
unset($_SESSION['user_wrong_password']);
?>

<?php
unset($_SESSION[
    'chnage_password_success'
])
?>