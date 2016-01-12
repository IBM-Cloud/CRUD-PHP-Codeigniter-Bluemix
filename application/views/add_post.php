<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta charset="utf-8">
	<title>Add Blog Post</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/skel.min.js"></script>
	<script src="<?php echo base_url()?><?php echo base_url()?>assets/js/init.js"></script>

	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style-desktop.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style-wide.css" />

	<!--[if lte IE 8]>
	<link rel="stylesheet" href="css/ie/v8.css" />
	<![endif]-->


</head>
<body>

<div id="container">
	<div class="editBolgH1">
		<h1>Add Blog Post</h1>
	</div>
	<div id="body">
		<form action="<?php echo base_url();?>blog/insertpost" enctype="multipart/form-data" method="post">
		<table>
		<tr><td>Title</td><td><input type="text" name="title" required placeholder="Title Here"></td></tr>
		<tr><td>Description</td><td><textarea name="description" required placeholder="Description Here"></textarea></td></tr>
		<tr><td colspan="2"><input type="submit"></td></tr>
		</table>
		</form>
	</div>

	
</div>
<?php
$this->load->view('footer');
?>
</body>
</html>