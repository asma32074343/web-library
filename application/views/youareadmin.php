<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welsome to our library</title>


</head>
<body>

<div><h1><mark>welcome admin</mark></h1></div>

<p>here the link for reserch and edit</p>
<br>
<a href="<?php echo base_url();?>index.php/admin/reserchadmin">admin</a>
<br>
<p>here you can add a book</p>
<a href="<?php echo base_url();?>index.php/admin/linc">admin</a>
<br>

</body>
</html>
