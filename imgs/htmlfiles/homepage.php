<!DOCTYPE HMTL>
<html>
    <head>
        <title>Home</title>
        
        </head>
    <body>
         <meta http-equiv="Content-type" content="text/html;charset=utf-8"></meta>
         <link rel="stylesheet" type="text/css" href="../cssfiles/homepage.css"></link>
        <div class="header">
            <img class="logo" src="../jb.gif"> 
            <input id="searchbox" class="searchSong ui-autocomplete-input" type="text" maxlength="35" 
                   placeholder="Click here to search for Songs, Artists,Albums, Playlists and Radios" data-value="searchbox" data-role="none"  autocomplete="off">
        </div><br>
        <div class="content">
                <a href="#openModal">playlists</a> 
                <div id="openModal" class="modalDialog">
	               <div>
		              <a href="#close" title="Close" class="close">X</a>
		              <h2>Login/Register</h2>
		              ID:<input type="text" ><br>
		              Password <input type="password">
                        <button type="submit">Login</button><button type="submit">Register</button>
                    
	               </div>
            </div><br>
                <a href="homepage.html"> Home </a>
            
        </div>
        <div class="main">
            <div class="img">
            	<?php
					for($i=0;$i<=20;$i++)
					{
						echo "<a ><img src='../Farhan-Bhaag-Mikha-Bhag1.jpg'></a>";
					}
				?>
                <a ><img src="../Farhan-Bhaag-Mikha-Bhag1.jpg"></a>
                <a ><img src="../index.jpg"></a>
                <a ><img src="../piku.jpg"</a>
            </div>
        </div>
    </body>
</html>
