
<?php $wrap = $fields['gals2']; if($wrap):?>
<div class="container">
	<div class="gals_wrap d-flex justify-content-between flex-wrap">
		<?php
		foreach ($wrap as $item):
			$item_link = $item['gal_link'];
			$item_img = $item['gal_img'];
			$item_text = $item['gal_text'];
			?>
			<div
				class="col4 gals_item col-image"
				style="margin-top: 1rem"
				data-videoId="<?php echo getYoutubeId($item_link); ?>"
				data-recText="<?php //echo $item_text;?>"
			>
				<div class="gals_item__inner item-image d-flex flex-column justify-content-start align-items-center position-relative" >
					<img class="readmore position-absolute" src="<?php echo ICONS; ?>play.png" alt="">
					<img class="img-fit-cover" src="<?php if ($item_img) echo $item_img; ?>">
					<div class="gals_item-bottom"><?php if ($item_text) echo text_preview($item_text, 10); ?></div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php endif;?>

<div class="popup popup-gal">
	<div class="popup__wrapper">
		<div class="popup__inner">
			<div class="popup__content gals_item__inner d-flex flex-column justify-content-start align-items-center">
				<button class="btn btn__close popup__btn-close hover-scale align-self-start">
					<img src="<?php echo ICONS; ?>btn_close.png" alt="">
				</button>
				<div class="yt-iframe-el position-absolute">
					<div class="yt-iframe-el__wrap">
						<iframe
								src=""
								id="VideoWrap"
								title="YouTube video player" frameborder="0"
								allowfullscreen>
						</iframe>
						<div id="ImageWrap" class="popup-img__wrap"></div>
						<div class="video-desc p_24 mt1" id="RecText"></div>
					</div>
				</div>
				<div class="video-overlay"></div>
			</div>
		</div>
	</div>
</div>

<script>
	//change iframe/image by click on items
	const videoItems = $('.gals_item')
	const popup = $('.popup-gal'
	const videoWrap = $('#VideoWrap')

	videoItems.each(function () {
		$(this).click(function () {
			popup.addClass('active')
			//body.addClass('no-scroll')
			const videoId = $(this).attr('data-videoId')
			const videoText = $(this).attr('data-videoText')
			const videoUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}`
			videoWrap.attr('src', videoUrl)
			videoWrap.css('display', 'flex')
		})
	})

	//close popup
	var btnClose = $('.popup__btn-close')
	btnClose.click(function (){
		popup.removeClass('active')
		//body.removeClass('no-scroll')
		videoWrap.attr('src', '') //hidden video
	});
	//close popup by click on body
	$(document).click( function(e){
		var div = $( '.gals_item__inner' );
		if ( !div.is(e.target)
			&& div.has(e.target).length === 0 ) {
			popup.removeClass('active');
			//body.removeClass('no-scroll')
		}
	});
	//close popup by ESC
	$(document).keydown(function(e) {
		// ESCAPE key pressed
		if (e.keyCode == 27) {
			popup.removeClass('active');
		}
	});
</script>
<style>
	.popup {
		position: fixed;
		z-index: 999;
		top: 0;
		left: 0;
		width: 100%;
		height: 100vh;
		overflow: auto;
		visibility: hidden;
		opacity: 0;
		transition: opacity 0.9s, visibility 0.9s;
		background-color: rgba(0, 0, 0, 0.7);
		.popup .popup__wrapper {
			display: table;
			height: 100%;
			width: 100%;
			.popup__inner {
				display: table-cell;
				vertical-align: middle;
				padding: 50px 0;
				.popup__content {
					max-width: 71rem;
					background-color: #fff;
					-webkit-box-shadow: 0 0 10px rgba(0,0,0,0.5);-moz-box-shadow: 0 0 10px rgba(0,0,0,0.5);box-shadow: 0 0 10px rgba(0,0,0,0.5);
					margin: 0 auto;
					border: 1px solid #acadad;
					position: relative;
					border-right: 10px;
					padding: 3rem;
					min-height: 43rem;				
					.popup__btn-close {
						background: none;
						border: none;
						position: absolute;
						right: 3rem;
						z-index: 99;
					}

				}
			}
		}
		.yt-iframe-el {
			width: 50%;
			height: 57%;
			top: 20%;
			padding: 1.4rem;
			background-color: white;
			border-radius: 1rem;
			.yt-iframe-el__wrap{
				height: 100%;
				display: flex;
				flex-direction: column;
				#VideoWrap{
					display: none;
				}
			}
			.popup-img__wrap{
				height: 42rem;
				display: none;
				background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
			}
			iframe {
				flex-grow: 1;
				width: 100%;
				max-height: 100%;
			}
		}
		&.active {
			 display: block;
			 visibility: visible;
			 opacity: 1;
		 }
	}
	.btn__close{
		margin-top: 4rem;
	}
	.readmore {
		height: 4rem!important;
		width: 3rem!important;
		top: 40% !important;
	}
</style>
