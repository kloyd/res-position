<?php

# Flash Messages
function flashMessages() {
  if ( isset($_SESSION['error']) ) {
      echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
      unset($_SESSION['error']);
  }

  if ( isset($_SESSION['success']) ) {
      echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
      unset($_SESSION['success']);
  }
}

function validateProfile() {

  if (strlen($_POST['first_name']) == 0 || strlen($_POST['last_name']) == 0 ||
      strlen($_POST['email']) == 0 || strlen($_POST['headline']) == 0 ||
      strlen($_POST['summary']) == 0 ) {
        return "All fields are required";
  }

  if (strpos($_POST['email'], '@') === false) {
    return "Email address must contain @";
  }

  return true;
}


function validatePos() {
  return true;
}
