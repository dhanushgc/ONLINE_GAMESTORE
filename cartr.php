<?php
session_start();
include_once("config.php");

//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
 	//we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT g_name, price, g_img, DistributorID FROM racing WHERE g_code=? LIMIT 1");
    $statement->bind_param('s', $new_product['g_code']);
    $statement->execute();
    $statement->bind_result($g_name, $price, $g_img, $d_id);
	
	while($statement->fetch()){
		
		//fetch product name, price from db and add to new_product array
        $new_product["g_name"] = $g_name; 
        $new_product["price"] = $price;
        $new_product["g_img"] = $g_img;
        $new_product["DistributorID"] = $d_id;

       
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['g_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['g_code']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_product['g_code']] = $new_product; //update or create product session with new item  
    } 
}


//remove items 
if(isset($_POST["g_qty"]) || isset($_POST["remove_code"]))
{
	
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);

?>