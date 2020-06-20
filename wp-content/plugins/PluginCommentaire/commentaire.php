<?php 
 /*
 Plugin Name: PluginCommentaire
 Plugin URI: http://monPlugin.com/
 Description: Ce plugin c'est pour faire de commentaire sur la page.
 Version: 1.0.0
 Author: Miguel
 Author URI: http://localhost/woocommerce/
 License: GPL3
 Text Domain:  PluginCommentaire
 */

function Actif () {
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."commentaires(
        id int(11) AUTO_INCREMENT PRIMARY KEY, 
        commentaire VARCHAR(200) NULL, 
        idUser int(11));"
    );
    
}

function Inactif () {
    flush_rewrite_rules();
}


register_activation_hook(__FILE__,'Actif');
register_deactivation_hook(__FILE__,'Inactif');
add_action('admin_menu', 'CreerMenu');

function CreerMenu(){
    add_menu_page(
        "Commentaires", //titre de la page 
        "Comentaires Clients", //titre menu
        "manage_options", //capacité
        plugin_dir_path(__FILE__)."admin/contenu.php", 
        null, //funtion de contenu
        plugin_dir_url(__FILE__)."img/comment.png", 
        "1"
    );
}



/*
function CreerMenu(){
    add_menu_page(
        "Commentaires", //titre de la page 
        "Comentaires Clients", //titre menu
        "manage_options", //capacité
        plugin_dir_path(__FILE__)."admin/contenu.php", //slug
        null, //funtion de contenu
        plugin_dir_url(__FILE__)."img/edit.png",
        "1"
    );
/*
    add_submenu_page(
        "sp_menu", //slug parent
        "Edit", //titre de la page
        "Edit", //titre menu
        "manage_options",
        "SubMenu"
    );
}

function SubMenu(){
    echo"<h1>Contenu SubMenu</h1>";
}*/
/*
function Effacer () {
    if(!defined('WP_UNINSTALL_PLUGIN')){
        die();
    }
}
register_unistall_hook(__FILE__,'Effacer'); */
