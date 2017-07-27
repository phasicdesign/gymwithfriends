<div class="item-list-tabs" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
  <ul>
    <?php bp_get_options_nav(); ?>
    <li id="blogs-order-select" class="last filter">
      <label for="blogs-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
      <select id="blogs-order-by">
        <option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
        <option value="newest"><?php _e( 'Newest', 'buddypress' ); ?></option>
        <option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></option>
        <?php do_action( 'bp_member_blog_order_options' ); ?>
      </select>
    </li>
  </ul>
</div>
<?php
switch ( bp_current_action() ) :
  case 'my-sites' :
    
    do_action( 'bp_before_member_blogs_content' ); ?>
    <div class="blogs myblogs">
      <?php bp_get_template_part( 'blogs/blogs-loop' ) ?>
    </div><!-- .blogs.myblogs -->
    <?php do_action( 'bp_after_member_blogs_content' );
    break;
  default :
    bp_get_template_part( 'members/single/plugins' );
    break;
endswitch;
