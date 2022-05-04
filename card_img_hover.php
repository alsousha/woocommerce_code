<div class="staff__wrap d-flex justify-content-between flex-wrap">
  <?php 
  $staff = $fields['staff'];
  foreach($staff as $item):
    $img = $item['staff_img'];
    $staff_name = $item['staff_name'];
    $staff_text = $item['staff_text'];
    ?>
  <div class="staff__item col33 mt3" style="background-image: url('<?php if($img) echo $img;?>')">
    <div class="staff_desc text-white p_22">
      <div class="staff_base-title p_strong "><?php if($staff_name) echo $staff_name;?></div>
      <div class="staff_info"><?php if($staff_text) echo $staff_text;?></div>
    </div>
    <div class="staff-overlay"></div>
  </div>
  <?php endforeach;?>
</div>
<style>
  .staff__item{
    height: 45rem;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 3rem;
    padding: 2rem;
    box-shadow: 0 2px 5px 1px rgba(82, 83, 83, 0.4);
    filter: grayscale(100%);
    transition: filter 0.5s;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
    .staff_desc{
      position: relative;
      z-index: 9;
      .staff_base-title{
        margin-bottom: 2rem;
      }
      .staff_info{
        max-height: 0;
        bottom: 0;transition: all .5s;
        margin-bottom: -2rem;
      }
    }
    .staff-overlay{
      pointer-events: none;
      position: absolute;
      height: 99%;
      width: 100%;
      bottom: 0;
      left: 0;
      background: var(--main1);
      background: linear-gradient(180deg, rgba(82, 83, 83, 0) 65%, var(--main1) 100%);
      z-index: 1;
      transition: opacity .5s;
      border-bottom-right-radius: 3rem;
      border-bottom-left-radius: 3rem;
      }
    &:hover{
      filter: grayscale(0);
      transition: filter 0.5s;
      .staff_desc{
        margin-bottom: 4rem;
      }
      .staff-overlay{
        border-bottom-right-radius: 3rem;
        border-bottom-left-radius: 3rem;
      }
      .staff_info{
        height: auto;
        max-height: 20rem;
        transition: all .5s;
        margin-bottom: 0;
      }
    }
}
</style>
