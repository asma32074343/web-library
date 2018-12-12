<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>library</title>
	<script type="text/javascript">
		 <!--
				// Form validation code will come here.
				function validateForm()
				{

					 if( document.forms["addbook"]["IsbnNnumber"].value == "" )
					 {
							alert( "Please provide IsbnNnumber!" );
							return false;
					 }

					 if( document.forms["addbook"]["ItemTitle"].value == "" )
					 {
							alert( "Please provide ItemTitle!" );
							return false;
					 }
					 if( document.forms["addbook"]["NumberPage"].value == "" )
					{
						 alert( "Please provide NumberPage !" );
						 return false;
					}
					if( document.forms["addbook"]["printdate"].value < 0 )

					 {
							alert( "Please provide printdate!" );
							return false;
					 }
					 if( document.forms["addbook"]["publishingdate "].value == "" )
					{
						 alert( "Please provide publishingdate!" );
						 return false;
					}
					if( document.forms["addbook"]["bestcollection"].value == "" )
					{
						 alert( "Please provide bestcollection!" );
						 return false;
					}
					if( document.forms["addbook"]["EditionNumber"].value == "" )
					{
						 alert( "Please provide EditionNumber!" );
						 return false;
					}
					if( document.forms["addbook"]["printdatedate"].value == "" )
					{
						 alert( "Please provide date of publish!" );
						 return false;
					}
					if( document.forms["addbook"]["FormType"].value == "" )
					{
						 alert( "Please provide FormType!" );
						 return false;
					}
					if( document.forms["addbook"]["AutherName"].value == "" )
					{
						 alert( "Please provide date of AutherName!" );
						 return false;
					}
					if( document.forms["addbook"]["GenerType"].value == "" )
					{
						 alert( "Please provide number of page!" );
						 return false;
					}





				}
		 //-->
	</script>
	</head>
</head>
<body>
  <div><h1>Add book</h1></div>
  <form name="addbook" action="<?php echo base_url(); ?>index.php/admin/add_book_result" onsubmit="return validateForm()" method="post">
   isbnnumber: <input type="number" name="IsbnNnumber"><br>
   itemtitle: <input type="text" name="ItemTitle"><br>
   numberofpage: <input type="number" name="NumberPage"><br>
   publishingdate: <input type="date" name=">publishingdate"><br>
   EditionNumber: <input type="number" name="EditionNumber"><br>
	 printdate: <input type="date" name="printdate"><br>
	 bestcollection: <input type="text" name="bestcollection"><br>
	 FormType: <input type="text" name="FormType"><br>


<?php
					 echo '<br><br>AutherName <br>';
					 //print_r($autherList);
					 foreach ($autherList as $auther)
					 {
						 echo '<input type="checkbox" name="AutherName[]" value="'.$auther->AutherId.'">'.$auther->AutherName.'<br>';
					 }
					 echo '<br><br>GenerType <br>';

					 foreach ($generList as $gener)
					 {
						 echo '<input type="checkbox" name="GenerType[]" value="'.$gener->GenreId.'">'.$gener->GenerType.'<br>';
					 }


						echo'  <input type="submit" value="Submit">
						</form>';

?>



	</body>
	</html>
