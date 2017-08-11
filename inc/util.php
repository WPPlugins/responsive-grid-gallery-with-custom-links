<?php
//Return class name or empty string. Useg for cbos Class: None, Custom or Selected.
function abcfrggcl_util_cls_name_nc_bldr( $optnValue, $clsBaseName, $clsPfix, $default='' ){

    if( $optnValue == 'N' || $optnValue == 'C'|| $optnValue == 'D' ){ return ''; }
    if( empty( $optnValue ) ) { $optnValue = $default; }
    if( empty( $optnValue) ) { return ''; }
    return $clsPfix . $clsBaseName . $optnValue;
}

function abcfrggcl_util_img_alt( $imgID ){

    $imgMeta = '';
    if($imgID > 0){ $imgMeta = get_post_meta($imgID, '_wp_attachment_image_alt', true); }

    return $imgMeta;
}

//Generic DIV container.
function abcfrggcl_util_generic_div( $clsPfix, $baseCls, $customCls, $customStyle, $divID, $vaAidCls='' ){

    $cntrCls = abcfrggcl_util_class_bldr( $clsPfix, $baseCls, $customCls, $vaAidCls  );

    $div['cntrS'] = abcfl_html_tag( 'div', $divID, $cntrCls, $customStyle );
    $div['cntrE'] = abcfl_html_tag_end( 'div');

    return $div;
}

//Returns classes
function abcfrggcl_util_class_bldr( $clsPfix, $baseCls, $customCls, $vaAidCls ){

    $cntrBaseCls = '';
    if( !empty( $baseCls ) ){ $cntrBaseCls = $clsPfix . $baseCls; }
    if( !empty( $vaAidCls ) ){ $vaAidCls = ' ' . $clsPfix . $vaAidCls; }

    return  trim( $cntrBaseCls . ' ' . $customCls . $vaAidCls );
}

function abcfrggcl_util_img_wh( $imgID, $imgUrl ){

    $filename = basename($imgUrl);
    $meta = '';
    $imgWH['w'] = 0;
    $imgWH['h'] = 0;
    $imgWH['ok'] = false;

    if($imgID > 0){ $meta = get_post_meta($imgID, '_wp_attachment_metadata'); }
    if(empty( $meta )) { return $imgWH; }

    $metaArray = isset( $meta ) ?  $meta[0] : '';
    if(empty($metaArray)) { return $imgWH; }

    //Check original image (stored in different part of the array than other sizes. return sizes if image is an original
    $imgWH = abcfrggcl_util_large_img_wh( $metaArray, $filename );
    if($imgWH['ok']){ return $imgWH; }

    //Check if array has 'sizes' array
    if(!array_key_exists('sizes', $metaArray)) { return $imgWH; }

    $sizes = $metaArray['sizes'];

//echo"<pre>", print_r($large), "</pre>";  die;
    $defaults = array( 'file' => '', 'width' => '0', 'height' => '0' );
    foreach ( $sizes as $size ) {
        $sizeFixed = shortcode_atts( $defaults, $size );

        $sizeFile = $sizeFixed['file'];
        if($sizeFile == $filename){
            $imgWH['w'] = $sizeFixed['width'];
            $imgWH['h'] = $sizeFixed['height'];
            if($imgWH['w'] > 0 && $imgWH['h'] > 0) { $imgWH['ok'] = true; }
            break;
        }
    }
    return $imgWH;
}

function abcfrggcl_util_large_img_wh( $metaArray, $filename ){

    $imgWH['w'] = 0;
    $imgWH['h'] = 0;
    $imgWH['ok'] = false;

    $defaults = array( 'file' => '', 'width' => '0', 'height' => '0' );
    $meta = shortcode_atts( $defaults, $metaArray );

    //File can have folders prefixes: 2015/12/image.jpg
    $large =  basename($meta['file']);

    if( $large == $filename){
        $imgWH['w'] = $meta['width'];
        $imgWH['h'] = $meta['height'];
        if($imgWH['w'] > 0 && $imgWH['h'] > 0) { $imgWH['OK'] = true; }
    }
    return $imgWH;
}

function abcfrggcl_util_center_cls( $centerYN, $clsPfix ){
    $out = '';
    if( $centerYN == 'Y' ) { $out = ' ' . $clsPfix . 'MLRAuto'; }
    return $out;
}

//-- URL START --------------------------------------------
function abcfrggcl_util_img_lnk_href( $imgLnk ){

    $href['target'] = '';
    $href['hrefUrl'] = $imgLnk;

    $targetNT = substr($imgLnk, 0, 2);

    if( $targetNT == 'NT' ) {
        $imgLnk = trim( substr( $imgLnk, 2 ) );
        $href['target'] = '_blank';
        $href['hrefUrl'] = $imgLnk;
    }

    return $href;
}
//-- URL END --------------------------------------------