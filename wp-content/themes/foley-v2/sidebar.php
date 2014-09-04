    <?php stag_sidebar_before(); ?>
        <!-- BEGIN #secondary -->

        <?php
            stag_sidebar_start();

            /* Widgetised Area */
            dynamic_sidebar( 'sidebar-main' );

            stag_sidebar_end();
        ?>

        <!-- END #secondary -->
        <?php stag_sidebar_after(); ?>