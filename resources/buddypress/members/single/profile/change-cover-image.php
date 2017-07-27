<h2 class="header"><?php _e( 'Change Cover Image', 'buddypress' ); ?></h2>
<?php do_action( 'bp_before_profile_edit_cover_image' ); ?>
<p><?php _e( 'Your Cover Image will be used to customize the header of your profile.', 'buddypress' ); ?></p>
<?php bp_attachments_get_template_part( 'cover-images/index' ); ?>
<?php do_action( 'bp_after_profile_edit_cover_image' ); ?>
