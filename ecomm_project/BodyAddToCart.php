<pre>
<link rel="stylesheet" type="text/css" href="css/bodyCss.css">
<div id="body">
<h1 style="color:MediumVioletRed;text-align:center"><font face="BedRock">Your Cart</h1>
<table class="table table-striped table-bordered" border="3">



<?php

	include_once("html/displayTable.html");
	
	$var=$_SERVER['QUERY_STRING'];
	include_once "DisplayTable.php";
	$_SESSION['key']=$var;
	$price=0;
	$arra=[];	
	$arra=array(explode("&",str_replace('%2F','/',(str_replace('%2C',',',urldecode(html_entity_decode($_SERVER['QUERY_STRING'])))))));
	$array1 = $arra[0];
	foreach ($array1 as $key =>$value) {
		if($key == 0){
			$array1[$key]= substr($value,18,-18);
		} else {
			$array1[$key] = substr($value,14,-14);
		}
	}
	echo '<tr>';
	
		
		
		
		
		
		$objTable=new DisplayTable();
        $price=$objTable->displayForeach($arra[0]);

	
echo "</tr>";
?>
		<tr>
		<td colspan="4"><h4 style="color:Maroon;text-align:center ">Total Price</h4></td>
		<td><h4 style="color:Maroon;text-align:center"><?php  echo $price;?></h4></td>
		</tr>
</table>
<form action="Summary.php" method="POST">
<input type="submit" class="btn btn-info" value="Confirm Order"/>&nbsp;<input type="button" value="Cancel"
class="btn btn-info" id="cancel_addtoCart"/>
</form>
</div>
</pre>
