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
  <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" text="text/css" href="style.css" />
  <title>Contact</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
  <?php
if (isset($_SESSION['contact'])) {
    if ($_SESSION['contact'] == true)  {?>
        <script>
Swal.fire({
      type: 'success',
      title: 'Message has been sent',
      text: 'Your message is has been sent our inbox.Thank you for contribute',
    })
        </script>
    <?php } else  {?>
      <script>
Swal.fire({
      type: 'error',
      title: 'Message has not been sent',
      text: 'Sorry currently cannot not send to our inbox.Please try again. ',
    })
</script>
  <?php   }
}

?>
  <div>
    <div class="row hero" style="background-image: url('../image/ocean2.png')">
      <div class="hero-overlay">
      </div>
      <div class="info-text">
        <h1>
          LIKE TO KNOW MORE?
        </h1>
        <p>
          Complete the form and we will be in touch with further information.
        </p>
      </div>
    </div>
    <div class="row info-text" style="max-width: 700px;padding:3%">
      <div style="text-align: center">
        <form method="POST" action="../../../plastic/db/contactData.php">
          <div class="col-md-6">
            <div class="form-group">
              <label style="float:left" for="name">Name(required)</label>
              <input required type="text" name="name" class="form-control" id="name" placeholder="name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email" style="float: left">Email</label>
              <input required type="email" name="email" class="form-control" id="email" placeholder="email">
            </div>
          </div>
          <div class="form-group col-md-12">
            <label for="message" style="float: left">Message(required)</label>
            <textarea required type="message" name="message" class="form-control" id="message"
              placeholder="Message"></textarea>
          </div>
          <input type="hidden" name="contact" />
          <div style="margin: 0 auto;width:100%;" class="col-md-6">
            <button style="width: 400px; text-align: center;background:red;border:red;border-radius:0px;
            margin: 0 auto;" type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include_once "../page/commom/footer.php"?>
</body>

</html>

<?php 

  unset($_SESSION['contact']);

?>