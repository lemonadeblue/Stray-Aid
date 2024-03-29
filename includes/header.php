<?php 
include("includes/connection.php");
include("functions/functions.php");
?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
<style>	
	a.navbar-brand 
	{ 
		font-family: Candal; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 29px; 
	}


</style>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php" style="color:#AEB6BF; font-size: 16pt;">Stray Aid</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
				$user = $_SESSION['user_email'];
				$get_user = "SELECT * from users where user_email = '$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);
				$user_name = $row['user_name'];
				$user_group = $row['user_group'];
				$_SESSION['user_id'] = $row['user_id'];
				?>

				<?php 
					$user = $_SESSION['user_email'];
					$get_user = "SELECT * from users where user_email = '$user'";
					$run_user = mysqli_query($con, $get_user);
					$row = mysqli_fetch_array($run_user);

					$user_id = $row['user_id'];
					$user_name = $row['user_name'];
					$first_name = $row['f_name'];
					$last_name = $row['l_name'];
					$describe_user = $row['describe_user'];
					$Relationship_status = $row['Relationship'];
					$user_pass = $row['user_pass'];
					$user_email = $row['user_email'];
					$user_country = $row['user_country'];
					$user_gender = $row['user_gender'];
					$user_birthday = $row['user_birthday'];
					$user_image = $row['user_image'];
					$user_cover = $row['user_cover'];
					$recovery_account = $row['recovery_account'];
					$register_date = $row['user_reg_date'];

					$user_posts = "SELECT * from posts where user_id='$user_id'";
					$run_posts = mysqli_query($con,$user_posts);
					$posts = mysqli_num_rows($run_posts);
					?>
				<li style="font-family: Candal;"><a href='profile.php?<?php echo "u_id=$user_id" ?>' style='color:#1D3557;'><?php echo "$first_name"; ?></a></li>
				<li style="font-family: Candal;"><a href='home.php' style='color:#1D3557;'>Home</a></li>
				<li style="font-family: Candal;"><a href='members.php' style='color:#1D3557;'>Find Shelters</a></li>
				<li style="font-family: Candal;"><a href='messages.php?u_id=new' style='color:#1D3557;'>Messages</a></li>
				<?php if ($user_group == "Shelter") { ?>
				<li style="font-family: Candal;"><a href='viewforms.php?u_id=new' style='color:#1D3557;'>View Applications</a></li>
			<?php }?>

					<?php 
						echo 
						"
						<li class='dropdown'>
							<a href = '#' class = 'dropdown-toggle' data-toggle='dropdown'
							role = 'button' aria-haspopup = 'true' aria-expanded = 'false' style='color:;'>
							<span> <i class = 'glyphicon glyphicon-chevron-down'></i></span></a>

						<ul class='dropdown-menu'>
							<li>
								<a href = 'my_post.php?u_id=$user_id'>My Posts <span class = 'badge badge-secondary'>$posts</span><a/>
							</li>
							<li>
								<a href = 'edit_profile.php?u_id=$user_id'>Edit Profile</a>
							</li>
							<li role = 'separator' class='divider'></li>
							<li>
								<a href = 'logout.php'>Logout<a/>
							</li>
						</ul>
						</li>
						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search">
						</div>
						<button type="submite" class="btn btn-info" name="search">Search</button>
					</form>
					
				</li>
			</ul>
		</div>
	</div>
</nav>
