<?php

echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
foreach ($houses as $house) {
    ?>
<div class="">
    <a href="<?php echo get_permalink($house->ID)  ?>">
    <h5><?php echo $house->post_title ?></h5>
    <?php echo get_the_post_thumbnail( $house->ID, 'thumbnail' );?>
    </a>
</div>
    <?php
}
echo $args['after_widget'];


