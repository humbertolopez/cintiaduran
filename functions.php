<?php
    function theme_style(){
        wp_register_style('tw',get_template_directory_uri().'/styles/tw.css');
        wp_enqueue_style('tw');
    }
    add_action('wp_enqueue_scripts','theme_style');

    function cd_custom_menu(){
        register_nav_menu('main-menu',__('Menu Principal'));
    }
    add_action('init','cd_custom_menu');

    function cd_customize_register($wp_customize){
        $wp_customize->add_section('cd_color_scheme',array(
                'title' => __('Colores','cd'),
                'priority' => 35,
            )
        );

        //setting para el texto general
        $wp_customize->add_setting('cd_theme_options[text_color]',array(
            'default' => 'black',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            )
        );
        //control para el texto en general
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'text_color',array(
                'label' => __('Color del texto general','cd'),
                'section' => 'cd_color_scheme',
                'settings' => 'cd_theme_options[text_color]',
                )
            )
        );
        //setting para el color de links
        $wp_customize->add_setting('cd_theme_options[link_color]',array(
            'default' => 'black',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            )
        );
        //control para el color de links
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color',array(
                'label' => __('Color de links','cd'),
                'section' => 'cd_color_scheme',
                'settings' => 'cd_theme_options[link_color]',
                )
            )
        );
        //setting para color de fondo
        $wp_customize->add_setting('cd_theme_options[bg_color]',array(
            'default' => 'white',
            'type' => 'option',
            'capability' => 'edit_theme_options',
            )
        );
        //control para color de fondo
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'bg_color',array(
                'label' => __('Color de fondo','cd'),
                'section' => 'cd_color_scheme',
                'settings' => 'cd_theme_options[bg_color]',
                )
            )
        );
    }

    add_action('customize_register','cd_customize_register');

    //añadir colores al css en head
    function cp_customize_css(){
        $mods = get_option('cd_theme_options');
        ?>
            <style type="text/css">
                body {
                    background-color: <?php echo $mods['bg_color']; ?>;
                    color: <?php echo $mods['text_color']; ?>;
                }
                a {
                    color: <?php echo $mods['text_color']; ?>;
                }
                a:hover {
                    color: <?php echo $mods['link_color']; ?>;
                }
            </style>
        <?php
    }
    add_action('wp_head','cp_customize_css');

?>