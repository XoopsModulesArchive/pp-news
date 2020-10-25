<?php

######################################################################
# PP-News v 1.5 Beta                                 15th January 2002  #
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
include 'header.php';
require XOOPS_ROOT_PATH . '/header.php';
require XOOPS_ROOT_PATH . '/modules/PP-News/conf/fonctions_lettre.php';

function test_format_mail($id_user)
{
    global $xoopsDB, $xoopsConfig, $xoopsUser, $format_user, $format, $id_mail, $id_user, $retour;

    $resulttest = $xoopsDB->query('select mail_user, passe_user, format_mail FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $id_user . "'");

    [$mail_us, $passe_us, $form_mail] = $xoopsDB->fetchRow($resulttest);

    OpenTable();

    echo '<center>'
         . "<table border='0' cellspacing='0' cellpadding='3'>"
         . '<tr>'
         . "<td width='100%' height='19' class='even' align='center'><b>"
         . _TESTERMAILFORMAT
         . '</B><br>'
         . _ADRESSEDESTINATION
         . ' [<i>'
         . $mail_us
         . '</i>]</td>'
         . '</tr>'
         . '<tr>'
         . "<td width='100%' height='286'>"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='15'>"
         . '<tr>'
         . "<td width='100%' align='center'>"
         . "<table border='0' cellspacing='0' cellpadding='2' bordercolor='#CCCCCC'>"
         . '<tr>'
         . "<td nowrap class='even' height='15'><p align='center'><i>"
         . _INFOS
         . '</i></td>'
         . '</tr>'
         . '<tr>'
         . "<td nowrap><div align='center'>"
         . _FORMATACTUEL
         . ' <b>.'
         . $form_mail
         . '</b></div>'
         . '  <ol>'
         . '    <li>'
         . _INFOMAIL1
         . '</li>'
         . '    <li>'
         . _INFOMAIL2
         . '</li>'
         . '    <li>'
         . _INFOMAIL3
         . '</li>'
         . '    <li>'
         . _INFOMAIL4
         . '</li>'
         . '    <li>'
         . _INFOMAIL5
         . '</li>'
         . '    <li>'
         . _INFOMAIL6
         . '</li>'
         . '  </ol>'
         . '</td>'
         . '</tr>'
         . '</table>'
         . '</center>'
         . '</td>'
         . '</tr>'
         . '<tr>'
         . "<td width='100%'>"
         . '<center>'
         . "<table border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3' class='even'>"
         . '<tr>'
         . "<td height='19' valign='middle' align='center'>"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>"
         . "     <input type='HIDDEN' name='file' value='test_mail'>"
         . "     <input type='HIDDEN' name='format' value='env_html'>"
         . "     <input type='HIDDEN' name='mail_user' value='"
         . $mail_us
         . "'>"
         . "     <input type='HIDDEN' name='id_user2' value='"
         . $id_user
         . "'>"
         . "<p align='center'><input type='submit' value='"
         . _RECEVOIRMAILHTML
         . "' style='background-color: #CCCCCC; color: #000080; font-size: 10 px; font-style: italic; border-style: solid; border-color: #FF0000'></p>"
         . '</td>'
         . '</form>'
         . '</tr>'
         . '</table>'
         . '</center>'
         . '<br>'
         . '<center>'
         . $retour
         . '</center>'
         . '</td>'
         . '</tr>'
         . '</table>'
         . '</td>'
         . '</tr>'
         . '</table>'
         . '</center>';

    CloseTable();
}

function env_mail_test($mail_user)
{
    global $signature, $mail_admin, $xoopsConfig, $xoopsDB, $xoopsModule;

    $subject = _SUJETTESTMAILHTML . $xoopsConfig['sitename'] . ']';

    $header = _PROGRAMMENL . $xoopsConfig['sitename'] . ' [Test HTML]<br>';

    $header .= _LE . date_inscription(date('Ymd')) . '<br>';

    $header .= $xoopsConfig['sitename'] . '<br>';

    $msg_html = '<center>'
                . "<table border='0' width='80%' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3'>"
                . '<tr>'
                . "<td width='100%' height='19' align='center' class='even'><b>"
                . _MESSAGEHTML
                . "</b></td>\n"
                . "</tr>\n"
                . "<tr>\n"
                . "<td width='100%' height='114'>\n"
                . _BONJOUR
                . $mail_user
                . '<br>'
                . _POUVEZLIRECORRECTEMENT
                . "<br>\n"
                . "<a href='"
                . XOOPS_URL
                . "/modules/PP-News/modifier.php'>"
                . _CLIQUEZICIRETOUR
                . "</a><p>\n"
                . stripslashes(nl2br(base64_decode($signature, true)))
                . "</td>\n"
                . "</tr>\n"
                . "</table>\n"
                . "</center>\n";

    $body = $header . "\n\n" . $msg_html . "\n";

    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

    $headers .= "From: $mail_admin\n";

    $headers .= "X-Sender: <$mail_admin>\n";

    $headers .= "X-Mailer: PHP\n"; // mailer

    $headers .= "Return-Path: <$mail_admin>\n";

    mail($mail_user, $subject, $body, $headers);

    OpenTable();

    echo "<center>\n" . "<table border='0' width='100%' cellpadding='3'>\n" . "<tr>\n" . "<td width='100%' align='center' class='even'><b>" . _MODELMAILHTML . "</b></td>\n" . "</tr>\n" . "<tr>\n" . "<td width='100%'>\n";

    echo $body;

    echo "<br><br><br><center>&nbsp;<A HREF='javascript:history.go(-2)'>" . _RETOURMODIFES . '</A>&nbsp;</center>';

    echo "</font></td>\n" . "</tr>\n" . "</table>\n" . "</center>\n";

    CloseTable();
}

switch ($format) {
    case 'env_html':
        env_mail_test($mail_user);
        copyright();
        break;
    default:
        test_format_mail($id_user);
        copyright();
        break;
}

require XOOPS_ROOT_PATH . '/footer.php';
