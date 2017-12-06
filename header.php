<?php
	include("conn.php");
	$USER="";
	$query=mysqli_query($link,"select * from top12");
	session_start();
	if(isset($_SESSION['user']))
	{
			$USER = $_SESSION['user'];	
	}
	if(isset($_POST['log']))
	{
		$un=$_POST['userID'];
		$p=$_POST['pass'];
			
		$sel=mysql_query("select * from register where uname='$un' and password='$p'");
		if($s=mysql_fetch_row($sel))
		{
			session_start();
			$_SESSION["user"] = $un;
			echo "<script>alert('Succesfully registed')</script>";
			
			header("Location:user.php");	

		}
		else
		{
				echo "<script>alert('registration Failed')</script>";			
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JUKEBOX</title>
<!--
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
 Custom Theme files --
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />-->
<link type="text/css" href="css/header.css"  rel="stylesheet"/>
<link rel="shortcut icon" href="imgs/logo.ico" />
<link type="text/css" href="css/search.css"  rel="stylesheet"/>
<link href="css/nowplaying.css" rel='stylesheet' type='text/css' media="all" />
<link type="text/css" rel="stylesheet" href="css/sidebar.css"  />
<link rel="stylesheet" type="text/css" href="css/controlModule.css"></link>
<link rel="stylesheet" type="text/css" href="css/homepage.css"></link>
<link rel="stylesheet" type="text/css" href="css/artist.css"></link>
<link rel="stylesheet" type="text/css" href="css/admin.css"></link>
<link rel="stylesheet" type="text/css" href="css/user.css"></link>
  
<script type="text/javascript" src="js/vcontrolmodule.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.waterwheelCarousel.min.js"></script>
<script type="text/javascript" src="js/jquery.waterwheelCarousel.setup.js"></script>
<script type="text/javascript" src="js/insert.js"></script>
<script type="text/javascript" src="js/createplaylist.js"></script>
<script>
function next(a)
{
	alert(a.id);	
}

</script>    
</head>
<body>
<!-- header -->
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php"><img src="imgs/logo.png" height="100" alt=""></a>
        	<div class="top-search">
				<form class="navbar-form navbar-right" action="search.php" method="post">
					<input type="text" class="form-control" name="search" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div> 
			<div class="header-top-right">
				
                <?php
					if(isset($_SESSION['user']))
					{
						?>
						<div class="signin">
						<a href="logout.php" class="play-icon popup-with-zoom-anim">Log OUT</a>		
					
                    	<?php
                    }
					else
					{
				?>
                
                <div class="signin">
					<a href="#openModal2" class="play-icon popup-with-zoom-anim">Sign Up</a>
                 <div id="openModal2" class="modalDialog">
	               <div>
		              <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
		              <h2>Register</h2><br /><br />
                     <table cellpadding="8" cellspacing="0">
                      <form action="" method="post" enctype="multipart/form-data">
		              <tr><td>User Name:</td><td><input type="text" name="userID" ></td></tr>
		              <tr><td>Password : </td><td><input type="password" name="pass"></td></td></tr>
					  <tr><td>confirm Password : </td><td><input type="password" name="conpass"></td></tr>
                      <tr><td>gender: </td><td><input type="text" name="gender" ></td></tr>
                      <tr><td>email: </td><td><input type="text" name="email" ></td></tr>
                      <tr><td>contact no: </td><td><input type="text" name="cno" ></td></tr>
                      <tr><td>profilepic: </td><td><input  type="file" name="prop" ></td></tr>
                      <tr><td>country: </td><td><input type="text" name="con" ></td></tr>
                        <tr><td colspan="2">    <button class="modalDialogbutton" type="submit" name="reg">Register</button><button type="submit" class="modalDialogbutton">Reset</button></td></tr>	</form>
                        </table>
                    
	               </div>
   		      	 </div>
				</div>
				<div class="signin">
					<a href="#openModal" class="play-icon popup-with-zoom-anim"><span>Sign In</span></a>
                    
                <div id="openModal" class="modalDialog">
	               <div>
		              <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
                             <form action="" method="post">
		              <h2>Login</h2><br /><br />
		              User Name: <input type="text" name="userID" ><br /><br /><br />
		              Password : <input type="password" name="pass"><br /><br /><br />
                        <button type="submit" name="log">Login</button><button type="reset">reset</button>
                    </form>
	               </div>
   		       </div>
                   <?php
					}
				 ?>
                
				</div>
        	</div>
		<div class="clearfix"> </div>
      </div>
    </nav>
<!-- sidebar -->    
<div id="appNav" class="app_nav" onselectstart="return false">				<!-- app nav --> 
  <ul type="none" class="moduleList">
					  <li id="cl_home" class="selected">
						<a href="homepage.php">
                        <div class="module_icon">
                            <b><img id="cl_homeimg" src="imgs/home2.gif"/></b>
                            <span class="message_bubble" style="display: none;"></span>
                        </div>
						<div class="module_title">Home</div>
				  		</a>
                  </li>
                  	<li id="cl_artModule" >
					<a href="artist.php">   
                      <div class="module_icon"><b><img id="cl_artimg" src="imgs/artist.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Artist</div>
					</a>
                    </li>
                    
                    <li id="cl_albModule">
					<a href="album.php">   
                      <div class="module_icon"><b><img id="cl_albimg" src="imgs/album.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Albums</div>
					</a>
                    </li>
                    <li id="cl_userModule">
					 

					<?php
						if(isset($_SESSION['user']))
						{
							$u=$_SESSION['user'];
							echo "<a href='user.php'> 
                      <div class='module_icon'><b><img id='cl_userimg' src='imgs/user.gif'/></b><span class='message_bubble' style='display: none;'></span></div>
							<div class='module_title'>$u</div>";	
						}
						else
						{
					?>
                    <a href="#openModal"> 
                      <div class="module_icon"><b><img id="cl_userimg" src="imgs/user.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
                    	<div class="module_title">USER</div>
					<?php } ?>
                    </a>
                    </li>
                    <li id="cl_nowModule">
					  <a href="nowplaying.php">  
                      <div class="module_icon"><b><img id="cl_nowimg" src="imgs/now.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Now Playing</div>
					</a>
                    </li><!--ms-repeat-end-->
				</ul>
				<div class="leftLine"></div>
				
				<!-- 
				<ul class="moduleList webModule">
					<li ms-attr-id="cl_{{webModules[$index]}}" ms-repeat="webModules" ms-click="clickWebModule($index)" ms-class="selected:$index === selectedWebIndex"><div><b></b></div><span>{{webModuleNames[$index]}}</span></li>
				</ul>
				<div class="leftLine"></div>
				 -->
				
</div>
<?php

if(isset($_POST['reg']))
{
	$un=$_POST['userID'];
	$p=$_POST['pass'];
	$g=$_POST['gender'];
	$email=$_POST['email'];
	$cno=$_POST['cno'];
	$con=$_POST['con'];
	$fpath=$_FILES["prop"]["tmp_name"];
	$fname=$_FILES["prop"]["name"];
	$fl="upload//".$fname;

	
	
	if(mysql_query("insert into register values('','$un','$p','$g','$email','$cno','$fl','$con')"))
	{
		
		if(move_uploaded_file($fpath,$fl))
		{
				header("Location:homepage.php");		
		}

	}
}

?>
