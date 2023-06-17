<?php

function check_elementor_installed() {
    if (is_admin()) {
        if (is_plugin_active('elementor/elementor.php')) {
            $message = 'Elementor Installed.';
            $class = 'notice-success';
        } else {
            $plugin_slug = 'elementor';
            $plugin_name = 'Elementor';
            $install_url = wp_nonce_url(
                add_query_arg(
                    array(
                        'action' => 'install-plugin',
                        'plugin' => $plugin_slug,
                    ),
                    self_admin_url('update.php')
                ),
                'install-plugin_' . $plugin_slug
            );

            $message = sprintf(
                'Elementor Not Installed. Please <a href="%s">install %s</a>.',
                esc_url($install_url),
                esc_html($plugin_name)
            );
            $class = 'notice-error';
        }
        
        add_action('admin_notices', function () use ($message, $class) {
            echo '<div class="notice ' . $class . ' is-dismissible"><p>' . wp_kses_post($message) . '</p></div>';
        });
    }
}
add_action('admin_init', 'check_elementor_installed');


// Include the Elementor addon file
function include_elementor_addon() {
    require_once get_stylesheet_directory() . '/elementor-addon/addon.php';
}
add_action('after_setup_theme', 'include_elementor_addon');


