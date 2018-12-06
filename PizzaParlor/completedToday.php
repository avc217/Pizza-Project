  <?php
include("base/top.php");
?>
<?php
include("base/middle.php"); 
?>

<table id="table" align="center">
	<h2>Orders Completed Today</h2>
<tr>

<td>
    <?php  
$conn = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzaparlor");
        $result = mysqli_query($conn, "SELECT * FROM pizza_order_information LEFT JOIN `users` ON `users`.`UserID` = `pizza_order_information`.`PizzaID` Where OrderComplete = 'y' && DATE(date) = DATE(NOW())");

        print "<form method=\"post\">";

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
            $id = $row['PizzaID'];
            $status = $row['OrderComplete'];
          } 
          print "</tr>\n";

          print "<input type = \"hidden\" name = \"orderID\" value = \"$id\">";

          print "<input type = \"hidden\" name = \"orderStatus\" value = \"$status\">";

        }

        print "</table>\n";

    

        print "</form>";
        

    ?>
    </td>
    </tr>
</table>
         
<?php
include("base/bottom.php"); 
?>