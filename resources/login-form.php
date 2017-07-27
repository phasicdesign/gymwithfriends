<div class="card-panel">
<form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post" class="card-block">
  <div class="row">
    <div class="col m6 s12">
    <h3 class="light">Connect with..</h3>
    <?php do_action( 'login_form' ); ?>
    </div>
    <div class="col m6 s12">
    <h3 class="light">Login</h3>
    <div class="form-group">
    <?php $template->the_action_template_message( 'login' ); ?>
    <?php $template->the_errors(); ?>
    <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="form-control" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" placeholder="<?php
        if ( 'username' == $theme_my_login->get_option( 'login_type' ) ) {
          _e( 'Username', 'theme-my-login' );
        } elseif ( 'email' == $theme_my_login->get_option( 'login_type' ) ) {
          _e( 'E-mail', 'theme-my-login' );
        } else {
          _e( 'Username or E-mail', 'theme-my-login' );
        }
      ?>"/>
    </div>
    <div class="form-group">
    <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input" value="" size="20" autocomplete="off" placeholder="<?php _e( 'Password', 'theme-my-login' ); ?>"/>
    <div class="rememberme-submit-wrap">
      <p class="rememberme-wrap">
        <input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" />
        <label for="rememberme<?php $template->the_instance(); ?>"><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></label>
      </p>
      <p class="submit-wrap">
        <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>" class="waves-effect waves-light btn btn-large" />
        <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
        <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
        <input type="hidden" name="action" value="login" />
      </p>
    </div>
    <?php $template->the_action_links( array( 'login' => false ) ); ?>
    </div>
    </div>
  </div>
  </form>
</div>