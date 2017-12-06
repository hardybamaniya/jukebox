/*!
 * Waterwheel Carousel
 * Version 2.3.0
 * http://www.bkosborne.com
 *
 * Copyright 2011-2013 Brian Osborne
 * Dual licensed under GPLv3 or MIT
 * Copies of the licenses have been distributed
 * with this plugin.
 *
 * Plugin written by Brian Osborne
 * for use with the jQuery JavaScript Framework
 * http://www.jquery.com
 */
(function(a)
{
a.fn.waterwheelCarousel=function(r)
{
if(this.length>1)
{
this.each(function()
{
a(this).waterwheelCarousel(r)}
);return this}
var m=this;var c=
{
}
;var t=
{
}
;function j()
{
t=
{
itemsContainer:a(m),totalItems:a(m).find("img").length,containerWidth:a(m).width(),containerHeight:a(m).height(),currentCenterItem:null,previousCenterItem:null,items:[],calculations:[],carouselRotationsLeft:0,currentlyMoving:false,itemsAnimating:0,currentSpeed:c.speed,intervalTimer:null,currentDirection:"forward",leftItemsCount:0,rightItemsCount:0,performingSetup:true}
;t.itemsContainer.find("img").removeClass(c.activeClassName)}
function l(u)
{
clearTimeout(t.autoPlayTimer);if(!u&&c.autoPlay!==0)
{
t.autoPlayTimer=setTimeout(function()
{
if(c.autoPlay>0)
{
n("forward")}
else
{
n("backward")}
}
,Math.abs(c.autoPlay))}
}
function h(x)
{
if(c.preloadImages===false)
{
x();return}
var v=t.itemsContainer.find("img"),u=0,w=v.length;v.each(function()
{
a(this).bind("load",function()
{
u+=1;if(u===w)
{
x();return}
}
);a(this).attr("src",a(this).attr("src"));if(this.complete)
{
a(this).trigger("load")}
}
)}
function d()
{
t.itemsContainer.find("img").each(function()
{
if(a(this).data("original_width")==undefined||c.forcedImageWidth>0)
{
a(this).data("original_width",a(this).width())}
if(a(this).data("original_height")==undefined||c.forcedImageHeight>0)
{
a(this).data("original_height",a(this).height())}
}
)}
function e()
{
if(c.forcedImageWidth&&c.forcedImageHeight)
{
t.itemsContainer.find("img").each(function()
{
a(this).width(c.forcedImageWidth);a(this).height(c.forcedImageHeight)}
)}
}
function s()
{
var v=t.itemsContainer.find("img:first");t.calculations[0]=
{
distance:0,offset:0,opacity:1}
;var u=c.horizonOffset;var x=c.separation;for(var w=1;w<=c.flankingItems+2;w++)
{
if(w>1)
{
u*=c.horizonOffsetMultiplier;x*=c.separationMultiplier}
t.calculations[w]=
{
distance:t.calculations[w-1].distance+x,offset:t.calculations[w-1].offset+u,opacity:t.calculations[w-1].opacity*c.opacityMultiplier}
}
if(c.edgeFadeEnabled)
{
t.calculations[c.flankingItems+1].opacity=0}
else
{
t.calculations[c.flankingItems+1]=
{
distance:0,offset:0,opacity:0}
}
}
function b()
{
t.items=t.itemsContainer.find("img");for(var u=0;u<t.totalItems;u++)
{
t.items[u]=a(t.items[u])}
if(c.horizon===0)
{
if(c.orientation==="horizontal")
{
c.horizon=t.containerHeight/2}
else
{
c.horizon=t.containerWidth/2}
}
t.itemsContainer.css("position","relative").find("img").each(function()
{
var w,v;if(c.orientation==="horizontal")
{
w=(t.containerWidth/2)-(a(this).data("original_width")/2);v=c.horizon-(a(this).data("original_height")/2)}
else
{
w=c.horizon-(a(this).data("original_width")/2);v=(t.containerHeight/2)-(a(this).data("original_height")/2)}
a(this).css(
{
left:w,top:v,visibility:"visible",position:"absolute","z-index":0,opacity:0}
).data(
{
top:v,left:w,oldPosition:0,currentPosition:0,depth:0,opacity:0}
).show()}
)}
function q()
{
c.startingItem=(c.startingItem===0)?Math.round(t.totalItems/2):c.startingItem;t.rightItemsCount=Math.ceil((t.totalItems-1)/2);t.leftItemsCount=Math.floor((t.totalItems-1)/2);t.carouselRotationsLeft=1;k(t.items[c.startingItem-1],0);t.items[c.startingItem-1].css("opacity",1);var u=c.startingItem-1;for(var v=1;v<=t.rightItemsCount;v++)
{
(u<t.totalItems-1)?u+=1:u=0;t.items[u].css("opacity",1);k(t.items[u],v)}
var u=c.startingItem-1;for(var v=-1;v>=t.leftItemsCount*-1;v--)
{
(u>0)?u-=1:u=t.totalItems-1;t.items[u].css("opacity",1);k(t.items[u],v)}
}
function f(I,y)
{
var z=Math.abs(y);if(z<c.flankingItems+1)
{
var x=t.calculations[z]}
else
{
var x=t.calculations[c.flankingItems+1]}
var A=Math.pow(c.sizeMultiplier,z);var C=A*I.data("original_width");var w=A*I.data("original_height");var v=Math.abs(I.width()-C);var B=Math.abs(I.height()-w);var D=x.offset;var J=x.distance;if(y<0)
{
J*=-1}
if(c.orientation=="horizontal")
{
var u=t.containerWidth/2;var H=u+J-(C/2);var F=c.horizon-D-(w/2)}
else
{
var u=t.containerHeight/2;var H=c.horizon-D-(C/2);var F=u+J-(w/2)}
var E;if(y===0)
{
E=1}
else
{
E=x.opacity}
var G=c.flankingItems+2-z;I.data("width",C);I.data("height",w);I.data("top",F);I.data("left",H);I.data("oldPosition",I.data("currentPosition"));I.data("depth",G);I.data("opacity",E)}
function k(u,v)
{
if(Math.abs(v)<=c.flankingItems+1)
{
f(u,v);t.itemsAnimating++;u.css("z-index",u.data().depth).animate(
{
left:u.data().left,width:u.data().width,height:u.data().height,top:u.data().top,opacity:u.data().opacity}
,t.currentSpeed,c.animationEasing,function()
{
g(u,v)}
)}
else
{
u.data("currentPosition",v);if(u.data("oldPosition")===0)
{
u.css(
{
left:u.data().left,width:u.data().width,height:u.data().height,top:u.data().top,opacity:u.data().opacity,"z-index":u.data().depth}
)}
}
}
function g(u,v)
{
t.itemsAnimating--;u.data("currentPosition",v);if(v===0)
{
t.currentCenterItem=u}
if(t.itemsAnimating===0)
{
t.carouselRotationsLeft-=1;t.currentlyMoving=false;if(t.carouselRotationsLeft>0)
{
p(0)}
else
{
t.currentSpeed=c.speed;t.currentCenterItem.addClass(c.activeClassName);if(t.performingSetup===false)
{
c.movedToCenter(t.currentCenterItem);c.movedFromCenter(t.previousCenterItem)}
t.performingSetup=false;l()}
}
}
function p(v)
{
if(t.currentlyMoving===false)
{
t.currentCenterItem.removeClass(c.activeClassName);t.currentlyMoving=true;t.itemsAnimating=0;t.carouselRotationsLeft+=v;if(c.quickerForFurther===true)
{
if(v>1)
{
t.currentSpeed=c.speed/v}
t.currentSpeed=(t.currentSpeed<100)?100:t.currentSpeed}
for(var y=0;y<t.totalItems;y++)
{
var w=a(t.items[y]);var z=w.data("currentPosition");var x;if(t.currentDirection=="forward")
{
x=z-1}
else
{
x=z+1}
var u=(x>0)?t.rightItemsCount:t.leftItemsCount;if(Math.abs(x)>u)
{
x=z*-1;if(t.totalItems%2==0)
{
x+=1}
}
k(w,x)}
}
}
a(this).find("img").bind("click",function()
{
var v=a(this).data().currentPosition;if(c.imageNav==false)
{
return}
if(Math.abs(v)>=c.flankingItems+1)
{
return}
if(t.currentlyMoving)
{
return}
t.previousCenterItem=t.currentCenterItem;l(true);c.autoPlay=0;var u=Math.abs(v);if(v==0)
{
c.clickedCenter(a(this))}
else
{
c.movingFromCenter(t.currentCenterItem);c.movingToCenter(a(this));if(v<0)
{
t.currentDirection="backward";p(u)}
else
{
if(v>0)
{
t.currentDirection="forward";p(u)}
}
}
}
);a(this).find("a").bind("click",function(u)
{
var v=a(this).find("img").data("currentPosition")==0;if(c.linkHandling===1||(c.linkHandling===2&&!v))
{
u.preventDefault();return false}
}
);function o()
{
var u=t.currentCenterItem.next();if(u.length<=0)
{
u=t.currentCenterItem.parent().children().first()}
return u}
function i()
{
var u=t.currentCenterItem.prev();if(u.length<=0)
{
u=t.currentCenterItem.parent().children().last()}
return u}
function n(u)
{
if(t.currentlyMoving===false)
{
t.previousCenterItem=t.currentCenterItem;c.movingFromCenter(t.currentCenterItem);if(u=="backward")
{
c.movingToCenter(i());t.currentDirection="backward"}
else
{
if(u=="forward")
{
c.movingToCenter(o());t.currentDirection="forward"}
}
}
p(1)}
a(document).keydown(function(u)
{
if(c.keyboardNav)
{
if((u.which===37&&c.orientation=="horizontal")||(u.which===38&&c.orientation=="vertical"))
{
l(true);c.autoPlay=0;n("backward")}
else
{
if((u.which===39&&c.orientation=="horizontal")||(u.which===40&&c.orientation=="vertical"))
{
l(true);c.autoPlay=0;n("forward")}
}
if(c.keyboardNavOverride&&((c.orientation=="horizontal"&&(u.which===37||u.which===39))||(c.orientation=="vertical"&&(u.which===38||u.which===40))))
{
u.preventDefault();return false}
}
}
);this.reload=function(v)
{
if(typeof v==="object")
{
var u=v}
else
{
var u=
{
}
}
c=a.extend(
{
}
,a.fn.waterwheelCarousel.defaults,v);j();t.itemsContainer.find("img").hide();e();h(function()
{
d();s();b();q()}
)}
;this.next=function()
{
l(true);c.autoPlay=0;n("forward")}
;this.prev=function()
{
l(true);c.autoPlay=0;n("backward")}
;this.reload(r);return this}
;a.fn.waterwheelCarousel.defaults=
{
startingItem:1,separation:200,separationMultiplier:0.7,horizonOffset:0,horizonOffsetMultiplier:1,sizeMultiplier:0.8,opacityMultiplier:0.8,horizon:0,flankingItems:5,speed:300,animationEasing:"linear",quickerForFurther:true,edgeFadeEnabled:false,linkHandling:2,autoPlay:0,orientation:"horizontal",activeClassName:"carousel-center",keyboardNav:false,keyboardNavOverride:true,imageNav:true,preloadImages:true,forcedImageWidth:300,forcedImageHeight:200,movingToCenter:a.noop,movedToCenter:a.noop,clickedCenter:a.noop,movingFromCenter:a.noop,movedFromCenter:a.noop}
}
)(jQuery);