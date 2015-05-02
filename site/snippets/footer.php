  <footer class="footer cf" role="contentinfo">

  	<div class="copyright">
  		<?php echo $site->copyright()->kirbytext() ?>
  	</div>
  </footer>

	<a href="#top">Top</a>
  <script>
  	$("a[href='#top']").click(function() {
  		$("html, body").animate({ scrollTop: 0 }, 2000);
  		return false;
  	});
  </script>
</body>
</html>