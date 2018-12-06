<?php
session_start();


include("base/top.php");
?>
    <meta name="Keywords" content="Pizza, Food, Delivery">
<meta name="Description" content="Welcome to The Pizza Parlor.">
<title>The Pizza Parlor</title>
   <script type="text/javascript" src="js/pizza.js"></script>
        <script type="text/javascript" src="js/getCookie.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<?php
date_default_timezone_set('America/Los_Angeles');
include("base/middle.php"); 
?>

<div id="body-info">
        <div id="summary"></div>
 <form method="POST" class="form" id="subord" name="subord" onsubmit="validateAddy(this.form)">
            <fieldset>
                <legend>Delivery Address </legend>
                <br>
                <label for="first">First Name:*</label>
                <input type="text" size=30 value="" name="first" id="first"><br/>
                <label for="last">Last Name:*</label>
                <input type="text" size=30 value="" name="last" id="last">
                <br/>

                <label for="street">Street:*</label>
                <input type="text" size=50 value="" id="street" name="street">
                <br>
                <label for="apt">Apt:</label>
                <input type="text" size=5 value="" name="apt" id="apt">
                <label for="city">City:*</label>
                <input type="text" size=30 value="" name="city" id="city"><br/>
                <br>
                <label for="state">State:*</label>
                <input type="text" size=4 value="" name="state" id="state">
                <label for="zip">Zip:*</label>
                <input type="text" size=20 value="" name="zip" id="zip">
                <br>
                <label for="email">E-mail:*</label>
                <input type="text" value="" name="email" id="email"><br/>
                <label for="phone">Phone:*</label>
                <input type="tel" value="" name="phone" id="phone">
                <br>
                <input type="hidden" name="date" id="orderdate" value="<?php echo date('Y-m-d H:i:s') ?>" />
                <input type="hidden" value="<?php echo $_POST['summary']?>" name="summary" />
                <input type="hidden" value="<?php echo $_POST['subtotal']?>" name="subtotal" />
                <input type="hidden" value="<?php echo $_POST['tax']?>" name="tax" />
                <input type="hidden" value="<?php echo $_POST['total']?>" name="total" />
                <br>
                <input class="button" type="submit" value="Place Your Order" name="submitOrder"><br />
                <input type="reset" class="button" name="clear" value="Clear" id="clear" onclick="resetAddy();" />
            </fieldset>
           
        </form>
       
    </div>

<div id="f2">
<hr />
Copyright © 2015 - The Pizza Parlor - thepizzaparlor.com</div>

