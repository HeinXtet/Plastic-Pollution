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
  <title>About</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<?php

$success = false;

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
          <form method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Enter First Name</label>
              <input required type="text" name="first_name" class="form-control" id="name"
                placeholder="Enter First Name">
            </div>
            <div class="form-group col-md-6">
              <label>Enter Last Name</label>
              <input required type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Email address</label>
              <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group col-md-12">
              <label for="message" style="float: left">Message(required)</label>
              <textarea required type="message" name="message" class="form-control" id="message"
                placeholder="Message"></textarea>
            </div>
        </div>
        <button style="margin-left:20px;margin-bottom:20px;" type="submit" class="btn btn-primary">Donate Now</button>
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
    setTimeout(function () {
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

        <?php
$selectDoanteQuery = "SELECT COUNT(donate_id) as total
          FROM  donate";
include_once '../db/config.php';

$result = $conn->query($selectDoanteQuery);
$data = $result->fetch_assoc();
$count = $data['total'];
$message = 'We Have  Currently ' . $count . " Contributer";
echo '<p style="color:black;font-size:30px"> ' . $message . "</p>";

?>
      </div>

      <?php 
          if(isset($_SESSION['email'])) {?>
      <div class="container">

        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th style="text-align: center">First Name</th>
              <th style="text-align: center">Last Name</th>
              <th style="text-align: center">Email</th>
              <th style="text-align: center">Comment</th>
            </tr>
          </thead>

          <tbody>


            <?php
include_once '../db/config.php';
$selectAllDonate = "SELECT * FROM donate";
$result = $conn->query($selectAllDonate);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>
   <td>" . $row['first_name'] . "</td>
   <td>" . $row['last_name'] . "</td>
   <td>" . $row['email'] . "</td>
   <td>" . $row['message'] . "</td>

 </tr>";
}?>

          </tbody>

        </table>
      </div>
      <?php
          }
        ?>

      <div style="margin-top:40px"></div>
      <a data-toggle="modal" data-target="#openDonateForm" class="donate-btn">
        <span style="color:white">Donate</span></a>
      <!-- <?php if (isset($_SESSION['email'])) {?>
        <a data-toggle="modal" data-target="#openDonateForm" class="donate-btn">
          <span style="color:white">Donate</span></a>
     <?php } else {?>
      <a onclick='donateClick()' class="donate-btn"> Donate
        </a>
     <?php }?> -->



    </div>


    <div class="container">
      <h1>The Eleven Most Important Types of Plastic</h1>
      <p style="font-size:16px;color:gray;margin-top:24px;margin-bottom:24px">
        One of the major innovations of the past century has been the introduction and wide adoption of plastics for
        many day-to-day applications that previously relied on traditional materials like metal, glass, or cotton.
        Plastics have revolutionized many industries for a number of different reasons to include the fact that they
        resist environmental degradation over time, are generally safe for human beings, are economical and widely
        available, and are produced with a wide variety of material properties that allow adaptation to many different
        applications. Here is our list of the top 11 plastics the modern world simply cannot do without:
      </p>

      <h2><span>
          1.
        </span>Polyethylene terephthalate (PETE or PET):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        PET is the most widely produced plastic in the world. It is used predominantly as a fiber (known by the trade
        name “polyester”) and for bottling or packaging. For example, PET is the plastic used for bottled water and is
        highly recyclable.
      </p>
      <div class="row" style="width: 100%">
        <div style="margin:auto">
          <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
            src="../image/plastic_type1.png" />
          <p style="text-align: center;color:gray;font-size:14px">PET plastic water bottle
          </p>
        </div>
        <div style="margin:auto">
          <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
            src="../image/plastic_type2.png" />
          <p style="text-align: center;color:gray;font-size:14px">Polyester Fabric
          </p>
        </div>
        <p style="font-size: 18px;color:gray">
          Three words or short phrases to describe the major benefits of Polyethylene relative to other plastics and
          materials would be:
        </p>
        <ul>
          <li style="font-size: 16px;color:gray">Wide applications as a fiber (“polyester”)</li>
          <li style="font-size: 16px;color:gray">Extremely effective moisture barrier</li>
          <li style="font-size: 16px;color:gray">Shatterproof</li>
        </ul>
      </div>


      <h2><span>
          2.
        </span>Polyethylene (PE):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        There are a number of different variants of polyethylene. Low and high density polyethylene (LDPE and HDPE
        respectively) are the two most common and the material properties vary across the different variants.
      </p>

      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type2_1.png" />
        <p style="text-align: center;color:gray;font-size:14px">Polyester Fabric
        </p>
      </div>

      <p style="color:gray;padding:22px;font-size:18px">
        LDPE: LDPE is the plastic used for plastic bags in grocery stores. It has high ductility but low tensile
        strength.
        <br>
        <br>
        HDPE: A stiff plastic used for more robust plastic packaging like laundry detergent containers as well as for
        construction applications or trash bins.
        <br>
        <br>
        UHMW: Extremely strong plastic that can rival or even exceed steel in strength and is used is for applications
        like medical devices (e.g. artificial hips).
      </p>



      <h2><span>
          3.
        </span>Polyvinyl Chloride (PVC):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        Polyvinyl Chloride is perhaps most well known for its use in residential and commercial property construction
        applications. Different types of PVC are used for plumbing, insulation of electrical wires, and “vinyl” siding.
        In
        the construction business PVC pipe is often referred to by the term “schedule 40” which indicates the thickness
        of
        the pipe relative to its length.
      </p>


      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type_2_2.png" />
        <p style="text-align: center;color:gray;font-size:14px">Schedule 40 PVC pipe
        </p>
      </div>

      <p style="color:gray;padding:22px;font-size:18px">
        Three words or short phrases to describe the major benefits of PVC relative to other plastics and materials
        would be:

        <ul>
          <li style="font-size: 16px;color:gray">Brittle</li>
          <li style="font-size: 16px;color:gray"> Rigid (although different PVC variants are actually designed to be
            very flexible)
          </li>
          <li style="font-size: 16px;color:gray">Strong</li>
        </ul>


      </p>

      <h2><span>
          4.
        </span>Polypropylene (PP):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        Polypropylene is used in a variety of applications to include packaging for consumer products, plastic parts for
        the automotive industry, special devices like living hinges, and textiles. It is semi-transparent, has a
        low-friction surface, doesn’t react well with liquids, is easily repaired from damage and has good electrical
        resistance (i.e. it is a good electrical insulator). Perhaps most importantly, polypropylene is adaptable to a
        variety of manufacturing techniques which makes it one of the most commonly produced and highly demanded
        plastics on the market.
      </p>
      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type_4.png" />
        <p style="text-align: center;color:gray;font-size:14px">Living hinge prototype cap CNC machined from
          polypropylene
        </p>
      </div>



      <h2><span>
          5.
        </span>Polystyrene (PS):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        Polystyrene is used widely in packaging under the trade name “styrofoam.” It is also available as a naturally
        transparent solid commonly used for consumer products like soft drink lids or medical devices like test tubes or
        petri dishes.
      </p>
      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type_5.png" />
        <p style="text-align: center;color:gray;font-size:14px">Styrofoam peanuts
          polypropylene
        </p>
      </div>



      <h2><span>
          6.
        </span> Polylactic Acid (PLA):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        Polylactic Acid is unique in relation to the other plastics on this list in that it is derived from biomass
        rather than petroleum. Accordingly it biodegrades much quicker than traditional plastic materials.
      </p>
      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type_6.png" />
        <p style="text-align: center;color:gray;font-size:14px">Styrofoam peanuts
          A cup made from bioplastic PLA

        </p>
      </div>


      <h2><span>
          7.
        </span> Polycarbonate (PC):</h2>
      <p style="color:gray;padding:22px;font-size:18px">
        Polycarbonate is a transparent material known for its particularly high impact strength relative to other
        plastics. It is used in greenhouses where high transmissivity and high strength are both required or in riot
        gear for police.
      </p>
      <div style="margin:auto">
        <img style="display: block;text-align: center;margin: auto" width="200px" height="200px"
          src="../image/plastic_type_7.png" />
        <p style="text-align: center;color:gray;font-size:14px">
          A polycarbonate greenhouse



        </p>
      </div>


    </div>



  </div>
  <?php include_once '../page/commom/footer.php'?>
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
  <?php
if (isset($_SESSION['un_authorized'])) {
    unset($_SESSION['un_authorized']);
}
?>
</body>

</html>