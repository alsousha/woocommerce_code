<script>
 $('#gallery-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: false,
      asNavFor: '#gallery-thumbs',
      rtl: true,
  });
  $('#gallery-thumbs').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '#gallery-slider',
      dots: false,
      arrows: true,
      centerMode: false,
      focusOnSelect: true,
      rtl: true,
      responsive: [
          {
              breakpoint: 900,
              settings: {
                  slidesToShow: 2,
              }
          },
      ]
  });
</script>

//php
<?php
$img_post =  get_the_post_thumbnail_url('','full');
$product_gal = $fields['prod_gal'];
?>
<div class="product-gallery w50 d-flex flex-column">
    <?php if ($img_post) :?>
  <!--	big img-->
        <div class="gallery-slider" id="gallery-slider" dir="rtl">
            <div class="slider-item">
                <a href="<?=$img_post;?>" class="imagebig" data-lightbox="images-big">
                    <img src="<?=$img_post;?>" class="w100" alt="">
                </a>
            </div>
            <?php if($product_gal):
                foreach ($product_gal as $img): ?>
                    <div class="slider-item">
                        <a href="<?=$img;?>" class="imagebig" data-lightbox="images-big">
                            <img src="<?=$img;?>" class="w100" alt="">
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    <?php endif;?>
    <?php if($img_post):?>
  <!--	small img-->
        <div class="thumbs pr-1" id="gallery-thumbs" dir="rtl">
            <?php if($product_gal):?>
                <div class="slider-item">
                    <div class="slider-item__img bg-center bg-contain bg-no-repeat p02 br10" style="background-image: url('<?=$img_post;?>')">
                    </div>
                </div>
            <?php endif;?>
            <?php
            foreach ($product_gal as $img): ?>
                <div class="slider-item">
                    <div class="slider-item__img bg-center bg-contain bg-no-repeat p02 br10" style="background-image: url('<?=$img;?>')">
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    <?php endif; ?>
</div>


<style>
.product-gallery{
  .imagebig {
    height: 57rem;
    display: flex;
    justify-content: center;
    align-items: center;
    -webkit-box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    border-radius: 2.5rem;
    margin: 1rem;
    img {
      max-height: 100%;
      max-width: 100%;
      width: auto;
    }
  }
  .thumbs {
    max-width: 75%;
    .slider-item__img {
      width: 90%;
      height: 10rem;
      margin-top: 1rem;
      margin-bottom: 1rem;
      -webkit-box-shadow: 0 0 10px rgb(0 0 0 / 20%);
      -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    }
  }
  button.slick-next{
    right: auto !important;
    left: -16rem !important;
  }
  button.slick-prev{
    right: auto !important;
    left: -10rem !important;
  }
}
</style>
