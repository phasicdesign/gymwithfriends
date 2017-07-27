<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
  <ul>
    <?php bp_get_options_nav(); ?>
  </ul>
  <?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>
    <div class="message-search"><?php bp_message_search_form(); ?></div>
  <?php endif; ?>
</div><!-- .item-list-tabs -->
<?php
switch ( bp_current_action() ) :
  case 'inbox'   :
  case 'sentbox' :
    do_action( 'bp_before_member_messages_content' ); ?>
    <?php if ( bp_is_messages_inbox() ) : ?>
      <h2 class="bp-screen-reader-text light"><?php
        
        _e( 'Messages inbox', 'buddypress' );
      ?></h2>
    <?php elseif ( bp_is_messages_sentbox() ) : ?>
      <h2 class="bp-screen-reader-text light"><?php
        
        _e( 'Sent Messages', 'buddypress' );
      ?></h2>
    <?php endif; ?>
    <div class="messages">
      <?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
    </div><!-- .messages -->
    <?php do_action( 'bp_after_member_messages_content' );
    break;
  case 'view' :
    bp_get_template_part( 'members/single/messages/single' );
    break;
  case 'compose' :
    bp_get_template_part( 'members/single/messages/compose' );
    break;
  case 'notices' :
    
    do_action( 'bp_before_member_messages_content' ); ?>
    <h2 class="bp-screen-reader-text light"><?php
      
      _e( 'Sitewide Notices', 'buddypress' );
    ?></h2>
    <div class="messages">
      <?php bp_get_template_part( 'members/single/messages/notices-loop' ); ?>
    </div><!-- .messages -->
    <?php do_action( 'bp_after_member_messages_content' );
    break;
  default :
    bp_get_template_part( 'members/single/plugins' );
    break;
endswitch;
