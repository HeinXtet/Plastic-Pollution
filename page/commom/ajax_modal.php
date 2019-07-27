<?php
include_once "../../db/config.php";
session_start();
// $id = $_GET['user_id'];
$id = $_SESSION[
    "user_id"
];
$sel_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$id'") or die(mysql_error($conn));
$user = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'edit_user')" id="defaultOpen">Edit User Details</button>
  <button class="tablinks" onclick="openCity(event, 'change_password')">Change Password</button>
</div>

<div id="edit_user" class="tabcontent">
  <form method="POST" action="../../../plastic/db/userprofile.php">
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" required value='<?php echo $user['first_name'] ?>' name="firstName" class="form-control" id="firstName"
        placeholder="Enter FastName">
    </div>
    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" required name="lastName" value='<?php echo $user['first_name'] ?>' class="form-control" id="lastName"
        placeholder="Enter LastName">
    </div>
    <div class="form-group">
      <input type="hidden" required  value='<?php echo $user['email'] ?>' name="email" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" value='<?php echo $user['address'] ?>' class="form-control" id="address"
          placeholder="Address">
      </div>
    <input type="hidden" value="update" name="update"/>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

</div>
<div id="change_password" class="tabcontent">
  <form method="POST" action="../../../plastic/db/userprofile.php">
    <div class="form-group">
      <label for="oldPass">Old Password</label>
      <input type="password" required name="old_password" class="form-control" id="exampleInputPassword"
        placeholder="Old Password">
    </div>

    <div class="form-group">
      <label for="newPass">New Password</label>
      <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1"
        placeholder="New Password">
    </div>
    <input type="hidden" value="change_password"name="change_password"/>
    <button type="submit" class="btn btn-primary">Change Password</button>

  </form>
</div>


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