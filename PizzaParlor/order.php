<?php
session_start();
include("base/top.php");
?>
    <meta name="Keywords" content="Pizza, Food, Delivery"/>
<meta name="Description" content="Welcome to The Pizza Parlor."/>
<title>The Pizza Parlor</title>
   <script type="text/javascript" src="js/pizza.js"></script>
 <script type="text/javascript" src="js/getCookie.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
<?php
include("base/middle.php"); 
?>

    <div id="body-centered" onload="formLoad();">
       
        <!--orderform start -->
 <form class="form" name="OrdP" id="OrdP" action="checkout.php" method="POST" onsubmit="return validatePizzaf();">
        
            <fieldset>

                <h3>Start Here</h3>
                  <!--Create your Own/Premade-->
                <input type="checkbox" value="create" name="create" id="create" onclick="disableCreate();">
                <label class="options_" for="create">Create your Own!</label>
                <input type="checkbox" value="spec" name="spec" id="spec" onclick="disableCreate();">
                <label class="options_" for="spec">Pizza Specials</label>
				
                <!--size op -->
                <p>Select a Size</p>
                <br>
				<label for="small">
                <input type="radio" value="Small" name="size" onchange="getsizeP();" id="small">
                Small 12" - $9 </label>
                <br>
				<label for="medium">
                <input type="radio" value="Medium" name="size"  onchange="getsizeP();" id="medium" >
                Medium 16" - $11</label>
                <br>
				<label for="large">
                <input type="radio" value="Large" name="size" onchange="getsizeP();" id="large" >
                Large 20" - $15</label>
                <hr>
                <!--Pizza Crust -->
               
                <p>Select a Crust</p>
                <br>
				 <label for="thin">
                <input type="radio" value="Thin" name="crust" id="thin"  onchange="getcrustP();"  >
               Thin - No Extra Cost</label>
                <br>
				<label for="stuffed">
                <input type="radio" value="Stuffed" name="crust"  id="stuffed" onchange="getcrustP();">
                 Cheese Stuffed - add $2.00</label>
                <br>
				<label for="deepdish">
                <input type="radio" value="Deep-Dish" name="crust"  id="deepdish" onchange="getcrustP();">
                Deep-dish - add $3.50</label>
                <hr>
                <div class="float-right">

                <!--topping op-->
                <div id="topsop">
                    <p>The Pizza Parlor pizza's comes with marinara sauce and mozarella cheese. Add more toppings for only $.60 each.</p>
                    
                             <br>
                    <input type="checkbox" value="Pineapple" name="it" id="Pineapple" onclick="gettoppingP(this.form)" >
                    <label for="Pineapple">Pineapple</label>
                    <input type="checkbox" value="Mushrooms" name="it" id="Mushrooms" onclick="gettoppingP(this.form)" >
                    <label for="Mushrooms">Mushrooms</label>
                    <br>
                    <input type="checkbox" value="Pepperoni" name="it" id="Pepperoni" onclick="gettoppingP(this.form)" >
                    <label for="Pepperoni">Pepperoni</label>
                    <input type="checkbox" value="Chicken" name="it" id="Chicken" onclick="gettoppingP(this.form)" >
                    <label for="Chicken">Chicken</label>
                    <br>
                    <input type="checkbox" value="Sausage" name="it" id="Sausage" onclick="gettoppingP(this.form)" >
                    <label for="Sausage">Sausage</label>
                    <input type="checkbox" value="Tomatoes" name="it" id="Tomatoes" onclick="gettoppingP(this.form)">
                    <label for="Tomatoes" >Tomatoes</label>
                  
                    <hr>
                </div>
                <!--special op-->
                <div id="specialsop">
                    <p>Choose from one of The Pizza Parlor Specials</p>
                    <br>
                    <input type="radio" value="hawaiian" name="special"  	  onclick="getSpecials();" id="hawaiian" >
                    <label for="hawaiian">Hawaiian - $7</label>
                    <br>
                    <input type="radio" value="vegetarian" name="special"  onclick="getSpecials();" id="vegetarian">
                    <label for="vegetarian">Vegetarian - $6 </label>
                    <br>
                    <input type="radio" value="supreme" name="special"  onclick="getSpecials();" id="supreme">
                    <label for="supreme">Supreme $9</label>
                    <hr>
                </div>
               


            <div id="os" >
                    <h3 id="orderprev">Order Preview</h3>
                    <textarea readonly name="summary" id="summary" rows="2">Please choose a pizza</textarea>
                    <br>
                    <label class="total" for="subtotal">Subtotal: $<input readonly type="text" name="subtotal" id="subtotal" value="0.00"/></label><br />
                    <label class="total" for="subtotal">Tax: $<input readonly type="text" name="tax" id="tax" value="0.00"/></label><br />
                    <label class="total" for="subtotal">Total: $<input readonly type="text" name="total" id="total" value="0.00"/></label><br />
                </div>

 
            <hr>
                <input class="button" type="submit" value="Submit Order" name="submitOrd">
                <input type="reset" class="button" name="clear" value="Clear Form" id="clear" onclick="resetPizzaf(this.form)" />
                <!--submit-->
</fieldset>

        </form>
     
        </div>


<div id="f3">
<hr />
Copyright © 2015 - The Pizza Parlor - thepizzaparlor.com</div>
