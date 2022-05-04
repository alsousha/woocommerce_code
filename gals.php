JSON json/gals.json
<?php if ($gals = $fields['gals']) : ?>
		<section class="home-gallery">
			<div class="gallery_tabs">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<div class="col-11 d-flex align-items-center justify-content-center mfw home-gallery-nav">
							<?php $i = 1;
							foreach ($gals as $gal) { ?>
								<h4 data-tab="<?php echo $i; ?>"
									class="pointer <?php if ($i == 1) echo 'active'; ?> gallink mcol2 mcenter hfs24 anim regular pointer px-md-4"
									style="color:#fff"><?php echo $gal['galname']; ?></h4>
								<?php $i++;
							} ?>
						</div>
					</div>
				</div>
			</div>

			<?php $i = 1;
			foreach ($gals as $gal) {
				$g = $gal['gals']; ?>
				<div class="<?php if ($i == 1) echo 'active'; ?> galcontent <?php echo $i; ?>">

					<?php $z = 1;
					foreach ($g as $gs) {
						$gallery = $gs['gallery']; ?>
						<div class="<?php if ($z % 2) echo 'mygallery'; else echo 'mygallery2'; ?>" dir="rtl">
							<?php foreach ($gallery as $img) {
								; ?>
								<div>
									<a
											class="bgimg  galimg d-flex align-items-end galitem galitem<?php echo $z; ?>"
											data-lightbox="roadtrip<?php echo $z; ?>"
											href="<?php echo $img['url']; ?>"
											style="height:305px; background-image:url('<?php echo $img['sizes']['large']; ?>')">
										<?php if ($img['description']) { ?>
											<h4 class="center w100 pdgtb10 regular hfs20"
												style="background-color:rgba(255,255,255,0.85)"><?php echo $img['description']; ?></h4>
										<?php } ?>
									</a>

								</div>
							<?php } ?>
						</div>
						<?php $z++;
					} ?>

				</div>
				<?php $i++;
			} ?>

		</section>
	<?php endif; ?>

<script>
  $('.gallink').click(function(){
			var id=$(this).attr('data-tab');
			$('.gallink').removeClass('active');
			$(this).addClass('active');
			$('.galcontent').removeClass('active');
			$('.' + id).addClass('active');
		});
		$('.mygallery').slick({
			rtl:true,
			slidesToShow:3,
			pauseOnHover:false,
			draggable:true,
			autoplay:true,
			dots:false,
			focusOnSelect:true,
			centerMode: true,
			fade:false,
			speed:5000,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,

					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,

					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,

					}
				}
			]
		});
		$('.mygallery3').slick({
			rtl:true,
			slidesToShow:3,
			pauseOnHover:false,
			draggable:true,
			autoplay:false,
			dots:false,
			focusOnSelect:true,
			centerMode: true,
			fade:false,
			speed:5000,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,

					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,

					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,

					}
				}
			]
		});
		$('.mygallery2').slick({
			rtl:true,
			slidesToShow:4,
			pauseOnHover:false,
			draggable:true,
			autoplay:true,
			focusOnSelect:true,
			dots:false,
			centerMode: true,
			fade:false,
			speed:3000,
			autoplaySpeed: 3000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,

					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,

					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2,

					}
				}
			]
		});
</script>

<style>
  /*gallery*/
.home-gallery{
  .gallery_tabs{
    background-color: #292929;
    padding: 3rem 0;
    h2,h3,h4{
      font-family: "Open-Sans";
      text-align: center;
    }
  }
}
.galcontent {
  max-height: 0;
  overflow: hidden;
  opacity: 0;
  transition: all 0.2s ease;
  .slick-track{
    margin-bottom: 4px;
    .slick-slide{
      margin: 0 2px;
    }
  }
  &.active{
	max-height: none;
	opacity: 1;
  }
}
.gallink{
  font-family: "Open-Sans";
  font-size: 24px;
  font-weight: 400;
  cursor: pointer;
  transition: all .5s;
}
.gallink.active,.gallink:hover
{
  border-bottom: 2px solid #fff;
  padding-bottom: 1rem;
  transition: all .5s;
}
</style>
