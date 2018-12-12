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
          if( document.forms["showceatacount"]["username"].value == "" )
          {
             alert( "enter username" );
             return false;
          }

          if( document.forms["showceatacount"]["userpassword"].value == "" )
          {
             alert( "enter password" );
             return false;
          }
          if( document.forms["showceatacount"]["userid"].value == "" )
          {
             alert( "enter name" );
             return false;
          }

          if( document.forms["showceatacount"]["useremail"].value == "" )
          {
             alert( "enter email" );
             return false;
          }


	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add user</h1></div>
  <form name="adduser" action="<?php echo base_url(); ?>index.php/web/creatcountresult" onsubmit="return validateForm()" method="post">
	  userid: <input type="number" name="userid"><br>
	useremail: <input type="email" name="useremail"><br>
   username: <input type="text" name="username"><br>
  userpassword: <input type="password" name="userpassword"><br>
	<?php




		  echo'  <input type="submit" value="creat_count">
		  </form>';

	?>






</body>
</html>
