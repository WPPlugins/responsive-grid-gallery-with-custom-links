<?php
/*
 * Content builders. Returns single text field or image. Container + content.
 */

//TEXT FIELD BUILDER. Renders single text field, container + content.
function abcfrggcl_grid_items_txt_field( $itemOptns, $tplateOptns,  $F, $clsPfix ){

//echo"<pre>", print_r($itemOptns['_showField_' . $F]), "</pre>";

    //Field container class.
    $tagCustomCls = isset( $tplateOptns['_tagCls_' . $F] ) ? esc_attr( $tplateOptns['_tagCls_' . $F][0] ) : '';
    //Top margin. Class name or empty string if Default or Custom selected.
    $tagMarginT = abcfrggcl_util_cls_name_nc_bldr( isset( $tplateOptns['_tagMarginT_' . $F] ) ? esc_attr( $tplateOptns['_tagMarginT_' . $F][0] ) : 'N', 'MT', $clsPfix );
    //Font Size. Class name or empty string if Default or Custom selected.
    $tagFont = abcfrggcl_util_cls_name_nc_bldr( isset( $tplateOptns['_tagFont_' . $F] ) ? esc_attr( $tplateOptns['_tagFont_' . $F][0] ) : 'D', 'F', $clsPfix );
    $tagCls = ltrim ( $tagMarginT . ' ' . $tagFont . ' ' . $tagCustomCls );

    $par = array(
        'tagType' => isset( $tplateOptns['_tagType_' . $F] ) ? esc_attr( $tplateOptns['_tagType_' . $F][0] ) : 'div',
        'tagCls' => $tagCls,
        'tagStyle' => isset( $tplateOptns['_tagStyle_' . $F] ) ? esc_attr( $tplateOptns['_tagStyle_' . $F][0] ) : '',
        'lineTxt'  => isset( $itemOptns['_txt_' . $F] ) ? esc_attr( $itemOptns['_txt_' . $F][0] ) : '',
        'F' => $F,
        'clsPfix'  => $clsPfix
    );

    $out = abcfrggcl_grid_items_field_T( $par );
    return $out;
}

//== TEXT FIELDS START ===========================================================
//Text
function abcfrggcl_grid_items_field_T( $par ){

    $lineTxt = $par['lineTxt'];
    if(abcfl_html_isblank($lineTxt)) { return ''; }

    $cntrS = abcfl_html_tag( $par['tagType'], '', $par['tagCls'], $par['tagStyle'] );
    $cntrE = abcfl_html_tag_end( $par['tagType']);

    return $cntrS . $lineTxt . $cntrE;
}
//== TEXT FIELDS END ===========================================================

//IMAGE container.
function abcfrggcl_grid_items_image_cntr( $tplateOptns, $itemOptns, $clsPfix ){

    $imgUrl = isset( $itemOptns['_imgUrl'] ) ? esc_attr( $itemOptns['_imgUrl'][0] ) : '';
    if( empty($imgUrl) ){ return ''; }

    $imgCls = isset( $tplateOptns['_imgCls'] ) ? esc_attr( $tplateOptns['_imgCls'][0] ) : $clsPfix . 'ImgCenter';
    $imgStyle = isset( $tplateOptns['_imgStyle'] ) ? esc_attr( $tplateOptns['_imgStyle'][0] ) : '';

    //List img ID.
    $imgID = isset( $itemOptns['_imgID'] ) ? esc_attr( $itemOptns['_imgID'][0] ) : 0;
    $imgLnk = isset( $itemOptns['_imgLnk'] ) ? esc_attr( $itemOptns['_imgLnk'][0] ) : '';

    $href = abcfrggcl_util_img_lnk_href( $imgLnk );
    $alt = abcfrggcl_util_img_alt( $imgID );

    $div['cntrS'] = '';
    $div['cntrE'] = '';
    $div = abcfrggcl_util_generic_div( $clsPfix, 'GridImgCntr', '', '', '' );

    $imgTag = abcfl_html_img_tag('', $imgUrl, $alt, '', '', '', $imgCls, $imgStyle);
    $imgATag = abcfl_html_a_tag( $href['hrefUrl'], $imgTag, $href['target'],'', '', '', false);

    return $div['cntrS'] . $imgATag . $div['cntrE'];
}


