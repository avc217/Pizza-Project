<?php
$hostname_localhost = "mysql902.ixwebhosting.com";
$database_localhost = "C251019_avc_thepizzaparlor";
$username_localhost = "C251019_admin";
$password_localhost = "Pizza2";
$localhost = ($GLOBALS["___mysqli_ston"] = mysqli_connect($hostname_localhost,  $username_localhost,  $password_localhost)) or trigger_error(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)),E_USER_ERROR); 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")) : ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $theValue) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

((bool)mysqli_query( $localhost, "USE " . $database_localhost));
$query_UserLogin = "SELECT Username, Admin_Password FROM admin_user";
$UserLogin = mysqli_query( $localhost, $query_UserLogin) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
$row_UserLogin = mysqli_fetch_assoc($UserLogin);
$totalRows_UserLogin = mysqli_num_rows($UserLogin);
?>
<?php

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Login'])) {
  $loginUsername=$_POST['Login'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "log-in.php";
  $MM_redirecttoReferrer = false;
  ((bool)mysqli_query( $localhost, "USE " . $database_localhost));
  
  $LoginRS__query=sprintf("SELECT Username, Admin_Password FROM admin_user WHERE Username=%s AND Admin_Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query( $localhost, $LoginRS__query) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php
include("base/top.php");
?>

<meta name="Keywords" content="Pizza, Food, Delivery">
<meta name="Description" content="Welcome to The Pizza Parlor.">
<title>The Pizza Parlor</title>

<?php
include("base/middle.php"); 
?>
<h2>Admin Login</h2>
<form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="log-in">
  Username: <input name="Login" type="text"> <br / >
  Password: <input name="Password" type="password"><br / >
  <input class="button" name="submit" type="submit" value="Login">
</form>


<?php
((mysqli_free_result($UserLogin) || (is_object($UserLogin) && (get_class($UserLogin) == "mysqli_result"))) ? true : false);
?>
<div id="f2">
<hr />
Copyright © 2015 - The Pizza Parlor - thepizzaparlor.com</div>