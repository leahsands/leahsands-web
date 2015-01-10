
	</section>

	<div class="row">
		<div class="twelve columns">
	    	<footer class="footer" role="contentinfo">
	        	<div id="inner-footer" class="wrap clearfix">
	        		<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
	        	</div> <!-- end #inner-footer -->
	      	</footer> <!-- end footer -->
	    </div>
	</div>
</div> <!-- /main body -->

</section>
</div> <!-- end #container -->
	<?php wp_footer(); ?>

<script>
	var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
	if(!oldieCheck) {
	document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
	} else {
	document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
	}
</script>

<script>

jQuery("document").ready(function($){
	
	var nav = $('.nav-container');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 30) {
			nav.addClass("nav-container-fixed");
			nav.removeClass("row")
		} else {
			nav.removeClass("nav-container-fixed");
		}
	});


});

</script>


<script src="<?php bloginfo('template_directory');?>/js/libs/modernizr-2.6.2.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/gumby.min.js"></script>
</body>

</html> <!-- end page. what a ride! -->