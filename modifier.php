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

OpenTable();

function forme_identifier()
{
    global $id_mail, $id_passe, $bgcolor2, $textcolor1;

    echo "<center>\n"
         . "<table border='0' width='250' bordercolor='#CCCCCC' cellspacing='0' cellpadding='0'>\n"
         . "<tr>\n"
         . "<td width='100%' height='19' class='even'><p align='center'><b>"
         . _IDENTIFICATION
         . "</b></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' height='125'><form method='POST' action='"
         . $PHP_SELF
         . "'>\n"
         . "<table border='0' width='100%'>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _VOTREMAIL
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='text' name='id_mail' size='20' value='$id_mail'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='50%' align='right' NOWRAP>"
         . _VOTREPASS
         . "</td>\n"
         . "<td width='50%' NOWRAP><input type='password' name='id_passe' size='20' value='$id_passe'></td>\n"
         . "</tr>\n"
         . "<tr>\n"
         . "<td width='100%' colspan='2'><p align='center'><br>\n"
         . "<input type='submit' value='"
         . _IDENTIFICATION
         . "'><br><br>\n"
         . "<a href='passe_perdu.php'>"
         . _PASSEOUBLIER
         . "</a></td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "<input type='HIDDEN' name='file' value='modifier'>\n"
         . "<input type='HIDDEN' name='modifier' value='ident'>\n"
         . "</form>\n"
         . "</td>\n"
         . "</tr>\n"
         . "</table>\n"
         . "</center>\n";
}

function forme_modifier($passe, $email)
{
    global $xoopsConfig, $xoopsDB, $erreur, $s_rec, $nb_js_max, $textcolor1, $bgcolor2, $nb_php_max, $nb_lien_max, $nb_new_max, $active_js, $active_php, $active_lien, $active_new;

    $resultpasse = $xoopsDB->query('SELECT passe_user FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE mail_user='" . $email . "'");

    $nb_user_insc = $xoopsDB->getRowsNum($resultpasse);

    [$mot_passe] = $xoopsDB->fetchRow($resultpasse);

    $id_passe1 = base64_encode($passe);

    if ('' == $email) {
        echo '<center>' . $erreur . ' ' . _MAILVIDE . '</center>';

        forme_identifier();
    } elseif ('' == $passe) {
        echo '<center>' . $erreur . ' ' . _PASSEVIDE . '</center>';

        forme_identifier();
    } elseif (0 == $nb_user_insc) {
        echo '<center>' . $erreur . ' ' . _ADRESSEPASOK . '</center>';

        forme_identifier();
    } elseif ($id_passe1 != $mot_passe) {
        echo '<center>' . $erreur . ' ' . _PASSENONOK . '</center>';

        forme_identifier();
    } elseif (($id_passe1 == $mot_passe) and ($nb_user_insc > 0)) {
        $resultinfos = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE mail_user='" . $email . "'");

        [$m_id_user, $m_nom, $m_mail, $mot_passe, $m_format, $m_nb_js, $m_nb_php, $m_nb_lien, $m_nb_new, $m_date, $m_recu] = $xoopsDB->fetchRow($resultinfos);

        $passe_claire = base64_decode($mot_passe, true);

        echo "<center>\n"
             . "<table border='0' width='450' height='298' cellspacing='0' cellpadding='0'>\n"
             . "<tr>\n"
             . "<td width='100%' height='19' class='even' align='center'><b>"
             . _MODIFIERVOSINFOS
             . "</b></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='100%' height='267' align='center'><form name='form_insc' method='POST' action='"
             . $PHP_SELF
             . "'>"
             . _FAITEMODIFESDESIRER
             . "\n"
             . "<table border='0' width='100%'>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _VOTRENOM
             . "</td>\n"
             . "<td width='50%'><input type='text' name='nom_user' size='20' value='"
             . stripslashes(htmlspecialchars($m_nom, ENT_QUOTES | ENT_HTML5))
             . "'></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _VOTREMAIL
             . "</td>\n"
             . "<td width='50%'><input type='text' name='mail_user' size='20' value='"
             . stripslashes(htmlspecialchars($m_mail, ENT_QUOTES | ENT_HTML5))
             . "'></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _VOTREPASS
             . "</td>\n"
             . "<td width='50%'><input type='txt' name='passe_user' size='20' value='"
             . $passe_claire
             . "'></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _COMFPASS
             . "</td>\n"
             . "<td width='50%'><input type='txt' name='conf_passe_user' size='20' value='"
             . $passe_claire
             . "'></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _CHOIXFORMAT
             . "</td>\n"
             . "<td width='50%'>\n";

        if ('html' == $m_format) {
            $sehtml = 'selected';
        } else {
            $setxt = 'selected';
        }

        echo "<select size='1' name='format_mail'>\n"
             . '<option '
             . $sehtml
             . " value='html'>HTML</option>\n"
             . '<option '
             . $setxt
             . " value='txt'>TEXT</option>\n"
             . "</select>\n"
             . "<a href='"
             . XOOPS_URL
             . '/modules/PP-News/test_mail.php?id_user='
             . $m_id_user
             . "'>"
             . _FAIREUNTEST
             . "</a>\n"
             . "</td>\n"
             . "</tr>\n";

        if (0 == $active_js) {
            echo "<tr>\n" . "<td width='50%' align='right'>" . _DERNIERSS . "</td>\n" . "<td width='50%'>";

            if ($nb_js) {
                $sejs = $nb_js;
            } else {
                $sejs = $m_nb_js;
            }

            echo menu_deroulant('nb_js', $nb_js_max, $sejs);

            echo "</td>\n" . "</tr>\n";
        }

        if (0 == $active_php) {
            echo "<tr>\n" . "<td width='50%' align='right'>" . _DERNIERTT . "</td>\n" . "<td width='50%'>";

            if ($nb_php) {
                $sephp = $nb_php;
            } else {
                $sephp = $m_nb_php;
            }

            echo menu_deroulant('nb_php', $nb_php_max, $sephp);

            echo "</td>\n" . "</tr>\n";
        }

        if (0 == $active_lien) {
            echo "<tr>\n" . "<td width='50%' align='right'>" . _DERNIERLL . "</td>\n" . "<td width='50%'>";

            if ($nb_lien) {
                $selien = $nb_lien;
            } else {
                $selien = $m_nb_lien;
            }

            echo menu_deroulant('nb_lien', $nb_lien_max, $selien);

            echo "</td>\n" . "</tr>\n";
        }

        if (0 == $active_new) {
            echo "<tr>\n" . "<td width='50%' align='right'>" . _DERNIERAA . "</td>\n" . "<td width='50%'>";

            if ($nb_new) {
                $senew = $nb_new;
            } else {
                $senew = $m_nb_new;
            }

            echo menu_deroulant('nb_new', $nb_new_max, $senew);

            echo "</td>\n" . "</tr>\n";
        }

        if ($m_recu > 1) {
            $s_rec = 's';
        } else {
            $s_rec = '';
        }

        echo "<tr>\n"
             . "<td width='50%' align='right'>"
             . _DATEINSCRIPTION
             . "</td>\n"
             . "<td width='50%'><i>"
             . date_inscription($m_date)
             . "</i><input type='HIDDEN' value='"
             . $m_date
             . "' name='dateajout'></td>\n"
             . "</tr>\n"
             . "<tr>\n"
             . "<td width='50%' align='right'>"
             . _LETTRE
             . ' '
             . _RECU
             . "</td>\n"
             . "<td width='50%'><i>"
             . $m_recu
             . "</i><input type='HIDDEN' value='"
             . $m_recu
             . "' name='recu'></td>\n"
             . "</tr>\n"
             . "</table>\n"
             . "<p align='center'><input type='submit' value='"
             . _MODIFIER
             . "'><input type='reset' value='"
             . _RETABLIR
             . "'></p>\n"
             . "<input type='HIDDEN' name='file' value='modifier'>\n"
             . "<input type='HIDDEN' name='modifier' value='ok'>\n"
             . "<input type='HIDDEN' name='idm_user' value='"
             . $m_id_user
             . "'>\n"
             . "<input type='HIDDEN' name='xpasse_user' value='"
             . $id_passe1
             . "'>\n"
             . "</form>\n"
             . "</td>\n"
             . "</tr>\n"
             . "</table><br><br>\n"
             //."<form  align='center' method='POST' action='".XOOPS_URL."/modules/PP-News/archives.php'>\n"
             //."<input type='HIDDEN' name='file' value='archives'>\n"
             //."<input type='HIDDEN' name='id_user' value='".$m_id_user."'>\n"
             //."<input type='HIDDEN' name='passe_user' value='".$id_passe1."'>\n"
             //."<input type='HIDDEN' name='mail_user' value='".$m_mail."'>\n"
             //."<input type='submit' value='"._VOIRARCHIVES."'>\n"
             //."</form>\n"
             . "<form method='POST' action='"
             . $PHP_SELF
             . "'>\n"
             . "<table border='2' cellspacing='0' cellpadding='2' bordercolor='#000000' bgcolor='#FF0000' align='center'>\n"
             . "<tr>\n"
             . "<td width='100%' height='21' align='center'>\n"
             . "<input type='submit' value='"
             . _SUPPRIMEADRESSE
             . "' style='background-color: #FFFFFF; color: #FF0000'>\n"
             . "<input type='HIDDEN' name='file' value='modifier'>\n"
             . "<input type='HIDDEN' name='modifier' value='supprimer'>\n"
             . "<input type='HIDDEN' name='idm_user_supp' value='"
             . $m_id_user
             . "'>\n"
             . "<input type='HIDDEN' name='action' value='1'>\n"
             . "<input type='HIDDEN' name='xpasse_user' value='"
             . $id_passe1
             . "'>\n"
             . "</td>\n"
             . "</form>\n"
             . "</tr>\n"
             . "</table>\n"
             . "</center>\n";
    } else {
        echo '<center>' . $erreur . ' ' . _PROBLEMEID . '</center>';
    }
}

function enregistre_modifs($idm_userz, $nom_userz, $mail_userz, $passe_userz, $conf_passe_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz, $recuz)
{
    global $xoopsConfig, $xoopsDB, $textcolor1, $nukeurl, $erreur, $retour, $ModName, $signature, $active_js, $active_php, $active_lien, $active_new, $mail_admin;

    $resultcount_mail = $xoopsDB->query('SELECT count(id_user) FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE (mail_user='" . $mail_userz . "') AND (id_user !='" . $idm_userz . "')");

    $result_count = $xoopsDB->fetchRow($resultcount_mail);

    if ('' == $mail_userz) {
        echo '<center>' . $erreur . ' ' . _MAILVIDE . '' . $retour . '</center>';
    } elseif (!controlmail($mail_userz)) {
        echo '<center>' . $erreur . ' ' . _MAILBIDON . '' . $retour . '</center>';
    } elseif ('' == $passe_userz or '' == $conf_passe_userz) {
        echo '<center>' . $erreur . ' ' . _PASSEVIDE . '' . $retour . '</center>';
    } elseif ($passe_userz != $conf_passe_userz) {
        echo '<center>' . $erreur . ' ' . _PASSENONIDENTIQUE . '' . $retour . '</center>';
    } elseif ($result_count[0] > 0) {
        echo '<center>' . $erreur . ' ' . _MAILPRESENT . '' . $retour . '</center>';
    } else {
        $passe_userz1 = base64_encode(trim($passe_userz));

        $xoopsDB->queryF(
            'UPDATE ' . $xoopsDB->prefix('pp_newsletter') . " set
nom_user = '$nom_userz',
mail_user = '$mail_userz',
passe_user = '$passe_userz1',
format_mail = '$format_mailz',
nb_js = '$nb_jsz',
nb_php = '$nb_phpz',
nb_lien = '$nb_lienz',
nb_new = '$nb_newz',
date_in = '$dateajoutz',
recu = '$recu'
 WHERE id_user='$idm_userz'"
        );

        $subject = _SUJETMODIFICATION . $xoopsConfig['sitename'] . ']';

        $msg = "\n" . _BONJOUR . $nom_userz . ",\n" . _VOUSAVEZMODIFIER;

        $msg .= _RAPPELINFOS2 . "\n\n";

        $msg .= infos_user($nom_userz, $passe_userz, $mail_userz, $format_mailz, $nb_jsz, $nb_phpz, $nb_lienz, $nb_newz, $dateajoutz);

        $body = h_mail('' . _MODIFICATION . '') . "\n\n" . $msg . "\n";

        $from = $mail_admin;

        mail($mail_userz, $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());

        echo "<center>\n";

        echo '<i><b>' . _MODIFICATIONOK . '</b></i><br><br>' . _MAILCOMFIRME . '<br><br>';

        echo '<a href="' . XOOPS_URL . '">' . _ACCUEILSITE . '</a><br><br><i>' . $xoopsConfig['sitename'] . '</i></center>';
    }
}

function supprime_user($id_user_sup, $action)
{
    global $xoopsConfig, $xoopsDB, $textcolor1, $bgcolor2, $active_js, $active_php, $active_lien, $active_new, $xpasse_user, $mail_us, $mail_admin, $msg_deinscrit, $signature;

    $resultvoir2 = $xoopsDB->query('select * FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='" . $id_user_sup . "'");

    [$id_us, $nom_us, $mail_us, $passe_us, $form_mail, $nb_js_us, $nb_php_us, $nb_lien_us, $nb_new_us, $date_in_us, $recu_us] = $xoopsDB->fetchRow($resultvoir2);

    if ($xpasse_user == $passe_us) {
        if ($recu_us > 1) {
            $s_nl = 's';
        } else {
            $s_nl = '';
        }

        if ('' == $id_user_sup) {
            echo '<center>' . $erreur . '' . _IDPROBLEMES . '';
        } elseif (1 == $action) {
            echo "<center>\n"
                 . "<table border='0' cellspacing='0' cellpadding='2'>\n"
                 . "<tr>\n"
                 . "<td align='center' height='19' class='even' colspan='2' ><b>"
                 . _SUPPRIMERABONNE
                 . '</b>  [<i>'
                 . _CONFIRMATION
                 . "</i>]</b></td>\n"
                 . "</tr>\n"
                 . "<tr class='even'>\n"
                 . "<td colspan='2' height='40'><p align='center'><i>"
                 . _ETESVOUSSUR
                 . "</i></td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td colspan='2' height='115'>\n"
                 . "<center>\n";

            echo "<table align='center' border='0' cellspacing='1' cellpadding='3' width='100%' class='even'>\n"
                 . "<tr>\n"
                 . "<td width='100%' align='right' colspan='2' class='even'><p align='center'><b>"
                 . _INFOVOUSCONSENRANT
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
                 . _VOTRENOM
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . $nom_us
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='50%' align='right' class='even'>"
                 . _VOTREMAIL
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . $mail_us
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='50%' align='right' class='even'>"
                 . _VOTREPASS
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . base64_decode($passe_us, true)
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='50%' align='right' class='even' valign='top'>"
                 . _DATEINSCRIPTION
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . date_inscription($date_in_us)
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='50%' align='right' class='even' valign='top'>"
                 . _LETTRE
                 . $s_nl
                 . _RECU
                 . $s_nl
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . $recu_us
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='100%' align='right' colspan='2' class='even'><p align='center'><b>"
                 . _INFOMAIL20
                 . "</b></td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='50%' align='right' class='even'>"
                 . _CHOIXFORMAT
                 . "</td>\n"
                 . "<td width='50%' class='odd'>"
                 . $form_mail
                 . "</td>\n"
                 . "</tr>\n";

            if (0 == $active_js) {
                echo "<tr>\n" . "<td width='50%' align='right' class='even'>" . _DERNIERSS . "</td>\n" . "<td width='50%' class='odd'>" . $nb_js_us . "</td>\n" . "</tr>\n";
            }

            if (0 == $active_php) {
                echo "<tr>\n" . "<td width='50%' align='right' class='even'>" . _DERNIERTT . "</td>\n" . "<td width='50%' class='odd'>" . $nb_php_us . "</td>\n" . "</tr>\n";
            }

            if (0 == $active_lien) {
                echo "<tr>\n" . "<td width='50%' align='right' class='even'>" . _DERNIERLL . "</td>\n" . "<td width='50%' class='odd'>" . $nb_lien_us . "</td>\n" . "</tr>\n";
            }

            if (0 == $active_new) {
                echo "<tr>\n" . "<td width='50%' align='right' class='even'>" . _DERNIERAA . "</td>\n" . "<td width='50%' class='odd'>" . $nb_new_us . "</td>\n" . "</tr>\n";
            }

            echo "</table>\n\n\n"
                 . "</center>\n"
                 . "</td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='33%' height='22'><p align='center'><b><i><a href='"
                 . XOOPS_URL
                 . '/modules/PP-News/modifier.php?modifier=supprimer&action=2&idm_user_supp='
                 . $id_user_sup
                 . '&mail_us='
                 . $mail_us
                 . '&xpasse_user='
                 . $xpasse_user
                 . "'>"
                 . _SUPPRIMER
                 . "</a></i></b></td>\n"
                 . "<td width='34%' height='22'><p align='center'><b><i><A HREF='javascript:history.go(-1)'>"
                 . _ANNULER
                 . "</a></i></b></td>\n"
                 . "</tr>\n"
                 . "</table>\n\n\n"
                 . "</center>\n";
        } elseif (2 == $action) {
            $xoopsDB->queryF('DELETE FROM ' . $xoopsDB->prefix('pp_newsletter') . " WHERE id_user='$id_user_sup'");

            $subject = _SUJETSUPPRESSION . $xoopsConfig['sitename'] . ']';

            $msg .= stripslashes(base64_decode($msg_deinscrit, true)) . "\n";

            $msg .= stripslashes(base64_decode($signature, true));

            $body = h_mail('' . _SUPPRESSION . '') . "\n\n" . $msg . "\n";

            $from = $mail_admin;

            mail($mail_us, $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());

            //OpenTable();

            echo "<center>\n"
                 . "<table border='0' bordercolor='#CCCCCC' cellspacing='0' cellpadding='2'>\n"
                 . "<tr>\n"
                 . "<td width='100%' align='center' height='19' class='even'><b>"
                 . _SUPPRIMERABONNE
                 . ' </b>[<i>'
                 . _EFFECTUER
                 . "</i>]</b></td>\n"
                 . "</tr>\n"
                 . "<tr>\n"
                 . "<td width='100%' height='50'>\n"
                 . "<p align='center'><b><i>"
                 . _SUPPCOMFIRMER
                 . '</i></b></p>'
                 . "<p align='center'><i><a href='"
                 . XOOPS_URL
                 . "'>"
                 . _ACCUEILSITE
                 . '</a></i></p>'
                 . "</td></tr></table>\n";

            //CloseTable();
        }
    } else {
        echo $erreur;
    }
}

switch ($modifier) {
    case 'ok':
        enregistre_modifs($idm_user, $nom_user, $mail_user, $passe_user, $conf_passe_user, $format_mail, $nb_js, $nb_php, $nb_lien, $nb_new, $dateajout, $recu);
        copyright();
        break;
    case 'ident':
        forme_modifier($id_passe, $id_mail);
        copyright();
        break;
    case 'supprimer':
        supprime_user($idm_user_supp, $action);
        copyright();
        break;
    default:
        forme_identifier();
        copyright();
        break;
}
CloseTable();

require XOOPS_ROOT_PATH . '/footer.php';
