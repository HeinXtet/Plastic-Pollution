<?php
session_start();
$user = null;
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <a style="margin-top: 20"
     type="button"
    class="view_data btn btn-success
     col-md-offset-5 col-md-2"
     name="edit" value="Edit"
      data-id="<?php echo $_SESSION["user_id"]; ?>"
    >Edit</a>

  <div class="modal fade" id="openSignUpForm" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">SignUp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">SignIn</a>
            </li>
          </ul>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <form method="POST" action="../../../plastic/db/registration.php">
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input required type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter FastName">
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input required type="text" name="lastName" class="form-control" id="lastName" placeholder="Enter LastName">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confrimPass">Confirm Password</label>
                  <input required name="confirmPassword" type="password" class="form-control" id="confirmPassword"
                    placeholder="Confirm Password">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <form method="POST" action="../../../plastic/db/registration.php">
                <div class="form-group">
                  <input type="hidden" name="login" />
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign In</button>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  <!-- USSER PROFILE  -->



  <div class="modal fade" id="openUserProfile" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Edit Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Change Password</a>
            </li>
          </ul>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <form method="POST" action="../../../plastic/db/registration.php">

                <div class="form-group">
                  <label for="firstName"><?php echo $user['first_name'] ?></label>
                  <input type="text"
                  value='<?php echo $user['first_name'] ?>'
                  name="firstName" class="form-control"
                  id="firstName" placeholder="Enter FastName">
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" name="lastName"
                  value='<?php echo $user['first_name'] ?>'
                  class="form-control" id="lastName" placeholder="Enter LastName">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                </div>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <form method="POST" action="../../../plastic/db/registration.php">
                <div class="form-group">
                  <input type="hidden" name="login" />
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign In</button>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>


  <div style="background:black">
    <nav class="navbar navbar-expand-lg navbar-1">
      <a class="navbar-brand" href="#" style="color: green">Plastic Pollution</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a id="nav-item-ul" class="nav-link" href="../page/index.php">Home <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/about.php">About</a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/latest_new.php">Latest News</a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/strategy.php">Strategy</a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/campagins.php">Campagins</a>
          </li>
          <li class="nav-item">
            <a id="nav-item-ul" class="nav-link" href="../page/help.php">Help</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
if (isset($_SESSION['email'])) {?>
  <input type='button' value='Show Edit Modal' id='ShowModalButton' onclick="editUser()" />
  <a data-toggle="modal" data-target="#openUserProfile"  style="display:block;text-decoration:none;color:white">
          <div style="width: 50px;height:50px;background-color: #2e2e2e;
        margin-right:30px;
border-radius: 50%;
display: inline-block;">
            <p style="text-align:center;margin-top:25%;color:white"><?php
$firstCharacter = substr($_SESSION['email'], 0, 1);
    echo ucfirst($firstCharacter);
    ?>
              <a href="#"></a></p>
          </div>
        </a>
        <form method="POST" action="../../../plastic/db/registration.php">
          <input type="hidden" name="clear" class="form-control">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">SignOut</button>
        </form>
        <?php } else {?>
        <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal"
          data-target="#openSignUpForm">SingUp Now</button>
        <?php }?>
      </div>
    </nav>
  </div>
  
  <style>
    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
      color: #ffffff;
      border-bottom: 2px solid #1a242f;
      background: none;
    }
  </style>
</body>
</html>