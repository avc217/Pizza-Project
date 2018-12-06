<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
 $con = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzaparlor");
    if (mysqli_connect_errno()) {
        
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      
    } 


if(isset($_POST['submitOrder']))
    //User Info
    $first = mysqli_real_escape_string($con, $_POST['first']);
    $last = mysqli_real_escape_string($con, $_POST['last']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $zip = mysqli_real_escape_string($con, $_POST['zip']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);  
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $apt = mysqli_real_escape_string($con, $_POST['apt']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    //Order
    $summary = mysqli_real_escape_string($con, $_POST['summary']);
    $subtotal = mysqli_real_escape_string($con, $_POST['subtotal']);
	 $tax = mysqli_real_escape_string($con, $_POST['tax']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $phpsessionID = session_id();
    $sql = " INSERT INTO users (FirstName, LastName, Email, Street, Apt, City, State, Zipcode, Phone, sessionID)
            VALUES ('$first', '$last', '$email', '$street', '$apt','$city', '$state', '$zip', '$phone', '$phpsessionID')";
            
                if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }

   $CustomerID = mysqli_query($con, "SELECT UserID FROM users");
    
    while($row = mysqli_fetch_assoc($CustomerID)) { 
        
        $newcustomerID = $row['CustomerID'];
    
    } 

    $sql = " INSERT INTO pizza_order_information (PizzaID, customerID, OrderDescri, OrderSubTotal, OrderTax, OrderTotal, Date, order_adminID, OrderComplete, phpsessionID)
        VALUES ('0','0', '$summary', '$subtotal', '$tax', '$total', '$date','0' ,'N', '$phpsessionID')";

        if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);

?>


<?php
include("base/top.php");
?>

<meta name="Keywords" content="Pizza, Food, Delivery">
<meta name="Description" content="Welcome to The Pizza Parlor.">
<title>The Pizza Parlor</title>


    <script type="text/javascript" src="js/pizza.js"></script>
     <script type="text/javascript" src="js/getCookie.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
     var seconds = 1800;

        function Deltimer() {
            var min = Math.round((seconds - 30) / 60);
            var rs = seconds % 60;
            if (rs < 10) {
                rs = "0" + rs;
            }document.getElementById('timer').innerHTML = "<p>" + "Your Delivery will arrive in " + min + " minutes and " + rs + " seconds!" + "</p>";if (seconds == 0) {clearInterval(countdownTimer);document.getElementById('timer').innerHTML = "";
} else { seconds--; }}

        var countdownTimer = setInterval('Deltimer()', 1000);

            
            
            
function load() {
var loadC = '<p>' + GetCookie("dis") + '</p>';
          loadC += 'Toppings: ' + GetCookie("distop") + '  ';loadC += '<p><strong>Delivery Address: </strong></p>';loadC += '<p>' + GetCookie("AF") + ' ';loadC += GetCookie("ALAS") + '<br> ';loadC += GetCookie("AS") + '  ';loadC += GetCookie("AA") + '<br>';loadC += GetCookie("AC") + '  ';loadC += GetCookie("AST") + ', ';loadC += GetCookie("AZ") + '<br> ';loadC += GetCookie("AE") + '<br>';loadC += GetCookie("AP") + ' ';$('div.orderinfo').append(loadC);

        }   
    </script>

<?php
include("base/middle.php"); 
?>
<body onLoad="load();">
  
    <div id="body-info">
        <h4>Your order has been Successfully Placed.</h4><br/>
        <div class="orderinfo"></div><br/>
        <div id="timer"></div><br/>
    </div>

<div id="f2">
<hr />
Copyright © 2015 - The Pizza Parlor - thepizzaparlor.com</div>