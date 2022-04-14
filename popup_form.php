<script>

(function($) {
let btn_trigger = $('.form-trigger') //btn for open popup
let popup_form = $('.pop-form') //popup with bg
let div = $( '.pop-form__wrap' ); //popup wrap without bg
let btn_close = $('.close_pop-form')

btn_trigger.click(function (){
    popup_form.toggleClass('show-popup');
    $(document).keydown(function(e) {
      // ESCAPE key pressed
      if (e.keyCode == 27) {
        popup_form.removeClass('show-popup');
      }
    });
  })

//close popup by click on body
  $(document).click( function(e){
    if ( !div.is(e.target)
      && div.has(e.target).length === 0 && !btn_trigger.is(e.target)) {
      popup_form.removeClass('show-popup');
      // body.removeClass('no-scroll')
    }
  });
  
  //close popup
  btn_close.click(function (){
      $(this).closest('.popup.pop-form').removeClass('show-popup');
  })

})( jQuery );

//php code
<section class="popup pop-form">
    <div class="container mh-100">
        <div class="row justify-content-center">
            <div class="pop-form__wrap">
                <div class="float-form slider-form-wrap">
					          <span class="pop-close close_pop-form popup__btn-close hover-scale"></span>
                    <div class="form_inner d-flex flex-column align-items-center">
                        <div class="form__title white mb2">
                            <div class="p_30 t_48 t_accent_color p_white">
                                <?php if($form_sidebar_title = opt('form_sidebar_title')) echo $form_sidebar_title;?>
                            </div>
                        </div>
                        <div class="form__wrap">
                            <?php getForm('331');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    

</script>
