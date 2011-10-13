<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php the_title();?></title>
<meta name="description" content="<?php echo get_post_meta($wp_query->post->ID, "description", true);?></meta>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> RSS Feed" href="<?php bloginfo('rss2_url');?>"/>
<style type="text/css">
body{text-align:center;width:100%;background-color:#fafafa;font-family:Arial,Verdana,Tahoma}
h1,h2,h3,p,ul,pre{text-align:left}
p,b,pre,div.quote,ul,table{color:#333}
h1,h2,h3{font-weight:400}
h1 > a{color:#000}
a{text-decoration:none;color:#5a5ab8}
a:hover{background-color:#eee}
#everything{text-align:left;border:0;width:1240px;min-width:1240px;font-size:14px;margin:0 auto;padding:0}
#tool-tip{border:1px solid #87c0d7;display:none;background:#e0edfb;color:#069;font-size:11px;max-width:370px;text-align:left;position:absolute;z-index:1000;padding:3px}
#head{width:100%;height:110px;background-image:url(images/busybee.jpg);margin:0 0 10px}
#head > div{padding:27px 0 0 40px}
#head > div > p:first-child{font-family:Georgia, Sans-Serif, Verdana;font-size:40px;font-style:italic;line-height:1em;color:#ddd}
#head > div > p{font-size:11px;line-height:1em;color:#aaa}
#main{text-align:center;width:925px;float:left;margin:0 20px 10px}
.pagenav{border-spacing:5px;border:0;background-color:#fafafa;min-width:0;margin:10px auto 0;padding:0}
.pagenav td{border:1px solid #ccc;margin:0;padding:0}
.pagenav td.sel{border:1px solid #87c0d7;margin:0;padding:0}
a.sel{display:block;font-size:1.1em;font-weight:700;color:#069;background-color:#e0edfb;text-decoration:none}
a.lnk{display:block;font-size:1.1em;font-weight:700;color:#069;background-color:#fff;text-decoration:none}
a.lnk:hover{background-color:#069;color:#f8f7e9}
div.post-head{height:80px;padding:0 0 1em}
div.post-head > img{float:left;padding:0 15px 0 0}
div.post-head > div{float:left;padding:10px 0 0}
div.comment,div#respond{text-align:left;clear:both;border:1px solid #aaa;margin:1em 0 0;padding:1em}
div.comment-head{height:55px}
div.comment-head > img{float:left;margin:0 10px 0 0}
div.comment-head > div{float:left;margin:5px 0 0}
div.comment-head > div > p{font-size:16px;font-weight:700;margin:0;padding:0}
div.comment-head > div > a{font-size:11px;margin:0;padding:0}
div.post-main,div.comment-main{clear:both}
div.post-main{margin:0 0 50px}
div.post-main > ul,div.comment-main > ul{border:0;margin:.5em 0;padding:0 0 0 2em}
div.post-main > p,div.comment-main > p,div.post-main > ul > li,div.comment-main > ul > li{line-height:1.4em;padding:0 0 1em}
div.post-main > table,div.comment-main > table{border:0;border-collapse:collapse;min-width:50%;margin:0 auto 1em}
div.post-main > table > tbody > tr,div.comment-main > table > tbody > tr{text-align:center;margin:0;padding:5px}
div.post-main > table > tbody > tr > th,div.comment-main > table > tbody > tr > th{border:1px solid #aaa;background-color:#ddd;margin:0;padding:5px 1em}
div.post-main > table > tbody > tr > td,div.comment-main > table > tbody > tr > td{border:1px solid #aaa;background-color:#eee;padding:5px 1em}
#commentform > p{clear:both;font-size:11px;padding:.5em 0}
#commentform > table{font-size:11px;text-align:left;width:auto;margin:.5em 0 0}
#commentform > table > tbody > tr > td{text-align:right}
#commentform > p > label{vertical-align:top}
textarea{border:1px solid #aaa;min-width:100%;max-width:100%;margin:0 0 .5em;padding:0}
a#cancel-comment-reply-link{font-size:11px;font-weight:400;float:right}
div.post-main > pre,div.comment-main > pre{border:1px solid #aaa;background-color:#eee;margin:0 0 1em;padding:15px 20px}
div.quote{border:1px solid #aaa;background-color:#eee;margin:0 0 1em;padding:5px 20px}
div.quote > p{line-height:1.4em;padding:.5em 0}
img.aligncenter{display:block;margin:0 auto 1em}
div.aligncenter{margin:0 auto 1em}
#side{width:255px;float:left;font-size:12px;margin:0 20px 10px 0}
input{background-color:#eee;border:1px solid #aaa;height:22px;margin:0;padding:0}
input#subscribe{border:0;height:auto;margin:0;padding:0}
input#submit{padding:0 10px}
input.textbox{background-color:#fff;height:20px}
input::-moz-focus-inner{border:0;padding:0}
div#side > table{text-align:center;width:100%;margin:0 0 6px}
div#side > form > table{width:100%;border:0;border-collapse:collapse;background-color:inherit;margin:0;padding:0}
div#side > form > table > tbody > tr > td{border:0;width:25%;background-color:inherit;margin:0;padding:0}
div#side > form > table > tbody > tr > td > input{width:100%}
div#side > form > table > tbody > tr > td:first-child{width:75%;padding:0 3px 0 0}
#side > ul > li:first-child{border:0;background:url(images/rss.gif) left center no-repeat;margin:10px 0 10px 34px;padding:0 0 0 20px}
#side > ul > li{border:0;background-color:#eee;list-style:none;margin:0 0 10px;padding:0}
#side > ul > li > p{font-size:20px;background-color:#ddd;margin:0 0 10px;padding:5px 10px}
#side > ul > li > ul{margin:0 0 0 25px;padding:0}
#side > ul > li > ul > li{list-style:square url(images/fav.gif);margin:0;padding:0 0 5px}
#side > ul > li > ul > li > ul{margin:5px 0 0 20px;padding:0}
#side > ul > li > ul > li > ul > li{list-style:square url(images/fav.gif);margin:0 0 5px;padding:0}
#tail{width:100%;height:75px;background-color:#eee;clear:both;margin:0 0 20px}
#tail > div.licence-img{float:left;padding:22px 0 0 39px}
#tail > div.copyright{float:left;padding:31px 0 0 10px}
#tail > div.credits{float:right;padding:31px 39px 0 0}
html,body,p,div,img,h1,h2,h3,div#side > form,#side > ul{border:0;margin:0;padding:0}
div.post-head > div > p,div.comment-main > a,#tail > div.copyright > p,#tail > div.credits > p{font-size:11px}
div.aligncenter > p,div.alignleft > p,div.alignright > p{text-align:center;font-style:italic;padding:0}
img.alignleft,div.alignleft{float:left;margin:0 1em 1em 0}
img.alignright,div.alignright{float:right;margin:0 0 1em 1em}
input#submit:hover,input#search:hover,#side > ul > li > ul a:hover{background-color:#ddd}
div#side > form > table > tbody,div#side > form > table > tbody > tr{border:0;background-color:inherit;margin:0;padding:0}
</style>
<script type="text/javascript">
//<![CDATA[
tooltip={name:"tool-tip",naturalWidth:0,naturalHeight:0,tip:null};tooltip.init=function(){var a="http://www.w3.org/1999/xhtml";if(!b){var b="tool-tip"}var c=document.getElementById(b);if(!c){c=document.createElementNS?document.createElementNS(a,"div"):document.createElement("div");c.setAttribute("id",b);document.getElementsByTagName("body").item(0).appendChild(c)}if(!document.getElementById){return}this.tip=document.getElementById(this.name);if(this.tip){document.onmousemove=function(a){tooltip.move(a)}}var d,e,f,g=["area","a"];for(var h=0;h<g.length;h++){f=document.getElementsByTagName(g[h]);if(f){for(var i=0;i<f.length;i++){d=f[i];e=d.getAttribute("title");if(!e){e=d.getAttribute("alt")}if(e){d.setAttribute("tiptitle",e);d.removeAttribute("title");d.removeAttribute("alt");d.onmouseover=function(){tooltip.show(this.getAttribute("tiptitle"))};d.onmouseout=function(){tooltip.hide()}}}}}};tooltip.move=function(a){var b,c,d;if(typeof window.innerWidth=="number"){d=window.innerWidth}else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){d=document.documentElement.clientWidth}if(document.all){b=document.documentElement&&document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft;c=document.documentElement&&document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;b+=window.event.clientX;c+=window.event.clientY}else{b=a.pageX;c=a.pageY}this.tip.style.left=b-this.naturalWidth*b/d+"px";this.tip.style.top=c+15+"px"};tooltip.show=function(a){if(!this.tip){return}this.tip.innerHTML=a;this.tip.style.display="block";this.naturalWidth=this.tip.offsetWidth;this.naturalHeight=this.tip.offsetHeight};tooltip.hide=function(){if(!this.tip){return}this.tip.innerHTML="";this.tip.style.display="none"};window.onload=function(){tooltip.init()}
addComment={moveForm:function(d,f,i,c){var m=this,a,h=m.I(d),b=m.I(i),l=m.I("cancel-comment-reply-link"),j=m.I("comment_parent"),k=m.I("comment_post_ID");if(!h||!b||!l||!j){return}m.respondId=i;c=c||false;if(!m.I("wp-temp-form-div")){a=document.createElement("div");a.id="wp-temp-form-div";a.style.display="none";b.parentNode.insertBefore(a,b)}h.parentNode.insertBefore(b,h.nextSibling);if(k&&c){k.value=c}j.value=f;l.style.display="";l.onclick=function(){var n=addComment,e=n.I("wp-temp-form-div"),o=n.I(n.respondId);if(!e||!o){return}n.I("comment_parent").value="0";e.parentNode.insertBefore(o,e);e.parentNode.removeChild(e);this.style.display="none";this.onclick=null;return false};try{m.I("comment").focus()}catch(g){}return false},I:function(a){return document.getElementById(a)}};
//]]>
</script>
</head>
<body>
	<div id="everything">
		<div id="head">
			<div>
				<p>MakeStuff</p>
				<p>Make stuff, not war!</p>
			</div>
		</div>
