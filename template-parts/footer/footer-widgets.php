<?php
    register_sidebar();
?>

    <?php   if(is_active_sidebar('footer-widgets'))    {    ?>
        <div    class="container">
            <div    class="row  row-cols-1 row-cols-md-3"    id="footer-sidebar">
                <?php   dynamic_sidebar('footer-widgets');  ?>
            </div>
        </div>
    <?php   }   ?>

