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
require 'xoops_version.php';
include 'header.php';

if ('PP-News' == $xoopsConfig['startpage']) {
    $xoopsOption['show_rblock'] = 1;

    require XOOPS_ROOT_PATH . '/header.php';

    make_cblock();

    echo '<br>';
} else {
    $xoopsOption['show_rblock'] = 0;

    require XOOPS_ROOT_PATH . '/header.php';
}
//#####________________________________________________________________

require XOOPS_ROOT_PATH . '/modules/PP-News/conf/fonctions_lettre.php';

OpenTable();

function form_simple_user()
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $defaut_js, $defaut_php, $defaut_lien, $defaut_new, $active_js, $active_php, $active_lien, $active_new;

    echo "<center>\n"
         . "<table border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' class='even' NOWRAP><p align='center'><b>"
         . _INSCRIPTIONA
         . $xoopsConfig['sitename']
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%'>\n"
         . "<form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2'><p align='center'>"
         . _INFOSINSCRIPTION
         . "<br>-----------</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='3'>\n"
         . "<tr><td align='center'>"
         . ''
         . _VOTREADRESSEMAIL
         . " <input type='text' name='mail_user' size='25'> <input type='radio' value='html' checked name='format_mail'> "
         . _FORMATHTML
         . " <input type='radio' name='format_mail' value='txt'> "
         . _FORMATTXT
         . "</td>\n"
         . "</tr>\n"
         . "</table><br>\n"
         . "<input type='HIDDEN' name='choix' value='ok'>\n"
         . "<input type='HIDDEN' name='file' value='index'>\n"
         . "<input type='HIDDEN' name='rapide' value='1'>\n"
         . "</td>\n"
         . "</tr>\n"
         . " <tr>\n"
         . "<td width='100%' colspan='2' align='center'><input type='submit' value='"
         . _INSCRIPTION
         . "'></td>\n"
         . "</tr>\n"
         . "</center>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2'><p>"
         . _INFOSRECU
         . "</p>\n"
         . '<p>';

    if (0 == $active_js and 0 != $defaut_js) {
        echo '' . _LES . ' <b>' . $defaut_js . '</b> ' . _DERNIERSS2 . "<br>\n";
    }

    if (0 == $active_php and 0 != $defaut_php) {
        echo '' . _LES . ' <b>' . $defaut_php . '</b> ' . _DERNIERTT2 . "<br>\n";
    }

    if (0 == $active_lien and 0 != $defaut_lien) {
        echo '' . _LES . ' <b>' . $defaut_lien . '</b> ' . _DERNIERLL2 . "<br>\n";
    }

    if (0 == $active_new and 0 != $defaut_new) {
        echo '' . _LES . ' <b>' . $defaut_new . '</b> ' . _DERNIERAA2 . "<br>\n";
    }

    echo "\n"
         . "<p align='left'>"
         . _INFOSAVANCEE
         . "<br>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<center>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2'>\n"
         . "<table border='0' width='100%' cellspacing='0' cellpadding='3'>\n"
         . "<tr>\n"
         . "<td width='50%' align='center'>\n"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/modifier.php">'
         . _MODISUPP
         . "</a></td>\n"
         . "<td width='50%' align='center'>\n"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/index.php?choix=inscription_user">'
         . _INSCRIPTIONAVANCE
         . "</a></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";
}

function forme_inscription()
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $nom_user, $bgcolor2, $textcolor1, $mail_user, $format_mail, $nb_js, $nb_php, $nb_lien, $nb_new, $ModName, $sitename, $nb_js_max, $nb_php_max, $nb_lien_max, $nb_new_max, $defaut_mail, $defaut_js, $defaut_php, $defaut_lien, $defaut_new, $active_js, $active_php, $active_lien, $active_new, $choix;

    echo "<center>\n" . "<table border='0' cellspacing='0' cellpadding='0' bordercolor='#CCCCCC'>\n" . "<tr>\n" . "<td width='100%' class='even' NOWRAP align='center'><b>" . _INSCRIPTIONA . $xoopsConfig['sitename'] . "<br></b><i><b>\n";

    $resultcount = $xoopsDB->queryF('select id_user from ' . $xoopsDB->prefix('pp_newsletter') . '');

    $nb_user_insc = $xoopsDB->getRowsNum($resultcount);

    echo $nb_user_insc;

    if ($nb_user_insc > 1) {
        $le_s = '' . _LES1 . '';
    } else {
        $le_s = '' . _LES2 . '';
    }

    echo '</b> '
         . _INSCRIT
         . ''
         . $le_s
         . "<b>\n"
         . "</td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='267'><form method='POST' action='"
         . $PHP_SELF
         . "'><p align='center'><br>"
         . _CHOISISSEZFORMAT
         . "</p>\n"
         . "<table border='0' width='100%'>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _VOTRENOM
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='text' name='nom_user' size='20' value='"
         . stripslashes(htmlspecialchars($nom_user, ENT_QUOTES | ENT_HTML5))
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _VOTREMAIL
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='text' name='mail_user' size='20' value='"
         . stripslashes(htmlspecialchars($mail_user, ENT_QUOTES | ENT_HTML5))
         . "'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _VOTREPASS
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='password' name='passe_user' size='20'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _COMFPASS
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='password' name='conf_passe_user' size='20'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _CHOIXFORMAT
         . "</td>\n"
         . "<td width='50%' NOWRAP>\n";

    if ($format_mail) {
        if ('html' == $format_mail) {
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

    echo "<select size='1' name='format_mail'>\n" . '<option ' . $sehtml . " value='html'>HTML</option>\n" . '<option ' . $setxt . " value='txt'>TXT</option>\n" . "</select>\n" . "</td>\n" . "</tr>\n";

    if ('ok' == $choix) {
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
        echo "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERSS . "</td>\n" . "<td width='50%' NOWRAP>";

        echo menu_deroulant('nb_js', $nb_js_max, $sejs);

        echo "</td>\n" . "</tr>\n";
    }

    if (0 == $active_php) {
        echo "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERTT . "</td>\n" . "<td width='50%' NOWRAP>";

        echo menu_deroulant('nb_php', $nb_php_max, $sephp);

        echo "</td>\n" . "</tr>\n";
    }

    if (0 == $active_lien) {
        echo "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERLL . "</td>\n" . "<td width='50%' NOWRAP>";

        echo menu_deroulant('nb_lien', $nb_lien_max, $selien);

        echo "</td>\n" . "</tr>\n";
    }

    if (0 == $active_new) {
        echo "<tr>\n" . "<td width='50%' align='right' NOWRAP>" . _DERNIERAA . "</td>\n" . "<td width='50%' NOWRAP>";

        echo menu_deroulant('nb_new', $nb_new_max, $senew);

        echo "</td>\n" . "</tr>\n";
    }

    echo "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _DATE
         . "</td>\n"
         . "<td width='50%' NOWRAP><i>"
         . date_inscription(date('Ymd'))
         . "</i><input type='HIDDEN' value='"
         . date('Ymd')
         . "' name='dateajout'></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<p align='center'><input type='submit' value='"
         . _INSCRIPTION
         . "'><input type='reset' value='"
         . _RETABLIR
         . "'></p>\n"
         . "<input type='HIDDEN' name='file' value='index'>\n"
         . "<input type='HIDDEN' name='choix' value='ok'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table><br>&nbsp;\n"
         . '<a href="'
         . XOOPS_URL
         . '/modules/PP-News/modifier.php">'
         . _MODISUPP
         . "</a>!\n"
         . "</center>\n";
}

function enregistre_user($nom_userz, $mail_userz, $passe_userz, $conf_passe_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz)
{
    global $ModName, $textcolor1, $sitename, $nukeurl, $erreur, $msg_inscrit, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin, $rapide, $xoopsDB, $xoopsConfig, $xoopsModule;

    $resultcount = $xoopsDB->query('select count(id_user) from ' . $xoopsDB->prefix('pp_newsletter') . " WHERE mail_user='" . $mail_userz . "'");

    $nb_user_insc = $xoopsDB->fetchRow($resultcount);

    if ('' == $mail_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . ' ' . _MAILVIDE . '</p><p>&nbsp;</p>';

        if (1 == $rapide) {
            form_simple_user();
        } else {
            forme_inscription();
        }
    } elseif (!controlmail($mail_userz)) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . ' ' . _MAILBIDON . '</p><p>&nbsp;</p>';

        if (1 == $rapide) {
            form_simple_user();
        } else {
            forme_inscription();
        }
    } elseif ('' == $passe_userz or '' == $conf_passe_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . ' ' . _PASSEVIDE . '</p><p>&nbsp;</p>';

        forme_inscription();
    } elseif ($passe_userz != $conf_passe_userz) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . ' ' . _PASSENONIDENTIQUE . '</p><p>&nbsp;</p>';

        forme_inscription();
    } elseif ($nb_user_insc[0] > 0) {
        echo "<p>&nbsp;</p><p align='center'>" . $erreur . '<i> ' . _MAILPRESENT . '</i></p><p>&nbsp;</p>';

        if (1 == $rapide) {
            form_simple_user();
        } else {
            forme_inscription();
        }
    } else {
        $passe_userz1 = base64_encode(trim($passe_userz));

        $liste_valeurs = "'$nom_userz', '$mail_userz', '$passe_userz1', '$format_mailz', '$nb_jsz', '$nb_phpz', '$nb_lienz', '$nb_newz', '$dateajoutz'";

        $liste_champs = 'nom_user, mail_user, passe_user, format_mail, nb_js, nb_php, nb_lien, nb_new, date_in';

        $xoopsDB->queryF('INSERT INTO ' . $xoopsDB->prefix('pp_newsletter') . " ($liste_champs) VALUES ($liste_valeurs)");

        $subject = _SUJETINSCIPTION . ' ' . $xoopsConfig['sitename'] . ']';

        $msg = _BONJOUR . $nom_userz . ",\n" . stripslashes(base64_decode($msg_inscrit, true)) . "\n";

        $msg .= _RAPPELINFOS . "\n\n";

        $msg .= infos_user($nom_userz, $passe_userz, $mail_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz);

        $body = h_mail('' . _INSCRIPTIONEN . '') . "\n\n" . $msg . "\n";

        $from = $mail_admin;

        mail($mail_userz, $subject, $body, "Von: $from\nX-Mailer: PHP/" . phpversion());

        echo "<center>\n";

        echo '<i><b>' . _INSCRIPTIONOK . '</b></i><br><br>' . _MAILCOMFIRME . '<br><br>';

        echo '<a href="' . XOOPS_URL . '">' . _ACCUEILSITE . '</a><br><br><i>' . $xoopsConfig['sitename'] . '</i></center>';
    }
}

function aleatoir_pass()
{
    $fin_passe = '';

    $lettres = 'er,in,tia,wol,fe,pre,vet,jo,nes,al,len,son,cha,ir,ler,bo,ok,tio,nar,sim,ple,bla,ten,toe,cho,co,lat,spe,ak,er,po,co,lor,pen,cil,li,ght,wh,at,the,he,ck,is,mam,bo,no,fi,ve,any,way,pol,iti,cs,ra,dio,sou,rce,sea,rch,pa,per,com,bo,sp,eak,st,fi,rst,gr,oup,boy,ea,gle,tr,ail,bi,ble,brb,pri,dee,kay,en,be,se';

    $lettres_tab = explode(',', $lettres);

    mt_srand((float)microtime() * 1000000);

    for ($count = 1; $count <= 4; $count++) {
        if (1 == mt_rand() % 10) {
            $fin_passe .= sprintf('%0.0f', (mt_rand() % 50) + 1);
        } else {
            $fin_passe .= sprintf('%s', $lettres_tab[mt_rand() % 62]);
        }
    }

    return ($fin_passe);
}

switch ($choix) {
    case 'ok':
        if (1 == $rapide) {
            $passe_user = aleatoir_pass();

            $conf_passe_user = $passe_user;

            $nb_js = $defaut_js;

            $nb_php = $defaut_php;

            $nb_lien = $defaut_lien;

            $nb_new = $defaut_new;

            $dateajout = date('Ymd');

            $nom_user = '';
        }
        enregistre_user($nom_user, $mail_user, $passe_user, $conf_passe_user, $format_mail, $nb_js, $nb_php, $nb_lien, $nb_new, $dateajout);
        copyright();
        break;
    case 'inscription_user':
        forme_inscription();
        copyright();
        break;
    default:
        form_simple_user();
        copyright();
        break;
}

CloseTable();
require XOOPS_ROOT_PATH . '/footer.php';
