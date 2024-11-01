<?php
$wcss_settings_options = get_option( 'wcss_settings_options' );
$wcss_options          = $wcss_settings_options['wcss_social_sharing'];
?>

<div class="wrap">
	<h1><?php esc_html_e( 'WP Custom Social Sharing', 'wcss-social-share' ); ?></h1>

	<form action="options.php" method="POST">
		<?php settings_fields( 'wcss_settings_options' ); ?>

		<table class="form-table">
			<?php wp_nonce_field( 'wcss_nonce_field', 'validate_submit' ); ?>
			<tbody>
			<!-- tr for button setting -->
				<tr scope="row">
					<th>
						<label for="sharebutton"><?php esc_html_e( 'Customize Button Settings', 'wcss-social-share' ); ?></label>
						<p class="description" >
							<?php esc_html_e( 'Drag the icon to change the order.', 'wcss-social-sharing' ); ?>
						</p>
					</th>
					<td>
						<div id="sharebutton" class="wcss-button-container">

							<div class="wcss-order-icon" id="wcss-order-icon">
								<?php
								$wcss_order = esc_attr( $wcss_options['button_order'] );

								$exploded_order = explode( ',', rtrim( $wcss_order, ',' ) );
								foreach ( $exploded_order as $i ) {
									switch ( $i ) {
										case 'facebook':
											echo sprintf( __( '<a href="#" id="facebook" class="button icon-button facebook-icon" data-show="facebook-slide" ><i class="fab fa-facebook-f"></i>%s</a>' ), __( 'Facebook', 'wcss-social-share' ) );
											break;
										case 'twitter':
											echo sprintf( __( '<a href="#" id="twitter" class="button icon-button twitter-icon" data-show="twitter-slide" ><i class="fab fa-twitter"></i>%s</a>' ), __( 'Twitter', 'wcss-social-share' ) );
											break;
										case 'pinterest':
											echo sprintf( __( '<a href="#" id="pinterest" class="button icon-button pinterest-icon" data-show="pinterest-slide" ><i class="fab fa-pinterest"></i>%s</a>' ), __( 'Pinterest', 'wcss-social-share' ) );
											break;
										case 'linkedin':
											echo sprintf( __( '<a href="#" id="linkedin" class="button icon-button linkedin-icon" data-show="linkedin-slide" ><i class="fab fa-linkedin"></i>%s</a>' ), __( 'LinkedIn', 'wcss-social-share' ) );
											break;
										case 'whatsapp':
											echo sprintf( __( '<a href="#" id="whatsapp" class="button icon-button whatsapp-icon" data-show="whatsapp-slide" ><i class="fab fa-whatsapp"></i>%s</a>' ), __( 'Whatsapp', 'wcss-social-share' ) );
											break;
									}
								}
								?>
								<input type="hidden" id="wcss-button-order-field" name="wcss_social_sharing[button_order]" value="<?php echo ( isset( $wcss_options['button_order'] ) && ! empty( $wcss_options['button_order'] ) ) ? esc_attr( $wcss_options['button_order'] ) : 'facebook,twitter,pinterest,linkedin,whatsapp'; ?>" />
							</div>

							<!-- Facebook button setting -->
							<div class="wcss-share-item item facebook">

								<div class="slide-section closed" id="facebook-slide">
									<label for="enablefacebook">
										<input type="checkbox" name="wcss_social_sharing[facebook][enable]" value="yes" id="enablefacebook" <?php checked( ( 'yes' === $wcss_options['facebook']['enable'] ), true ); ?> />
										<?php esc_html_e( 'Enable Facebook', 'wcss-social-share' ); ?>
									</label>
									<div class="color-select">
										<label for="facebookcolor">
											<input type="text" name="wcss_social_sharing[facebook][color]" id="facebookcolor" class="color-field" value="<?php echo ( isset( $wcss_options['facebook']['color'] ) && ! empty( $wcss_options['facebook']['color'] ) ) ? esc_attr( $wcss_options['facebook']['color'] ) : '#3b5998'; ?>" />
											<p class="description" ><?php esc_html_e( 'Select button color.', 'wcss-social-share' ); ?></p>
										</label>
									</div>
								</div>
							</div>
							<!--End of Facebook button setting -->

							<!-- Twitter button setting -->
							<div class="wcss-share-item item twitter">

								<div class="slide-section closed" id="twitter-slide">
									<label for="enabletwitter">
										<input type="checkbox" name="wcss_social_sharing[twitter][enable]" value="yes" id="enabletwitter" <?php checked( ( 'yes' === $wcss_options['twitter']['enable'] ), true ); ?> />
										<?php esc_html_e( 'Enable Twitter', 'wcss-social-share' ); ?>
									</label>
									<div class="color-select">
										<label for="twittercolor">
											<input type="text" name="wcss_social_sharing[twitter][color]" id="twittercolor" class="color-field" value="<?php echo ( isset( $wcss_options['twitter']['color'] ) && ! empty( $wcss_options['twitter']['color'] ) ) ? esc_attr( $wcss_options['twitter']['color'] ) : '#00acee'; ?>" />
											<p class="description" ><?php esc_html_e( 'Select button color.', 'wcss-social-share' ); ?></p>
										</label>
									</div>
								</div>
							</div>
							<!--End of Twitter button setting -->

							<!-- Pinterest button setting -->
							<div class="wcss-share-item item pinterest">

								<div class="slide-section closed" id="pinterest-slide">
									<label for="enablepinterest">
										<input type="checkbox" name="wcss_social_sharing[pinterest][enable]" value="yes" id="enablepinterest" <?php checked( ( 'yes' === $wcss_options['pinterest']['enable'] ), true ); ?> />
										<?php esc_html_e( 'Enable Pinterest', 'wcss-social-share' ); ?>
									</label>
									<div class="color-select">
										<label for="pinterestcolor">
											<input type="text" name="wcss_social_sharing[pinterest][color]" id="pinterestcolor" class="color-field" value="<?php echo ( isset( $wcss_options['pinterest']['color'] ) && ! empty( $wcss_options['pinterest']['color'] ) ) ? esc_attr( $wcss_options['pinterest']['color'] ) : '#C92228'; ?>" />
											<p class="description" ><?php esc_html_e( 'Select button color.', 'wcss-social-share' ); ?></p>
										</label>
									</div>
								</div>
							</div>
							<!--End of Pinterest button setting -->

							<!-- Linkedin button setting -->
							<div class="wcss-share-item item linkedin">

								<div class="slide-section closed" id="linkedin-slide">
									<label for="enablelinkedin">
										<input type="checkbox" name="wcss_social_sharing[linkedin][enable]" value="yes" id="enablelinkedin" <?php checked( ( 'yes' === $wcss_options['linkedin']['enable'] ), true ); ?> />
										<?php esc_html_e( 'Enable LinkdeIn', 'wcss-social-share' ); ?>
									</label>
									<div class="color-select">
										<label for="linkedincolor">
											<input type="text" name="wcss_social_sharing[linkedin][color]" id="linkedincolor" class="color-field" value="<?php echo ( isset( $wcss_options['linkedin']['color'] ) && ! empty( $wcss_options['linkedin']['color'] ) ) ? esc_attr( $wcss_options['linkedin']['color'] ) : '#0077b5'; ?>" />
											<p class="description" ><?php esc_html_e( 'Select button color.', 'wcss-social-share' ); ?></p>
										</label>
									</div>
								</div>
							</div>
							<!--End of Linkedin button setting -->

							<!-- Whatsapp button setting -->
							<div class="wcss-share-item item whatsapp">

								<div class="slide-section closed" id="whatsapp-slide">
									<label for="enablewhatsapp">
										<input type="checkbox" name="wcss_social_sharing[whatsapp][enable]" value="yes" id="enablewhatsapp" <?php checked( ( 'yes' === $wcss_options['whatsapp']['enable'] ), true ); ?> />
										<?php esc_html_e( 'Enable Whatsapp', 'wcss-social-share' ); ?>
									</label>
									<div class="color-select">
										<label for="whatsappcolor">
											<input type="text" name="wcss_social_sharing[whatsapp][color]" id="whatsappcolor" class="color-field" value="<?php echo ( isset( $wcss_options['whatsapp']['color'] ) && ! empty( $wcss_options['whatsapp']['color'] ) ) ? esc_attr( $wcss_options['whatsapp']['color'] ) : '#43d854'; ?>" />
											<p class="description" ><?php esc_html_e( 'Select button color.', 'wcss-social-share' ); ?></p>
										</label>
									</div>
								</div>
							</div>
							<!--End of Whatsapp button setting -->

						</div>
					</td>
				</tr>
				<!-- End of tr for button setting -->

				<!-- Sectin to select button for post types and custom post types-->
				<tr>
					<th>
						<label for="displayon">
							<?php esc_html_e( 'Show buttons on', 'wcss-social-share' ); ?>
						</label>
					</th>
					<td>
						<?php

						$post_types = get_post_types(
							array(
								'show_ui'      => true,
								'show_in_menu' => true,
							),
							'objects'
						);

						foreach ( $post_types as $post_type ) {
							?>
							<input type="checkbox" name="wcss_social_sharing[post_type][]" value="<?php echo $post_type->name; ?>" id="select-<?php echo $post_type->name; ?>" <?php checked( in_array( $post_type->name, $wcss_options['post_type'] ), true ); ?> />
							<label class="mr10" for="select-<?php echo $post_type->name; ?>">
								<?php echo $post_type->label; ?>
							</label>

							<?php
						}
						?>
					</td>
				</tr>
				<!--End of Sectin to select button for post types and custom post types-->

				<!-- Sectin to select button position to display in front-->
				<tr>
					<th>
						<label for="iconposition">
							<?php esc_html_e( 'Icon Position', 'wcss-social-share' ); ?>
						</label>
					</th>
					<td>
						<input type="checkbox" name="wcss_social_sharing[icon_position][]" value="after_content" id="select-after_content" <?php checked( in_array( 'after_content', $wcss_options['icon_position'] ), true ); ?> />
						<label class="mr10" for="select-after_content">
							<?php esc_html_e( 'After Content', 'wcss-social-share' ); ?>
						</label>
						<input type="checkbox" name="wcss_social_sharing[icon_position][]" value="above_content" id="select-above_content" <?php checked( in_array( 'above_content', $wcss_options['icon_position'] ), true ); ?> />
						<label class="mr10" for="select-above_content">
							<?php esc_html_e( 'Above Content', 'wcss-social-share' ); ?>
						</label>
						<input type="checkbox" name="wcss_social_sharing[icon_position][]" value="float_left" id="select-float_left" <?php checked( in_array( 'float_left', $wcss_options['icon_position'] ), true ); ?> />
						<label class="mr10" for="select-float_left">
							<?php esc_html_e( 'Float Left', 'wcss-social-share' ); ?>
						</label>
						<input type="checkbox" name="wcss_social_sharing[icon_position][]" value="inside_image" id="select-inside_image" <?php checked( in_array( 'inside_image', $wcss_options['icon_position'] ), true ); ?> />
						<label class="mr10" for="select-inside_image">
							<?php esc_html_e( 'Inside Image', 'wcss-social-share' ); ?>
						</label>

					</td>
				</tr>
				<!--End of Sectin to select button position to display in front-->

				<!-- Sectin to select button sizes to display in front-->
				<tr>
					<th>
						<label for="buttonsizes">
							<?php esc_html_e( 'Button Sizes', 'wcss-social-share' ); ?>
						</label>
					</th>
					<td>
						<input id="small-button" type="radio" name="wcss_social_sharing[button_size]" value="small" <?php checked( $wcss_options['button_size'] == 'small' ); ?> />
						<label class="mr10" for="small-button">
							<?php esc_html_e( 'Small', 'wcss-social-share' ); ?>
						</label>
						<input id="medium-button" type="radio" name="wcss_social_sharing[button_size]" value="medium" <?php checked( $wcss_options['button_size'] == 'medium' ); ?> />
						<label class="mr10" for="medium-button">
							<?php esc_html_e( 'Medium', 'wcss-social-share' ); ?>
						</label>
						<input id="large-button" type="radio" name="wcss_social_sharing[button_size]" value="large" <?php checked( $wcss_options['button_size'] == 'large' ); ?> />
						<label class="mr10" for="large-button">
							<?php esc_html_e( 'Large', 'wcss-social-share' ); ?>
						</label>
					</td>
				</tr>
				<!--End of Sectin to select button sizes to display in front-->

				<!-- Sectin to change the button label to display in front-->
				<tr>
					<th>
						<label for="buttonlabel">
							<?php esc_html_e( 'Button Label', 'wcss-social-share' ); ?>
						</label>
					</th>
					<td>
						<input type="text" name="wcss_social_sharing[button_label]" value="<?php echo ( isset( $wcss_options['button_label'] ) && ! empty( $wcss_options['button_label'] ) ) ? esc_attr( $wcss_options['button_label'] ) : ''; ?>" id="icon-label" />
					</td>
				</tr>
				<!--End of Sectin to change the button label to display in front-->
			</tbody>
		</table>
		<!-- submit button -->
		<?php submit_button( 'Save Changes', 'primary', 'submit_settings', false ); ?>
	</form>
</div>
