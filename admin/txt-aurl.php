<?php
function abcfrggcl_aurl( $id ) {

    switch ($id){
        case 0:
            $out = '';
            break;
        case 1:
            $out = 'http://abcfolio.com/wordpress-plugin-responsive-grid-gallery-with-custom-links/';
            break;
        case 2:
            $out = 'http://abcfolio.com/responsive-grid-gallery-with-custom-links-customization/';
            break;
        case 3:
            $out = 'http://abcfolio.com/responsive-grid-gallery-with-custom-links-field-labels/';
            break;
        case 4:
            $out = 'http://abcfolio.com/responsive-grid-gallery-with-custom-links-get-plugin/';
            break;
        case 5:
            $out = '';
            break;
        case 6:
            $out = '';
            break;
        default:
            $out = '';
            break;
    }
    return $out;
}

function abcfrggcl_aurl_tab_help( ) {

    $getParams = abcfsl_admin_tabs_defaults( '' );
    $basePg = 'admin.php?page=' . $getParams['page'];
    $hrefHelp =  $basePg . '&amp;tab=' . 'tabHelp';
    return $hrefHelp;
}

