
<!-- video control -->

<div id="video_player_box">

        <video  id="video_play" src="<?php if(isset($q[$c]))echo"$q[$c]";else echo""; ?>"   autoplay>
        </video>
		
        <div id="songtit"><?php if(isset($t[$c]))echo"$t[$c]";else echo""; ?></div>
        <div  id="controlbox">
			<img   src="<?php if(isset($i[$c]))echo"$i[$c]";else echo""; ?>" id="imagenow2" style="border:thin solid; height:60px; width:60px; float:left;"> 
            <button id="btn_previous"></button>
            <button id="btn_playpause"></button>
            <button id="btn_next"></button>	

            <span id="curtimetext">00:00</span>

            <input type="range" min="0" max="100" value="0" step="0.01" id="seekslider"> 

            <span id="durtimetext">00:00</span>
          <button id="btn_mute"></button>
            <input type="range"  min="0" max="100" value="100" id="volumeslider"> 
        </div>
</div>

</body>
</html>