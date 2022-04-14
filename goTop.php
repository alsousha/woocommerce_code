<script>
  //animate the scroll to top
		$('.goTop').click(function () {
			$('html, body').animate({scrollTop: 0}, 'slow')
			return false

		})
</script>


//php (in footer)
<a  id="go-top" class="goTop" >
  <span class="arrow-top-wrap d-flex flex-column align-items-center">
    <img src="<?= ICONS ?>arrow-up.png">
  </span>
</a>
