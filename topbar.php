<style>
.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
nav .nav-link{
	color:white !important;
}
nav .nav-item{
	width: auto !important
}

.input-group span, 
.input-group input{
	padding: 10px 15px;
}

@media (min-width: 992px){
	.navbar-expand-lg .navbar-nav {
	    flex-direction: row;
	}
}

@media only screen and (max-width: 575px) {
	.input-group{
		margin-left: 33%;
		margin-top: -60px;;
	}

	.navbar-toggler{
		margin-left: 80%;
		margin-top: -80px;
		z-index:4;
	}
}

@media only screen and (max-width: 420px){
	.input-group{
		margin-left: 20%;
		margin-top: -50px;
	}

	.navbar-brand{
		height: 50px;
		width: 50px;
		background-image:url(assets/img/light.jpg);
		overflow:hidden;
	}
}
</style>

<nav class="navbar navbar-light navbar-expand-lg fixed-top text-light" style="padding:0;color:#fff;background:#212121;">
  <div class="container">
	    <a class="navbar-brand js-scroll-trigger text-white" href="./">
			<img src="assets/img/light.jpg" style="height:50px;width:130px;">
		</a>

		<div class="col-sm-6 pt-2">
	    	<div class="input-group input-group-sm mb-3">
			  <div class="input-group-prepend">
			    <span class="w-300 h-60 input-group-text text-light bg-dark border-0" id="inputGroup-sizing-sm"><i class="fa fa-search"></i></span>
			  </div>
			  <input class="w-300 h-60 border-0" type="search" id="search" value="<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search in GoubVideo ...">
			</div>
	    </div>
	    <button class="navbar-toggler text-light color-white navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	    
	    <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav ml-auto my-2 my-lg-0">
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
	            <?php if(isset($_SESSION['login_id'])): ?>
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=my_uploads">My Uploads</a></li>
	            <li class=" dropdown nav-item">
                	<a href="#" class="text-white dropdown-toggle nav-link"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_middlename']) ?> </a>
	              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
	                <a class="dropdown-item" href="index.php?page=signup&id=<?php echo $_SESSION['login_id'] ?>" id=""><i class="fa fa-cog"></i> Manage Account</a>
	                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
	              </div>
	            </li>
	          <?php else: ?>
	            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Login</a></li>
	          <?php endif; ?>
	           
	            
	         
	        </ul>
	    </div>
	</div>
</nav>

<script>
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  })
  $('#search').keypress(function(e){
  	if(e.which == 13){
  		location.href = "index.php?s="+$(this).val()
  	}
  })
</script>



<title>GoubVideo</title>
<link rel="shortcut icon" href="assets/img/light.jpg" type="image/x-icon">
