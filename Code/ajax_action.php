<?php
session_start();
include("dbcs.php");

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = mysqli_fetch_assoc(mysqli_query("SELECT * FROM product WHERE pro_id='" . $_POST["pro_id"] . "'"));
			$itemArray = array($productByCode[0]["pro_id"]=>array('pro_name'=>$productByCode[0]["pro_name"], 'pro_id'=>$productByCode[0]["pro_id"], 'quantity'=>$_POST["quantity"], 'pro_price'=>$productByCode[0]["pro_price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["pro_id"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["pro_id"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["pro_id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>ID</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["pro_name"]; ?></strong></td>
				<td><?php echo $item["pro_id"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["pro_price"]; ?></td>
				<td><a onClick="cartAction('remove','<?php echo $item["pro_id"]; ?>')" class="btnRemoveAction cart-action">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["pro_price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="3" align=right><strong>Total:</strong></td>
<td align=right><?php echo "$".$item_total; ?></td>
<td><a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');">Empty Cart</a></td>
</tr>
</tbody>
</table>		
  <?php
} else {
	echo "<div class='empty_message'>Cart Empty!</span>";
}
?>