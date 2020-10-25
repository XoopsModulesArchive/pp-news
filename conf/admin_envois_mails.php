<?php

######################################################################
# PP-News v 1.5 Beta                                 15th January 2002 #
# Mailinglist and News for Postnuke                                    #
# PostNuke Conversion by:                                              #
#                          Massimiliano Tiraboschi                     #
#                                                                      #
#           webmaster@postnukeit - www.postnuke.it                     #
#           Italian Support for Postnuke and Open-Source               #
#                                                                      #
######################################################################
# Modified version of: 1.5 Beta
######################################################################
# PP-News Newsletter                                                   #
# Copyright : (C) 2000, 2001 www.postnuke.it & www.presencenet.net     #
# WWW       : http://www.postnuke.it - http://www.presencenet.net      #
######################################################################
# Adaptation to PostNuke Rogue Falco171 || http://www.falco171.net     #
######################################################################
# Adaptation to xoops RC2 : Gilles Plume || muple@wanadoo.fr                   #
#######################################################################
# License #
######################################################################
# This program is free software; you can redistribute it and/or modify #
# it under the terms of the GNU General Public License as published by #
# the Free Software Foundation; either version 2 of the License, or    #
# (at your option) any later version.                                  #
#                                                                      #
# This program is distributed in the hope that it will be useful,      #
# but WITHOUT ANY WARRANTY; without even the implied warranty of       #
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        #
# GNU General Public License for more details.                         #
#                                                                      #
# You should have received a copy of the GNU General Public License    #
# along with this program; if not, write to the Free Software          #
# Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.            #
# Or just download it http://fsf.org/                                  #
######################################################################

$lig = "------------------------------------------------\n";

// latest polls
function nb_js($n_js)
{
    global $xoopsConfig, $xoopsDB, $format_mail, $lig, $bgcolor2, $bgcolor1, $textcolor1, $textcolor2, $prefix;

    if ($n_js > 1) {
        $s_js = 's';
    } else {
        $s_js = '';
    }

    if (0 == $n_js) {
        $textbody2 = '<center><br><br>' . _AUCUN . ' ' . _DERNIERSS . '</center><br><br>';

        $textbody2_txt = "\r\n\r\n" . _AUCUN . ' ' . _DERNIERSS . " \r\n\r\n";
    } else {
        $textbody2 .= "<table width='100%'><tr><td colspan='2'><p align='center'><b><font size='2'>" . _LES . $n_js . ' ' . _DERNIERSS . "</font></b></td></tr><tr>\n";

        $textbody2 .= "<td NOWRAP><font size='2' color='$textcolor1'><b>" . _NUMTITRE . "</b></font></td>\n";

        $textbody2 .= "<td align='center' NOWRAP><font size='2' color='$textcolor1'><b>" . _VOTES . "</b></font></td>\n";

        $textbody2 .= "</tr>\n";

        $textbody2_txt .= _LES . _DERNIERSS . ":\r\n" . $lig;

        $resultw2 = $xoopsDB->query('SELECT poll_id, question, start_time, votes FROM ' . $xoopsDB->prefix('xoopspoll_desc') . ' ORDER BY start_time desc', $n_js, 0);

        $p = 1;

        while (list($id, $title, $time, $hits) = $xoopsDB->fetchRow($resultw2)) {
            $couleur = ($p % 2) ? $coll = (string)$bgcolor1 : $coll = (string)$bgcolor2;

            $textbody2 .= "<tr bgcolor='"
                              . $coll
                              . "'><td NOWRAP><font size='2'>"
                              . $p
                              . " - <a style='color:"
                              . $textcolor2
                              . "' href=\""
                              . XOOPS_URL
                              . '/modules/xoopspoll/pollresults.php?poll_id='
                              . $id
                              . '">'
                              . $title
                              . "</a></font></td><td align='center' NOWRAP><font size='2' color='$textcolor1'>"
                              . $hits
                              . "</font></td>\n</tr>\n";

            $textbody2_txt .= $title . ' - ' . _VOTES . ': ' . $hits . "\r\n";

            $textbody2_txt .= '  (' . _PPNEWS_URL . XOOPS_URL . '/modules/xoopspoll/pollresults.php?poll_id=' . $id . " )\r\n\r\n";

            $p++;
        }

        $textbody2 .= "<tr><td align='center' bgcolor='$bgcolor2' colspan='2'><font size='1'>- <a style='color:" . $textcolor2 . "' href=\"" . XOOPS_URL . '/modules/xoopspoll/index.php">' . _TOUSLESSONDAGE . "</a></font></td></tr>\n";

        $textbody2 .= '</table><br><br>';

        $textbody2_txt .= "\r\n\r\n";
    }

    if ('txt' == $format_mail) {
        return $textbody2_txt;
    }

    return $textbody2;
}

// latest downloads
function nb_php($n_php)
{
    global $mytree, $xoopsConfig, $xoopsDB, $format_mail, $bgcolor2, $bgcolor1, $textcolor1, $textcolor2, $lig, $prefix;

    if ($n_php > 1) {
        $s_php = 's';
    } else {
        $s_php = '';
    }

    if (0 == $n_php) {
        $textbody3 = '<center><br><br>' . _AUCUN . ' ' . _DERNIERTT . '</center><br><br>';

        $textbody3_txt = "\r\n\r\n" . _AUCUN . ' ' . _DERNIERTT . " \r\n\r\n";
    } else {
        $textbody3 .= "<table width='100%'><tr><td colspan='3'><p align='center'><b><font size='2'>" . _LES . $n_php . ' ' . _DERNIERTT . "</font></b></td></tr><tr bgcolor='" . $coll . "'>\n";

        $textbody3 .= "<td NOWRAP><font size='2' color='$textcolor1'><b>" . _NUMTITRE . "</b></font></td>\n";

        $textbody3 .= "<td NOWRAP align='right'><font size='2' color='$textcolor1'><b>" . _DATEAJOUT . "</b></font></td>\n";

        $textbody3 .= "<td align='center' NOWRAP><font size='2' color='$textcolor1'><b>" . _HITS . "</b></font></td>\n";

        $textbody3 .= "</tr>\n";

        $textbody3_txt .= _LES . _DERNIERTT . ":\r\n" . $lig;

        $resultw1 = $xoopsDB->query(
            'SELECT d.lid, d.cid, d.title, d.url, d.homepage, d.version, d.size, d.platform, d.logourl, d.status, d.date, d.hits, d.rating, d.votes, d.comments, t.description FROM '
            . $xoopsDB->prefix('mydownloads_downloads')
            . ' d, '
            . $xoopsDB->prefix('mydownloads_text')
            . ' t WHERE d.status>0 AND d.lid=t.lid ORDER BY date DESC',
            $n_php,
            0
        );

        $a = 1;

        //while(list($lid, $cid, $sid, $title, $description, $time, $hits)=$xoopsDB->fetchRow($resultw1)) {

        while (list($lid, $cid, $dtitle, $url, $homepage, $version, $size, $platform, $logourl, $status, $time, $hits, $rating, $votes, $comments, $description) = $xoopsDB->fetchRow($resultw1)) {
            $datetime = formatTimestamp($time, 's');

            $couleur = ($a % 2) ? $coll = (string)$bgcolor1 : $coll = (string)$bgcolor2;

            $textbody3 .= "<tr bgcolor='"
                              . $coll
                              . "'><td NOWRAP><font size='2'>"
                              . $a
                              . " - <a style='color:"
                              . $textcolor2
                              . "' href=\""
                              . XOOPS_URL
                              . '/modules/mydownloads/singlefile.php?lid='
                              . $lid
                              . '">'
                              . $dtitle
                              . "</a></font></td><td NOWRAP align='right'><font size='2' color='$textcolor1'>"
                              . $datetime
                              . "</font></td><td align='center' NOWRAP><font size='2' color='$textcolor1'>"
                              . $hits
                              . "</font></td>\n</tr>\n";

            $textbody3_txt .= $datetime . ' - ' . $title . ' - ' . _HITS . ': ' . $hits . "\r\n";

            $textbody3_txt .= '  (' . _PPNEWS_URL . XOOPS_URL . '/modules/mydownloads/singlefile.php?lid=' . $lid . " )\r\n\r\n";

            $a++;
        }

        $textbody3 .= "<tr><td align='center' bgcolor='$bgcolor2' colspan='3'><font size='1'>- <a style='color:" . $textcolor2 . "' href=\"" . XOOPS_URL . '/modules/mydownloads/index.php">' . _TOUSTELECHARGEMENTS . "</a></font></td></tr>\n";

        $textbody3 .= '</table><br><br>';

        $textbody3_txt .= "\r\n\r\n";
    }

    if ('txt' == $format_mail) {
        return $textbody3_txt;
    }

    return $textbody3;
}

// generate links
function nb_lien($n_lien)
{
    global $xoopsDB, $xoopsConfig, $format_mail, $bgcolor2, $bgcolor1, $textcolor1, $textcolor2, $lig, $prefix;

    if ($n_lien > 1) {
        $s_lien = 's';
    } else {
        $s_lien = '';
    }

    if (0 == $n_lien) {
        $textbody4 = '<center><br><br>' . _AUCUN . ' ' . _DERNIERLL . '</center><br><br>';

        $textbody4_txt = "\r\n\r\n" . _AUCUN . ' ' . _DERNIERLL . " \r\n\r\n";
    } else {
        $textbody4 = "<table width='100%'><tr><td colspan='3'><p align='center'><b><font size='2'>" . _LES . $n_lien . ' ' . _DERNIERLL . " </font></b></td></tr><tr>\n";

        $textbody4 .= "<td NOWRAP><font size='2' color='$textcolor1'><b>" . _NUMTITRE . "</b></font></td>\n";

        $textbody4 .= "<td NOWRAP align='right'><font size='2' color='$textcolor1'><b>" . _DATEAJOUT . "</b></font></td>\n";

        $textbody4 .= "<td align='center' NOWRAP><font size='2' color='$textcolor1'><b>" . _HITS . "</b></font></td>\n";

        $textbody4 .= "</tr>\n";

        $textbody4_txt = _LES . _DERNIERLL . ":\r\n" . $lig;

        $resultw = $xoopsDB->query('SELECT lid, cid, title, date, hits FROM ' . $xoopsDB->prefix('mylinks_links') . ' WHERE status>0 ORDER BY lid desc', $n_lien, 0);

        $t = 1;

        while (list($lid, $cat_id, $title, $time, $hits) = $xoopsDB->fetchRow($resultw)) {
            $datetime = formatTimestamp($time, 's');

            $couleur = ($t % 2) ? $coll = (string)$bgcolor1 : $coll = (string)$bgcolor2;

            $textbody4 .= "<tr bgcolor='"
                              . $coll
                              . "'><td NOWRAP><font size='2'>"
                              . $t
                              . " - <a style='color:"
                              . $textcolor2
                              . "' href='"
                              . XOOPS_URL
                              . '/modules/mylinks/singlelink.php?lid='
                              . $lid
                              . "'>"
                              . $title
                              . "</a></font></td><td NOWRAP align='right'><font size='2' color='$textcolor1'>"
                              . $datetime
                              . "</font></td><td align='center' NOWRAP><font size='2' color='$textcolor1'>"
                              . $hits
                              . "</font></td>\n</tr>\n";

            $textbody4_txt .= $datetime . ' - ' . $title . ' - ' . _HITS . ': ' . $hits . "\n";

            $textbody4_txt .= '  (' . _PPNEWS_URL . XOOPS_URL . '/modules/mylinks/singlelink.php?lid=' . $lid . " )\r\n\r\n";

            $t++;
        }

        $textbody4 .= "<tr><td align='center' bgcolor='$bgcolor2' colspan='3'><font size='1'>- <a style='color:" . $textcolor2 . "' href='" . XOOPS_URL . "/modules/mylinks/index.php'>" . _TOUSLESLIENS . "</a></font></td></tr>\n";

        $textbody4 .= '</table><br><br>';

        $textbody4_txt .= "\r\n\r\n";
    }

    if ('txt' == $format_mail) {
        return $textbody4_txt;
    }

    return $textbody4;
}

// latest articles
function nb_new($n_new)
{
    global $xoopsConfig, $xoopsDB, $format_mail, $bgcolor2, $bgcolor1, $textcolor1, $textcolor2, $lig;

    $myts = MyTextSanitizer::getInstance();

    if ($n_new > 1) {
        $s_new = '' . _LES1 . '';
    } else {
        $s_new = '' . _LES2 . '';
    }

    if (0 == $n_new) {
        $textbody5 = '<center><br><br>' . _AUCUN . ' ' . _DERNIERAA . '</center><br><br>';

        $textbody5_txt = "\r\n\r\n" . _AUCUN . ' ' . _DERNIERAA . "\r\n\r\n";
    } else {
        $textbody5 .= "<table width='100%'>\n";

        $textbody5 .= "<tr>\n";

        $textbody5 .= "<td colspan='2' NOWRAP><p align='center'><b><font size='2'>" . _LES . $n_new . ' ' . _DERNIERAA . " </font></b></td>\n";

        $textbody5 .= "</tr>\n";

        $textbody5 .= "<tr>\n";

        $textbody5 .= "<td NOWRAP><font size='2' color='$textcolor1'><b>" . _SUJET . "</b></font></td>\n";

        $textbody5 .= "<td NOWRAP><font size='2' color='$textcolor1'><b>" . _TITRE . "</b></font></td>\n";

        $textbody5 .= "</tr>\n";

        $textbody5_txt = _LES . _DERNIERAA . ":\r\n" . $lig;

        $querytxt1 = 'SELECT storyid, topicid, uid, title, topicid from ' . $xoopsDB->prefix('stories') . ' ORDER BY published DESC';

        $result22 = $xoopsDB->queryF($querytxt1, $n_new, 0);

        $numnews = $xoopsDB->getRowsNum($result22);

        for ($i = 0; $i < $numnews; $i++) {
            $couleur = ($i % 2) ? $coll = (string)$bgcolor2 : $coll = (string)$bgcolor1;

            [$nsid, $catid, $naid, $ntitle, $ntopic] = $GLOBALS['xoopsDB']->fetchBoth($result22);

            $ntitle = $myts->displayTarea($ntitle);

            $result31 = $xoopsDB->queryF('SELECT topic_title from ' . $xoopsDB->prefix('topics') . " where topic_id='$ntopic'");

            [$ntopictext] = $GLOBALS['xoopsDB']->fetchBoth($result31);

            $textbody5 .= "<tr bgcolor='" . $coll . "'>\n";

            $textbody5 .= "<td NOWRAP><font size='2'><a style='color:" . $textcolor2 . "' href=\"" . XOOPS_URL . '/modules/news/index.php?storytopic=' . $ntopic . '">' . $ntopictext . "</a></font></td>\n";

            $textbody5 .= "<td NOWRAP><font size='2'><a style='color:" . $textcolor2 . "' href=\"" . XOOPS_URL . '/modules/news/article.php?storyid=' . $nsid . '">' . $ntitle . "</a></font></td>\n";

            $textbody5 .= "</tr>\r\n";

            $textbody5_txt .= _SUJET . $ntopictext . "\r\n";

            $textbody5_txt .= _TITRE . $ntitle . ' (' . _PPNEWS_URL . ' ' . XOOPS_URL . '/modules/news/article.php?storyid=' . $nsid . " )\r\n\r\n";
        }

        $textbody5 .= '</table><br><br>';
    }

    $textbody5_txt .= "\r\n";

    if ('txt' == $format_mail) {
        return $textbody5_txt;
    }

    return $textbody5;
}

function header_mail($format_mail)
{
    global $mail_admin;

    if ('txt' == $format_mail) {
        $headers = "From: $mail_admin\n";
    } else {
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        $headers .= "From: $mail_admin\n";

        $headers .= "X-Sender: <$mail_admin>";

        $headers .= "X-Mailer: PHP\n"; // mailer

        $headers .= "Return-Path: <$mail_admin>\n";
    }

    return ($headers);
}

function intro_mail($n_js, $n_php, $n_lien, $n_new)
{
    global $xoopsConfig, $format_mail, $sitename, $msg_haut, $active_js, $active_php, $active_lien, $active_new;

    if ($n_js > 1) {
        $s_js = 's';
    } else {
        $s_js = '';
    }

    if ($n_php > 1) {
        $s_php = 's';
    } else {
        $s_php = '';
    }

    if ($n_lien > 1) {
        $s_lien = 's';
    } else {
        $s_lien = '';
    }

    if ($n_new > 1) {
        $s_new = 's';
    } else {
        $s_new = '';
    }

    $textbody0 .= _LALETTREDINFOS . $xoopsConfig['sitename'] . _TRANSLE . date_inscription(date('Ymd')) . "<br><br>\n\n";

    $textbody0 .= nl2br(stripslashes(htmlspecialchars($msg_haut, ENT_QUOTES | ENT_HTML5))) . "<br><br>\n\n";

    /* not necessary
    $textbody0 .= "<font size='2'><b>"._RETROUVEZAUSSI."</b><br>\n";

    if($active_js == 0){
    $textbody0 .= _LES.$n_js." "._DERNIERSS."<br>\n";
    }
    if($active_php == 0){
    $textbody0 .= _LES.$n_php." "._DERNIERTT."<br>\n";
    }
    if($active_lien == 0){
    $textbody0 .= _LES.$n_lien." "._DERNIERLL."<br>\n";
    }
    if($active_new == 0){
    $textbody0 .= _LES.$n_new." "._DERNIERAA."<br>\n";
    }
    */

    $textbody0_txt = _LALETTREDINFOS . $xoopsConfig['sitename'] . "\n" . date_inscription(date('Ymd')) . "\n\n";

    $textbody0_txt .= stripslashes(htmlspecialchars($msg_haut, ENT_QUOTES | ENT_HTML5)) . "\n\n";

    /* not necessary
    $textbody0_txt .= _RETROUVEZAUSSI0."\n";
    $textbody0_txt .= "======================================\n";

    if($active_js == 0){
    $textbody0_txt .= _LES.$n_js." "._DERNIERSS.".\n";
    }
    if($active_php == 0){
    $textbody0_txt .= _LES.$n_php." "._DERNIERTT."\n";
    }
    if($active_lien == 0){
    $textbody0_txt .= _LES.$n_lien." "._DERNIERLL."\n";
    }
    if($active_new == 0){
    $textbody0_txt .= _LES.$n_new." "._DERNIERAA."\n\n";
    }
    */

    if ('txt' == $format_mail) {
        return ($textbody0_txt);
    }

    return ($textbody0);
}

function fin_mail($id_users)
{
    global $xoopsDB, $xoopsConfig, $format_mail, $nukeurl, $ModName, $msg_bas, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new;

    global $lig;

    $textbody01 .= "<font size='2'>";

    $textbody01 .= nl2br(stripslashes(htmlspecialchars($msg_bas, ENT_QUOTES | ENT_HTML5))) . '<br><br>';

    $textbody01_txt .= stripslashes(htmlspecialchars($msg_bas, ENT_QUOTES | ENT_HTML5)) . "\r\n\r\n";

    if ('Admin' == $id_users) {
        $nom_user = _ADMIN;

        $mail_user = $mail_admin;

        $passe_user = _DEFINIPARUSER;

        $format = $defaut_mail . ' [' . _VALEURPARDEFAUT . ']';

        $nb_js = $defaut_js . ' [' . _VALEURPARDEFAUT . ']';

        $nb_php = $defaut_php . ' [' . _VALEURPARDEFAUT . ']';

        $nb_lien = $defaut_lien . ' [' . _VALEURPARDEFAUT . ']';

        $nb_new = $defaut_new . ' [' . _VALEURPARDEFAUT . ']';

        $date_in = date('Ymd');
    } else {
        $resultats = $xoopsDB->query('select * from ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='$id_users'");

        [, $nom_user, $mail_user, $passe_user, $format, $nb_js, $nb_php, $nb_lien, $nb_new, $date_in] = $xoopsDB->fetchRow($resultats);
    }

    $textbody01 .= "<font face=\"courier\">\n";

    $textbody01 .= '--------------------------------------------------------------------------<br><br>' . _INFOVOUSCONSENRANT . "<br><br>\n";

    $textbody01 .= _DATEINSCRIPTION . ' ' . date_inscription($date_in) . "<br>\n";

    $textbody01 .= _VOTRENOM . ' ' . $nom_user . "<br>\n";

    $textbody01 .= _VOTREMAIL . ' ' . $mail_user . "<br>\n";

    $textbody01 .= _VOTREPASS . " -<br>\n";

    $textbody01 .= _CHOIXFORMAT . ' ' . $format . "<br>---<br>\n";

    if (0 == $active_new) {
        $textbody01 .= _DERNIERAA . ' ' . $nb_new . "<br>\n";
    }

    if (0 == $active_lien) {
        $textbody01 .= _DERNIERLL . ' ' . $nb_lien . "<br>\n";
    }

    if (0 == $active_php) {
        $textbody01 .= _DERNIERTT . ' ' . $nb_php . "<br>\n";
    }

    if (0 == $active_js) {
        $textbody01 .= _DERNIERSS . ' ' . $nb_js . "<br>\n";
    }

    $textbody01 .= '<br>--------------------------------------------------------------------------<br>';

    $textbody01 .= stripslashes(base64_decode($signature, true));

    "\n";

    $textbody01 .= '<br>--------------------------------------------------------------------------<br><i>' . _VOUSPOUVEZMODIFIER . '</i><br>';

    $textbody01 .= '<b><a  href="' . XOOPS_URL . '/modules/PP-News/modifier.php">' . _POURCELARDV . "</a></b></font><br>--------------------------------------------------------------------------\n";

    $textbody01_txt .= _INFOVOUSCONSENRANT . "\r\n" . $lig;

    $textbody01_txt .= infos_user($nom_user, '-', $mail_user, $format_mail, $nb_js, $nb_php, $nb_lien, $nb_new, $date_in);

    if ('txt' == $format_mail) {
        return $textbody01_txt;
    }

    return $textbody01;
}

function forme_env_msg()
{
    global $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new, $active_js, $active_php, $active_lien, $active_new, $msg_haut, $msg_bas;

    $de = "<font size='2' color='red'>" . _FONCTIONDEACTIVER . '</font>';

    if (1 == $active_js) {
        $defaut_js = $de;
    }

    if (1 == $active_php) {
        $defaut_php = $de;
    }

    if (1 == $active_lien) {
        $defaut_lien = $de;
    }

    if (1 == $active_new) {
        $defaut_new = $de;
    }

    echo "<table align='center' border='0' width='450' cellspacing='0' cellpadding='2'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even'><p align='center'><b><font size='2'><i>"
         . _ENVOYERMAILING
         . "</i></font></b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'><center>\n"
         . "<table border='0' width='100%' height='78' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' height='19' bgcolor='$bgcolor1'><p align='center'><b><font size='2'>"
         . _VALEURPARDEFAUT
         . "</font></b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='47'>\n"
         . "<table border='0' width='100%' height='100%' cellspacing='0'>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP><font size='2'>"
         . _CHOIXFORMAT
         . "</font></td>\n"
         . "<td width='50%'>&nbsp;<font size='2'><b>"
         . $defaut_mail
         . "</b></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP><font size='2'>"
         . _DERNIERSS
         . "</font></td>\n"
         . "<td width='50%' >&nbsp;<font size='2'><b>"
         . $defaut_js
         . "</b></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP><font size='2'>"
         . _DERNIERTT
         . "</font></td>\n"
         . "<td width='50%'>&nbsp;<font size='2'><b>"
         . $defaut_php
         . "</b></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP><font size='2'>"
         . _DERNIERLL
         . "</font></td>\n"
         . "<td width='50%'>&nbsp;<font size='2'><b>"
         . $defaut_lien
         . "</b></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP><font size='2'>"
         . _DERNIERAA
         . "</font></td>\n"
         . "<td width='50%'>&nbsp;<font size='2'><b>"
         . $defaut_new
         . "</b></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<td width='100%' colspan='2' align='center'><font size='2'>\n"
         . "<input type='submit' value='"
         . _MODIFIERDEFAUT
         . "'>\n"
         . "<input type='HIDDEN' name='choix' value='defaut'>\n"
         . "</font></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='241'>\n"
         . "<center>\n"
         . "<table border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3' height='344' width='100%'>\n"
         . "<tr>\n"
         . "<td width='100%'class='even'><p align='center'><b><font size='2'>"
         . _ECRIRELALETTRE
         . "</font></b></p>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' cellspacing='0' cellpadding='2'>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'><font size='1'>"
         . _MSGPRINCIPAL
         . "<br>\n"
         . "<textarea rows='10' name='msg_haut' cols='40'>"
         . stripslashes(htmlspecialchars($msg_haut, ENT_QUOTES | ENT_HTML5))
         . "</textarea><br><br>\n"
         . "-------------------------------------------------------------</font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'><font size='1'>"
         . _MSGSECONDAIRE
         . "<br>\n"
         . "<textarea rows='7' name='msg_bas' cols='25'>"
         . stripslashes(htmlspecialchars($msg_bas, ENT_QUOTES | ENT_HTML5))
         . "</textarea><br><br>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'><input type='submit' value="
         . _ENVOYER
         . " name='lettre'> <input type='submit' value="
         . _VISUALISER
         . " name='lettre'> <input type='submit' value="
         . _RECEVOIR
         . " name='lettre'> <input type='reset' value="
         . _RETABLIR
         . "></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";
}

function env_mail($id_users, $nom_user, $mail_user, $passe_user, $format_mail, $n_js, $n_php, $n_lien, $n_new, $date_in)
{
    global $xoopsDB, $xoopsConfig, $active_js, $active_php, $active_lien, $active_new, $sitename;

    $subject = '' . _PPNEWSDA . '' . $xoopsConfig['sitename'];

    $msg_mail = intro_mail($n_js, $n_php, $n_lien, $n_new);

    $msg_mail .= nb_new($n_new);

    $msg_mail .= nb_lien($n_lien);

    $msg_mail .= nb_php($n_php);

    $msg_mail .= nb_js($n_js);

    $msg_mail .= fin_mail($id_users);

    if (false === @mail($mail_user, $subject, $msg_mail, header_mail($format_mail))) {
        die('' . _ERRMAIL1 . '');
    }

    $xoopsDB->queryF('UPDATE ' . $xoopsDB->prefix('pp_newsletter') . " SET recu=recu+1 WHERE id_user='" . $id_users . "'");

    return ($msg_mail);
}

function arch_mail($format_archive, $defaut_js, $defaut_php, $defaut_lien, $defaut_new)
{
    global $xoopsConfig, $ModName, $format_mail, $active_js, $active_php, $active_lien, $active_new, $defaut_js, $defaut_js, $defaut_lien, $defaut_new;

    $format_mail = $format_archive;

    $msg_mail_arch = intro_mail($defaut_js, $defaut_js, $defaut_lien, $defaut_new);

    $msg_mail_arch .= nb_new($defaut_new);

    $msg_mail_arch .= nb_lien($defaut_lien);

    $msg_mail_arch .= nb_php($defaut_php);

    $msg_mail_arch .= nb_js($defaut_js);

    $msg_mail_arch .= fin_mail('Admin');

    $path = XOOPS_ROOT_PATH . '/modules/PP-News/archives/';

    if (!is_dir($path)) {
        if (!mkdir($path, 766)) {
            return ('' . _ERRMAIL2 . " $path " . _ERRMAIL2 . '');
        }
    }

    if (!is_writable($path)) {
        if (!chmod($path, 0766)) {
            return ('' . _ERRMAIL2 . " $path " . _ERRMAIL2 . '');
        }
    }

    $fichi = fopen($path . date('Ymd') . '.htm', 'ab');

    fwrite($fichi, base64_encode($msg_mail_arch) . "\n");

    fclose($fichi);

    $erreur = 0;

    return ($erreur);
}

function voir_mail($defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new)
{
    global $ModName, $format_mail, $active_js, $active_php, $active_lien, $active_new, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new;

    $format_mail = $defaut_mail;

    $msg_mail_voir = intro_mail($defaut_js, $defaut_php, $defaut_lien, $defaut_new);

    $msg_mail_voir .= nb_new($defaut_new);

    $msg_mail_voir .= nb_lien($defaut_lien);

    $msg_mail_voir .= nb_php($defaut_php);

    $msg_mail_voir .= nb_js($defaut_js);

    $msg_mail_voir .= fin_mail('Admin');

    echo $msg_mail_voir . "\n";
}

switch ($lettre) {
    case '' . _ENVOYER . '':
        $resultas = $xoopsDB->query('select * from ' . $xoopsDB->prefix('pp_newsletter') . '');
        $yz = 0;
        while (list($id_users, $nom_user, $mail_user, $passe_user, $format_mail, $n_js, $n_php, $n_lien, $n_new, $date_in, $recu) = $xoopsDB->fetchRow($resultas)) {
            env_mail($id_users, $nom_user, $mail_user, $passe_user, $format_mail, $n_js, $n_php, $n_lien, $n_new, $date_in, $recu);

            $yz++;
        }
        for ($i = 0; $i < 2; $i++) {
            if (0 == $i) {
                $format_archive = 'html';
            } else {
                $format_archive = 'txt';
            }

            $erreur = arch_mail($format_archive, $defaut_js, $defaut_php, $defaut_lien, $defaut_new);
        }
        if ($erreur) {
            print("<FONT COLOR=#FF0000>\nErreur : $erreur, aucune archive n'a &eacute;t&eacute; cr&eacute;e</FONT>");
        }
        echo "<center><font size='2'>" . _NLENVOYERA . ' <B>' . $yz . '</B> ' . _MEMBRE . "</font></center>\n";
        break;
    case '' . _VISUALISER . '':
        voir_mail($defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new);
        forme_env_msg();
        break;
    case '' . _RECEVOIR . '':
        $id_users = '' . _ADMINISTRATION . '';
        $nom_user = '' . __INVADM . '';
        $mail_user = $mail_admin;
        $passe_user = 'ADMIN';
        $format_mail = $defaut_mail;
        $n_js = $defaut_js;
        $n_php = $defaut_php;
        $n_lien = $defaut_lien;
        $n_new = $defaut_new;
        $date_in = date('Ymd');
        env_mail($id_users, $nom_user, $mail_user, $passe_user, $format_mail, $n_js, $n_php, $n_lien, $n_new, $date_in);
        echo "<center><font size='2'>" . _NLENVOYERA . ' <B>' . $mail_admin . '</B> ' . _POURCONTROLE . "</font></center><P>\n";
        forme_env_msg();
        break;
    default:
        forme_env_msg();
        break;
}
