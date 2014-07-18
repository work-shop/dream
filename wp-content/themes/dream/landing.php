<?php $landing_image = get_field('landing_image','option'); ?>
	<section id="landing" class="block landing crop" style="width: 100%; height: 100%; position: absolute; background-image: url('<?php echo $landing_image[sizes][landing]; ?>'); background-size: cover; overflow: hidden;">	

<style>
#loadingProgressG{
width:180px;
height:5px;
margin: 30px auto 0 auto;
overflow:hidden;
background-color:#f7ff7f;
-moz-border-radius:2px;
-webkit-border-radius:2px;
-ms-border-radius:2px;
-o-border-radius:2px;
border-radius:2px;
}

.loadingProgressG{
background-color:#ffffff;
margin-top:0;
margin-left:-180px;
-moz-animation-name:bounce_loadingProgressG;
-moz-animation-duration:3.0s;
-moz-animation-iteration-count:infinite;
-moz-animation-timing-function:linear;
-webkit-animation-name:bounce_loadingProgressG;
-webkit-animation-duration:3.0s;
-webkit-animation-iteration-count:infinite;
-webkit-animation-timing-function:linear;
-ms-animation-name:bounce_loadingProgressG;
-ms-animation-duration:3.0s;
-ms-animation-iteration-count:infinite;
-ms-animation-timing-function:linear;
-o-animation-name:bounce_loadingProgressG;
-o-animation-duration:3.0s;
-o-animation-iteration-count:infinite;
-o-animation-timing-function:linear;
animation-name:bounce_loadingProgressG;
animation-duration:3.0s;
animation-iteration-count:infinite;
animation-timing-function:linear;
width:180px;
height:5px;
}
@-moz-keyframes bounce_loadingProgressG{
0%{
margin-left:-180px;
}

100%{
margin-left:180px;
}

}

@-webkit-keyframes bounce_loadingProgressG{
0%{
margin-left:-180px;
}

100%{
margin-left:180px;
}

}

@-ms-keyframes bounce_loadingProgressG{
0%{
margin-left:-180px;
}

100%{
margin-left:180px;
}

}

@-o-keyframes bounce_loadingProgressG{
0%{
margin-left:-180px;
}

100%{
margin-left:180px;
}

}

@keyframes bounce_loadingProgressG{
0%{
margin-left:-180px;
}

100%{
margin-left:180px;
}

}

#landing-logo{
	width: 100%;
}

#landing-logo img{
	display: block;
	width: 25%;
	min-width: 300px;
	max-width: 600px;
	margin: 15% auto 0 auto;
}

</style>

<div id="landing-logo">
	<img src="<?php bloginfo('template_directory'); ?>/_/img/logo-landing.png" alt="logo">
</div>


<div id="loadingProgressG">
	<div id="loadingProgressG_1" class="loadingProgressG"></div>
</div>

</section>
