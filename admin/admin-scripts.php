<?php
/**
 * Add scripts, styles and icons
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'admin_enqueue_scripts', 'abcfrggcl_enq_admin_css', 10 );
add_action( 'admin_enqueue_scripts', 'abcfrggcl_enq_admin_js' );

//==ADMIN========================================================================================
//Admin CSS
function abcfrggcl_enq_admin_css() {

    $obj = ABCFRGGCL_Main();
    $ver = $obj->pluginVersion;

    wp_register_style('abcfrggcl-admin-l', ABCFRGGCL_PLUGIN_URL . 'library/abcfl-admin.css', $ver, 'all');
    wp_register_style('abcfrggcl-admin', ABCFRGGCL_PLUGIN_URL . 'css/admin.css', $ver, 'all');
    wp_enqueue_style('abcfrggcl-admin-l');
    wp_enqueue_style('abcfrggcl-admin');
}


//Admin JS
function abcfrggcl_enq_admin_js() {

    global $typenow;
    $obj = ABCFRGGCL_Main();
    $ver = $obj->pluginVersion;

    wp_register_script( 'abcfrggcl_vtabs', ABCFRGGCL_PLUGIN_URL . 'js/vtabs.js', array( 'jquery' ), $ver, true );
    wp_localize_script('abcfrggcl_vtabs', 'abcfrggcl_VTabs', array(
                        'mgr_1' => '#abcfrggcl_VTabsMgr_1',
                        'mgr_2' => '#abcfrggcl_VTabsMgr_2',
                        'cntCntr_1' => '#abcfrggcl_VTabsCntCntr_1',
                        'cntCntr_2' => '#abcfrggcl_VTabsCntCntr_2'
        ));

    wp_enqueue_script('abcfrggcl_vtabs');

//    wp_register_script( 'abcfrggcl_tabs', ABCFRGGCL_PLUGIN_URL . 'js/tabs.js', array( 'jquery' ), '222', true );
//    wp_localize_script('abcfrggcl_tabs', 'abcfrggcl_tabs', array(
//                        'cntrID1' => '#abcfrggcl-tabs1'
//                    ));
//    wp_enqueue_script('abcfrggcl_tabs');

    if( $typenow == 'cpt_rggcl_gallery' ) {
        wp_register_script( 'abcfrggcl_sort_items', ABCFRGGCL_PLUGIN_URL . 'js/sort-items.js', array( 'jquery', 'jquery-ui-sortable' ), $ver, true );

        wp_localize_script( 'abcfrggcl_sort_items', 'abcfrggcl_ls_sort_items', array(
                'abcfajaxnonce' => wp_create_nonce( 'abcfnonce' )
            )
        );
        wp_enqueue_script( 'abcfrggcl_sort_items' );
    }

    if( $typenow == 'cpt_rggcl_item' ) {
        wp_enqueue_media();
        wp_register_script( 'abcfrggcl_select_img', ABCFRGGCL_PLUGIN_URL . 'js/select-image.js', array( 'jquery' ) );
        wp_localize_script( 'abcfrggcl_select_img', 'abcfrggcl_si', array(
                'title' => __( 'Image', 'abcfgtm_td' ),
                'button' => __( 'Choose Image', 'abcfgtm_td' ),
                'btnImg' => '#btnImg',
                'imgUrl' => '#imgUrl',
                'imgID' => '#imgID'
            )
        );
        wp_enqueue_script('abcfrggcl_select_img');
    }
}


