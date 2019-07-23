<?php
include_once "../page/commom/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" text="text/css" href="style.css" />
  <title>About</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  

</head>
<body>

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
          <form action="../db/donate.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Donate Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php if (isset($_SESSION['un_authorized'])) {?>
  <div id="alert-info" class="alert alert-error" role="alert">
  Please Login to Donate.
</div>
<script>
  setTimeout(function() {
    $('#alert-info').fadeOut('fast');
}, 2000); // <-- time in milliseconds
  </script>
  <?php }?>
  <div class="about-frame">
    <div class="hero" style="background-image: url('../image/donate.jpg');">
      <div class="hero-overlay">
      </div>
      <div class="info-text">
        <h1>
          THERE IS MORE THAN ONE WAY TO GIVE
        </h1>
      </div>
    </div>
    <div class="mission">
      <h2>We Need Our Help</h2>
      <div class="info-text">
        <p style="text-align: center;color:gray">
          It’s been such an honor to play a role in bringing the issue of plastic pollution to the forefront. But much
          work is still to be done and thus our need for funding has never been greater. Please help us continue and
          expand our work in 2019 and beyond. Click below to donate or learn more about our initiatives.
        </p>
      </div>
    </div>
    <hr style="background: red;max-width: 500px;text-align: center" />
    <div class="mission">
      <h2>Donate</h2>
      <div class="info-text">
        <p style="text-align: center;color:gray">
          Your contributions help reduce pollution caused by single-use plastics.
          </br>
          Let's work together.
        </p>
      </div>
      
          <a onclick="return donateClick()" 
          data-toggle="modal" 
          data-target="#openDonateForm"
           class="donate-btn">Donate Now</a>
           <p id="change"> sd</p>
    </div>
  </div>
<!-- Button trigger modal -->
<a href="#Modal">Open modal</a>
  <?php include_once '../page/commom/footer.php'?>
<script>

$('a[href$="#Modal"]').on( "click", function() {
console.log("hey");
   $('#Modal').modal('show');
});

 function donateClick() {
  // $("#openDonateForm").modal('show');

  Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)


return false;
}
</script>
<?php 
  if(isset($_SESSION['un_authorized'])){
    unset($_SESSION['un_authorized']);
  }
?>
</body>
</html>