<?php 
/*
Plugin Name: Test Plugin
Description: Plugin de pruebas
PluginURI: http://prueba.prueba
Version: 0.0.1
*/

function Activar(){  
}

function Desactivar(){
    flush_rewrite_rules();
}

echo "plugin activado";

register_activation_hook(__FILE__, "Activar");
register_deactivation_hook(__FILE__, "Desactivar");

add_action( 'admin_menu', 'createMenu' );

function createMenu(){
    add_menu_page( 
        'Titulo tab', 
        'menu titulo', 
        'manage_options', 
        'pluginTestSlug', 
        'mostrarContenido', 
        plugin_dir_url( __FILE__ ).'admin/image/icon.png', 
        '1'
    );

    add_submenu_page( 
        'pluginTestSlug', 
        'Titulo tab submenu', 
        'sub menu', 
        'manage_options',
        'slug_sub_menu', 
        'submenu'
        /*position */
    );
}

function mostrarContenido(){
    echo '<h1>Plugin test</h1>';
}

function submenu(){
    echo '<h1>Plugin test submenu</h1>';
}