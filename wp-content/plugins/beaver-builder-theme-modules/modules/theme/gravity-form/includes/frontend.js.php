jQuery(function($) {

<?php if($settings->link_type == 'lightbox') : ?>
    if (typeof $.fn.magnificPopup !== 'undefined') {
        $('.fl-node-<?php echo $id; ?> a').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            tLoading: '',
            preloader: true,
            callbacks: {
                open: function() {
                    $('.mfp-preloader').html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');
                }
            }
        });
    }

<?php endif; ?>


    jQuery( "label" ).show();

    jQuery("select").closest( ".gfield, .gfield.gfield_error" ).find( "label" ).addClass( 'small-label' );
    jQuery( ".gfield.gfield_error label" ).addClass( 'small-label' );
    

    jQuery( "input, textarea" ).focus(function() {
      jQuery(this).closest( ".gfield, .gfield.gfield_error" ).find( "label" ).addClass( 'small-label' );
    });

    jQuery( "input, textarea" ).blur(function() {
        if(jQuery(this).val()) {
            jQuery(this).closest( ".gfield, .gfield.gfield_error" ).find( "label" ).addClass( 'small-label' );
        }else {
            jQuery(this).closest( ".gfield, .gfield.gfield_error" ).find( "label" ).removeClass( 'small-label' );
        }
    });
});