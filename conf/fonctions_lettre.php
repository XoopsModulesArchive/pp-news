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

require XOOPS_ROOT_PATH . '/modules/PP-News/cache/conf_nl.php';
require XOOPS_ROOT_PATH . '/modules/PP-News/cache/conf_mgs.php';

$erreur = "<font color='red'><b><i>" . _ERREUR . '</i></b></font>';
$retour = "<br><font color='red'>&nbsp;<A HREF='javascript:history.go(-1)'>" . _RETOURR . '</A>&nbsp;</font>';

function date_inscription($d)
{
    global $locale;

    setlocale(LC_TIME, (string)$locale);

    return (strftime('%d/%m/%Y', mktime(0, 0, 0, mb_substr($d, 4, 2), mb_substr($d, -2), mb_substr($d, 0, 4))));
}

function controlmail($mail_user)
{
    return (preg_match(
        '^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+' . '@' . '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' . '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$',
        $mail_user
    ));
}

function menu_deroulant($lenom, $nb_choix, $se)
{
    $liste = "<select size='1' name='" . $lenom . "'>\n";

    for ($i = $nb_choix; $i > 0; $i--) {
        $liste .= "<option value='" . $i . "'";

        if ($i == $se) {
            $liste .= ' selected';
        }

        $liste .= '>' . $i . "</option>\n";
    }

    $liste .= '</select>  ';

    if (0 == $se) {
        $dele = 'checked';
    } else {
        $dele = '';
    }

    $liste .= "<font color='red'><input type='checkbox' name='" . $lenom . "' value='0' " . $dele . '><i>' . _AUCUN . '</i>.</font>';

    return ($liste);
}

function h_mail($raison)
{
    global $xoopsConfig;

    $header = _PROGRAMMENL . $xoopsConfig['sitename'] . ' [' . $raison . "]\n";

    $header .= _TRANSLE2 . date_inscription(date('Ymd')) . "\n";

    return ($header);
}

function infos_user($nom_userz, $passe_userz, $mail_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz)
{
    global $signature, $xoopsConfig;

    if ('' != $nom_userz) {
        $msg1 .= '- ' . _VOTRENOM . ' ' . $nom_userz . "\n";
    } else {
        $msg1 .= '- ' . _PASDENOM . "\n";
    }

    $msg1 .= '- ' . _VOTREPASS . ' ' . $passe_userz . "\n";

    $msg1 .= '- ' . _VOTREMAIL . ' ' . $mail_userz . "\n";

    $msg1 .= '- ' . _CHOIXFORMAT . ' ' . $format_mailz . "\n\n";

    $msg1 .= _VOUSRECEVREZ . "\n";

    if (0 == $active_js) {
        $msg1 .= '- ' . _LES . $nb_jsz . ' ' . _DERNIERSS2 . "\n";
    }

    if (0 == $active_php) {
        $msg1 .= '- ' . _LES . $nb_phpz . ' ' . _DERNIERTT2 . "\n";
    }

    if (0 == $active_lien) {
        $msg1 .= '- ' . _LES . $nb_lienz . ' ' . _DERNIERLL2 . "\n";
    }

    if (0 == $active_new) {
        $msg1 .= '- ' . _LES . $nb_newz . ' ' . _DERNIERAA2 . "\n";
    }

    $msg1 .= _DATEINSCRIPTION . ' ' . date_inscription($dateajoutz) . "\n\n";

    $msg1 .= stripslashes(base64_decode($signature, true));

    "\n";

    $msg1 .= "\n";

    $msg1 .= "--------------------------------------------------------------------------\n";

    $msg1 .= _VOUSPOUVEZMODIFIER . "\n";

    $msg1 .= _POURCELARDV . ' ' . $xoopsConfig['xoops_url'] . "/modules/PP-News/modifier.php\n";

    $msg1 .= "--------------------------------------------------------------------------\n";

    return ($msg1);
}

function copyright()
{
    $copyright = "<br><center><font size='1'>Copyright © 2001 <a href=\"http://www.postnuke.it\" target=\"_blank\">Postnuke.it</a> & <a href=\"http://www.presencenet.net\" target=\"_blank\">presencenet.net</a></font></center><br>";

    echo($copyright);
}
