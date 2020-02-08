<?php
require_once "pdo.php";
session_start();

// Guardian: Make sure that profile_id is present
if ( ! isset($_GET['profile_id']) ) {
  $_SESSION['error'] = "Missing profile_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM profile where profile_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['profile_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for profile_id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$fn = htmlentities($row['first_name']);
$ln = htmlentities($row['last_name']);
$em = htmlentities($row['email']);
$he = htmlentities($row['headline']);
$su = htmlentities($row['summary']);
$profile_id = $row['profile_id'];
?>
<html><head>
  <title>Kelly Loyd's Profile Edit</title>
  <?php require_once "head.php"; ?>
</head>
<body>
<div class="container">
<h1>Profile information</h1>
<p>First Name:
<?= $fn ?></p>
<p>Last Name:
<?= $ln ?></p>
<p>Email:
<?= $em ?></p>
<p>Headline:<br/>
<?= $he ?></p>
<p>Summary:<br/>
<?= $su ?><p>
</p>
<a href="index.php">Done</a>
</div>
</body>
</html>
