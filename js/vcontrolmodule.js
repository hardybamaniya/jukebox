// JavaScript Document
var vol=100;
var vid,playbtn,seekbar,nt,curtimetext,durtimetext,btn_mute,volumeslider;
function initializePlayer()
{
	//set variables
	vid = document.getElementById("video_play");
	vs = document.getElementById("vs");
	playbtn = document.getElementById("btn_playpause");
	nextbtn = document.getElementById("btn_next");
	previousbtn = document.getElementById("btn_previous");
	seekslider = document.getElementById("seekslider");
	curtimetext = document.getElementById("curtimetext");
	durtimetext = document.getElementById("durtimetext");
	mutebtn = document.getElementById("btn_mute");
	volumeslider = document.getElementById("volumeslider");
	
	//create event listners
	playbtn.addEventListener("click",playpause,false) ;
	nextbtn.addEventListener("click",nextTrack,false) ;
	previousbtn.addEventListener("click",previousTrack,false) ;
	seekslider.addEventListener("change",vidseek,false) ;
	vid.addEventListener("timeupdate",seekupdate,false) ;
	mutebtn.addEventListener("click",mute,false) ;
	volumeslider.addEventListener("change",setvolume,false) ;
	
	
	
}


window.onload = initializePlayer;

function playpause()
{
	
	// play pause function
	if(vid.paused)
	{
		vid.play();
		 playbtn.style.background = "url(imgs/pause.gif)";
	}
	else
	{
		vid.pause();
	playbtn.style.background = "url(imgs/play.gif)";
	}
	
}

function vidseek()
{
	
	//thumb seek of video control
	var seekto = vid.duration * (seekslider.value/100);
	vid.currentTime = seekto;
}

function nextTrack()
{
//	alert(vs.src);
}

function previousTrack()
{
//	alert(vs.src);
	
}

function seekupdate()
{
	// duration of music
	nt = vid.currentTime * (100/vid.duration);
	seekslider.value = nt;
	var cm = Math.floor(vid.currentTime/60);
	var cs = Math.floor(vid.currentTime - cm*60);
	var dm = Math.floor(vid.duration/60);
	var ds = Math.floor(vid.duration - dm*60);
	if(cs<10){cs="0"+cs;}
	if(ds<10){ds="0"+ds;}
	if(cm<10){cm="0"+cm;}
	if(dm<10){dm ="0"+dm;}
	curtimetext.innerHTML = cm + ":" + cs;
	durtimetext.innerHTML = dm + ":" + ds;
	
}

function mute()
{
	//mute button of control
	if(vid.muted)
	{
		vid.muted = false;
		volumeslider.value = (vol*100);
		mutebtn.style.background = "url(imgs/vol.gif)";
	}
	else
	{
		vid.muted= true;
		volumeslider.value = 0;
				mutebtn.style.background = "url(imgs/mute.gif)";
	}
}

function setvolume()
{
	//volume control
	vid.volume = volumeslider.value/100;
	vol=vid.volume;
	if(volumeslider.value==0)
	{
				mutebtn.style.background = "url(imgs/mute.gif)";
	}
	else
	{
		if(vid.muted)
		{	
				vid.muted = false;
				volumeslider.value = (vol*100);
			//	mutebtn.style.background = "url(imgs/vol.gif)";
		}
	mutebtn.style.background = "url(imgs/vol.gif)";
	}
}
var b = new Array();
function changeSRC(a)
{
	vid.src = a.id;
	
	playbtn.style.background = "url(imgs/pause.gif)";
	document.getElementById("imagenow").src = a.title;
	document.getElementById("imagenow2").src = a.title;
	document.getElementById("songtit").innerHTML=a.innerHTML;
	
}
function changeSrc(a)
{
	vid.src = a.id;
	playbtn.style.background = "url(imgs/pause.gif)";
	document.getElementById("songtit").innerHTML=a.title;
		
}
function chngimg(a)
{

		document.getElementById("imagenow2").src=a.src;
}