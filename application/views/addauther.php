<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>

  <script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {
          if( document.forms["addauther"]["AutherId"].value == "" )
          {
             alert( "enter AutherId" );
             return false;
          }

          if( document.forms["addauther"]["AutherName"].value == "" )
          {
             alert( "enter AutherName" );
             return false;
          }



	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add user</h1></div>
  <form name="adduser" action="<?php echo base_url(); ?>index.php/web/add_auther" onsubmit="return validateForm()" method="post">
	  AutherId: <input type="number" name="AutherId"><br>
	AutherName: <input type="email" name="AutherName"><br>

	<?php




		  echo'  <input type="submit" value="creat_count">
		  </form>';

	?>






</body>
</html>
