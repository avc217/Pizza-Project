<?php
include("base/top.php");
?>

<meta name="Keywords" content="Pizza, Food, Delivery">
<meta name="Description" content="Welcome to The Pizza Parlor.">
<title>The Pizza Parlor</title>

<?php
include("base/middle.php"); 
?>

<div   
   
   
    <div id="body-center">
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO admin_user (adminID, FirstName, LastName, Email, Username, Admin_Password, AdminLevel) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST[''], "text"),
                       GetSQLValueString($_POST['firstname2'], "text"),
                       GetSQLValueString($_POST['lastname2'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                      GetSQLValueString($_POST['adminl'], "text"));

  ((bool)mysqli_query( $localhost, "USE " . $database_localhost));
  $Result1 = mysqli_query( $localhost, $insertSQL) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));

  $insertGoTo = "addadmin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

((bool)mysqli_query( $localhost, "USE " . $database_localhost));
$query_Admin = "SELECT * FROM admin_user";
$Admin = mysqli_query( $localhost, $query_Admin) or die(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
$row_Admin = mysqli_fetch_assoc($Admin);
$totalRows_Admin = mysqli_num_rows($Admin);
?>


<h3>Create an Admin Account</h3>
<form action="<?php echo $editFormAction; ?>" name="form" method='POST'>
    First Name: 
    <label for="firstname"></label>
    <input type="text" name="firstname2" id="firstname">
    <br />
    Last Name:
    <label for="lastname"></label>
    <input type="text" name="lastname2" id="lastname">
        <br />
    E-mail: 
    <label for="email"></label>
    <input type="text" name="email" id="email">
  <br />
     Username: 
     <label for="username"></label>
     <input type="text" name="username" id="username">
  <br />
    Password: 
    <label for="password"></label>
    <input type="password" name="password" id="password">
  <br />
        Admin Level: 
    <label for="AdminLevel"></label>
    <input type="text" name="adminl" id="adminl">
  <br />
    <input type = 'submit' value='Create an Account'> <br />
    <input type="hidden" name="MM_insert" value="form" />
</form>

<?php
((mysqli_free_result($Admin) || (is_object($Admin) && (get_class($Admin) == "mysqli_result"))) ? true : false);
?>

      
   </div>

<?php
include("base/bottom.php"); 
?>