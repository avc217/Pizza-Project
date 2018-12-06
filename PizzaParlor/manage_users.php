<?php
include("base/top.php");
?>
<?php
include("base/middle.php"); 
?>   
<div id="body-centered">
  <?php  
$conn = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzaparlor");
        $result = mysqli_query( $conn, "SELECT * FROM admin_user");
          $id = filter_input(INPUT_POST, "adminID");

      print "<form action=\"manage_users.php\" method=\"post\">";


        print "<h4>Delete Inactive User</h4>";
        print  "Enter Admin ID <input type=\"text\" name=\"admin-id\" value=\"$id\">";
        print "<input type=\"submit\" class=\"tiny round button\"  name=\"submit\" value=\"Delete Admin ID\">";
        print "<table >

        <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
		<th>E-mail</th>
        <th>User Name</th>
        <th>Password</th>
		<th>Access Level</th>
       </tr>
        ";

        
        while ($row = mysqli_fetch_assoc($result)){

          print "<tr>\n";
         
          foreach ($row as $col=>$val){
            print "  <td>$val</td>\n";
            $id = $row['adminID'];
            $status = $row['Username'];
          } 
          print "</tr>\n";

          print "<input type = \"hidden\" name = \"admin-id\" value = \"$id\">";

          print "<input type = \"hidden\" name = \"user-status\" value = \"$status\">";

        }// end while

        print "</table>\n";

$sql = "SELECT * FROM admin_user WHERE adminID = '$id' ";
        $result = mysqli_query( $conn, $sql) or die (((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
        $admin_user = mysqli_fetch_assoc($result);
        $adminID = $admin_user['adminID'];

 //pull data from form
        $userStat = filter_input(INPUT_POST, "user-status");
        $id = filter_input(INPUT_POST, "admin-id");

   
        $userStat = mysqli_real_escape_string($conn, $userStat);
        $id = mysqli_real_escape_string($conn, $id);
          
        $result = mysqli_query($conn, "DELETE FROM admin_user WHERE adminID = $id");
        if ($result){
         echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage_users.php\">";
        } else {
     
        } // end if
  
        



        print "</form>";
        
	
	?>
</table>
</div>
<?php
include("base/bottom.php");
?>