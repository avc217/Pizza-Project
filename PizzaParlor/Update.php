<?php
$conn = mysqli_connect("mysql902.ixwebhosting.com", "C251019_admin", "Pizza2", "C251019_avc_thepizzaparlor");
define('HOST', 'mysql902.ixwebhosting.com');
define('USER', 'C251019_admin');
define('PASS', 'pizza');
define('DBNAME', 'C251019_avc_thepizzapalor');
    
if ($_POST['submit']) {

    
    if (!empty($order) && !empty($status) && !empty($id)) {
        $db = new mysqli(HOST, USER, PASS, DBNAME);
        if ($db->connect_errno) {
            echo "Failed to connect to MySQL: (" . $db->connect_errno . ") "
            . $db->connect_error;
        }

       $stmt = $mysqli->prepare("UPDATE pizza_order_information SET order-id=?, order-status=? WHERE id=?");
$stmt->bind_param('sssdii',
   $order = $_POST['order-id'],
    $status = $_POST['order-status'],
    $id = $_POST['PizzaID']
    );
$stmt->execute(); 
$stmt->close();
        if ($conn->execute()) {
            header('location: http://localhost/incomplete3.php');
        }
        $db->close();
    }
}?>

