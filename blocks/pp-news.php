<?php

/*$blocks['ppnews'] = array(
    'func_display' => 'blocks_ppnews_block',
    'text_type' => 'PP-News',
    'text_type_long' => "PP-News",
    'allow_multiple' => false,
    'form_content' => false,
    'form_refresh' => false,
    'show_preview' => false
);*/
function blocks_ppnews_block($row)
{
    global $xoopsConfig;

    //{

    $boxstuff = '<center>';

    $boxstuff .= '' . _WEPPLETTER . '';

    $boxstuff .= '<form method="POST" action="' . XOOPS_URL . '/modules/PP-News/index.php">';

    $boxstuff .= '' . _PPMAIL . '<br><input type="text" name="mail_user" size="18">';

    $boxstuff .= '<br>' . _FORMAT . '&nbsp;';

    $boxstuff .= '<select size="1" name="format_mail">';

    $boxstuff .= '<option value="html">HTML</option>';

    $boxstuff .= '<option value="txt">TXT</option>';

    $boxstuff .= '</select>';

    $boxstuff .= '<br>';

    $boxstuff .= '<input type="HIDDEN" name="choix" value="ok">';

    $boxstuff .= '<input type="HIDDEN" name="rapide" value="1">';

    $boxstuff .= '<input type="submit" value=' . _ISCRIZ . '>';

    $boxstuff .= '<br><a href="' . XOOPS_URL . '/modules/PP-News/index.php?choix=inscription_user">' . _INSCRIPTIONAVANCE2 . '</a></form>';

    $boxstuff .= '</center>';

    $block = [];

    $block['title'] = _PPLETTER;

    $block['content'] = $boxstuff;

    //}

    return $block;
}
