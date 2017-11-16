<div id="gravity-form">
    <div class="bg-img" style="background: url(<?php echo $settings->photo_src; ?>) no-repeat; background-size: cover;">

        <div id="gravity-form-content">
            <?php echo do_shortcode(
                '[gravityform 
                    id=' . $settings->form_id . ' 
                    title=' . $settings->show_title . ' 
                    description=' . $settings->show_description . ' 
                    ajax=' . $settings->ajax . ' 
                    tabindex=' . $settings->tabindex . '
                ]'
            ); ?>
        </div>
        
    </div>
</div>