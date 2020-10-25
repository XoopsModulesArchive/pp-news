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

function liste_archives($id_user, $passe_user)
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $xoopsTheme, $xoopsUser;

    $resultarchive = $xoopsDB->query('select count(id_user) FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $id_user . "' AND passe_user='" . $passe_user . "'");

    $resu = $xoopsDB->fetchRow($resultarchive);

    if ($resu[0] > 0) {
        OpenTable();

        echo "<table border='0' align='center' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3'>\n"
             . "<tr>\n"
             . "<td width='100%' height='19' class='even'><p align='center'><b>"
             . _ARCHIVESNL
             . "</b></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='100%'><center>"
             . _CLIQUEZFORMAT
             . "<br>----------\n"
             . "<table border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3'>\n"
             . "<tr>\n"
             . "<td width='19'>N°</td>\n"
             . "<td width='156'>"
             . _DATEENVOIS
             . "</td>\n"
             . "<td width='289' colspan='2'><p align='center'>"
             . _RECEVOIRFORMAT
             . "</td>\n"
             . "</tr>\n";

        $path = XOOPS_ROOT_PATH . '/modules/PP-News/archives';

        $folder = dir($path);

        $n = 1;

        while ($fichier = $folder->read()) {
            $file_envq = count($fichier);

            if ('.' != $fichier and '..' != $fichier) {
                $form = str_replace('.htm', '', $fichier);

                echo "<tr>\n"
                     . "<td width='19' nowrap>"
                     . $n
                     . "</td>\n"
                     . "<td width='200' nowrap><i>"
                     . date_inscription($form)
                     . "</i></td>\n"
                     . "<td width='140' nowrap><p align='center'><a href=\"modules.php?&op=modload&name=PP-News&file=archives&mail_user="
                     . $mail_user
                     . '&archive=recevoir&nom='
                     . $form
                     . "&format=0\">HTML</a></td>\n"
                     . "<td width='141' nowrap><p align='center'><a href=\"modules.php?&op=modload&name=PP-News&file=archives&mail_user="
                     . $mail_user
                     . '&archive=recevoir&nom='
                     . $form
                     . "&format=1\">TEXT</a></td>\n"
                     . "</tr>\n";

                $n++;
            }
        }

        $folder->close();

        echo "</table>\n" . "</center>\n" . "</td>\n" . "</tr>\n" . "</table>\n" . "<center>\n" . $retour . "</center>\n";
    } else {
        echo "<SCRIPT LANGUAGE='JavaScript'>";

        echo "document.location.href='" . XOOPS_URL . "/modules/PP-News/index.php'";

        echo '</SCRIPT>';

        CloseTable();
    }
}

function header_mail_arch($format)
{
    global $xoopsDB, $xoopsConfig, $xoopsModule;

    if (1 == $format) {
        $headers = "From: $mail_admin\nReply-To: phpversion()n";
    } else {
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        $headers .= "From: $mail_admin\n";

        $headers .= "X-Sender: <$mail_admin>\n";

        $headers .= "X-Mailer: PHP\n"; // mailer

        $headers .= "Return-Path: <$mail_admin>\n";
    }

    return ($headers);
}

function recev_archive($nom, $format, $mail_user)
{
    global $retour, $xoopsDB, $xoopsConfig, $xoopsModule;

    $texte_arch = file('modules/PP-News/archives/' . $nom . '.htm');

    mail($mail_user, $subject, base64_decode($texte_arch[$format], true), header_mail_arch($format));

    echo '<center>' . _ARCHIVEDU . ' <i>' . date_inscription($nom) . '</i><br>' . _ENVADD . ' <i>' . $mail_user . '</i>.<br><br><br>' . $retour . "</center>\n";
}

switch ($archive) {
    case 'recevoir':
        recev_archive($nom, $format, $mail_user);
        copyright();
        break;
    default:
        liste_archives($id_user, $passe_user);
        copyright();
        break;
}
require XOOPS_ROOT_PATH . '/footer.php';
