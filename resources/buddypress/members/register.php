<div id="buddypressx">
  <?php do_action( 'bp_before_register_page' ); ?>
  <div class="page" id="register-page">
    <form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">
    <?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
      <div id="template-notices" role="alert" aria-atomic="true">
        <?php do_action( 'template_notices' ); ?>
      </div>
      <?php do_action( 'bp_before_registration_disabled' ); ?>
        <p><?php _e( 'User registration is currently not allowed.', 'buddypress' ); ?></p>
      <?php do_action( 'bp_after_registration_disabled' ); ?>
    <?php endif;  ?>
    <?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>
      <div id="template-notices" role="alert" aria-atomic="true">
        <?php do_action( 'template_notices' ); ?>
      </div>
      <p class="flow-text"><?php _e( 'Registering for this app is super easy! Just fill in the fields below, and we\'ll get a new account set up for you in no time.', 'buddypress' ); ?></p>
      <div class="card-panel">
      <div class="row">
      <div class="col m6 s12">
      <h3 class="light">.. or connect with</h3>
      <?php do_action( 'bp_before_account_details_fields' ); ?>
      </div>
      <div class="col m6 s12">
      <div class="register-section" id="basic-details-section">
        <h3 class="light"><?php _e( 'Account Details', 'buddypress' ); ?></h3>
        <label for="signup_username"><?php _e( 'Username', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?>
        <?php do_action( 'bp_signup_username_errors' ); ?>
        <input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" <?php bp_form_field_attributes( 'username' ); ?>/></label>
        <label for="signup_email"><?php _e( 'Email Address', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?>
        <?php do_action( 'bp_signup_email_errors' ); ?>
        <input type="email" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" <?php bp_form_field_attributes( 'email' ); ?>/></label>
        <label for="signup_password"><?php _e( 'Choose a Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?>
        <?php do_action( 'bp_signup_password_errors' ); ?>
        <input type="password" name="signup_password" id="signup_password" value="" class="password-entry" <?php bp_form_field_attributes( 'password' ); ?>/></label>
        <div id="pass-strength-result"></div>
        <label for="signup_password_confirm"><?php _e( 'Confirm Password', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?>
        <?php do_action( 'bp_signup_password_confirm_errors' ); ?>
        <input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" class="password-entry-confirm" <?php bp_form_field_attributes( 'password' ); ?>/></label>
        <?php do_action( 'bp_account_details_fields' ); ?>
      </div><!-- #basic-details-section -->
      <?php do_action( 'bp_after_account_details_fields' ); ?>
      <?php if ( bp_is_active( 'xprofile' ) ) : ?>
        <?php do_action( 'bp_before_signup_profile_fields' ); ?>
        <div class="register-section" id="profile-details-section">
          <h3 class="light"><?php _e( 'Profile Details', 'buddypress' ); ?></h3>
          <?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>
          <?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
            <div<?php bp_field_css_class( 'editfield' ); ?>>
              <?php
              $field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
              $field_type->edit_field_html();
              
              do_action( 'bp_custom_profile_edit_fields_pre_visibility' );
              if ( bp_current_user_can( 'bp_xprofile_change_field_visibility' ) ) : ?>
                <p class="field-visibility-settings-toggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
                  <?php
                  printf(
                    __( 'This field can be seen by: %s', 'buddypress' ),
                    '<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
                  );
                  ?>
                  <button type="button" class="visibility-toggle-link waves-effect waves-lightbtn btn-flat"><?php _ex( 'Change', 'Change profile field visibility level', 'buddypress' ); ?></button>
                </p>
                <div class="field-visibility-settings" id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
                  <fieldset>
                    <legend><?php _e( 'Who can see this field?', 'buddypress' ) ?></legend>
                    <?php bp_profile_visibility_radio_buttons() ?>
                  </fieldset>
                  <button type="button" class="field-visibility-settings-close waves-effect waves-lightbtn btn-flat""><?php _e( 'Close', 'buddypress' ) ?></button>
                </div>
              <?php else : ?>
                <p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
                  <?php
                  printf(
                    __( 'This field can be seen by: %s', 'buddypress' ),
                    '<span class="current-visibility-level">' . bp_get_the_profile_field_visibility_level_label() . '</span>'
                  );
                  ?>
                </p>
              <?php endif ?>
              <?php do_action( 'bp_custom_profile_edit_fields' ); ?>
              <p class="description"><?php bp_the_profile_field_description(); ?></p>
            </div>
          <?php endwhile; ?>
          <input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />
          <?php endwhile; endif; endif; ?>
          <?php do_action( 'bp_signup_profile_fields' ); ?>
        </div><!-- #profile-details-section -->
        <?php do_action( 'bp_after_signup_profile_fields' ); ?>
      <?php endif; ?>
      <?php if ( bp_get_blog_signup_allowed() ) : ?>
        <?php do_action( 'bp_before_blog_details_fields' ); ?>
        <div class="register-section" id="blog-details-section">
          <h3 class="light"><?php _e( 'Blog Details', 'buddypress' ); ?></h3>
          <p><label for="signup_with_blog"><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'buddypress' ); ?></label></p>
          <div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>
            <label for="signup_blog_url"><?php _e( 'Blog URL', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
            <?php do_action( 'bp_signup_blog_url_errors' ); ?>
            <?php if ( is_subdomain_install() ) : ?>
              http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_signup_subdomain_base(); ?>
            <?php else : ?>
              <?php echo home_url( '/' ); ?> <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
            <?php endif; ?>
            <label for="signup_blog_title"><?php _e( 'Site Title', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
            <?php do_action( 'bp_signup_blog_title_errors' ); ?>
            <input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />
            <fieldset class="register-site">
              <legend class="label"><?php _e( 'Privacy: I would like my site to appear in search engines, and in public listings around this network.', 'buddypress' ); ?></legend>
              <?php do_action( 'bp_signup_blog_privacy_errors' ); ?>
              <label for="signup_blog_privacy_public"><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'buddypress' ); ?></label>
              <label for="signup_blog_privacy_private"><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'buddypress' ); ?></label>
            </fieldset>
            <?php do_action( 'bp_blog_details_fields' ); ?>
          </div>
        </div><!-- #blog-details-section -->
        <?php do_action( 'bp_after_blog_details_fields' ); ?>
      <?php endif; ?>
      <?php do_action( 'bp_before_registration_submit_buttons' ); ?>
        <input type="submit" name="signup_submit" id="signup_submit" class="waves-effect waves-lightbtn btn-primary btn-large" value="<?php esc_attr_e( 'Complete Sign Up', 'buddypress' ); ?>" />
      <?php do_action( 'bp_after_registration_submit_buttons' ); ?>
      <?php wp_nonce_field( 'bp_new_signup' ); ?>
    <?php endif; ?>
    </div>
    </div>
    </div><!-- /.card-panel -->
    <?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>
      <div id="template-notices" role="alert" aria-atomic="true">
        <?php do_action( 'template_notices' ); ?>
      </div>
      <?php do_action( 'bp_before_registration_confirmed' ); ?>
      <div id="template-notices" role="alert" aria-atomic="true">
        <?php if ( bp_registration_needs_activation() ) : ?>
          <p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'buddypress' ); ?></p>
        <?php else : ?>
          <p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'buddypress' ); ?></p>
        <?php endif; ?>
      </div>
      <?php do_action( 'bp_after_registration_confirmed' ); ?>
    <?php endif; ?>
    <?php do_action( 'bp_custom_signup_steps' ); ?>
    </form>
  </div>
  <?php do_action( 'bp_after_register_page' ); ?>
</div>
