<?php
function abcfrggcl_mbox_gallery_shortcode() {

    echo  abcfl_html_tag('div','','inside  hidden');

        echo abcfl_input_sec_title_hlp( ABCFRGGCL_ICONS_URL, abcfrggcl_txta(3), abcfrggcl_aurl(0) );

        $scode = abcfrggcl_scode_build_scode();
        echo abcfl_input_txt_readonly('scode', '', $scode, '','', '100%', 'regular-text code abcflFontW700', '', 'abcflFldCntr abcflShortcode');

        echo abcfl_input_hline('2', '30');
        echo abcfl_input_sec_title_hlp( ABCFRGGCL_ICONS_URL, abcfrggcl_txta(227), abcfrggcl_aurl(0) );

        //-------------------------------
        echo abcfl_input_sec_title( '1. ' . abcfrggcl_txta(246), 'abcflFontWPHdr abcflFontS13 abcflFontW600 abcflMTop10' );
        echo abcfl_input_sec_title( '2. ' . abcfrggcl_txta(247), 'abcflFontWPHdr abcflFontS13 abcflFontW600 abcflMTop10' );
        echo abcfl_input_sec_title( '3. ' . abcfrggcl_txta(248), 'abcflFontWPHdr abcflFontS13 abcflFontW600 abcflMTop10' );
        echo abcfl_input_sec_title( '4. ' . abcfrggcl_txta(249), 'abcflFontWPHdr abcflFontS13 abcflFontW600 abcflMTop10' );
    echo abcfl_html_tag_end('div');
}
