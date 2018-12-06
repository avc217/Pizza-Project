<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Create Database</title> 
</head> 

<body> 

<?php 

// create the connection string to MySQL 
$con = mysqli_connect("mysql902.ixwebhosting.com","C251019_admin2","CA2bbits");
$sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;"; 
if (mysqli_query($con, $sql)){ 
echo "Unique checks set to 0 <br />"; 
} 
else { 
echo "Unique checks failed: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"; 
} 



$sql = "SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;"; 
if (mysqli_query($con, $sql)){ 
echo "Foreign keys set to 0 <br />"; 
} 
else { 
echo "Foreign keys failed: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"; 
} 



$sql = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';"; 
if (mysqli_query($con, $sql)){ 
echo "SQL mode set correctly <br />"; 
} 
else { 
echo "SQL mode failed: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"; 
} 



$sql = "DROP DATABASE IF EXISTS `avc_thepizzapalor`;"; 
if (mysqli_query($con, $sql)){ 
echo "Existing Database Dropped <br />"; 
} 
else { 
echo "Failed to Drop Database" . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"; 
} 


$server= "127.0.0.1:3306"; 
$login = "root"; 
$password = ""; 
//$dbName = ""; 

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $login, $password)); 
if (!$con) 
  { 
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false))); 
  } 

// Create DB 
if (mysqli_query($con, "CREATE DATABASE avc_thepizzapalor")) 
  { 
  echo "Database created<br />"; 
  } 
else 
  { 
  die("Error creating database: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"); 
  } 
  
// Create contents table 
mysqli_select_db($con, "avc_thepizzapalor");
$sql ="create table    admin_user 
                (adminID            integer        not null auto_increment, 
                 FirstName        char(25)    not null,
                 LastName        char(25)    not null, 
                 Email            char(25)    not null, 
                 Username       char(25)    not null, 
                 Admin_Password    char(25)    not null, 
                 AdminLevel    int(2)       not null,
                 primary key(adminID));"; 

// Execute  
if (mysqli_query($con, $sql)){ 
    echo "admin_user table created<br />"; 
} 
else{ 
    die("Error creating admin_user table: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"); 
} 

// Create users table 
mysqli_select_db($con, "avc_thepizzapalor");
$sql="create table users 
                (UserID        integer        not null auto_increment, 
                 FirstName        char(25)    not null, 
                 LastName        char(25)    not null, 
                 Street            char(40)    not null, 
                 Apt            char(10)        null, 
                 City            char(40)    not    null, 
                 State            char(40)    not null, 
                 Zipcode        char(10)    not null, 
                 Email            char(40)    not null, 
                 Phone            char(14)    not null, 
                 sessionID        VARCHAR(500)    NULL     DEFAULT '', 
                 primary key(UserID));"; 

// Execute  
if (mysqli_query($con, $sql)) 
{ 
    echo "users table created<br />"; 
} 
else 
{ 
    die("Error creating users table: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"); 
} 



// Create users table 
mysqli_select_db($con, "avc_thepizzapalor");
$sql="create table    pizza_order_information 
                (PizzaID            integer            not null auto_increment, 
                 customerID            integer            not null, 
                 OrderDescri        text(1000)        not null, 
                 OrderSubTotal        double(16,2)    not null, 
                 OrderTax            double(16,2)    not null, 
                 OrderTotal            double(16,2)    not null, 
                 Date                date            not null, 
                 order_adminID   INT NULL, 
                 OrderComplete        VARCHAR(1)         NOT NULL     DEFAULT 'N', 
                 phpsessionID        VARCHAR(500)         NOT NULL     DEFAULT '', 
                 primary key(PizzaID));"; 

// Execute  
if (mysqli_query($con, $sql)) 
{ 
    echo "Pizza table created<br />"; 
} 
else 
{ 
    die("Error creating Pizza table: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"); 
} 
// insert default login 
mysqli_select_db($con, "avc_thepizzapalor");


// Execute  
if (mysqli_query($con, "INSERT INTO  avc_thepizzapalor.admin_user (FirstName,LastName,Email, Username, Admin_Password, AdminLevel) VALUES ('','','','admin', 'pizza', 2)")){ 
    echo "Admin Users table default login added<br />"; 
} 
else{ 
    die("Error Admin Users table default login: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"); 
} 
// add foreign key 
$sql = "ALTER TABLE `avc_thepizzapalor`.`pizza_order_information` "; 
$sql = $sql . "ADD CONSTRAINT `fk_pizza_order_information_users` "; 
$sql = $sql . "FOREIGN KEY (`PizzaID` ) "; 
$sql = $sql . "REFERENCES `avc_thepizzapalor`.`users` (`UserID` ) "; 
$sql = $sql . ", ADD INDEX `fk_pizza_order_information_users_idx` (`PizzaID` ASC) ;"; 

if (mysqli_query($con, $sql)){ 
echo "fk_pizza_order_information_users FK created <br />"; 
} 
else { 
echo "fk_pizza_order_information_users: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . "<br />"; 
} 
?> 
</body> 
</html> 