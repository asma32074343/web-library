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
          if( document.forms["genreauther"]["GenreId"].value == "" )
          {
             alert( "enter GenreId" );
             return false;
          }

          if( document.forms["genreauther"]["GenerType"].value == "" )
          {
             alert( "enter GenerType" );
             return false;
          }



	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add user</h1></div>
  <form name="adduser" action="<?php echo base_url(); ?>index.php/web/add_genre" onsubmit="return validateForm()" method="post">
	  GenreId: <input type="number" name="GenreId"><br>
	GenerType: <input type="email" name="GenerType"><br>

	<?php




		  echo'  <input type="submit" value="creat_count">
		  </form>';

	?>






</body>
</html>
