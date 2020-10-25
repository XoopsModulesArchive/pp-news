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

function admin_form_supp()
{
    global $xoopsDB, $xoopsConfig;
    echo "<center>\n"
         . "<table border='0' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even'><p align='center'>"
         . _SUPPRIMERMEMBRE
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='4'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' height='19'><p align='center'>"
         . _CHOIXEMAILM
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' height='19' NOWRAP><p align='right'>"
         . _SUPPRIMEMAIL
         . "</td>\n"
         . "<td width='50%' height='19' align='left' NOWRAP>\n"


echo "<select size='1' name='z'>\n";
$resultsupp = $xoopsDB->query('select id_user, mail_user from ' . $xoopsDB->prefix('pp_newsletter') . ' ORDER BY id_user DESC');
while (list($id_supp, $mail_supp) = $xoopsDB->fetchRow($resultsupp)) {
    echo '<option ' . $sl . " value='" . $id_supp . "'>" . $mail_supp . "</option>\n";
}
echo "</select>\n\n\n"
     . "</td>\n"
     . "</tr>\n"
     . "<tr>\n"
     . "<td width='100%' colspan='2' align='center'><input type='submit' value='"
     . _SUPPRIMER
     . "'></td>\n"
     . "</table>\n"
     . "<input type='HIDDEN' name='op' value='Newsletter'>\n"
     . "<input type='HIDDEN' name='y' value='1'>\n"
     . "<input type='HIDDEN' name='x' value='ad_su_us'>\n"
     . "</form>\n"
     . "</td>\n"
     . "</tr>\n"
     . "</table>\n"
     . "</center>\n";
}

function admin_supp_user($z, $y)
{
    global $xoopsDB, $xoopsConfig, $erreur;
    if ($z == '') {
        echo '<center>' . $erreur . '' . _ID_PROB . '';
    } elseif ($y == 1) {
        echo '<center>' . _SUPPSIC . '<br><br>';
        $resultinfos_supp = $xoopsDB->query('select * from ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $z . "'");
        [$id_supp, $nom_supp, $mail_supp, $passe_supp, $format_supp, $nbjs_supp, $nbphp_supp, $nblien_supp, $nbnew_supp, $dateajout_supp, $recu_supp] = $xoopsDB->fetchRow($resultinfos_supp);
        if ($recu_supp > 1) {
            $s_rs = 's';
        } else {
            $s_rs = '';
        }
        echo "<table align='center' border='0' cellspacing='1' cellpadding='3' class='even'>\n"
             . "<tr>\n"
             . "<td width='100%' colspan='2' class='even' align='center'><p><b>"
             . _INFOABB
             . "</b></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>ID:</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $id_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _ENOM
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $nom_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _EMAIL
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $mail_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _VOTREPASS
             . "</td>\n"
             . "<td width='50%' class='odd'><font color='red'><i><b>"
             . base64_decode($passe_supp)
             . "</b></i></font></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even' valign='top'>"
             . _DATEABONNEMENT
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . date_inscription($dateajout_supp)
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even' valign='top'>"
             . _LETTRE
             . $s_rs
             . _RECU
             . $s_rs
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $recu_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='100%' colspan='2' class='even' align='center'><p><b>"
             . _INFOMAIL
             . "</b></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _CHOIXFORMAT
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $format_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _DERNIERSS
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $nbjs_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _DERNIERTT
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $nbphp_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _DERNIERLL
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $nblien_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right' class='even'>"
             . _DERNIERAA
             . "</td>\n"
             . "<td width='50%' class='odd'><i><b>"
             . $nbnew_supp
             . "</b></i></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'><a href=\""
             . XOOPS_URL
             . '/modules/PP-News/admin/index.php?choix=supprime_user&x=ad_su_us&y=2&z='
             . $z
             . '"><b>'
             . _OUI
             . "</b></a></td>\n"
             . "<td width='50%'><a href=\""
             . XOOPS_URL
             . '/modules/PP-News/admin/index.php"><b>'
             . _NON
             . "</b></a></td>\n"
             . "</tr>\n"
             . "</table>\n"
             . "</center>\n\n";
    } elseif ($y == 2) {
        $xoopsDB->queryF('DELETE FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $z . "'");
        echo "<center><font color='red'>" . _SUPPOK . '</font></center>';
        echo '<br><br><br>';
    }
}

switch ($x) {
    case 'ad_su_us':
        admin_supp_user($z, $y);
        break;

    default:
        admin_form_supp();
        break;
}

