<?php

// File: $Id: main.php,v 1.1 2006/03/27 16:14:13 mikhail Exp $ $Name:  $
######################################################################
# PP-News v 1.4 Beta                                 4th January 2002  #
# Mailinglist and News for Postnuke                                    #
# PostNuke Conversion by:                                              #
#                          Massimiliano Tiraboschi                     #
#                                                                      #
#           webmaster@postnukeit - www.postnuke.it                     #
#           Italian Support for Postnuke and Open-Source               #
#                                                                      #
######################################################################
# Modified version of: 1.3 Beta
######################################################################
# PP-News Newsletter                                                   #
# Copyright : (C) 2000, 2001 www.postnuke.it & www.presencenet.net     #
# WWW       : http://www.postnuke.it - http://www.presencenet.net      #
######################################################################
#       Adaptation to PostNuke Rogue and last modifications by :       #
#               Falco171 || http://www.falco171.net                    #
######################################################################
# Adaptation to xoops RC2 : Gilles Plume || muple@wanadoo.fr          #
# translated to deutsch : frankblack@01019freenet.de                   #
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
/****************************************************
 * // Fichier lang-francais.php (Réalisé par Laurent Besses)
 * /****************************************************
 * Fichiers : modules/PP-News/conf/fonctions_lettre.php
 *****************************************************/
// Format de la date
define('_DATENL', 'de');

define('_RETOURR', 'Zurück');
define('_AUCUN', 'keine');
define('_PROGRAMMENL', 'Newsletter-Programm von ');
define('_LE', 'Am ');
define('_ERREUR', 'FEHLER:');
define('_DATEINSCRIPTION', 'Registrierungsdatum:');
define('_DERNIERSS', 'Neueste Umfragen:');
define('_DERNIERTT', 'Neueste Downloads:');
define('_DERNIERLL', 'Neueste Links:');
define('_DERNIERAA', 'Neueste Artikel:');
define('_LES', 'Die ');
define('_PASDENOM', 'Sie haben keinen Namen eingegeben!');
define('_VOUSPOUVEZMODIFIER', 'Sie können jederzeit Ihre Angaben ändern/löschen!');
define('_POURCELARDV', 'Gehen Sie zu folgender URL...');
define('_COPIERCOLLER', 'Sie können diese URL mit Kopieren/Einfügen in Ihren Browser übernehmen.');
define('_VOUSRECEVREZ', 'Sie erhalten die folgenden Informationen über PP-News:');

/****************************************************
 * Fichiers : modules/PP-News/archives.php
 *****************************************************/
define('_ARCHIVESNL', 'Newsletter-Archive gesendet.');
define('_CLIQUEZFORMAT', 'Klicken Sie auf TXT oder HTML um den Newsletter im jeweiligen Format zu erhalten.');
define('_DATEENVOIS', 'Sendedatum');
define('_RECEVOIRFORMAT', 'Erhalten im gewählten Format');
define('_ARCHIVEDU', 'Archiv vom ');
define('_ENVADD', 'gesendet an folgende Adresse:');

/****************************************************
 * Fichiers : modules/PP-News/index.php
 *****************************************************/
define('_DERNIERSS2', 'neuesten Umfragen');
define('_DERNIERTT2', 'neuesten Downloads');
define('_DERNIERLL2', 'neuesten Links');
define('_DERNIERAA2', 'neuesten Artikel');
define('_INSCRIPTIONA', 'Registrierung des Newsletters auf ');
define('_INFOSINSCRIPTION', 'Geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf <i><b>Registrierung</i>. Sie erhalten eine Bestätigungs-Mail.');
define('_VOTREADRESSEMAIL', 'Ihre E-Mail-Adresse:');
define('_FORMATHTML', 'HTML-Format');
define('_FORMATTXT', 'TEXT-Format');
define('_INSCRIPTION', 'Registrierung');
define('_INFOSRECU', 'Mit dem Newsletter werden Sie auch die folgenden Informationen erhalten:');
define('_INFOSAVANCEE', 'Wenn Sie auf <i>Erweitertes Abonnement</i> klicken, können Sie auswählen was Sie über den Newsletter erhalten wollen.');
define('_MODISUPP', 'Konto ändern/löschen');
define('_INSCRIPTIONAVANCE', 'Erweitertes Abonnement');
define('_CHOISISSEZFORMAT', 'Wählen Sie das Format und den Inhalt des Newsletters');
define('_VOTRENOM', 'Ihr Name:');
define('_VOTREMAIL', 'Ihre E-Mail-Adresse:');
define('_VOTREPASS', 'Passwort:');
define('_COMFPASS', 'Passwortbestätigung:');
define('_CHOIXFORMAT', 'E-Mail-Format:');
//define("_DATE","Date :");
define('_RETABLIR', 'Zurücksetzen');
define('_MAILVIDE', 'Sie müssen eine E-Mail-Adresse angeben!');
define('_MAILBIDON', 'Ihre E-Mail-Adresse ist ungültig!');
define('_PASSEVIDE', 'Sie müssen ein Passwort und eine Passwortbestätigung angeben!');
define('_PASSENONIDENTIQUE', 'Die Passwörter sind nicht gleich. Bitte geben Sie zweimal das gleiche Passwort ein!');
define('_MAILPRESENT', 'Diese E-Mail-Adresse existiert bereits in der Datenbank!');
define('_BONJOUR', 'Hallo ');
define('_RAPPELINFOS', 'Hier sind die gespeicherten Informationen:');
define('_RAPPELINFOS2', ', hier sind die gespeicherten Informationen:');
define('_SUJETINSCIPTION', 'Abonnement [Newsletter');
define('_INSCRIPTIONOK', 'Abonnement erfolgreich ausgeführt!');
define('_MAILCOMFIRME', 'Sie bekommen in Kürze eine Bestätigungs-Mail. Vielen Dank...');
define('_ACCUEILSITE', 'Homepage');

/****************************************************
 * Fichiers : modules/PP-News/modifier.php
 *****************************************************/
define('_IDENTIFICATION', 'Identifikation');
define('_PASSEOUBLIER', 'Passwort vergessen?');
define('_ADRESSEPASOK', 'Diese E-Mail-Adresse ist nicht registriert!');
define('_PASSENONOK', 'Ungültiges Passwort!');
define('_MODIFIERVOSINFOS', 'Konto ändern!');
define('_FAIREUNTEST', 'Testen?');
define('_LETTRE', 'Newsletter');
define('_RECU', ' erhalten:');
define('_MODIFIER', 'Ändern');
define('_VOIRARCHIVES', 'Archive ansehen');
define('_SUPPRIMEADRESSE', 'Ihre E-Mail-Adresse löschen');
define('_PROBLEMEID', 'Problem bei der Identifizierung!');
define('_SUJETMODIFICATION', 'Informationen ändern [Newsletter ');
define('_VOUSAVEZMODIFIER', 'Sie haben Ihr Konto geändert.');
define('_MODIFICATIONOK', 'Änderungen erfolgreich ausgeführt !');
define('_IDPROBLEMES', 'Es gab ein Problem mit Ihrer ID!');
define('_SUPPRIMERABONNE', 'Einen Abonnenten löschen.');
define('_CONFIRMATION', 'Bestätigung');
define('_ETESVOUSSUR', 'Sind Sie sicher, dass Sie Ihre E-Mail-Adresse aus dem Newsletter austragen möchten?');
define('_INFOVOUSCONSENRANT', 'Ihr Konto:');
define('_INFOMAIL', 'Mail-Infos');
define('_SUPPRIMER', 'Löschen');
define('_ANNULER', 'Abbrechen');
define('_EFFECTUER', 'Abschicken');
define('_SUPPCOMFIRMER', 'Ihre E-Mail-Adresse wurde gelöscht!');
define('_FAITEMODIFESDESIRER', 'Gewünschte Änderungen ausführen');
define('_SUJETSUPPRESSION', 'Benutzer löschen [Newsletter ');

/****************************************************
 * Fichiers : modules/PP-News/test_mail.php
 *****************************************************/
define('_TESTERMAILFORMAT', 'Mail-Format-Test.');
define('_ADRESSEDESTINATION', 'Zieladresse >>');
define('_INFOS', 'Infos');
define('_FORMATACTUEL', 'Zur Zeit erhalten Sie Ihren Newsletter im Format');
define('_INFOMAIL1', 'Klicken Sie auf den Button &quot;<i>Mail in HTML erhalten</i>&quot;.');
define('_INFOMAIL2', 'Sie werden den Newsletter in HTML erhalten.');
define('_INFOMAIL3', 'Kontrollieren Sie die Lesbarkeit nach dem Erhalt der E-Mail.');
define('_INFOMAIL4', 'Wenn alles lesbar ist, können Sie das HTML-Format wählen.');
define('_INFOMAIL5', 'Nachdem Sie den Button angeklickt haben, sehen Sie ein Beispiel.');
define('_INFOMAIL6', 'Die E-Mail muss identisch mit dem Beispiel sein.');
define('_RECEVOIRMAILHTML', 'Mail in HTML erhalten');
define('_SUJETTESTMAILHTML', 'Test-E-Mail in HTML [Newsletter ');
define('_MESSAGEHTML', 'Test-Nachricht in HTML');
define('_POUVEZLIRECORRECTEMENT', 'Können Sie diese Mail ohne Probleme lesen? Ja?, dann können Sie den Newsletter als HTML konfigurieren!');
define('_CLIQUEZICIRETOUR', 'Klicken Sie hier um zur Newsletter-Konfigurationsseite zurückzugehen');
define('_MODELMAILHTML', 'Beispiel-Nachricht versendet');
define('_RETOURMODIFES', 'Zurück zur Konfigurationsseite');

/****************************************************
 * Fichiers : modules/PP-News/passe_perdu.php
 *****************************************************/
define('_RECEVOIRPASSE', 'Passwort anfordern.');
define('_INFOSPASSEPERDU', 'Geben Sie Ihre E-Mail-Adresse ein und klicken Sie auf &quot;Abschicken&quot;. Das Passwort wird an die angegebene E-Mail-Adresse versendet.');
define('_SIBDDOK', '(Wenn es in der Datenbank vorhanden ist)');
define('_RECEVOIR', 'Abschicken');
define('_SUJETPASSEPERDU', 'Passwort-Anforderung [Newsletter ');
define('_MAILPASSEPERDU', 'Sie oder eine andere Person haben ein neues Passwort angefordert, weil das alte verloren ging.');
define('_INFOMAILPARTIES', 'Ihre Registrierungsdaten wurden Ihnen per E-Mail zugesandt.');
define('_ADRESSERECEPTION', 'Empfänger-Adresse >>');
define('_VOTREMOTDEPASSE', '- Ihr Passwort: ');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_ajout_user.php
 *****************************************************/
define('_INSOK', 'Registrierung erfolgreich !');
define('_MAILENVOYER', 'Es wurde Ihnen eine Bestätigungs-Mail zugesandt');
define('_MAILPASENVOYER', 'Es wurde <b>keine</b> Bestätigungs-Mail gesendet.');
define('_DEMENVMAIL', 'Eine Bestätigungs-Mail senden?');
define('_OUI', ' Ja');
define('_NON', ' Nein');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_modif_user.php
 *****************************************************/
define('_MODIFIERMEMBRE', 'Newsletter-Benutzer ändern');
define('_CHOIXEMAIL', 'Geben Sie die zu ändernde E-Mail-Adresse ein.');
define('_MODIFIERMAIL', 'Ändern Sie die E-Mail-Adresse:');
define('_ENOM', 'Name:');
define('_EMAIL', 'E-Mail:');
define('_MODIFESOK', 'Änderungen erfolgreich ausgeführt!');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_supp_user.php
 *****************************************************/
define('_SUPPRIMERMEMBRE', 'Newsletter-Benutzer löschen');
define('_CHOIXEMAILM', 'Geben Sie die zu löschende E-Mail-Adresse ein.');
define('_SUPPRIMEMAIL', 'Löschen Sie diese E-Mail-Adresse:');
define('_DATEABONNEMENT', 'Registrierungs-Datum:');
define('_SUPPOK', '<b><i>Löschung</i></b> des Benutzers erfolgreich!');
define('_SUPPSIC', 'Sind Sie sicher, dass Sie Ihre E-Mail-Adresse löschen möchten?');
define('_INFOMAIL20', 'Infos zu Ihrer Konfiguration:');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_voir_user.php
 *****************************************************/
define('_VOIRABONNES', 'Newsletter-Benutzerliste');
define('_INSCRIENT', 'Benutzer');
define('_INSCRIT', 'Benutzer');
define('_ILYA', 'Da ist');
define('_MEMBRE', 'Benutzer');
define('_AJOUTERMAIL', 'E-Mail hinzufügen');
define('_DATEAJOUT', 'Hinzugefügt am:');
define('_MAILRECU', 'Erhaltene E-Mail');
define('_ACTION', 'Aktion');
define('_VOIR', 'Vorschau');
define('_INFOABB', 'Benutzerinfo');
define('_LES1', '');
define('_LES2', '');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_envois_mails.php
 *****************************************************/
define('_NUMTITRE', '# - TITEL');
define('_TOUSLESSONDAGE', 'Alle Umfragen');
define('_VOTES', 'Stimmen');
define('_HITS', 'Aufrufe');
define('_TOUSTELECHARGEMENTS', 'Alle Downloads');
define('_TOUSLESLIENS', 'Alle Links');
define('_TITRE', 'Titel: ');
define('_PPNEWS_URL', 'URL: ');
define('_PPNEWS_CATEGORIES', 'Katégorie: ');
define('_SUJET', 'Thema: ');
define('_LALETTREDINFOS', 'Newsletter vom ');
define('_RETROUVEZAUSSI', 'Außerdem in dieser E-Mail:');
define('_DEFINIPARUSER', 'Definiert vom Benutzer');
define('_VALEURPARDEFAUT', 'Standardwert');
define('_ADMIN', 'Administration');
define('_FONCTIONDEACTIVER', 'Nicht aktivierte Funktion.');
define('_ENVOYERMAILING', 'Ein Mailing versenden');
define('_MODIFIERDEFAUT', 'Standardwerte ändern');
define('_ECRIRELALETTRE', 'Den Newsletter schreiben');
define('_MSGPRINCIPAL', 'Schreiben Sie hier die Hauptnachricht. Sie wird am Beginn der Nachricht stehen.');
define('_MSGSECONDAIRE', 'Schreiben Sie hier die Fußzeilen. Sie werden nach dem Rest und vor der Signatur stehen.');
define('_NLENVOYERA', 'Newsletter gesendet an');
define('_POURCONTROLE', 'zur Kontrolle!');
define('_TRANSLE', ', verschickt am ');
define('_TRANSLE2', 'Verschickt am ');

/****************************************************
 * Fichiers : admin/modules/admin_psn-newsletter.php
 *****************************************************/
define('_ADMINNEWSLETTER', 'Newsletter Administration');
define('_LANEWSLETTER', 'Newsletter');
define('_CONFIGNEWSL', 'Newsletter Konfiguration');
define('_MAX', 'Max. ');
define('_DEACTIVER', 'Inaktiv');
define('_ENREGISTRER', 'Eintrag');
define('_MSGINSCDEINSC', 'Anmeldungs-/Abmeldungsnachrichten');
define('_MSGINSCIRPTION', 'Anmeldungsnachricht');
define('_MSGDEINSCRIPTION', 'Abmeldungsnachricht');
define('_VOTRESIGNATURE', 'Ihre Signatur');
define('_MSGOK', 'Registrierte Nachrichten');
define('_METTREENTIERPOUR', 'Sie müssen einen Integer-Wert für ');
define('_CONFIGUEOK', 'Konfiguration gespeichert');
define('_CONFIGUEDEFAUT', 'Standard Newsletter-Konfiguration');
define('_MSGDEFAUT', 'Geben Sie eine Standard-Newsletter-Konfiguration ein. Diese wird für Benutzer genommen, die ihre E-Mail-Adresse ohne Ausfüllen des Formulars angegeben haben. Ein zufälliges Passwort wird diesen Benutzern zugesandt!');
define('_DEFAULTOK', 'Standardwerte gespeichert');
define('_ARCHIVESUPPRIMER', 'Archiv gelöscht');
define('_ERREURARCHIVE', 'Fehler: Archiv nicht gefunden!');
define('_NOTE', 'Hinweis:');
define('_INFOSHELP', ' Wenn Sie Hilfe brauchen, klicken Sie auf "<i>Online Manual</i>" oder klicken Sie');
define('_ICI', 'hier');
define('_LESMEMBRES', 'Benutzer');
define('_AJOUTER', 'Hinzufügen');
define('_VISUALISER', 'Anzeigen');
define('_LALETTRE', 'Mitteilung');
define('_ENVOYER', 'Mailing');
define('_CONFIGURER', 'Konfigurieren');
define('_VALEURSPARDEFAULTS', 'Standardwerte');
define('_MESSAGES', 'Nachrichten');
define('_ARCHIVES', 'Archive');
define('_ARTICLES', 'Artikel');
define('_ERRMAIL1', 'Fehler: Ihre Nachricht wurde nicht gesendet. Prüfen Sie, ob Ihre Mail-Funktionen richtig funktionieren.');
define('_PPNEWSDA', 'Newsletter von  ');
define('_ERRMAIL2', 'Verzeichnis ');
define('_ERRMAIL3', 'nicht gefunden ');
define('_ERRMAIL4', 'keine Schreibberechtigung ');
define('__INVADM', 'Administration');
define('_MDPPERDU', 'Passwort vergessen');
define('_MODIFICATION', 'Ändern');
define('_SUPPRESSION', 'Löschen');
define('_INSCRIPTIONEN', 'Anmelden');
define('_RETROUVEZAUSSI0', 'Inhalt');

define('_BGCOLOR_1', 'Hintergrundfarbe Reihe 1 (HTML-Code):');
define('_BGCOLOR_2', 'Hintergrundfarbe Reihe 1:');
define('_TEXTCOLOR_1', 'Textfarbe:');
define('_TEXTCOLOR_2', 'Linkfarbe:');
define('_DANKE', 'Vielen Dank!');
define('_ID_PROB', 'Ihre ID verursachte Probleme!');
//--> Fin du fichier lang-francais.php (Réalisé par Laurent Besses)
