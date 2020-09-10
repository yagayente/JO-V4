
<?php
function acf_responsive_image_diaporama($image_id,$image_size,$max_width){
if($image_id != '') {
$image_src = wp_get_attachment_image_url( $image_id, $image_size );
$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
echo 'data-src="'.$image_src.'" data-srcset="'.$image_srcset.'" alt="'.$image_alt.'"';}
}
?>
  <div class="container">
  <ul class="wp-block-gallery">
    <!--display image ID  width="600" height="600"  -->
    <?php if( have_rows('slider') ): ?>
        <?php while( have_rows('slider') ): the_row();
        $content2 = get_sub_field('texte_a_afficher');?>

      <li class="blocks-gallery-item">
        <figure>
          <img class="tns-lazy-img"<?php acf_responsive_image_diaporama(get_sub_field( 'image_a_afficher' ),'thumb-640','640px'); ?>>
        <figurecaption>
            <?php echo $content2; ?>
          </figurecaption>
        </figure>
      </li>
        <?php endwhile; ?>
    <?php endif; ?>
  </ul>
  <div class="bottom">
  <div id="caption">&nbsp</div>
  <div id="images_counter"><span class="page_active">1</span>&nbsp;/&nbsp;<span class="pagination"></span>&nbsp</div>
  </div>



  </div>


<!-- partial -->
<script>

  var slider = tns({
    container: '.wp-block-gallery',
    mode: 'gallery',
    controlsText: ['avant', 'après'],
    items: 1,
    slideBy: 1,
    gutter: 12,
    nav: false,
    loop: false,
    autoplay: false,
    arrowKeys:true,
    lazyload:true,
    loadPrevNext : 1,
    loop: true,
    rewind: true });

  var captionHolder = document.getElementById('caption');
  captionHolder.innerHTML = document.querySelector('.tns-slide-active figurecaption').innerHTML;
  var customizedFunction = function (info) {
    // direct access to info object
    var info = slider.getInfo();
    var index = info.indexCached;
    console.log(index);
    captionHolder.innerHTML = document.querySelector('.tns-slide-active figurecaption').innerHTML;
  };
  // bind function to event
  slider.events.on('indexChanged', customizedFunction);


  </script>

<script>
var info = slider.getInfo(),
  current = document.querySelector('.page_active'),
  total = document.querySelector('.pagination');

  total.textContent = info.slideCount;

  slider.events.on('transitionStart', function(info){
  current.textContent = slider.getInfo().displayIndex;
  });
</script>
