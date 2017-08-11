<?php

function abcfrggcl_mbox_gallery_tabs(){

    $obj = ABCFRGGCL_Main();
    $slug = $obj->pluginSlug;
    $clsPfix = $obj->prefix;

    abcfrggcl_v_tabs_manager_div_s( '1' ); //---Manager START
        abcfrggcl_mbox_gallery_tabs_render_nav_tabs();
        abcfrggcl_mbox_gallery_tabs_render_cnt( $clsPfix );
    echo abcfl_html_tag_end( 'div' ); //---Manager END

    wp_nonce_field( $slug, $slug . '_nonce' );
}

function abcfrggcl_mbox_gallery_tabs_render_nav_tabs( ){

    echo abcfl_html_tag( 'ul', '', 'abcflVTabsNavCntr' );
        echo abcfrggcl_v_tabs_render_nav_tab( 'abcflVTabsTabActive', abcfrggcl_txta(13) );
        echo abcfrggcl_v_tabs_render_nav_tab( '', abcfrggcl_txta(45) );
        echo abcfrggcl_v_tabs_render_nav_tab( '', abcfrggcl_txta(3) );
    echo abcfl_html_tag_end( 'ul' );
}

function abcfrggcl_mbox_gallery_tabs_render_cnt( $clsPfix ){

    global $post;
    $tplateID = $post->ID;
    $tplateOptns = get_post_custom( $tplateID );

    //$imgSize = isset( $tplateOptns['imgS'] ) ? esc_attr( $tplateOptns['imgS'][0] ) : '';
    //$lstItemImg = '';

    echo abcfl_html_tag( 'div', 'abcfrggcl_VTabsCntCntr_1', 'abcflVTabsCntCntr' ); //---Content START
        abcfrggcl_mbox_gallery_layout( $tplateOptns );
        abcfrggcl_mbox_item_order( $tplateID );
        abcfrggcl_mbox_gallery_shortcode();
    echo abcfl_html_tag_end( 'div' ); //---Content END

}


//#######################################################################
//-- Render content ---------------------------------------------
//echo  abcfl_html_tag('div', 'abcfrggcl-tabs1' );
//
//    echo abcfl_html_tag( 'h2', '', 'nav-tab-wrapper current' );
//
//    echo abcfl_html_a_tag('javascript:;', abcfrggcl_txta(13), '', 'nav-tab nav-tab-active abcfTabactive');
//    echo abcfl_html_a_tag('javascript:;', abcfrggcl_txta(45), '', 'nav-tab');
//    echo abcfl_html_a_tag('javascript:;', abcfrggcl_txta(3), '', 'nav-tab');
//
//    echo abcfl_html_tag_end('h2');
//
//    global $post;
//    $listID = $post->ID;
//    $lstTplateID = $post->post_parent;
//    $tplateOptns = get_post_custom( $listID );
//
//    $imgSize = isset( $tplateOptns['imgS'] ) ? esc_attr( $tplateOptns['imgS'][0] ) : '';
//
//    $lstItemImg = '';
//    abcfrggcl_mbox_gallery_css( $tplateOptns );
//    abcfrggcl_mbox_item_order( $listID );
//    abcfrggcl_mbox_gallery_shortcode();
//
//    $obj = ABCFRGGCL_Main();
//    $slug = $obj->pluginSlug;
//    wp_nonce_field( $slug, $slug . '_nonce' );
//
//echo abcfl_html_tag_end('div');

