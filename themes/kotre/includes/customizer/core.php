<?php
/**
 * Core functions.
 *
 * @package Kotre
 */

if ( ! function_exists( 'kotre_get_option' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function kotre_get_option( $key ) {

        if ( empty( $key ) ) {

            return;

        }

        $kotre_default = kotre_get_default_theme_options();

        $default = ( isset( $kotre_default[ $key ] ) ) ? $kotre_default[ $key ] : '';
        $theme_options = get_theme_mod( 'theme_options', $kotre_default );
        $theme_options = array_merge( $kotre_default, $theme_options );
        $value = '';

        if ( isset( $theme_options[ $key ] ) ) {
            $value = $theme_options[ $key ];
        }

        return $value;

    }

endif;

if ( ! function_exists( 'kotre_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function kotre_get_default_theme_options() {

        $defaults = array();

        $defaults['site_identity']          = 'title-text';
        $defaults['show_social_icons']      = true;
        $defaults['show_search_form']       = true;
        $defaults['excerpt_length']         = 20;
        $defaults['readmore_text']          = esc_html__( 'Read More', 'kotre' );
        $defaults['copyright_text']         = esc_html__( 'Copyright &copy; [the-year] [the-site-title]. All rights reserved.', 'kotre' );
        $defaults['goto_top']               = false;

        return $defaults;
    }

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'kotre_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function kotre_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;