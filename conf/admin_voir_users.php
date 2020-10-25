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

function liste_users()
{
    global $xoopsConfig, $xoopsDB;

    echo "<table border='0' width='100%' height='208' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' height='16' class='even'><p align='center'>"
         . _VOIRABONNES
         . ' <b><i> '
         . $xoopsConfig['sitename']
         . "</i></b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='31' class'even'><p align='left'>\n";

    $resultvoir = $xoopsDB->queryF('select id_user, nom_user, mail_user, date_in, recu FROM ' . $xoopsDB->prefix('pp_newsletter') . ' ORDER BY id_user DESC');

    $nb_users = $xoopsDB->getRowsNum($resultvoir);

    if ($nb_users > 1) {
        $ls = '' . _LES1 . '';

        $insc = _INSCRIENT;
    } else {
        $ls = '' . _LES1 . '';

        $insc = _INSCRIT;
    }

    echo _LE
         . '<i>'
         . date_inscription(date('Ymd'))
         . "</i>&nbsp;<br>\n"
         . _ILYA
         . ' <b><i>'
         . $nb_users
         . '</i></b> '
         . _MEMBRE
         . $ls
         . '  ! (<a href="'
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=ajout_user">'
         . _AJOUTERMAIL
         . "</a>)</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'>\n"
         . "<table border='0' width='100%' cellspacing='1' cellpadding='3' class='even'>\n"
         . "<tr class='even'>\n"
         . "<td width='1%' NOWRAP><b>ID</b></font></td>\n"
         . "<td width='1%' NOWRAP><b>"
         . _ENOM
         . "</b></td>\n"
         . "<td width='1%' NOWRAP><b>"
         . _EMAIL
         . "</b></td>\n"
         . "<td width='1%' align='center' NOWRAP><b>"
         . _DATEAJOUT
         . "</b></td>\n"
         . "<td width='1%' align='center' NOWRAP><b>"
         . _MAILRECU
         . "</b></td>\n"
         . "<td width='1%' NOWRAP colspan='3' align='center'><b>"
         . _ACTION
         . "</b></td>\n"
         . "</tr>\n";

    $rank = 1;

    while (list($id_user_aff, $nom_user_aff, $mail_user_aff, $date_in_aff, $recu_aff) = $xoopsDB->fetchRow($resultvoir)) {
        if (is_int($rank / 2)) {
            $color = 'bg1';
        } else {
            $color = 'bg3';
        }

        echo "<tr class='$color'>\n"
             . "<td width='1%' NOWRAP>"
             . $id_user_aff
             . "</td>\n"
             . "<td width='1%' NOWRAP>"
             . $nom_user_aff
             . "</td>\n"
             . "<td width='1%' NOWRAP>"
             . $mail_user_aff
             . "</td>\n"
             . "<td width='1%' align='center' NOWRAP>"
             . date_inscription($date_in_aff)
             . "</td>\n"
             . "<td width='1%' align='center' NOWRAP>"
             . $recu_aff
             . "</td>\n"
             . "<td width='1%' NOWRAP align='center'><a href=\""
             . XOOPS_URL
             . '/modules/PP-News/admin/index.php?choix=visualiser&act=voir&id_user='
             . $id_user_aff
             . '">'
             . _VOIR
             . "</a></td>\n"
             . "<td width='1%' NOWRAP align='center'><a href=\""
             . XOOPS_URL
             . '/modules/PP-News/admin/index.php?choix=supprime_user&z='
             . $id_user_aff
             . "&y=1&x=ad_su_us&w=supp\"><font color='#FF0000'>"
             . _SUPPRIMER
             . "</font></a></td>\n"
             . "<td width='1%' NOWRAP align='center'><a href=\""
             . XOOPS_URL
             . '/modules/PP-News/admin/index.php?choix=modifier_user&ac=mod_user&id='
             . $id_user_aff
             . '">'
             . _MODIFIER
             . "</a></td>\n"
             . "</tr>\n";

        $rank++;
    }

    echo "</table>\n" . "</td>\n" . "</tr>\n" . "</table>\n";
}

function voir_user($id_user)
{
    global $ModName, $xoopsDB, $xoopsConfig;

    $resultvoir2 = $xoopsDB->query('select * FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $id_user . "'");

    [$id_us, $nom_us, $mail_us, $passe_us, $form_mail, $nb_js_us, $nb_php_us, $nb_lien_us, $nb_new_us, $date_in_us, $recu_us] = $xoopsDB->fetchRow($resultvoir2);

    if ($recu_us > 1) {
        $s_ru = 's';
    } else {
        $s_ru = '';
    }

    echo "<table align='center' border='0' cellspacing='1' cellpadding='3' class='even'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' class='even' align='center'><b>"
         . _INFOABB
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>ID:</td>\n"
         . "<td width='50%' class='odd'><i><b>"
         . $id_us
         . "</b></i></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _ENOM
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $nom_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _EMAIL
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $mail_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _VOTREPASS
         . "</td>\n"
         . "<td width='50%' class='odd'><font color='red'>"
         . base64_decode($passe_us, true)
         . "</font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even' valign='top'>"
         . _DATEABONNEMENT
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . date_inscription($date_in_us)
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even' valign='top'>"
         . _LETTRE
         . $s_ru
         . _RECU
         . $s_ru
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $recu_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center' colspan='2' class='even'><b>"
         . _INFOMAIL
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _CHOIXFORMAT
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $form_mail
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _DERNIERSS
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $nb_js_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _DERNIERTT
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $nb_php_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _DERNIERLL
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $nb_lien_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' class='even'>"
         . _DERNIERAA
         . "</td>\n"
         . "<td width='50%' class='odd'>"
         . $nb_new_us
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='center'><a href=\""
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=supprime_user&z='
         . $id_us
         . '&y=1&x=ad_su_us&w=supp">'
         . _SUPPRIMER
         . "</a></td>\n"
         . "<td width='50%' align='center'><a href=\""
         . XOOPS_URL
         . '/modules/PP-News/admin/index.php?choix=modifier_user&ac=mod_user&id='
         . $id_us
         . '">'
         . _MODIFIER
         . "</a></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</font></center>\n\n";
}

switch ($act) {
    case 'voir':
        voir_user($id_user);
        break;
    default:
        liste_users();
        break;
}
