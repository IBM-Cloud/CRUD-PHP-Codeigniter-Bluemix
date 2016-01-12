<!DOCTYPE HTML>
<!--
	Developed by Twana Daniel
-->
<html>
<head>
	<title>PHP CRUR - Bluemix</title>
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
<body class="left-sidebar">
<div id="fb-root"></div>

<!-- Wrapper -->
<div id="wrapper">

	<!-- Content -->
	<div id="content">
		<div class="inner">
			<!-- Blog Post -->
			<?php
			if(isset($message))
			{
				echo $message."&nbsp;&nbsp;<a href='".base_url()."' class='button next'>Back To Home</a>";
			}
			else
			{
				if(count($result) == 0)
				{
					echo "No Record Found!<br>"; ?>
						<a href="<?php echo base_url()?>blog/add" class="button next">ADD NEW BLOG</a>
					<?php
				}
				else
				{
					foreach($result as $result)
					{
						?>
						<article class="box post post-excerpt">
							<header>
								<h2><a href="#"><?php echo $result['title'];?></a></h2>
							</header>
							<p>
								<?php echo $result['description'];?>
							</p>
							<a href="#">Continue reading </a></br></br></br>
							<a href="<?php echo base_url()?>blog/add" class="button next">ADD NEW BLOG</a>

							<div class="info">
												<span class="date">
													<span class="month">
													<?php
													$timestamp=strtotime($result['created_date']);
													$date=date('dS F Y h:i:s A', $timestamp);
													$showdate=explode(' ',$date);
													?>
														<span class="day" style="display:block;"><?php echo $showdate[0];?></span>
							                    <span class="month" style="display:block;"><?php echo $showdate[1];?></span>
														<?php //echo $result['created_date'];?></span>
												</span>
								<a href="<?php echo base_url()?>blog/edit/<?php echo $result['id'];?>">EDIT</a><br>
								<a href="<?php echo base_url()?>blog/delete/<?php echo $result['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">DELETE</a>
							</div>
						</article>
						<?php
					}
				}
			}
			?>
			<!-- Blog Post Ends -->


			<!-- Pagination -->
			<div class="pagination">
				<div class="pages">
					<?php echo $links;?>
				</div>
			</div>



		</div>
	</div>

	<?php
		$this->load->view('footer');
	?>

</div>
</body>
</html>