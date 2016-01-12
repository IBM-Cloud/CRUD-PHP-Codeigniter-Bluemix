<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Blog Post</title>

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
		<h1>Edit Blog</h1>
	</div>
	<?php
	if(isset($result))
		{
			foreach ($result as $bloginfo) {
				$id=$bloginfo['id'];
				$title=$bloginfo['title'];
				$description=$bloginfo['description'];
				$image=$bloginfo['image'];
			}
		}
	?>
	<div id="body">
		<form action="<?php echo base_url();?>blog/updateblog" enctype="multipart/form-data" method="post">
			<table>
				<input type="hidden" name="blog_id" value="<?php echo $id;?>">
				<tr><td>Title</td><td><input type="text" name="title" required placeholder="Title Here" value="<?php echo $title;?>"></td></tr>
				<tr><td>Description</td><td><textarea name="description" required placeholder="Description Here"><?php echo $description;?></textarea></td></tr>
				<tr></tr>
				<tr><td colspan="2"><input type="submit" value="update"></td></tr>
			</table>
		</form>
	</div>

</div>
	<?php
	$this->load->view('footer');
	?>
</body>
</html>