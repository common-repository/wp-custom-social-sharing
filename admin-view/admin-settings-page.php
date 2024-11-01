<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$wcss_settings_options = get_option( 'wcss_settings_options' );
$wcss_options = $wcss_settings_options['wcss_social_sharing'];

?>

<div class="wptg-backend-wrap">
    <div class="header-wrap">
        <div class="row">
            <div class="logo-wrap col-md-6 ver-center">
                    <img class="logo" src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/images/logov2.png'; ?>" alt="logo">
                    <h1 class="title"><?php esc_html_e( 'WP Custom Social Sharing', 'wcss-social-share' ); ?><span class="version">2.0</span></h1>
            </div>


            <div class="btn-wrap col-md-6">
                <a href="https://wordpress.org/support/plugin/wp-custom-social-sharing/" target="_blank" class="wptg-btn btn2 dashicons-before dashicons-heart">support</a>
                <a href="https://wordpress.org/support/plugin/wp-custom-social-sharing/reviews/" target="_blank" class="wptg-btn btn2 dashicons-before dashicons-star-filled">Rate us</a>
            </div>
        </div>
    </div>

    <div class="body-wrap">
        <div id="tabs-wrap" class="tabs-wrap">

            <div class="tab-left">
                <ul class="tab-menu">
                    <li class="nav-tab">
                        <a href="#general" class="dashicons-before dashicons-editor-alignleft"><?php esc_html_e( 'General', 'wcss-social-share' ); ?></a>
                        <ul class="sub-tabmenu">
                            <li><a href="#wcss-sec1">Choose Social Icons</a></li>
                            <li><a href="#wcss-sec2">Rearrange Social Icons</a></li>
                            <li><a href="#wcss-sec3">Show Social Icons</a></li>
                        </ul>
                    </li>
                    <li class="nav-tab"><a href="#design-settings" class="dashicons-before dashicons-admin-generic"><?php esc_html_e( 'Design Settings', 'wcss-social-share' ); ?></a></li>
                </ul>

            </div>

            <div class="tab-right">
                <form action="options.php" method="POST">

                    <!-- tab content Starts -->
                    <div class="tab-content">

                        <!-- General Tab Starts -->
                        <div id="general">
                            <h2 class="tab-title"><?php esc_html_e( 'General Settings', 'wcss-social-share' ); ?></h2>

                            <?php settings_fields( 'wcss_settings_options' ); ?>

                            <div id="wcss-sec1" class="form-section">
                                <div class="form-group">

                                    <label for="sharebutton" class="form-label">
                                        <?php esc_html_e( 'Choose Social Icons', 'wcss-social-share' ); ?>
                                    </label>

                                    <div class="form-control-wrap">

                                        <div id="sharebutton" class="wcss-button-container">

                                            <div class="wcss-button-check-wrapper row">
                                                <!-- Facebook button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-facebook">

                                                    <div class="slide-section closed" id="facebook-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[facebook][enable]" value="yes" id="enablefacebook" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['facebook']['enable'] ), true ); ?> />

                                                            <label for="enablefacebook" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-facebook">
                                                                        <i class="wcss-icon fab fa-facebook-f"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Facebook', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Facebook button setting -->

                                                <!-- Twitter button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-twitter">

                                                    <div class="slide-section closed" id="twitter-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[twitter][enable]" value="yes" id="enabletwitter" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['twitter']['enable'] ), true ); ?> />

                                                            <label for="enabletwitter" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-twitter">
                                                                        <i class="wcss-icon fab fa-twitter"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Twitter', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Twitter button setting -->

                                                <!-- Pinterest button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-pinterest">

                                                    <div class="slide-section closed" id="pinterest-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[pinterest][enable]" value="yes" id="enablepinterest" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['pinterest']['enable'] ), true ); ?> />

                                                            <label for="enablepinterest" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-pinterest">
                                                                        <i class="wcss-icon fab fa-pinterest"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Pinterest', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Pinterest button setting -->

                                                <!-- Linkedin button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-linkedin">

                                                    <div class="slide-section closed" id="linkedin-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[linkedin][enable]" value="yes" id="enablelinkedin" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['linkedin']['enable'] ), true ); ?> />

                                                            <label for="enablelinkedin" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-linkedin">
                                                                        <i class="wcss-icon fab fa-linkedin"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'LinkedIn', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Linkedin button setting -->

                                                <!-- Blogger button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-blogger">

                                                    <div class="slide-section closed" id="blogger-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[blogger][enable]" value="yes" id="enableblogger" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['blogger']['enable'] ), true ); ?> />

                                                            <label for="enableblogger" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-blogger">
                                                                        <i class="wcss-icon fab fa-blogger"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Blogger', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Blogger button setting -->

                                                <!-- Buffer button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-buffer">

                                                    <div class="slide-section closed" id="buffer-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[buffer][enable]" value="yes" id="enablebuffer" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['buffer']['enable'] ), true ); ?> />

                                                            <label for="enablebuffer" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-buffer">
                                                                        <i class="wcss-icon fab fa-buffer"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Buffer', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Buffer button setting -->

                                                <!-- Digg button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-digg">

                                                    <div class="slide-section closed" id="digg-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[digg][enable]" value="yes" id="enabledigg" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['digg']['enable'] ), true ); ?> />

                                                            <label for="enabledigg" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-digg">
                                                                        <i class="wcss-icon fab fa-digg"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Digg', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Digg button setting -->

                                                <!-- Email button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-email">

                                                    <div class="slide-section closed" id="email-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[email][enable]" value="yes" id="enableemail" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['email']['enable'] ), true ); ?> />

                                                            <label for="enableemail" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-email">
                                                                        <i class="wcss-icon far fa-envelope"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Gmail', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Email button setting -->

                                                <!-- Flipboard button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-flipboard">

                                                    <div class="slide-section closed" id="flipboard-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[flipboard][enable]" value="yes" id="enableflipboard" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['flipboard']['enable'] ), true ); ?> />

                                                            <label for="enableflipboard" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-flipboard">
                                                                        <i class="wcss-icon fab fa-flipboard"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Flipboard', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Flipboard button setting -->

                                                <?php /* ?>
                                                <!-- myspace button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-myspace">

                                                    <div class="slide-section closed" id="myspace-slide">
                                                        <label for="enablemyspace">
                                                            <input type="checkbox" name="wcss_social_sharing[myspace][enable]" value="yes" id="enablemyspace" <?php checked( ( 'yes' === $wcss_options['myspace']['enable'] ), true ); ?> />
                                                            <?php esc_html_e( 'Enable Myspace', 'wcss-social-share' ); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--End of myspace button setting -->
                                                <?php */ ?>

                                                <!-- Odnoklassniki button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-odnoklassniki">

                                                    <div class="slide-section closed" id="odnoklassniki-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[odnoklassniki][enable]" value="yes" id="enableodnoklassniki" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['odnoklassniki']['enable'] ), true ); ?> />

                                                            <label for="enableodnoklassniki" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-odnoklassniki">
                                                                        <i class="wcss-icon fab fa-odnoklassniki"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Odnoklassniki', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Odnoklassniki button setting -->

                                                <!-- Pocket button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-pocket">

                                                    <div class="slide-section closed" id="pocket-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[pocket][enable]" value="yes" id="enablepocket" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['pocket']['enable'] ), true ); ?> />

                                                            <label for="enablepocket" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-pocket">
                                                                        <i class="wcss-icon fab fa-get-pocket"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Pocket', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Pocket button setting -->

                                                <!-- Reddit button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-reddit">

                                                    <div class="slide-section closed" id="reddit-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[reddit][enable]" value="yes" id="enablereddit" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['reddit']['enable'] ), true ); ?> />

                                                            <label for="enablereddit" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-reddit">
                                                                        <i class="wcss-icon fab fa-reddit"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Reddit', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Reddit button setting -->

                                                <!-- Skype button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-skype">

                                                    <div class="slide-section closed" id="skype-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[skype][enable]" value="yes" id="enableskype" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['skype']['enable'] ), true ); ?> />

                                                            <label for="enable" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-skype">
                                                                        <i class="wcss-icon fab fa-skype"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Skype', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Skype button setting -->

                                                <!-- Stumbleupon button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-stumbleupon">

                                                    <div class="slide-section closed" id="stumbleupon-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[stumbleupon][enable]" value="yes" id="enablestumbleupon" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['stumbleupon']['enable'] ), true ); ?> />

                                                            <label for="enablestumbleupon" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-stumbleupon">
                                                                        <i class="wcss-icon fab fa-stumbleupon"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Stumbleupon', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Stumbleupon button setting -->

                                                <!-- Telegram button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-telegram">

                                                    <div class="slide-section closed" id="telegram-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[telegram][enable]" value="yes" id="enabletelegram" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['telegram']['enable'] ), true ); ?> />

                                                            <label for="enabletelegram" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-telegram">
                                                                        <i class="wcss-icon fab fa-telegram"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Telegram', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Telegram button setting -->

                                                <!-- Tumblr button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-tumblr">

                                                    <div class="slide-section closed" id="tumblr-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[tumblr][enable]" value="yes" id="enabletumblr" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['tumblr']['enable'] ), true ); ?> />

                                                            <label for="enabletumblr" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-tumblr">
                                                                        <i class="wcss-icon fab fa-tumblr"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Tumblr', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Tumblr button setting -->

                                                <?php /* ?>
                                                <!-- VK button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-vk">

                                                    <div class="slide-section closed" id="vk-slide">
                                                        <label for="enablevk">
                                                            <input type="checkbox" name="wcss_social_sharing[vk][enable]" value="yes" id="enablevk" <?php checked( ( 'yes' === $wcss_options['vk']['enable'] ), true ); ?> />
                                                            <?php esc_html_e( 'Enable VK', 'wcss-social-share' ); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--End of VK button setting -->
                                                <?php */ ?>

                                                <!-- Whatsapp button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-whatsapp">

                                                    <div class="slide-section closed" id="whatsapp-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[whatsapp][enable]" value="yes" id="enablewhatsapp" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['whatsapp']['enable'] ), true ); ?> />

                                                            <label for="enablewhatsapp" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-whatsapp">
                                                                        <i class="wcss-icon fab fa-whatsapp"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Whatsapp', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Whatsapp button setting -->

                                                <!-- Xing button setting -->
                                                <div class="wcss-share-item col-md-4 wcss-xing">

                                                    <div class="slide-section closed" id="xing-slide">
                                                        <div class="checkbox-wrap">
                                                            <input type="checkbox" name="wcss_social_sharing[xing][enable]" value="yes" id="enablexing" class="wcss-icon-checkbox" <?php checked( ( 'yes' === $wcss_options['xing']['enable'] ), true ); ?> />

                                                            <label for="enablexing" class="custom-checkbox">
                                                                <span class="wcss-share-btn">
                                                                    <span class="wcss-icon-xing">
                                                                        <i class="wcss-icon fab fa-xing"></i>
                                                                    </span>
                                                                    <?php esc_html_e( 'Xing', 'wcss-social-share' ); ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Xing button setting -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="wcss-sec2" class="form-section">
                                <div class="form-group">
                                    <label for="sharebutton" class="form-label">
                                        <?php esc_html_e( 'Drag the icon to change the order', 'wcss-social-share'); ?>
                                    </label>

                                    <div class="form-control-wrap">

                                        <ul class="wcss-order-icon" id="wcss-order-icon">
                                            <?php
                                            $wcss_order = esc_attr( $wcss_options['button_order'] );

                                            $exploded_order = explode( ',', rtrim( $wcss_order, ',' ) );
                                            foreach ( $exploded_order  as $i ) {
                                                switch( $i ) {

                                                    case 'facebook':
                                                    echo sprintf( __( '<li class="wcss-facebook %s">
                                                        <a href="#" id="facebook" class="wcss-share-btn" data-show="facebook-slide" >
                                                            <span class="wcss-icon-facebook">
                                                                <i class="wcss-icon fab fa-facebook-f"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['facebook']['enable'] ) && 'yes' === $wcss_options['facebook']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Facebook', 'wcss-social-share') );
                                                    break;

                                                    case 'twitter':
                                                    echo sprintf( __( '<li class="wcss-twitter %s">
                                                        <a href="#" id="twitter" class="wcss-share-btn" data-show="twitter-slide" >
                                                            <span class="wcss-icon-twitter">
                                                                <i class="fab fa-twitter"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>'),
                                                    ( ! empty( $wcss_options['twitter']['enable'] ) && 'yes' === $wcss_options['twitter']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Twitter', 'wcss-social-share') );
                                                    break;

                                                    case 'pinterest':
                                                    echo sprintf( __( '<li class="wcss-pinterest %s">
                                                        <a href="#" id="pinterest" class="wcss-share-btn" data-show="pinterest-slide" >
                                                            <span class="wcss-icon-pinterest">
                                                                <i class="fab fa-pinterest"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['pinterest']['enable'] ) && 'yes' === $wcss_options['pinterest']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Pinterest', 'wcss-social-share' ) );
                                                    break;

                                                    case 'linkedin':
                                                    echo sprintf( __( '<li class="wcss-linkedin %s">
                                                        <a href="#" id="linkedin" class="wcss-share-btn" data-show="linkedin-slide" >
                                                            <span class="wcss-icon-linkedin">
                                                                <i class="fab fa-linkedin"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['linkedin']['enable'] ) && 'yes' === $wcss_options['linkedin']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'LinkedIn', 'wcss-social-share' ) );
                                                    break;

                                                    case 'blogger':
                                                    echo sprintf( __( '<li class="wcss-blogger %s">
                                                        <a href="#" id="blogger" class="wcss-share-btn" data-show="blogger-slide" >
                                                            <span class="wcss-icon-blogger">
                                                                <i class="fab fa-blogger"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['blogger']['enable'] ) && 'yes' === $wcss_options['blogger']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Blogger', 'wcss-social-share' ) );
                                                    break;

                                                    case 'buffer':
                                                    echo sprintf( __( '<li class="wcss-buffer %s">
                                                        <a href="#" id="buffer" class="wcss-share-btn" data-show="buffer-slide" >
                                                            <span class="wcss-icon-buffer">
                                                                <i class="fab fa-buffer"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['buffer']['enable'] ) && 'yes' === $wcss_options['buffer']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Buffer', 'wcss-social-share' ) );
                                                    break;

                                                    case 'digg':
                                                    echo sprintf( __( '<li class="wcss-digg %s">
                                                        <a href="#" id="digg" class="wcss-share-btn" data-show="digg-slide" >
                                                            <span class="wcss-icon-digg">
                                                                <i class="fab fa-digg"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['digg']['enable'] ) && 'yes' === $wcss_options['digg']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Digg', 'wcss-social-share' ) );
                                                    break;

                                                    case 'email':
                                                    echo sprintf( __( '<li class="wcss-email %s">
                                                        <a href="#" id="email" class="wcss-share-btn" data-show="email-slide" >
                                                            <span class="wcss-icon-gmail">
                                                                <i class="far fa-envelope"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['email']['enable'] ) && 'yes' === $wcss_options['email']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Gmail', 'wcss-social-share' ) );
                                                    break;

                                                    case 'flipboard':
                                                    echo sprintf( __( '<li class="wcss-flipboard %s">
                                                        <a href="#" id="flipboard" class="wcss-share-btn" data-show="flipboard-slide" >
                                                            <span class="wcss-icon-flipboard">
                                                                <i class="fab fa-flipboard"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['flipboard']['enable'] ) && 'yes' === $wcss_options['flipboard']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Flipboard', 'wcss-social-share' ) );
                                                    break;

                                                    // case 'myspace':
                                                    // echo sprintf( __('<li><a href="#" id="myspace" class="wcss-share-btn" data-show="myspace-slide" ><i class="fab fa-myspace"></i>%s</a></li>'), __('Myspace', 'wcss-social-share') );
                                                    // break;

                                                    case 'odnoklassniki':
                                                    echo sprintf( __( '<li class="wcss-odnoklassniki %s">
                                                        <a href="#" id="odnoklassniki" class="wcss-share-btn" data-show="odnoklassniki-slide" >
                                                            <span class="wcss-icon-odnoklassniki">
                                                                <i class="fab fa-odnoklassniki"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['odnoklassniki']['enable'] ) && 'yes' === $wcss_options['odnoklassniki']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Odnoklassniki', 'wcss-social-share' ) );
                                                    break;

                                                    case 'pocket':
                                                    echo sprintf( __( '<li class="wcss-pocket %s">
                                                        <a href="#" id="pocket" class="wcss-share-btn" data-show="pocket-slide" >
                                                            <span class="wcss-icon-pocket">
                                                                <i class="fab fa-get-pocket"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['pocket']['enable'] ) && 'yes' === $wcss_options['pocket']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Pocket', 'wcss-social-share' ) );
                                                    break;

                                                    case 'reddit':
                                                    echo sprintf( __( '<li class="wcss-reddit %s">
                                                        <a href="#" id="reddit" class="wcss-share-btn" data-show="reddit-slide" >
                                                            <span class="wcss-icon-reddit">
                                                                <i class="fab fa-reddit"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['reddit']['enable'] ) && 'yes' === $wcss_options['reddit']['enable'] ) ? '' : 'hide-icon',
                                                    __('Reddit', 'wcss-social-share') );
                                                    break;

                                                    case 'skype':
                                                    echo sprintf( __( '<li class="wcss-skype %s">
                                                        <a href="#" id="skype" class="wcss-share-btn" data-show="skype-slide" >
                                                            <span class="wcss-icon-skype">
                                                                <i class="fab fa-skype"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['skype']['enable'] ) && 'yes' === $wcss_options['skype']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Skype', 'wcss-social-share' ) );
                                                    break;

                                                    case 'stumbleupon':
                                                    echo sprintf( __( '<li class="wcss-stumbleupon %s">
                                                        <a href="#" id="stumbleupon" class="wcss-share-btn" data-show="stumbleupon-slide" >
                                                            <span class="wcss-icon-stumbleupon">
                                                                <i class="fab fa-stumbleupon"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['stumbleupon']['enable'] ) && 'yes' === $wcss_options['stumbleupon']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'StumbleUpon', 'wcss-social-share' ) );
                                                    break;

                                                    case 'telegram':
                                                    echo sprintf( __( '<li class="wcss-telegram %s">
                                                        <a href="#" id="telegram" class="wcss-share-btn" data-show="telegram-slide" >
                                                            <span class="wcss-icon-telegram">
                                                                <i class="fab fa-telegram"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['telegram']['enable'] ) && 'yes' === $wcss_options['telegram']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Telegram', 'wcss-social-share' ) );
                                                    break;

                                                    case 'tumblr':
                                                    echo sprintf( __( '<li class="wcss-tumblr %s">
                                                        <a href="#" id="tumblr" class="wcss-share-btn" data-show="tumblr-slide" >
                                                            <span class="wcss-icon-tumblr">
                                                                <i class="fab fa-tumblr"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['tumblr']['enable'] ) && 'yes' === $wcss_options['tumblr']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Tumblr', 'wcss-social-share' ) );
                                                    break;

                                                    // case 'vk':
                                                    // echo sprintf( __('<li><a href="#" id="vk" class="wcss-share-btn" data-show="vk-slide" ><i class="fab fa-vk"></i>%s</a></li>'), __('VK', 'wcss-social-share') );
                                                    // break;


                                                    case 'whatsapp':
                                                    echo sprintf( __( '<li class="wcss-whatsapp %s">
                                                        <a href="#" id="whatsapp" class="wcss-share-btn" data-show="whatsapp-slide" >
                                                            <span class="wcss-icon-whatsapp">
                                                                <i class="fab fa-whatsapp"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['whatsapp']['enable'] ) && 'yes' === $wcss_options['whatsapp']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Whatsapp', 'wcss-social-share' ) );
                                                    break;

                                                    case 'xing':
                                                    echo sprintf( __( '<li class="wcss-xing %s">
                                                        <a href="#" id="xing" class="wcss-share-btn" data-show="xing-slide" >
                                                            <span class="wcss-icon-xing">
                                                                <i class="fab fa-xing"></i>
                                                            </span>
                                                            %s
                                                        </a>
                                                    </li>' ),
                                                    ( ! empty( $wcss_options['xing']['enable'] ) && 'yes' === $wcss_options['xing']['enable'] ) ? '' : 'hide-icon',
                                                    __( 'Xing', 'wcss-social-share' ) );
                                                    break;

                                                }
                                            }
                                            ?>
                                            <input type="hidden" id="wcss-button-order-field" name="wcss_social_sharing[button_order]" value="<?php echo ( isset( $wcss_options['button_order'] ) && ! empty( $wcss_options['button_order'] ) ) ? esc_attr( $wcss_options['button_order'] ) : 'facebook,twitter,pinterest,linkedin,blogger,buffer,digg,email,flipboard,odnoklassniki,pocket,reddit,skype,stumbleupon,telegram,tumblr,whatsapp,xing'; ?>" />
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Sectin to select button for post types and custom post types-->
                            <div id="wcss-sec3" class="form-section">
                                <div class="form-group">
                                    <label for="displayon" class="form-label" class="form-label">
                                        <?php esc_html_e( 'Show Social Icons on', 'wcss-social-share'); ?>
                                    </label>

                                    <div class="form-control-wrap">

                                        <div id="displayon" class="wcss-button-container">

                                            <?php

                                            $post_types = get_post_types(array(
                                                'show_ui' => true,
                                                'show_in_menu' => true,
                                                ), 'objects');

                                            foreach ($post_types as $post_type) {
                                                ?>
                                                    <div class="checkbox-wrap">
                                                        <input type="checkbox" name="wcss_social_sharing[post_type][]" value="<?php echo $post_type->name; ?>" id="select-<?php echo $post_type->name; ?>" <?php checked( in_array( $post_type->name, $wcss_options['post_type'] ), true ); ?> />
                                                        <label class="custom-checkbox" for="select-<?php echo $post_type->name; ?>">
                                                            <?php echo $post_type->label; ?>
                                                        </label>
                                                    </div>

                                                <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End of Sectin to select button for post types and custom post types-->

                        </div>
                        <!-- General Tab Ends -->

                        <!-- Design Tab Starts -->
                        <div id="design-settings">
                            <h2 class="tab-title">Design Settings</h2>

                            <div class="form-section">
                                <div class="form-group">
                                    <label for="iconposition" class="form-label">
                                        <?php esc_html_e( 'Social Icon Position', 'wcss-social-share'); ?>
                                    </label>

                                    <div class="form-control-wrap">
                                        <div id="iconposition" class="wcss-button-container">

                                            <div class="checkbox-wrap">
                                                <input type="checkbox" name="wcss_social_sharing[icon_position][]" value="after_content" id="select-after_content" <?php checked( in_array( 'after_content', $wcss_options['icon_position'] ), true ); ?> />
                                                <label class="custom-checkbox" for="select-after_content">
                                                    <?php esc_html_e( 'After Content', 'wcss-social-share'); ?>
                                                </label>
                                            </div>

                                            <div class="checkbox-wrap">
                                                <input type="checkbox" name="wcss_social_sharing[icon_position][]" value="above_content" id="select-above_content" <?php checked( in_array( 'above_content', $wcss_options['icon_position'] ), true ); ?> />
                                                <label class="custom-checkbox" for="select-above_content">
                                                    <?php esc_html_e( 'Above Content', 'wcss-social-share'); ?>
                                                </label>
                                            </div>

                                            <div class="checkbox-wrap">
                                                <input type="checkbox" name="wcss_social_sharing[icon_position][]" value="float_left" id="select-float_left" <?php checked( in_array( 'float_left', $wcss_options['icon_position'] ), true ); ?> />
                                                <label class="custom-checkbox" for="select-float_left">
                                                    <?php esc_html_e( 'Float Left', 'wcss-social-share'); ?>
                                                </label>
                                            </div>

                                            <div class="checkbox-wrap">
                                                <input type="checkbox" name="wcss_social_sharing[icon_position][]" value="inside_image" id="select-inside_image" <?php checked( in_array( 'inside_image', $wcss_options['icon_position'] ), true ); ?> />
                                                <label class="custom-checkbox" for="select-inside_image">
                                                    <?php esc_html_e( 'Inside Image', 'wcss-social-share'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="form-group">
                                    <label for="buttonsizes" class="form-label">
                                        <?php esc_html_e( 'Social Icon Sizes', 'wcss-social-share' ); ?>
                                    </label>

                                    <div class="form-control-wrap">

                                        <div id="buttonsizes" class="wcss-button-container">

                                            <div class="radio-wrap">
                                                <input id="small-button" type="radio" name="wcss_social_sharing[button_size]" value="small" <?php checked($wcss_options['button_size'] == 'small'); ?> />
                                                <label class="custom-radio" for="small-button">
                                                    <?php esc_html_e( 'Small', 'wcss-social-share' ); ?>
                                                </label>
                                            </div>

                                            <div class="radio-wrap">
                                                <input id="medium-button" type="radio" name="wcss_social_sharing[button_size]" value="medium" <?php checked($wcss_options['button_size'] == 'medium'); ?> />
                                                <label class="custom-radio" for="medium-button">
                                                    <?php esc_html_e( 'Medium', 'wcss-social-share' ); ?>
                                                </label>
                                            </div>

                                            <div class="radio-wrap">
                                                <input id="large-button" type="radio" name="wcss_social_sharing[button_size]" value="large" <?php checked($wcss_options['button_size'] == 'large'); ?> />
                                                <label class="custom-radio" for="large-button">
                                                    <?php esc_html_e( 'Large', 'wcss-social-share' ); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Sectin to display the number of icons initially in front-->
                            <div class="form-section">

                                <label for="default-count" class="form-label">
                                    <?php esc_html_e( 'Default Count', 'wcss-social-share' ); ?>
                                </label>

                                <div id="default-count" class="form-control-wrap">

                                    <input type="number" name="wcss_social_sharing[default_count]" value="<?php echo ( isset( $wcss_options['default_count'] ) && ! empty( $wcss_options['default_count'] ) ) ? esc_attr( $wcss_options['default_count'] ) : 3; ?>" id="icon-default-count" class="form-control"/>

                                </div>
                                <small class="description" ><?php esc_html_e( 'Show the number of icons initially.', 'wcss-social-share' ); ?></small>

                            </div>
                            <!-- End of Sectin to display the number of icons initially in front-->


                            <!-- Sectin to change the button label to display in front-->
                            <div class="form-section">

                                <label for="buttonlabel" class="form-label">
                                    <?php esc_html_e( 'Button Label', 'wcss-social-share' ); ?>
                                </label>

                                <div id="buttonlabel" class="form-control-wrap">

                                    <input type="text" name="wcss_social_sharing[button_label]" value="<?php echo ( isset( $wcss_options['button_label'] ) && ! empty( $wcss_options['button_label'] ) ) ? esc_attr( $wcss_options['button_label'] ) : ''; ?>" id="icon-label" class="form-control"/>
                                </div>

                            </div>

                            <!-- Sectin to change the button border-radius to display in front-->
                            <div class="form-section">

                                <label for="buttonborderradius" class="form-label">
                                    <?php esc_html_e( 'Button Border Radius', 'wcss-social-share' ); ?>
                                </label>

                                <div id="buttonborderradius" class="form-control-wrap">
                                    <input type="number" name="wcss_social_sharing[border_radius]" value="<?php echo ( isset( $wcss_options['border_radius'] ) && ! empty( $wcss_options['border_radius'] ) ) ? esc_attr( $wcss_options['border_radius'] ) : 0; ?>" id="icon-border-radius" class="form-control"/>
                                    <span>px</span>
                                </div>
                                <small class="description">Adds border-radius to the icons Before and After Content.</small>

                            </div>
                        </div>
                        <!-- Design Tab Starts -->

                        <!-- submit button -->
                        <?php submit_button( 'Save Changes', 'wptg-btn', 'submit_settings', false ); ?>

                    </div>
                    <!-- tab content end -->
                </form>
            </div>

        </div>
    </div>


    <div class="footer-wrap">
        <div class="row">
            <div class="creator col-md-6">
                <span>Proudly Created by</span>
                <a href="https://wptechgiants.com/"><strong>WP Tech Giants</strong></a>
            </div>

            <div class="copyright col-md-6">
                <span>All rights reserved</span>
                &copy; <?php echo date("Y"); ?>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
