<?php
	include("conn.php");
	$query=mysql_query("select * from top12");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<link type="text/css" href="Untitled-3.css"  rel="stylesheet"/>
 <link rel="stylesheet" type="text/css" href="css/controlModule.css"></link>
<script type="text/javascript" src="js/vcontrolmodule.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.waterwheelCarousel.min.js"></script>
<script type="text/javascript" src="js/jquery.waterwheelCarousel.setup.js"></script>
    
</head><body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" height="100" alt=""></a>
        	<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div> 
			<div class="header-top-right">
				<div class="signin">
					<a href="" class="play-icon popup-with-zoom-anim">Sign Up</a>
				</div>
				<div class="signin">
					<a href="" class="play-icon popup-with-zoom-anim">Sign In</a>
				</div>
        	</div>
		<div class="clearfix"> </div>
      </div>
    </nav>
<div id="appNav" class="app_nav" onselectstart="return false">				<!-- app nav --> 
  <ul type="none" class="moduleList">
					<li id="cl_home" class="selected">
						<div class="module_icon">
                            <b><img src="imgs/home2.gif"/></b>
                            <span class="message_bubble" style="display: none;"></span>
                        </div>
						<div class="module_title">Home</div>
				  </li>
                    <li id="cl_imgModule" >
					  <div class="module_icon"><b><img src="imgs/artist.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Artist</div>
					</li>
                    <li id="cl_videoModule">
					  <div class="module_icon"><b><img src="imgs/album.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Albums</div>
					</li>
                    <li id="cl_appModule">
					  <div class="module_icon"><b><img src="imgs/user.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">USER</div>
					</li>
                    <li id="cl_musicModule">
					  <div class="module_icon"><b><img src="imgs/now.gif"/></b><span class="message_bubble" style="display: none;"></span></div>
						<div class="module_title">Now Playing</div>
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
<div id="waterwheelCarousel">
		<?php
					while($row=mysql_fetch_row($query))
					{
						$q[]=$row[3]."".$row[1];
						echo "<div class='imge'><span onClick='changeSRC(this)' id='$row[3]$row[1]'><img src='$row[8]'></span></div>";	        
//						echo "<img src='imgs/IMG_320x480_02.jpg'>";

					}
		?>
        
       
</div>

<div id="video_player_box">
        <video  id="video_play" src"<?php echo"$q[0]"; ?>"   autoplay>
        	<source src="<?php echo"$q[0]"; ?>" />     
        </video>
        <div id="controlbox">

            <button id="btn_previous"></button>
            <button id="btn_playpause"></button>
            <button id="btn_next" onClick="nextTrack()"></button>	

            <span id="curtimetext">00:00</span>

            <input type="range" min="0" max="100" value="0" step="0.01" id="seekslider"> 

            <span id="durtimetext">00:00</span>
          <button id="btn_mute">mute</button>
            <input type="range"  min="0" max="100" value="100" id="volumeslider"> 
        </div>

</body>
</html>