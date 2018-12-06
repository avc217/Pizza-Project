// JavaScript Document  
//Pizza Options variables
var pizzaT = "";
var pizzaS = "";
var pizzaSi = "";
var pizzaC = "";


//Pricebase
var pizzaToppings = new Array();
var toppingP = 0;
var sizeP = 0;
var crustP = 0;
var specialP = 0;
var subTotal = 0;
var displayPFR = 0;


//onload
function formLoad() {
    document.getElementById("OrdP").reset();
    document.getElementById("create").disabled = false;
    document.getElementById("spec").disabled = false;}





// validate pizza form
function validatePizzaf() {
    var checkT = 0;
    var checkS = 0;
    var checkC = 0;

    //size check
    if (document.getElementById("small").checked || document.getElementById("medium").checked ||
        document.getElementById("large").checked) {
        checkS = 1;
    } else {
        checkS = 0;
        alert("Please select a size.");
    }

    //crust check
    if (document.getElementById("thin").checked || document.getElementById("stuffed").checked ||
        document.getElementById("deepdish").checked) {
        checkC = 1;
    } else {
        checkC = 0;
        alert("Please select a crust.");
    }
    //type check
    if (document.getElementById("spec").checked && document.getElementById("vegetarian").checked || document.getElementById("hawaiian").checked || document.getElementById("supreme").checked || document.getElementById("create").checked) {
        checkT = 1;
    } else {
        checkT = 0;
        alert("Please select Create Your Own or Pizza Specials");
    }
    if (checkT == 1 && checkC == 1 && checkS == 1) {
        document.forms["OrdP"].action = "checkout.php"
        return true;

    } else {
        return false;
    }

}




//total
// subtotal
function getPrices() {
    subTotal = sizeP + crustP + toppingP + specialP;
    var tax = subTotal * .095;
    var total = subTotal + tax;
    document.getElementById("subtotal").value = subTotal.toFixed(2);
    document.getElementById("tax").value = tax.toFixed(2);
    document.getElementById("total").value = total.toFixed(2);
}


//size price
function getsizeP() {
    var small = document.getElementById("small");
    var medium = document.getElementById("medium");
    var large = document.getElementById("large");

    if (small.checked) {
        pizzaSi = "Small";
        sizeP = 9;
        getPrices();
        ordDis(1);
    } else if (medium.checked) {
        pizzaSi = "Medium";
        sizeP = 11;
        getPrices();
        ordDis(1);
    } else if (large.checked) {
        pizzaSi = "Large";
        sizeP = 15;
        getPrices();
        ordDis(1);
    }
}


//crust price
function getcrustP() {
    var thin = document.getElementById("thin");
    var stuffed = document.getElementById("stuffed");
    var deepdish = document.getElementById("deepdish");
    if (thin.checked) {
        pizzaC = "Thin Crust";
        crustP = 0;
        getPrices();
        ordDis(1);
    } else if (stuffed.checked) {
        pizzaC = " Cheese Stuffed Crust";
        crustP = 2.00;
        getPrices();
        ordDis(1);
    } else if (deepdish.checked) {
        pizzaC = "Deep-Dish";
        crustP = 3.50;
        getPrices();
        ordDis(1);
    }

}
//specials
function getSpecials() {
    var hawaiian = document.getElementById("hawaiian");
    var vegetarian = document.getElementById("vegetarian");
    var supreme = document.getElementById("supreme");
    if (hawaiian.checked) {
        pizzaS = "Hawaiian";
        specialP = 7;
        getPrices();
        ordDis(1);
    } else if (vegetarian.checked) {
        pizzaS = "Vegetarian";
        specialP = 6;
        getPrices();
        ordDis(1);
    } else if (supreme.checked) {
        pizzaS = "Supreme";
        specialP = 9;
        getPrices();
        ordDis(1);
    }

}
// topping
function gettoppingP() {
    pizzaToppings = [];
    toppingP = 0;
    var pizzat = document.getElementsByName('it');
    for (var i = 0; i < pizzat.length; ++i) {
        if (pizzat[i].checked) {
            pizzaToppings.push(pizzat[i].id);
            toppingP += .60;
            getPrices();
            ordDis(2);
        }
    }
}

// options
function disableCreate(){
if(document.getElementById("create").checked===true){
  pizzaT = "Custom";
    document.getElementById("hawaiian").disabled = true;
    document.getElementById("supreme").disabled = true;
    document.getElementById("vegetarian").disabled = true;
    document.getElementById("spec").disabled = true;
}

else if (document.getElementById("spec").checked===true){

 pizzaT = "Special";
document.getElementById("Pineapple").disabled = true;
document.getElementById("Mushrooms").disabled = true;
document.getElementById("Chicken").disabled = true;
document.getElementById("Pepperoni").disabled = true;  
document.getElementById("Sausage").disabled = true;
document.getElementById("Tomatoes").disabled = true;
    document.getElementById("create").disabled = true;
}
}
// preview
function ordDis(displayPFR) {
    var dis = "";
    var distop= "";
    if (displayPFR == 1) {
        document.getElementById('summary').value = "Size: " + pizzaSi + " " + pizzaT + " " + pizzaC  + "Toppings: " + pizzaS + " " + pizzaToppings.join(" , ");
        distop= pizzaToppings;
        dis = pizzaSi + " " + pizzaT + " " + pizzaC + " " + pizzaS;
         SetCookie("dis" , dis);
        SetCookie("distop" , distop);
    } else {
        document.getElementById('summary').value = "Size: " + pizzaSi + " " + pizzaT + " " + pizzaC  + "Toppings: "  + pizzaS + " " + pizzaToppings.join(" , ");
        distop = pizzaToppings;
        dis = pizzaSi + " " + pizzaT + " " + pizzaC + " " + pizzaS;
        SetCookie("dis" , dis);
        SetCookie("distop" , distop);
    }

}

function resetPizzaf() {
    formLoad();
    pizzaToppings = new Array();
    pizzaT = "";
    pizzaS = "";
    pizzaSi = "";
    pizzaC = "";
    toppingP = 0;
    sizeP = 0;
    crustP = 0;
    specialP = 0;
    subTotal = 0;
    getPrices();
    ordDis(1);
   document.getElementById("hawaiian").disabled = false;
    document.getElementById("supreme").disabled = false;
    document.getElementById("vegetarian").disabled = false;
    document.getElementById("spec").disabled = false;
    document.getElementById("Pineapple").disabled = false;
document.getElementById("Mushshrooms").disabled = false;
document.getElementById("Chicken").disabled = false;
document.getElementById("Pepperoni").disabled = false;  
document.getElementById("Sausage").disabled = false;
document.getElementById("Tomatoes").disabled = false;
    document.getElementById("create").disabled = false;
}


//Address Validation

function validateAddy() {
    var AF = ""; var ALAS = "";
    var AS = "";var AA = "";
    var AC = ""; var AST = "";
    var AZ = "";var AE = "";
    var AP = ""; var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    var myRegExp = /\d{3}-?\d{3}-?\d{4}/;
    if (document.forms["subord"].first.value == "") {
        alert(" Enter First Name");
        return false;
    } else {AF = document.forms["subord"].first.value;
        SetCookie("AF", AF);
    }if (document.forms["subord"].last.value == "") {
        alert(" Enter Last Name");
        return false;
    } else {ALAS = document.forms["subord"].last.value;
        SetCookie("ALAS", ALAS);
    }if (document.forms["subord"].street.value == "") {
        alert(" Enter Address");
        return false;
    } else { AS = document.forms["subord"].street.value;
        AA = document.forms["subord"].apt.value;
        SetCookie("AS", AS);
        SetCookie("AA", AA);
    }if (document.forms["subord"].city.value == "") {
        alert("City needed");
        return false;
    } else {AC = document.forms["subord"].city.value;
        AST = document.forms["subord"].state.value;
        AZ = document.forms["subord"].zip.value;
        SetCookie("AST", AST);
        SetCookie("AZ", AZ);
        SetCookie("AC", AC);
    }if (document.forms["subord"].email.value.search(emailRegEx) == -1) {
        alert("Please enter a valid email");
        return false;
    } else {AE = document.forms["subord"].email.value;
        SetCookie("AE", AE);
    }if (document.forms["subord"].phone.value.search(myRegExp) == -1) {
        alert("Enter a valid phone number");return false;
    } else {AP = document.forms["subord"].phone.value;
        SetCookie("AP", AP);}
    document.subord.action = "orderplaced.php"
    return true;



}

function resetAddy() {
    document.getElementById("subord").reset();
}




