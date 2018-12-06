<?php
include("base/top.php");
?>
<?php
include("base/middle.php"); 
?>


<table id="table" align="center">
  <h2>Incomplete Orders</h2>
<?php
$conn = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzaparlor");
  $id = filter_input(INPUT_POST, "order-id");
        $id = mysqli_real_escape_string($conn, $id);
    
   if (empty($id)){
          $id = 0;
        } // end if
    
        $status = filter_input(INPUT_POST, "order-status");
        $status=mysqli_real_escape_string($conn ,$status);  
    
    
$conn = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzapalor");

            $sql = "SELECT * FROM pizza_order_information WHERE PizzaID = '$id' ";
        $result = mysqli_query($conn, $sql); 
        $order = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $orderStatus = $order['OrderComplete'];
     
        $PizzaID = $order['PizzaID'];
 
		


	

      

        print "<form action=\"incomplete.php\" method=\"post\">";
        
        print "<h4>Update Order Status</h4>";
        print "Order ID <input type=\"text\" name=\"order-id\" value=\"$id\">";
        print "Order Complete?<input type=\"text\" name=\"order-status\" value=\"$status\">";
        print "<input type=\"submit\" class=\"tiny round button\"  name=\"submit\" value=\"Submit\">";

       

		 print "</form>\n";
    
       $result = mysqli_query($conn, "UPDATE pizza_order_information SET OrderComplete = '$status' WHERE PizzaID = $id ");



        $result = mysqli_query($conn, "SELECT * FROM pizza_order_information LEFT JOIN `users` ON `users`.`UserID` = `pizza_order_information`.`PizzaID` WHERE OrderComplete = 'N'");


        print "<table class= \"t\" >

        <tr>
       <th>Order ID</th>
        <th>Customer ID</th>
        <th>Order Summary</th>
        <th>Subtotal</th>
        <th>Tax</th>
        <th>Order Total</th>
        <th>Order Date</th>
		<th></th>
        <th>Order Status</th>
		<th>Session</th>
		<th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
		<th>Street Address</th>
		<th>Apt</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Session</th>
        </tr>
        ";


        while ($row = mysqli_fetch_assoc($result)){

          print "<tr>\n";
        
          foreach ($row as $col=>$val){
            print "  <td>$val</td>\n";
            $id = $row['UserID'];
            $status = $row['sessionID'];
			
          }
	      
          print "</tr>\n";

          print "<input type = \"hidden\" name = \"UserID\" value = \"$id\">";

          print "<input type = \"hidden\" name = \"sessionID\" value = \"$status\">";
			
        }

        print "</table>\n";
//
//
        $id = filter_input(INPUT_POST, "UserID");
        $id = mysqli_real_escape_string($conn, $id);
 

        if (empty($id)){
          $id = 0;
        } // end if


        $status = filter_input(INPUT_POST, "sessionID");
        $status = mysqli_real_escape_string($conn, $status);


      
        $result = mysqli_query($conn, "SELECT * FROM pizza_order_information WHERE PizzaID = '$id' ");
        $order = mysqli_fetch_assoc($result);
        $orderStatus = $order['OrderComplete'];
        $PizzaID = $order['PizzaID'];

       
        $orderStat = filter_input(INPUT_POST, "sessionID");
        $id = filter_input(INPUT_POST, "UserID");

      
        $orderStat = mysqli_real_escape_string($conn, $orderStat);
        $id = mysqli_real_escape_string($conn, $id);
          
        $result = mysqli_query($conn, "UPDATE pizza_order_information SET OrderComplete = '$orderStat' WHERE PizzaID = $id ");
        if ($result){ 
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=incomplete.php\">";
        } 

    ?>

        
<?php
include("base/bottom.php"); 
?>