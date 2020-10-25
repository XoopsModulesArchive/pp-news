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

function admin_inscription()
{
    global $xoopsDB, $xoopsConfig, $nom_userz, $mail_userz, $format_mailz, $nb_js, $nb_php, $nb_lien, $nb_new, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $ModName, $sitename, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new, $active_js, $active_php, $active_lien, $active_new, $action;

    echo "<center>\n" . "<table border='0' cellspacing='0' cellpadding='0'>\n" . "<tr>\n" . "<td width='100%' class='even' NOWRAP><p align='center'><font size='2'><b>" . _INSCRIPTIONA . $xoopsConfig['sitename'] . "<br></b><i><b>\n" . "<font size='2' color='#FF0000'>";

    $resultcount = $xoopsDB->query('select id_user from ' . $xoopsDB->prefix('pp_newsletter') . '');

    $nb_user_insc = $xoopsDB->getRowsNum($resultcount);

    echo $nb_user_insc;

    if ($nb_user_insc > 1) {
        $le_s = '' . _LES1 . '';
    } else {
        $le_s = '' . _LES2 . '';
    }

    echo '</font></b> '
         . _INSCRIT
         . ''
         . $le_s
         . "<b></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='267'><form name='form_insc' method='POST' action='"
         . $PHP_SELF
         . "'><p align='center'><font size='2'><br>"
         . _CHOISISSEZFORMAT
         . "</font></p>\n"
         . "<table border='0' width='100%'>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _ENOM
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><input type='text' name='nom_userz' size='20' value='"
         . stripslashes(htmlspecialchars($nom_userz, ENT_QUOTES | ENT_HTML5))
         . "'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _EMAIL
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><input type='text' name='mail_userz' size='20' value='"
         . stripslashes(htmlspecialchars($mail_userz, ENT_QUOTES | ENT_HTML5))
         . "'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _VOTREPASS
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><input type='password' name='passe_userz' size='20'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _COMFPASS
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><input type='password' name='conf_passe_userz' size='20'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _CHOIXFORMAT
         . "</font></td>\n"
         . "<td width='50%'><font size='2'>\n";

    if ($format_mailz) {
        if ('html' == $format_mailz) {
            $sehtml = 'selected';
        } else {
            $setxt = 'selected';
        }
    } else {
        if ('html' == $defaut_mail) {
            $sehtml = 'selected';
        } else {
            $setxt = 'selected';
        }
    }

    echo "<select size='1' name='format_mailz'>\n" . '<option ' . $sehtml . " value='html'>HTML</option>\n" . '<option ' . $setxt . " value='txt'>TXT</option>\n" . "</select>\n" . "</font>\n" . "</td>\n" . "</tr>\n";

    if ('enr' == $action) {
        $sejs = $nb_js;

        $sephp = $nb_php;

        $selien = $nb_lien;

        $senew = $nb_new;
    } else {
        $sejs = $defaut_js;

        $sephp = $defaut_php;

        $selien = $defaut_lien;

        $senew = $defaut_new;
    }

    if (0 == $active_js) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERSS . "</font></td>\n" . "<td width='50%'><font size='2'>";

        echo menu_deroulant('nb_js', $nb_js_max, $sejs);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_php) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERTT . "</font></td>\n" . "<td width='50%'><font size='2'>";

        echo menu_deroulant('nb_php', $nb_php_max, $sephp);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_lien) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERLL . "</font></td>\n" . "<td width='50%'><font size='2' color='red'>";

        echo menu_deroulant('nb_lien', $nb_lien_max, $selien);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_new) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERAA . "</font></td>\n" . "<td width='50%'><font size='2'>";

        echo menu_deroulant('nb_new', $nb_new_max, $senew);

        echo "</font></td>\n" . "</tr>\n";
    }

    echo "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _DATE
         . "</font></td>\n"
         . "<td width='50%'><font size='2'>"
         . date_inscription(date('Ymd'))
         . "<input type='HIDDEN' value='"
         . date('Ymd')
         . "' name='dateajoutz'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _DEMENVMAIL
         . " </font></td>\n"
         . "<td width='50%'><font size='2'><input type='radio' value='1' checked name='mail_confirme'>"
         . _OUI
         . "<br><input type='radio' value='2' name='mail_confirme'>"
         . _NON
         . "</font></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<p align='center'><font size='2'><input type='submit' value='"
         . _INSCRIPTION
         . "'> <input type='reset' value='"
         . _RETABLIR
         . "'></font></p>\n"
         . "<input type='HIDDEN' name='action' value='enr'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";
}

//--> Ajouter un membre
function admin_enregistre_user($nom_userz, $mail_userz, $passe_userz, $conf_passe_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz, $mail_confirme)
{
    global $xoopsDB, $xoopsConfig, $ModName, $sitename, $erreur, $msg_inscrit, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin, $rapide;

    $resultcount = $xoopsDB->query('select count(id_user) from ' . $xoopsDB->prefix('pp_newsletter') . " WHERE mail_user='" . $mail_userz . "'");

    $nb_user_insc = $xoopsDB->fetchRow($resultcount);

    if ('' == $mail_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . "<font size='2'>" . _MAILVIDE . '</font></p><p>&nbsp;</p>';

        admin_inscription();
    } elseif (!controlmail($mail_userz)) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . "<font size='2'>" . _MAILBIDON . '</font></p><p>&nbsp;</p>';

        admin_inscription();
    } elseif ('' == $passe_userz or '' == $conf_passe_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . "<font size='2'>" . _PASSEVIDE . '</font></p><p>&nbsp;</p>';

        admin_inscription();
    } elseif ($passe_userz != $conf_passe_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . "<font size='2'>" . _PASSENONIDENTIQUE . '</font></p><p>&nbsp;</p>';

        admin_inscription();
    } elseif ($nb_user_insc[0] > 0) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . "<font size='2'><i>" . _MAILPRESENT . '</i></font></p><p>&nbsp;</p>';

        admin_inscription();
    } else {
        $passe_userz1 = base64_encode(trim($passe_userz));

        $liste_valeurs = "'$nom_userz', '$mail_userz', '$passe_userz1', '$format_mailz', '$nb_jsz', '$nb_phpz', '$nb_lienz', '$nb_newz', '$dateajoutz'";

        $liste_champs = 'nom_user, mail_user, passe_user, format_mail, nb_js, nb_php, nb_lien, nb_new, date_in';

        $xoopsDB->queryF('INSERT INTO ' . $xoopsDB->prefix('pp_newsletter') . " ($liste_champs) VALUES ($liste_valeurs)");

        if (1 == $mail_confirme) {
            $subject = _SUJETINSCIPTION . ' ' . $xoopsConfig['sitename'] . ']';

            $msg = _BONJOUR . $nom_userz . ",\n" . stripslashes(base64_decode($msg_inscrit, true)) . "\n";

            $msg .= _RAPPELINFOS . "\n\n";

            $msg .= infos_user($nom_userz, $passe_userz, $mail_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz);

            $body = h_mail('' . _INSCRIPTION . '') . "\n\n" . $msg . "\n";

            $from = $mail_admin;

            mail($mail_userz, $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());

            echo "<center>\n";

            echo "<font size='2'><i><b>" . _INSOK . '</b></i><br>' . _MAILENVOYER . ' (<b>' . $mail_userz . '</b>)</font>';
        } else {
            echo "<center>\n";

            echo "<font size='2'><i><b>" . _INSOK . "</b></i><br></font><font size='2' color='red'>" . _MAILPASENVOYER . '</font>';
        }

        admin_menu();
    }
}

switch ($action) {
    case 'enr':
        admin_enregistre_user($nom_userz, $mail_userz, $passe_userz, $conf_passe_userz, $format_mailz, $nb_js, $nb_php, $nb_lien, $nb_new, $dateajoutz, $mail_confirme);
        break;
    default:
        admin_inscription();
        break;
}
