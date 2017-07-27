<div class="profile" id="{{ $template->the_instance(); }}">
	{{ $template->the_action_template_message( 'profile' ); }}
	{{ $template->the_errors(); }}
	<form id="your-profile" action="{{ $template->the_action_url( 'profile', 'login_post' ); }}" method="post">
		{{ wp_nonce_field( 'update-user_' . $current_user->ID ); }}
		<p>
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="{{ echo $current_user->ID; }}" />
		</p>

		<h3>{{ __( 'Personal Options', 'theme-my-login' ); }}</h3>

		<table class="form-table">
		<tr class="user-admin-bar-front-wrap">
			<th><label for="admin_bar_front">{{ __( 'Toolbar', 'theme-my-login' )}}</label></th>
			<td>
				<label for="admin_bar_front"><input type="checkbox" name="admin_bar_front" id="admin_bar_front" value="1"{{ checked( _get_admin_bar_pref( 'front', $profileuser->ID ) ); }} />
				{{ __( 'Show Toolbar when viewing site', 'theme-my-login' ); }}</label>
			</td>
		</tr>
		{{ do_action( 'personal_options', $profileuser ); }}
		</table>

		{{ do_action( 'profile_personal_options', $profileuser ); }}

		<h3>{{ __( 'Name', 'theme-my-login' ); }}</h3>

		<table class="form-table">
		<tr class="user-login-wrap">
			<th><label for="user_login">{{ __( 'Username', 'theme-my-login' ); }}</label></th>
			<td><input type="text" name="user_login" id="user_login" value="{{ echo esc_attr( $profileuser->user_login ); }}" disabled="disabled" class="regular-text" /> <span class="description">{{ __( 'Usernames cannot be changed.', 'theme-my-login' ); }}</span></td>
		</tr>

		<tr class="first-name-wrap">
			<th><label for="first_name">{{ __( 'First Name', 'theme-my-login' ); }}</label></th>
			<td><input type="text" name="first_name" id="first_name" value="{{ echo esc_attr( $profileuser->first_name ); }}" class="regular-text" /></td>
		</tr>

		<tr class="last-name-wrap">
			<th><label for="last_name">{{ __( 'Last Name', 'theme-my-login' ); }}</label></th>
			<td><input type="text" name="last_name" id="last_name" value="{{ echo esc_attr( $profileuser->last_name ); }}" class="regular-text" /></td>
		</tr>

		<tr class="nickname-wrap">
			<th><label for="nickname">{{ __( 'Nickname', 'theme-my-login' ); }} <span class="description">{{ __( '(required)', 'theme-my-login' ); }}</span></label></th>
			<td><input type="text" name="nickname" id="nickname" value="{{ echo esc_attr( $profileuser->nickname ); }}" class="regular-text" /></td>
		</tr>

		<tr class="display-name-wrap">
			<th><label for="display_name">{{ __( 'Display name publicly as', 'theme-my-login' ); }}</label></th>
			<td>
				<select name="display_name" id="display_name">
				{{
					$public_display = array();
					$public_display['display_nickname']  = $profileuser->nickname;
					$public_display['display_username']  = $profileuser->user_login;

					if ( ! empty( $profileuser->first_name ) )
						$public_display['display_firstname'] = $profileuser->first_name;

					if ( ! empty( $profileuser->last_name ) )
						$public_display['display_lastname'] = $profileuser->last_name;

					if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
						$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
						$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
					}

					if ( ! in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
						$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

					$public_display = array_map( 'trim', $public_display );
					$public_display = array_unique( $public_display );

					foreach ( $public_display as $id => $item ) {
				}}
					<option {{ selected( $profileuser->display_name, $item ); }}>{{ echo $item; }}</option>
				{{
					}
				}}
				</select>
			</td>
		</tr>
		</table>

		<h3>{{ __( 'Contact Info', 'theme-my-login' ); }}</h3>

		<table class="form-table">
		<tr class="user-email-wrap">
			<th><label for="email">{{ __( 'E-mail', 'theme-my-login' ); }} <span class="description">{{ __( '(required)', 'theme-my-login' ); }}</span></label></th>
			<td><input type="text" name="email" id="email" value="{{ echo esc_attr( $profileuser->user_email ); }}" class="regular-text" /></td>
			{{
			$new_email = get_option( $current_user->ID . '_new_email' );
			if ( $new_email && $new_email['newemail'] != $current_user->user_email ) : }}
			<div class="updated inline">
			<p>{{
				printf(
					__( 'There is a pending change of your e-mail to %1$s. <a href="%2$s">Cancel</a>', 'theme-my-login' ),
					'<code>' . $new_email['newemail'] . '</code>',
					esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
			); }}</p>
			</div>
			{{ endif; }}
		</tr>

		<tr class="user-url-wrap">
			<th><label for="url">{{ __( 'Website', 'theme-my-login' ); }}</label></th>
			<td><input type="text" name="url" id="url" value="{{ echo esc_attr( $profileuser->user_url ); }}" class="regular-text code" /></td>
		</tr>

		{{
			foreach ( wp_get_user_contact_methods() as $name => $desc ) {
		}}
		<tr class="user-contact-method-{{ echo $name; }}-wrap">
			<th><label for="{{ echo $name; }}">{{ echo apply_filters( 'user_'.$name.'_label', $desc ); }}</label></th>
			<td><input type="text" name="{{ echo $name; }}" id="{{ echo $name; }}" value="{{ echo esc_attr( $profileuser->$name ); }}" class="regular-text" /></td>
		</tr>
		{{
			}
		}}
		</table>

		<h3>{{ __( 'About Yourself', 'theme-my-login' ); }}</h3>

		<table class="form-table">
		<tr class="user-description-wrap">
			<th><label for="description">{{ __( 'Biographical Info', 'theme-my-login' ); }}</label></th>
			<td><textarea name="description" id="description" rows="5" cols="30">{{ echo esc_html( $profileuser->description ); }}</textarea><br />
			<span class="description">{{ __( 'Share a little biographical information to fill out your profile. This may be shown publicly.', 'theme-my-login' ); }}</span></td>
		</tr>

		{{
		$show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
		if ( $show_password_fields ) :
		}}
		</table>

		<h3>{{ __( 'Account Management', 'theme-my-login' ); }}</h3>
		<table class="form-table">
		<tr id="password" class="user-pass1-wrap">
			<th><label for="pass1">{{ __( 'New Password', 'theme-my-login' ); }}</label></th>
			<td>
				<input class="hidden" value=" " /><!-- #24364 workaround -->
				<button type="btn" class="btn button-secondary wp-generate-pw hide-if-no-js">{{ __( 'Generate Password', 'theme-my-login' ); }}</button>
				<div class="wp-pwd hide-if-js">
					<span class="password-input-wrapper">
						<input type="password" name="pass1" id="pass1" class="regular-text" value="" autocomplete="off" data-pw="{{ echo esc_attr( wp_generate_password( 24 ) ); }}" aria-describedby="pass-strength-result" />
					</span>
					<div style="display:none" id="pass-strength-result" aria-live="polite"></div>
					<button type="btn" class="btn btn-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="{{ esc_attr_e( 'Hide password', 'theme-my-login' ); }}">
						<span class="dashicons dashicons-hidden"></span>
						<span class="text">{{ __( 'Hide', 'theme-my-login' ); }}</span>
					</button>
					<button type="btn" class="btn button-secondary wp-cancel-pw hide-if-no-js" data-toggle="0" aria-label="{{ esc_attr_e( 'Cancel password change', 'theme-my-login' ); }}">
						<span class="text">{{ __( 'Cancel', 'theme-my-login' ); }}</span>
					</button>
				</div>
			</td>
		</tr>
		<tr class="user-pass2-wrap hide-if-js">
			<th scope="row"><label for="pass2">{{ __( 'Repeat New Password', 'theme-my-login' ); }}</label></th>
			<td>
			<input name="pass2" type="password" id="pass2" class="regular-text" value="" autocomplete="off" />
			<p class="description">{{ __( 'Type your new password again.', 'theme-my-login' ); }}</p>
			</td>
		</tr>
		<tr class="pw-weak">
			<th>{{ __( 'Confirm Password', 'theme-my-login' ); }}</th>
			<td>
				<label>
					<input type="checkbox" name="pw_weak" class="pw-checkbox" />
					{{ __( 'Confirm use of weak password', 'theme-my-login' ); }}
				</label>
			</td>
		</tr>
		{{ endif; }}

		</table>

		{{ do_action( 'show_user_profile', $profileuser ); }}

		<p class="submit-wrap">
			<input type="hidden" name="action" value="profile" />
			<input type="hidden" name="instance" value="{{ $template->the_instance(); }}" />
			<input type="hidden" name="user_id" id="user_id" value="{{ echo esc_attr( $current_user->ID ); }}" />
			<input type="submit" class="btn btn-primary" value="{{ esc_attr_e( 'Update Profile', 'theme-my-login' ); }}" name="submit" id="submit" />
		</p>
	</form>
</div>
