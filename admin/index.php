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
#Adaptation to PostNuke Rogue Falco171 || http://www.falco171.net      #
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

//###__________________________________________________________________

require_once 'admin_header.php';
require_once XOOPS_ROOT_PATH . '/class/module.textsanitizer.php';
require XOOPS_ROOT_PATH . '/modules/PP-News/conf/fonctions_lettre.php';

//###__________________________________________________________________
/*********************************************************/
/* Admin Function                                    */
/*********************************************************/

function admin_pp()
{
    global $xoopsConfig, $bgcolor2, $xoopsModule;

    xoops_cp_header();

    OpenTable();

    echo "<table border='0' width='100%' height='180'  bordercolor='#CCCCCC' cellspacing='0' cellpadding='2'>\n"
         . "<tr>\n"
         . "<td width='100%' class='odd' colspan='2' align='center'><b>"
         . _LANEWSLETTER
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='150'><center>\n"
         . "<table class='even' border='0' width='150' cellspacing='0' cellpadding='3' bordercolor='#CCCCCC'>\n"
         . "<tr><td width='100%' align='center'>\n"
         . '<center><b>'
         . _LESMEMBRES
         . "</b><br><br><br>\n"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=ajout_user">'
         . _AJOUTER
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?mod=modi&choix=modifier_user">'
         . _MODIFIER
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=supprime_user">'
         . _SUPPRIMER
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=visualiser">'
         . _VISUALISER
         . "</a>\n<br><br><br></center>"
         . "</td></tr>\n"
         . "</table></center>\n"
         . "</td>\n"
         . "<td width='50%' height='150'><center>\n"
         . "<table class='even' border='0' width='150' cellspacing='0' cellpadding='3' bordercolor='#CCCCCC'>\n"
         . "<tr><td width='100%' align='center'>\n"
         . '<center><b>'
         . _LALETTRE
         . " </b><br><br>\n"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=envois">'
         . _ENVOYER
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=configue">'
         . _CONFIGURER
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=configue">'
         . _VALEURSPARDEFAULTS
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=messages">'
         . _MESSAGES
         . "</a>\n<br><br>"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=archives">'
         . _ARCHIVES
         . "</a>\n<br><br></center>"
         . "</td></tr>\n"
         . "</table></center>\n"
         . "</center>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n";

    CloseTable();
}

//--> Formulaire Pour Configurer l'administration.
function admin_conf_lettre($mail_admin, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new, $bgcolor1, $bgcolor2, $textcolor1, $textcolor2)
{
    global $xoopsConfig, $xoopsModule;

    xoops_cp_header();

    if (1 == $active_js) {
        $sel_js = ' checked ';
    } else {
        $sel_js = ' ';
    }

    if (1 == $active_php) {
        $sel_php = ' checked ';
    } else {
        $sel_php = ' ';
    }

    if (1 == $active_lien) {
        $sel_lien = ' checked ';
    } else {
        $sel_lien = ' ';
    }

    if (1 == $active_new) {
        $sel_new = ' checked ';
    } else {
        $sel_new = ' ';
    }

    OpenTable();

    echo "<table align='center' border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='0'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even'><p align='center'><b>"
         . _CONFIGNEWSL
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'><form method='POST' action='index.php'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _VOTREMAIL
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xmail_admin' size='25' value='"
         . stripslashes(htmlspecialchars($mail_admin, ENT_QUOTES | ENT_HTML5))
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP><p align='right'>"
         . _MAX
         . _DERNIERSS
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xnb_js_max' size='3' value='"
         . $nb_js_max
         . "'> <input type=\"checkbox\""
         . $sel_js
         . 'name="xactive_js" value="1">'
         . _DEACTIVER
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _MAX
         . _DERNIERTT
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xnb_php_max' size='3' value='"
         . $nb_php_max
         . "'> <input type=\"checkbox\""
         . $sel_php
         . 'name="xactive_php" value="1">'
         . _DEACTIVER
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _MAX
         . _DERNIERLL
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xnb_lien_max' size='3' value='"
         . $nb_lien_max
         . "'> <input type=\"checkbox\""
         . $sel_lien
         . 'name="xactive_lien" value="1">'
         . _DEACTIVER
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _MAX
         . _DERNIERAA
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xnb_new_max' size='3' value='"
         . $nb_new_max
         . "'> <input type=\"checkbox\""
         . $sel_new
         . 'name="xactive_new" value="1">'
         . _DEACTIVER
         . "</td>\n"
         . "</tr>\n"
         //--
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _BGCOLOR_1
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xbgcolor1' size='8' value='"
         . $bgcolor1
         . "'> </td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _BGCOLOR_2
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xbgcolor2' size='8' value='"
         . $bgcolor2
         . "'> </td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _TEXTCOLOR_1
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xtextcolor1' size='8' value='"
         . $textcolor1
         . "'> </td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' align='right' NOWRAP>"
         . _TEXTCOLOR_2
         . "</td>\n"
         . "<td width='50%' height='19'><input type='text' name='xtextcolor2' size='8' value='"
         . $textcolor2
         . "'> </td>\n"
         . "</tr>\n"
         //--
         . "<tr>\n"
         . "<td width='100%' colspan='2' height='19' align='center'><input type='submit' value='"
         . _ENREGISTRER
         . "'></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<input type='HIDDEN' name='choix' value='enr_configue'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n";

    CloseTable();
}

function messages($msg_inscrit, $msg_deinscrit, $signature)
{
    global $xoopsConfig, $bgcolor2, $xoopsModule;

    xoops_cp_header();

    OpenTable();

    echo "<center>\n"
         . "<table border='0' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even'><p align='center'><b>"
         . _MSGINSCDEINSC
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%'><p align='center'>----------------------<br>\n"
         . _MSGINSCIRPTION
         . "<br>\n"
         . "<textarea rows='5' name='xmsg_inscrit' cols='30'>"
         . stripslashes(base64_decode($msg_inscrit, true))
         . "</textarea></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'><p align='center'>----------------------<br>\n"
         . _MSGDEINSCRIPTION
         . "<br>\n"
         . "<textarea rows='5' name='xmsg_deinscrit' cols='30'>"
         . stripslashes(base64_decode($msg_deinscrit, true))
         . "</textarea></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'><p align='center'>----------------------<br>\n"
         . _VOTRESIGNATURE
         . "<br>\n"
         . "<textarea rows='5' name='xsignature' cols='30'>"
         . stripslashes(base64_decode($signature, true))
         . "</textarea></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'><p align='center'>----------------------<br>\n"
         . "<input type='submit' value='"
         . _ENREGISTRER
         . "'><input type='reset' value='"
         . _RETABLIR
         . "'></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<input type='HIDDEN' name='choix' value='enr_messages'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";

    CloseTable();
}

//--> Enregistre les messages
function enr_msg_admin($xmsg_inscrit, $xmsg_deinscrit, $xsignature)
{
    global $xoopsConfig, $bgcolor2, $xoopsModule;

    xoops_cp_header();

    $fichier2 = fopen(XOOPS_ROOT_PATH . '/modules/PP-News/cache/conf_mgs.php', 'wb');

    $ligne = "######################################################################\n";

    $texte2 = "<?php\n\n";

    $texte2 .= (string)$ligne;

    $texte2 .= "# PP-News la NewsLetter x XOOPS \n";

    $texte2 .= "# ===========================\n";

    $texte2 .= "#\n";

    $texte2 .= "# Copyright : (C) 2000, 2001 www.postnuke.it & www.presencenet.net\n";

    $texte2 .= "# http://www.postnuke.it - http://www.presencenet.net \n";

    $texte2 .= "#\n";

    $texte2 .= "# Module pour installer un Mailing-list dans un portail réalisé avec Postnuke 0.64\n";

    $texte2 .= "#\n";

    $texte2 .= "# Ce script est libre de droit.\n";

    $texte2 .= "# Merci de laisser le Copyright ©.\n";

    $texte2 .= "$ligne\n\n";

    $texte2 .= '$msg_inscrit = "' . base64_encode($xmsg_inscrit) . "\";\n";

    $texte2 .= '$msg_deinscrit = "' . base64_encode($xmsg_deinscrit) . "\";\n";

    $texte2 .= '$signature = "' . base64_encode($xsignature) . "\";\n\n";

    $texte2 .= '?>';

    fwrite($fichier2, $texte2);

    fclose($fichier2);

    /*******************************/

    OpenTable();

    echo '<center><i><b>' . _MSGOK . '</i></b></center>';

    CloseTable();
}

//--> Enregistre le nombre de choix
function enr_conf_admin($xmail_admin, $xnb_js_max, $xnb_php_max, $xnb_lien_max, $xnb_new_max, $xactive_js, $xactive_php, $xactive_lien, $xactive_new, $xbgcolor1, $xbgcolor2, $xtextcolor1, $xtextcolor2)
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $retour, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new;

    xoops_cp_header();

    if (1 != $xactive_js) {
        $xactive_js = '0';
    }

    if (1 != $xactive_php) {
        $xactive_php = '0';
    }

    if (1 != $xactive_lien) {
        $xactive_lien = '0';
    }

    if (1 != $xactive_new) {
        $xactive_new = '0';
    }

    if (!preg_match('^[0-9]+$', $xnb_js_max)) {
        die('<center><b>' . _ERREUR . '</b> :' . _METTREENTIERPOUR . _DERNIERSS . '.<br>( ' . $xnb_js_max . ' )' . $retour . '</center>');
    }

    if (!preg_match('^[0-9]+$', $xnb_php_max)) {
        die('<center><b>' . _ERREUR . '</b> :' . _METTREENTIERPOUR . _DERNIERTT . '.<br>( ' . $xnb_php_max . ' )' . $retour . '</center>');
    }

    if (!preg_match('^[0-9]+$', $xnb_lien_max)) {
        die('<center><b>' . _ERREUR . '</b> :' . _METTREENTIERPOUR . _DERNIERLL . '.<br>( ' . $xnb_lien_max . ' )' . $retour . '</center>');
    }

    if (!preg_match('^[0-9]+$', $xnb_new_max)) {
        die('<center><b>' . _ERREUR . '</b> :' . _METTREENTIERPOUR . _DERNIERAA . '.<br>( ' . $xnb_new_max . ' )' . $retour . '</center>');
    }

    $fichier = fopen(XOOPS_ROOT_PATH . '/modules/PP-News/cache/conf_nl.php', 'wb');

    $ligne = "######################################################################\n";

    $texte = "<?php\n\n";

    $texte .= (string)$ligne;

    $texte .= "# PP-News La NewsLetter x Postnuke\n";

    $texte .= "# ===========================\n";

    $texte .= "#\n";

    $texte .= "# PP-News la NewsLetter x Postnuke \n";

    $texte .= "# ===========================\n";

    $texte .= "#\n";

    $texte .= "# Copyright : (C) 2000, 2001 www.postnuke.it & www.presencenet.net\n";

    $texte .= "# http://www.postnuke.it - http://www.presencenet.net \n";

    $texte .= "#\n";

    $texte .= "# Ce script est libre de droit.\n";

    $texte .= "# Merci de laisser le Copyright ©.\n";

    $texte .= "$ligne\n\n";

    $texte .= (string)$ligne;

    $texte .= "# Nombre de choix dans les menus déroulants\n";

    $texte .= "# \$mail_admin -> Mail Administrateur (FROM)\n";

    $texte .= (string)$ligne;

    $texte .= "\$mail_admin = \"$xmail_admin\";\n";

    $texte .= "\$nb_js_max = \"$xnb_js_max\";\n";

    $texte .= "\$nb_php_max = \"$xnb_php_max\";\n";

    $texte .= "\$nb_lien_max = \"$xnb_lien_max\";\n";

    $texte .= "\$nb_new_max= \"$xnb_new_max\";\n\n";

    $texte .= (string)$ligne;

    $texte .= "# Activer ou non les menus déroulants\n";

    $texte .= "# 0 = Activé  /  1 = Dé-activé.\n";

    $texte .= (string)$ligne;

    $texte .= "\$active_js = \"$xactive_js\";\n";

    $texte .= "\$active_php = \"$xactive_php\";\n";

    $texte .= "\$active_lien = \"$xactive_lien\";\n";

    $texte .= "\$active_new = \"$xactive_new\";\n\n";

    $texte .= (string)$ligne;

    $texte .= "# Valeurs par défaults\n";

    $texte .= "# Pour une inscription rapide ces valeurs.\n";

    $texte .= "# seront attribuées à l'abonné automatiquement\n";

    $texte .= "# Pour une inscription avancée ces valeurs.\n";

    $texte .= "# seront celles sélectionnées\n";

    $texte .= (string)$ligne;

    $texte .= "\$defaut_mail = \"$defaut_mail\";\n";

    $texte .= "\$defaut_js = \"$defaut_js\";\n";

    $texte .= "\$defaut_php = \"$defaut_php\";\n";

    $texte .= "\$defaut_lien= \"$defaut_lien\";\n";

    $texte .= "\$defaut_new = \"$defaut_new\";\n\n";

    $texte .= (string)$ligne;

    $texte .= "\$bgcolor1 = \"$xbgcolor1\";\n";

    $texte .= "\$bgcolor2 = \"$xbgcolor2\";\n";

    $texte .= "\$textcolor1 = \"$xtextcolor1\";\n";

    $texte .= "\$textcolor2 = \"$xtextcolor2\";\n\n\n";

    $texte .= '?>';

    fwrite($fichier, $texte);

    fclose($fichier);

    /*******************************/

    OpenTable();

    echo '<center><i><b>' . _CONFIGUEOK . '</i></b></center>';

    CloseTable();
}

function defaut_mail($defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new)
{
    global $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new, $xoopsConfig, $xoopsModule, $xoopsDB;

    xoops_cp_header();

    OpenTable();

    echo "<center>\n"
         . "<table border='0' cellspacing='0' cellpadding='3' width='400' height='261'>\n"
         . "<tr>\n"
         . "<td width='497' height='15' align='center' class='even'><b>"
         . _CONFIGUEDEFAUT
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='497' height='230'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' height='57'><p align='center'>\n"
         . _MSGDEFAUT
         . "\n"
         . "<br>-------------------------------</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _CHOIXFORMAT
         . "</td>\n"
         . "<td width='50%'>\n";

    if ('html' == $defaut_mail) {
        $sehtml = 'selected';
    } else {
        $setxt = 'selected';
    }

    echo "<select size='1' name='zdefaut_mail'>\n"
         . '<option '
         . $sehtml
         . " value='html'>HTML</option>\n"
         . '<option '
         . $setxt
         . " value='txt'>TEXT</option>\n"
         . "</select>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _DERNIERSS
         . "</td>\n"
         . "<td width='50%'>";

    if (0 == $active_js) {
        echo menu_deroulant('zdefaut_js', $nb_js_max, $defaut_js);
    } else {
        echo '<b>' . _DEACTIVER . '</b>';
    }

    echo "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERTT . "</td>\n" . "<td width='50%'>";

    if (0 == $active_php) {
        echo menu_deroulant('zdefaut_php', $nb_php_max, $defaut_php);
    } else {
        echo '<b>' . _DEACTIVER . '</b>';
    }

    echo "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERLL . "</td>\n" . "<td width='50%'>";

    if (0 == $active_lien) {
        echo menu_deroulant('zdefaut_lien', $nb_lien_max, $defaut_lien);
    } else {
        echo '<b>' . _DEACTIVER . '</b>';
    }

    echo "</td>\n" . "</tr>\n" . "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERAA . "</td>\n" . "<td width='50%'>";

    if (0 == $active_new) {
        echo menu_deroulant('zdefaut_new', $nb_new_max, $defaut_new);
    } else {
        echo '<b>' . _DEACTIVER . '</b>';
    }

    echo "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='17' align='center'><input type='submit' value='"
         . _ENREGISTRER
         . "'></td>\n"
         . "<td width='50%' height='17' align='center'><input type='reset' value='"
         . _RETABLIR
         . "'></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<input type='HIDDEN' name='choix' value='enr_defaut'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";

    CloseTable();
}

//--> Enregistre la configuration par défaut du mail
function enr_defaut_admin($zdefaut_mail, $zdefaut_js, $zdefaut_php, $zdefaut_lien, $zdefaut_new)
{
    global $xoopsConfig, $xoopsModule, $mail_admin, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new, $bgcolor1, $bgcolor2, $textcolor1, $textcolor2;

    xoops_cp_header();

    $fichier1 = fopen(XOOPS_ROOT_PATH . '/modules/PP-News/cache/conf_nl.php', 'wb');

    $ligne = "######################################################################\n";

    $texte1 = "<?php\n\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "# PP-News La NewsLetter x Xoops \n";

    $texte1 .= "# ===========================\n";

    $texte1 .= "#\n";

    $texte1 .= "$texte2 "; # PP-News la NewsLetter x Postnuke \n";

    $texte2 .= "# ===========================\n";

    $texte2 .= "#\n";

    $texte2 .= "# Copyright : (C) 2000, 2001 www.postnuke.it & www.presencenet.net\n";

    $texte2 .= "# http://www.postnuke.it - http://www.presencenet.net \n";

    $texte2 .= "#\n";

    $texte2 .= "# Module pour installer un Mailing-list dans un portail réalisé avec Postnuke 0.64\n";

    $texte2 .= "#\n";

    $texte1 .= "# Ce script est libre de droit.\n";

    $texte1 .= "# Merci de laisser le Copyright ©.\n";

    $texte1 .= "$ligne\n\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "# Nombre de choix dans les menus déroulants\n";

    $texte1 .= "# \$mail_admin -> Mail Administrateur (FROM)\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "\$mail_admin = \"$mail_admin\";\n";

    $texte1 .= "\$nb_js_max = \"$nb_js_max\";\n";

    $texte1 .= "\$nb_php_max = \"$nb_php_max\";\n";

    $texte1 .= "\$nb_lien_max = \"$nb_lien_max\";\n";

    $texte1 .= "\$nb_new_max = \"$nb_new_max\";\n\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "# Activer ou non les menus déroulants\n";

    $texte1 .= "# 0 = Activé  /  1 = Dé-activé.\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "\$active_js = \"$active_js\";\n";

    $texte1 .= "\$active_php = \"$active_php\";\n";

    $texte1 .= "\$active_lien = \"$active_lien\";\n";

    $texte1 .= "\$active_new = \"$active_new\";\n\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "# Valeurs par défaults\n";

    $texte1 .= "# Pour une inscription rapide ces valeurs.\n";

    $texte1 .= "# seront attribuées à l'abonné automatiquement\n";

    $texte1 .= "# Pour une inscription avancée ces valeurs.\n";

    $texte1 .= "# seront celles sélectionnées\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "\$defaut_mail = \"$zdefaut_mail\";\n";

    $texte1 .= "\$defaut_js = \"$zdefaut_js\";\n";

    $texte1 .= "\$defaut_php = \"$zdefaut_php\";\n";

    $texte1 .= "\$defaut_lien= \"$zdefaut_lien\";\n";

    $texte1 .= "\$defaut_new = \"$zdefaut_new\";\n\n\n";

    $texte1 .= (string)$ligne;

    $texte1 .= "\$bgcolor1 = \"$bgcolor1\";\n";

    $texte1 .= "\$bgcolor2 = \"$bgcolor2\";\n";

    $texte1 .= "\$textcolor1 = \"$textcolor1\";\n";

    $texte1 .= "\$textcolor2 = \"$textcolor2\";\n\n\n";

    $texte1 .= '?>';

    fwrite($fichier1, $texte1);

    fclose($fichier1);

    /*******************************/

    OpenTable();

    echo '<center><i><b>' . _DEFAULTOK . '</i></b></center>';

    CloseTable();
}

function liste_archive_mail()
{
    global $xoopsConfig, $bgcolor2, $xoopsModule;

    xoops_cp_header();

    OpenTable();

    $path = XOOPS_ROOT_PATH . '/modules/PP-News/archives';

    $folder = dir($path);

    //$folder = natcasesort($folder);

    echo '';

    while ($fichier = $folder->read()) {
        if ('.' != $fichier and '..' != $fichier) {
            //$folder = natcasesort($folder);

            $form = str_replace('.htm', '', $fichier);

            echo _ARCHIVEDU . ' :<i>' . date_inscription($form) . '</i> - ' . _VOIR . '
(
<a href="index.php?choix=recev_archives&nom=' . $form . '&format=0">HTML</a>
/
<a href="index.php?choix=recev_archives&nom=' . $form . '&format=1">TEXT</a>
)
 -
<a href="index.php?choix=supp_archives&nom=' . $form . '">' . _SUPPRIMER . "</a> .<br>\n";
        }
    }

    $folder->close();

    echo '';

    CloseTable();
}

function supp_archive($nom)
{
    global $xoopsConfig, $bgcolor2, $xoopsModule;

    xoops_cp_header();

    $file_sup = XOOPS_ROOT_PATH . '/modules/PP-News/archives/' . $nom . '.htm';

    if (file_exists($file_sup)) {
        unlink((string)$file_sup);

        echo "<p align='center'><B>" . _ARCHIVESUPPRIMER . "</B></p>\n";
    } else {
        echo '<center><b>' . _ERREURARCHIVE . "</b></center>\n";
    }
}

function recev_archive($nom, $format)
{
    global $xoopsConfig, $xoopsModule;

    xoops_cp_header();

    OpenTable();

    $texte_arch = file(XOOPS_ROOT_PATH . '/modules/PP-News/archives/' . $nom . '.htm');

    echo base64_decode($texte_arch[$format], true) . "<br>\n";

    CloseTable();
}

switch ($choix) {
    //-->MEMBRES
    case 'ajout_user':
        xoops_cp_header();
        OpenTable();
        require XOOPS_ROOT_PATH . '/modules/PP-News/conf/admin_ajout_user.php';
        CloseTable();
        break;
    case 'supprime_user':
        xoops_cp_header();
        OpenTable();
        require XOOPS_ROOT_PATH . '/modules/PP-News/conf/admin_supp_user.php';
        CloseTable();
        break;
    case 'modifier_user':
        xoops_cp_header();
        OpenTable();
        require XOOPS_ROOT_PATH . '/modules/PP-News/conf/admin_modif_user.php';
        CloseTable();
        break;
    case 'visualiser':
        xoops_cp_header();
        OpenTable();
        require XOOPS_ROOT_PATH . '/modules/PP-News/conf/admin_voir_users.php';
        CloseTable();
        break;
    case 'envois':
        xoops_cp_header();
        OpenTable();
        require XOOPS_ROOT_PATH . '/modules/PP-News/conf/admin_envois_mails.php';
        CloseTable();
        break;
    //-->>LETTRES
    case 'configue':
        admin_conf_lettre($mail_admin, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new, $bgcolor1, $bgcolor2, $textcolor1, $textcolor2);
        break;
    case 'enr_configue':
        enr_conf_admin($xmail_admin, $xnb_js_max, $xnb_php_max, $xnb_lien_max, $xnb_new_max, $xactive_js, $xactive_php, $xactive_lien, $xactive_new, $xbgcolor1, $xbgcolor2, $xtextcolor1, $xtextcolor2);
        break;
    case 'defaut':
        defaut_mail($defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new);
        break;
    case 'enr_defaut':
        enr_defaut_admin($zdefaut_mail, $zdefaut_js, $zdefaut_php, $zdefaut_lien, $zdefaut_new);
        break;
    case 'messages':
        messages($msg_inscrit, $msg_deinscrit, $signature);
        break;
    case 'archives':
        liste_archive_mail();
        break;
    case 'supp_archives':
        supp_archive($nom);
        break;
    case 'recev_archives':
        recev_archive($nom, $format);
        break;
    case 'enr_messages':
        enr_msg_admin($xmsg_inscrit, $xmsg_deinscrit, $xsignature);
        break;
    default:
        admin_pp();
        break;
}
//echo "<br><font size='1' color='red'><b><i>"._NOTE."</i></b></font><font size='1'>"._INFOSHELP." <a href=\"javascript:openwindow()\">"._ICI."</a>.</font>\n";
xoops_cp_footer();
