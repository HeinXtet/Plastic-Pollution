<!DOCTYPE html>
<html>

<head>
  <link href="style.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" />
</head>
<body>

  <?php
session_start();
?>
    <!-- edit user -->
  <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Profile</h4>
        </div>
        <div class="modal-body" id="profile">
          <p> <?php echo $data['user_id'] ?> </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myNavbar");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
  <!-- nav bar -->
  <div style="background: black">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span
              class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="color:red" class="navbar-brand" href="#">Plastic Pollution</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
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
            <li>
              <div class="view_data"
                style="margin-right:8px;margin-top:4px;padding: 8px;background:gray;border-radius:50%;width:40px;height:40px">
                <a style="text-align: center;margin-left: 33%;margin-top: 2px;
                       color: white;text-decoration: none;display: inline-block"><?php
$firstCharacter = substr($_SESSION['email'], 0, 1);
    echo ucfirst($firstCharacter);
    ?></a>
              </div>
            </li>
            <li>
              <form method="POST" action="../../../plastic/db/registration.php">
                <input type="hidden" name="clear" class="form-control">
                <button style="margin-top: 6px;margin-right: 8px;background:red;border:red;border-radius:0px""
                
                class="btn btn-warning my-2 my-sm-0"
                  type="submit">Sign Out</button>
              </form>
            </li>
            <?php } else {?>
            <li> <button style="margin-top: 6px;margin-right: 8px;background:red;border:red;border-radius:0px" type="button" class="btn btn-success my-2 my-sm-0 signup_now"
                data-toggle="modal"  data-target="#openSignUpForm">SingUp Now</button></li>
            <?php }?>


          </ul>

        </div>
      </div>
    </nav>
  </div>


  <!-- sign up form -->
  <div class="modal fade" id="openSignUpForm" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="tab">
            <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'sign_up')">Sign Up</button>
            <button class="tablinks" onclick="openCity(event, 'sign_in')">Sign In</button>
          </div>

          <div id="sign_up" class="tabcontent">
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
                  <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
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
                <button type="submit" class="btn btn-primary" onclick=" confirm('Are you sure want to Sign Up Now?') ">Sign Up</button>
              </form>
          </div>

          <div id="sign_in" class="tabcontent">
              <form method="POST" action="../../../plastic/db/registration.php">
                <div class="form-group">
                  <input type="hidden" name="login" />
                  <label required for="exampleInputEmail1">Email address</label>
                  <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
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



  <script>
    $(document).on('click', '.view_data', function () {
      //$('#dataModal').modal();
      var id = $(this).attr("user_id");
      $.ajax({
        url: "commom/ajax_modal.php",
        method: "POST",
        cache:false,
        data: { user_id: id },
        success: function (data) {
          $('#profile').html(data);
          $('#dataModal').modal('show');
        }
      });
    });

  </script>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();

  </script>

  <style>
   /* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }
  </style>
</body>

</html>