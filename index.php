<?php
include "config.php"; // include your config file
$username = '';
$address = '';
$phone = '';
$userid  =	isset($_GET['uid']) && $_GET['uid'] != '' && is_numeric($_GET['uid']) ? $_GET['uid'] : '' ;
$echodata	=	'';
if($userid != '' )
{
	$query		=	'SELECT * FROM demo d where d.U_ID = '.$userid;
	$result		=	mysql_query($query) or die(seterror(mysql_error()));
	$editdata   =	mysql_fetch_assoc($result);	
	$username	=   $editdata['U_NAME'];
	$address	=   $editdata['U_ADDRESS'];
	$phone		=   $editdata['U_PHONE'];
}	
if($_POST){
	$ajax_call	= (!empty($_POST['action'])   ? $_POST['action'] :   NULL );
	if ($ajax_call == 'entrydelete')
	{
		$query		=	"DELETE FROM `demo` WHERE `U_ID` = ".$_POST['id'];
		$result 	= 	mysql_query($query) or die((mysql_error()));
		echo 1;
		exit;
	}
	else
	{
		if(count($_POST) > 0)
		{
			if($userid != '' )
			{
				$query	=	"UPDATE `demo` SET `U_NAME`='".$_POST['name']."' ,`U_ADDRESS`='".$_POST['address']."',`U_PHONE`='".$_POST['phone']."' WHERE U_ID = ".$userid;
				$result = mysql_query($query) or die((mysql_error()));
				$echodata	=	 'data Updated successful';
				$username = '';
				$address = '';
				$phone = '';
				 header("Location: ".BASEURL);
			}
			else
			{
				$query		=	"INSERT INTO `blogdemo`.`demo` (`U_NAME`, `U_ADDRESS`, `U_PHONE`, `U_CREATED_DATE`) VALUES ( '".$_POST['name']."', '".$_POST['address']."', '".$_POST['phone']."', '".time()."')";
				$result 	= 	mysql_query($query) or die((mysql_error()));
				$echodata	=	 'data insertred successful';
			}
		}
		else
		{
			$echodata	=	 'Please Enter valid data';
		}
	}
}
	

$data 		= 	'';
$query		=	'SELECT * FROM demo d';
$result		=	mysql_query($query) or die(seterror(mysql_error()));
while ($object = mysql_fetch_assoc($result)) {
       	$data .= '
			<tr>
				<td>'.$object['U_ID'].'</td>
				<td>'.$object['U_NAME'].'</td>
				<td>'.$object['U_ADDRESS'].'</td>
				<td>'.$object['U_PHONE'].'</td>
				<td>'.$object['U_CREATED_DATE'].'</td>
				<td><a href="'.BASEURL.'?uid='.$object['U_ID'].'" style="cursor:pointer;"> edit </a> <a href="#" title="Delete" onclick="category_status('.$object['U_ID'].')" alt="Delete" > delete </a> </td>
			</tr>
		';	
    }
	echo $echodata;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Data Document</title>
</head>

<body>

<h3> <?= $userid != '' ? 'Update Data  ' : 'Add New Data  ' ?> </h3>

<form action="" method="post" enctype="application/x-www-form-urlencoded" name="adddata">
<label >Name</label> <input name="name" type="text" value="<?=$username?>" /><br/>
<label >Address</label> <input name="address" type="text" value="<?=$address?>"/><br/>
<label >Phone</label> <input name="phone" type="text" value="<?=$phone?>"/><br/>
<input name="submit" type="submit" value="submit"/>
</form>

<table width="500" border="1" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tr>
    <td>Id</td>
    <td>Name</td>
    <td>Address</td>
    <td>Phone</td>
    <td>Created on</td>
    <td>Action </td> 
  </tr>
  <?php
  echo $data;
  ?>
</table>

</body>
</html>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
	function category_status(id)
	{
		var BASEURL = '<?=BASEURL?>';
		var delete_confirm = confirm("Are you sure, You want to delete  this entry?");
			if(delete_confirm == false)
			{
				return false;
			}
			ajaxFile = BASEURL;
			$.post(ajaxFile, {action:'entrydelete',id:id}, function(data){
				if(data == '1')
				{
					location.reload();
				}
				else
				{
					alert('Oops, Something going wrong!');
					return false;
				}
			});
		
	} // END OF POST STATUS
	</script>

