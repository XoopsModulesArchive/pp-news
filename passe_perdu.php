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

include 'header.php';
require XOOPS_ROOT_PATH . '/header.php';
require XOOPS_ROOT_PATH . '/modules/PP-News/conf/fonctions_lettre.php';

function forme_passe_perdu()
{
    global $xoopsConfig, $xoopsUser;

    OpenTable();

    echo "<table border='0' width='50%' bordercolor='#CCCCCC' cellspacing='0' cellpadding='2' align='center'>\n"
         . "<tr>\n"
         . "<td width='100%' align='center' class='even'><b><font size='2' color='$textcolor1'>"
         . _RECEVOIRPASSE
         . "</font></b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' align='center'>\n"
         . "<table border='0' width='100%'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2' height='38'><p align='center'><font size='2' color='$textcolor1'>"
         . _INFOSPASSEPERDU
         . "</font><br><font size='1' color='#FF0000'> \n"
         . _SIBDDOK
         . "</font><font size='2'> </font></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<td width='50%' height='23' align='right' class='even'><font size='2' color='$textcolor1'>"
         . _VOTREMAIL
         . "</font></td>\n"
         . "<td width='50%' height='23' class='even'><font size='2'><input type='text' name='email_p' size='20'></font>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='19' colspan='2'><p align='center'><font size='2' color='$textcolor1'><input type='submit' value='"
         . _RECEVOIR
         . "'></font></p>\n"
         . "<input type='HIDDEN' name='passe' value='recevoir'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n";

    CloseTable();
}

function recevoir_passe($email_p)
{
    global $xoopsDB, $xoopsUser, $xoopsConfig, $textcolor1, $erreur, $retour, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin;

    $resultpasse_p = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE mail_user='" . $email_p . "'");

    $nb_user_insc = $xoopsDB->getRowsNum($resultpasse_p);

    if ('' == $email_p) {
        echo '<center>' . $erreur . "<font size='2' color='$textcolor1'> " . _MAILVIDE . "</font>\n" . $retour . '</center>';
    } elseif ($nb_user_insc < 1) {
        echo '<center>' . $erreur . "<font size='2' color='$textcolor1'> " . _ADRESSEPASOK . "</font>\n" . $retour . '</center>';
    } else {
        [$m_id_user, $m_nom, $m_mail, $mot_passe, $m_format, $m_nb_js, $m_nb_php, $m_nb_lien, $m_nb_new, $m_date] = $xoopsDB->fetchRow($resultpasse_p);

        $passe_claire = base64_decode($mot_passe, true);

        $subject = _SUJETPASSEPERDU . $xoopsConfig['sitename'] . ']';

        $msg = "\n\n" . _BONJOUR . $m_nom . ",\n" . _MAILPASSEPERDU . "\n\n";

        $msg .= _VOTREMOTDEPASSE . $passe_claire . "\n\n";

        $msg .= infos_user($m_nom, $passe_claire, $m_mail, $m_format, $m_nb_js, $m_nb_php, $m_nb_lien, $m_nb_new, $m_date);

        $body = h_mail('' . _MDPPERDU . '') . "\n\n" . $msg . "\n";

        $from = $mail_admin;

        mail($email_p, $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());

        OpenTable();

        echo "<center><font size='2' color='$textcolor1'>" . _INFOMAILPARTIES . "<br>\n";

        echo _ADRESSERECEPTION . ' <b><i>' . $email_p . "</i></b></font>\n";

        CloseTable();
    }
}

switch ($passe) {
    case 'recevoir':
        recevoir_passe($email_p);
        copyright();
        break;
    default:
        forme_passe_perdu();
        copyright();
        break;
}
require XOOPS_ROOT_PATH . '/footer.php';
