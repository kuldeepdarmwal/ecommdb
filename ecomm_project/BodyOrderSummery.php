<pre>
<div id="body" >
	<fieldset>
	<legend> <font face="BedRock" color="MediumVioletRed" size="6">Detail Order Summary </legend>
	<table border="2" class="table table-striped table-bordered" align="center">

	
	
<?php

include_once("html/displayTable.html");

include_once "Helper.php";
include_once "DisplayTable.php";
$var=$_SESSION['user'];
$obj = new Helper("ecomm");
$field="user_id,mobile,address,city,zip";
$table="user_details";
$condition="user_id='".$var."'";
$record=$obj->read_record($field, $table, $condition);
$arra=[];
$price=0;
$arra=array(explode("&",str_replace('%2F','/',(str_replace('%2C',',',urldecode(html_entity_decode($_SESSION['key'])))))));
	$array1 = $arra[0];
	
	
	foreach ($array1 as $key =>$value) {
		if ($key == 0){
			$array1[$key]= substr($value,18,-18);
		} else {
			$array1[$key] = substr($value,14,-14);
		}
	}
echo '<tr>';


$objTable2=new DisplayTable();
$price=$objTable2->displayForeach($arra[0]);


	

echo "</tr>";
?>
<tr>
		<td colspan="4"><h4 style="color:DarkRed;text-align:center">Total Price</h4></td>
		<td><h4 style="color:DarkRed;text-align:center"><?php  echo $price;?></h4></td>
		</tr>
</table>
<h3>Address Details :</h3>
<table border="3" BORDERCOLOR="#B8860B">
<tr>
<td>&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;</td>
</tr>
<?php
foreach ($record as $key ) {
    $_SESSION["user_details_id"]= $key['user_id'];
    foreach ($key as $subElement=>$val) {
	?>
		<tr>
		<td>&nbsp;&nbsp;&nbsp;<?php echo "$subElement";?>&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo "$val";?>&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<?php
    }
}
?>
</table>
<form method="POST" action="Validate.php">
<input type="submit" name="btn_submit" class="btn btn-info" value="Address" />&nbsp;<input type="submit" name="btn_submit"  class="btn btn-info" value="Confirm" />&nbsp;<input type="submit" name="btn_submit" class="btn btn-info"  value="Cancel" />
</form>
	</fieldset>
</div>
</pre>
