<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
	<ul>
		<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>
		<?php if ( !bp_is_current_action( 'invites' ) ) : ?>
			<li id="groups-order-select" class="last filter">
				<label for="groups-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
				<select id="groups-order-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></option>
					<option value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></option>
					<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
					<?php
					
					do_action( 'bp_member_group_order_options' ); ?>
				</select>
			</li>
		<?php endif; ?>
	</ul>
</div><!-- .item-list-tabs -->
<?php
switch ( bp_current_action() ) :
	case 'my-groups' :
		
		do_action( 'bp_before_member_groups_content' ); ?>
		<?php if ( is_user_logged_in() ) : ?>
			<h2 class="bp-screen-reader-text"><?php
				
				_e( 'My groups', 'buddypress' );
			?></h2>
		<?php else : ?>
			<h2 class="bp-screen-reader-text"><?php
				
				_e( 'Member\'s groups', 'buddypress' );
			?></h2>
		<?php endif; ?>
		<div class="groups mygroups">
			<?php bp_get_template_part( 'groups/groups-loop' ); ?>
		</div>
		<?php
		
		do_action( 'bp_after_member_groups_content' );
		break;
	case 'invites' :
		bp_get_template_part( 'members/single/groups/invites' );
		break;
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
