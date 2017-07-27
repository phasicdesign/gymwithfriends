<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>
	</ul>
</div><!-- .item-list-tabs -->
<?php do_action( 'bp_before_profile_content' ); ?>
<div class="profile">
<?php switch ( bp_current_action() ) :
	case 'edit'   :
		bp_get_template_part( 'members/single/profile/edit' );
		break;
	case 'change-avatar' :
		bp_get_template_part( 'members/single/profile/change-avatar' );
		break;
	case 'change-cover-image' :
		bp_get_template_part( 'members/single/profile/change-cover-image' );
echo '<h1 class="header">Hello Monkey</h1>';
		break;
	case 'public' :
		if ( bp_is_active( 'xprofile' ) )
			bp_get_template_part( 'members/single/profile/profile-loop' );
		else
			bp_get_template_part( 'members/single/profile/profile-wp' );

		break;
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch; ?>
</div><!-- .profile -->
<?php do_action( 'bp_after_profile_content' ); ?>
