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

function forme_identifier()
{
    global $xoopsDB, $xoopsConfig, $xoopsModule;

    echo "<center>\n"
         . "<table border='0' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even'><p align='center'><font size='2'>"
         . _MODIFIERMEMBRE
         . "</font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='4'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' height='19'><p align='center'>"
         . _CHOIXEMAIL
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' NOWRAP><p align='right'>"
         . _MODIFIERMAIL
         . "</td>\n"
         . "<td width='50%' height='19' align='left' NOWRAP>\n"
         . "<font size='2'>\n\n";

    echo "<select size='1' name='id'>\n";

    $resultsupp = $xoopsDB->query('select id_user, mail_user from ' . $xoopsDB->prefix('pp_newsletter') . ' ORDER BY id_user DESC');

    while (list($id_supp, $mail_supp) = $xoopsDB->fetchRow($resultsupp)) {
        echo '<option ' . $sl . " value='" . $id_supp . "'>" . $mail_supp . "</option>\n";
    }

    echo "</select>\n\n\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' align='center'><input type='submit' value='"
         . _MODIFIER
         . "'></td>\n"
         . "</table>\n"
         . "<input type='HIDDEN' name='op' value='PP-News'>\n"
         . "<input type='HIDDEN' name='ac' value='mod_user'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";
}

function forme_modifier($id)
{
    global $xoopsDB, $ModName, $sitename, $erreur, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new;

    $resultinfos = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $id . "'");

    [$m_id_user, $m_nom, $m_mail, $mot_passe, $m_format, $m_nb_js, $m_nb_php, $m_nb_lien, $m_nb_new, $m_date, $m_recu] = $xoopsDB->fetchRow($resultinfos);

    $passe_claire = base64_decode($mot_passe, true);

    echo "<center>\n"
         . "<table border='0' width='450' height='298' cellspacing='0' cellpadding='0' bordercolor='#CCCCCC'>\n"
         . "<tr>\n"
         . "<td width='100%' height='19' class='even'><p align='center'><b>"
         . _MODIFIERMEMBRE
         . "<br></b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='267'><form name='form_insc' method='POST' action='"
         . $PHP_SELF
         . "'><p align='center'><br>"
         . _DEMENVMAIL
         . "<br><input type='checkbox' name='env_mail' value='1' checked>"
         . _OUI
         . "</p>\n"
         . "<table cellpadding='3' border='0' width='100%'>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'>"
         . _ENOM
         . "</td>\n"
         . "<td width='50%'><input type='text' name='nom_user' size='20' value='"
         . stripslashes(htmlspecialchars($m_nom, ENT_QUOTES | ENT_HTML5))
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'>"
         . _EMAIL
         . "</td>\n"
         . "<td width='50%'><input type='text' name='mail_user' size='20' value='"
         . stripslashes(htmlspecialchars($m_mail, ENT_QUOTES | ENT_HTML5))
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'>"
         . _VOTREPASS
         . "></td>\n"
         . "<td width='50%'><input type='txt' name='passe_user' size='20' value='"
         . $passe_claire
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _COMFPASS
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><input type='txt' name='conf_passe_user' size='20' value='"
         . $passe_claire
         . "'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _CHOIXFORMAT
         . "</font></td>\n"
         . "<td width='50%'><font size='2'>\n";

    if ('html' == $m_format) {
        $sehtml = 'selected';
    } else {
        $setxt = 'selected';
    }

    echo "<select size='1' name='format_mail'>\n" . '<option ' . $sehtml . " value='html'>HTML</option>\n" . '<option ' . $setxt . " value='txt'>TXT</option>\n" . "</select>\n" . "</font>\n" . "</td>\n" . "</tr>\n";

    if (0 == $active_js) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERSS . " </font></td>\n" . "<td width='50%'><font size='2'>";

        if ($nb_js) {
            $sejs = $nb_js;
        } else {
            $sejs = $m_nb_js;
        }

        echo menu_deroulant('nb_js', $nb_js_max, $sejs);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_php) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERTT . " </font></td>\n" . "<td width='50%'><font size='2'>";

        if ($nb_php) {
            $sephp = $nb_php;
        } else {
            $sephp = $m_nb_php;
        }

        echo menu_deroulant('nb_php', $nb_php_max, $sephp);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_lien) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERLL . " </font></td>\n" . "<td width='50%'><font size='2' color='red'>";

        if ($nb_lien) {
            $selien = $nb_lien;
        } else {
            $selien = $m_nb_lien;
        }

        echo menu_deroulant('nb_lien', $nb_lien_max, $selien);

        echo "</font></td>\n" . "</tr>\n";
    }

    if (0 == $active_new) {
        echo "<tr>\n" . "<td width='50%' align='right'><font size='2'>" . _DERNIERAA . " </font></td>\n" . "<td width='50%'><font size='2'>";

        if ($nb_new) {
            $senew = $nb_new;
        } else {
            $senew = $m_nb_new;
        }

        echo menu_deroulant('nb_new', $nb_new_max, $senew);

        echo "</font></td>\n" . "</tr>\n";
    }

    if ($m_recu > 1) {
        $s_rec = 's';
    } else {
        $s_rec = '';
    }

    echo "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _DATEINSCRIPTION
         . "</font></td>\n"
         . "<td width='50%'><font size='2'><i>"
         . date_inscription($m_date)
         . "</i><input type='HIDDEN' value='"
         . $m_date
         . "' name='dateajout'></font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right'><font size='2'>"
         . _LETTRE
         . $s_rec
         . _RECU
         . $s_rec
         . " &nbsp;</font></td>\n"
         . "<td width='50%'><font size='2'><i>"
         . $m_recu
         . "</i><input type='HIDDEN' value='"
         . $m_recu
         . "' name='recu'></font></td>\n"
         . "</tr>\n"

         . "</table>\n"
         . "<p align='center'><font size='2'><input type='submit' value='"
         . _MODIFIER
         . "'> <input type='reset' value='"
         . _RETABLIR
         . "'></font></p>\n"
         . "<input type='HIDDEN' name='op' value='PP-News'>\n"
         . "<input type='HIDDEN' name='ac' value='ok'>\n"
         . "<input type='HIDDEN' name='idm_user' value='"
         . $m_id_user
         . "'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table><br><br>\n"
         . "</center>\n";
}

function enregistre_modifs($idm_userz, $nom_userz, $mail_userz, $passe_userz, $conf_passe_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz)
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $env_mail, $sitename, $nukeurl, $erreur, $retour, $ModName, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin;

    $resultcount_mail = $xoopsDB->query('SELECT count(id_user) FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE (mail_user='" . $mail_userz . "') AND (id_user !='" . $idm_userz . "')");

    $result_count = $xoopsDB->fetchRow($resultcount_mail);

    if ('' == $mail_userz) {
        echo '<center>' . $erreur . "<font size='2'>" . _MAILVIDE . '</font>' . $retour . '</center>';
    } elseif (!controlmail($mail_userz)) {
        echo '<center>' . $erreur . "<font size='2'>" . _MAILBIDON . '</font>' . $retour . '</center>';
    } elseif ('' == $passe_userz or '' == $conf_passe_userz) {
        echo '<center>' . $erreur . "<font size='2'>" . _PASSEVIDE . '</font>' . $retour . '</center>';
    } elseif ($passe_userz != $conf_passe_userz) {
        echo '<center>' . $erreur . "<font size='2'>" . _PASSENONIDENTIQUE . '</font>' . $retour . '</center>';
    } elseif ($result_count[0] > 0) {
        echo '<center>' . $erreur . "<font size='2'>" . _MAILPRESENT . '</font>' . $retour . '</center>';
    } else {
        $passe_userz1 = base64_encode(trim($passe_userz));

        $xoopsDB->query(
            'UPDATE ' . $xoopsDB->prefix('pp_newsletter') . " set
nom_user = '$nom_userz',
mail_user = '$mail_userz',
passe_user = '$passe_userz1',
format_mail = '$format_mailz',
nb_js = '$nb_jsz',
nb_php = '$nb_phpz',
nb_lien = '$nb_lienz',
nb_new = '$nb_newz',
date_in = '$dateajoutz'
 WHERE id_user='$idm_userz'"
        );

        if (1 == $env_mail) {
            $subject = _SUJETMODIFICATION . $xoopsConfig['sitename'] . ']';

            $msg = "\n" . _BONJOUR . $nom_userz . ",\n" . _VOUSAVEZMODIFIER;

            $msg .= _RAPPELINFOS2 . "\n\n";

            $msg .= infos_user($nom_userz, $passe_userz, $mail_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz);

            $body = h_mail('Modification') . "\n\n" . $msg . "\n";

            $from = $mail_admin;

            mail($mail_userz, $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());

            echo "<center>\n";

            echo "<font size='2'><i><b>" . _MODIFESOK . '</b></i><br>' . _MAILENVOYER . ' (<b>' . $mail_userz . '</b>)<br><br>';
        } else {
            echo "<center>\n";

            echo "<font size='2'><i><b>" . _MODIFESOK . "</b></i><br><font color='red'>" . _MAILPASENVOYER . '</font><br><br>';
        }

        echo '<br><br><br>';

        //$xoopsModule->printAdminMenu();

        admin_menu();
    }
}

switch ($ac) {
    case 'ok':
        enregistre_modifs($idm_user, $nom_user, $mail_user, $passe_user, $conf_passe_user, $format_mail, $nb_js, $nb_php, $nb_lien, $nb_new, $dateajout);
        break;
    case 'mod_user':
        forme_modifier($id);
        break;
    default:
        forme_identifier();
        break;
}
