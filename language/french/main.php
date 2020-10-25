<?php

// File: $Id: main.php,v 1.1 2006/03/27 16:14:14 mikhail Exp $ $Name:  $
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
# Adaptation to xoops RC2 : Gilles Plume || muple@wanadoo.fr		   #
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
define('_DATENL', 'fr');

define('_RETOURR', 'Retour');
define('_AUCUN', 'Aucun');
define('_PROGRAMMENL', 'Programme de newsletter de ');
define('_LE', 'Le ');
define('_ERREUR', 'ERREUR :');
define('_DATEINSCRIPTION', 'Date de votre inscription :');
define('_DERNIERSS', 'derniers sondages :');
define('_DERNIERTT', 'derniers téléchargements :');
define('_DERNIERLL', "derniers liens de l'annuaire :");
define('_DERNIERAA', 'derniers articles du site :');
define('_LES', 'Les ');
define('_PASDENOM', "Vous n'avez pas donné de nom !");
define('_VOUSPOUVEZMODIFIER', 'Vous pouvez à tout moment modifier/supprimer vos infos !');
define('_POURCELARDV', 'Pour cela RDV à cette adresse...');
define('_COPIERCOLLER', 'Vous pouvez faire un copier/coller de cette url dans votre navigateur favori.');
define('_VOUSRECEVREZ', 'Vous recevrez avec les mails les infos suivantes :');

/****************************************************
 * Fichiers : modules/PP-News/archives.php
 *****************************************************/
define('_ARCHIVESNL', 'Archives des mails envoyés');
define('_CLIQUEZFORMAT', 'Cliquez sur txt ou html pour recevoir<br>la lettre dans ce format.');
define('_DATEENVOIS', "Date d'envoi");
define('_RECEVOIRFORMAT', 'Recevoir dans le format choisi');
define('_ARCHIVEDU', 'Archive du');
define('_ENVADD', "Envoyé à l'adresse :");

/****************************************************
 * Fichiers : modules/PP-News/index.php
 *****************************************************/
define('_DERNIERSS2', 'derniers sondages');
define('_DERNIERTT2', 'derniers téléchargements');
define('_DERNIERLL2', "derniers liens de l'annuaire");
define('_DERNIERAA2', 'derniers articles du site');
define('_INSCRIPTIONA', 'Inscription à la newsletter de ');
define('_INFOSINSCRIPTION', 'Entrez votre adresse e-mail<br>et cliquez sur <i><b>Inscription<br></b></i>Vous recevrez un e-mail de confirmation');
define('_VOTREADRESSEMAIL', 'Votre adresse e-mail :');
define('_FORMATHTML', 'Format .html');
define('_FORMATTXT', 'Format .txt');
define('_INSCRIPTION', 'Inscription');
define('_INFOSRECU', 'Infos<br>Avec les mails vous recevrez aussi les informations suivantes :');
define('_INFOSAVANCEE', 'En cliquant sur <i>Inscription avancée</i> vous pouvez<br>choisir ce que vous voulez recevoir avec les mails.');
define('_MODISUPP', 'Modifier/Supprimer son compte');
define('_INSCRIPTIONAVANCE', 'Inscription Avancée');
define('_CHOISISSEZFORMAT', "Choisissez le format et le contenu de la lettre d'infos");
define('_VOTRENOM', 'Votre nom :');
define('_VOTREMAIL', 'Votre e-mail :');
define('_VOTREPASS', 'Mot de passe :');
define('_COMFPASS', 'Confirmez mot de passe :');
define('_CHOIXFORMAT', 'Format du mail :');
//define("_DATE","Date :");
define('_RETABLIR', 'Rétablir');
define('_MAILVIDE', 'Vous devez donner une adresse e-mail !');
define('_MAILBIDON', "Votre adresse e-mail n'est pas correcte !");
define('_PASSEVIDE', 'Vous devez donner un mot de passe et une confirmation !');
define('_PASSENONIDENTIQUE', 'Les mots de passe ne sont pas identiques !<br>Mettez deux fois le même mot de passe !');
define('_MAILPRESENT', 'Cette adresse e-mail est déjà présente dans la base de données !');
define('_BONJOUR', 'Bonjour ');
define('_RAPPELINFOS', 'Voici un rappel des infos enregistrées :');
define('_RAPPELINFOS2', ', voici un rappel des infos enregistrées :');
define('_SUJETINSCIPTION', 'Inscription [Programme de newsletter de ');
define('_INSCRIPTIONOK', "L'inscription c'est bien déroulée !");
define('_MAILCOMFIRME', 'Vous venez de recevoir un mail de confirmation.<br>Merci...');
define('_ACCUEILSITE', 'Accueil du site');

/****************************************************
 * Fichiers : modules/PP-News/modifier.php
 *****************************************************/
define('_IDENTIFICATION', 'Modifier/Supprimer votre compte<br>Identification');
define('_PASSEOUBLIER', 'Mot de passe oublié ?');
//define("_PASSEVIDE","Vous devez donner un mot de passe !");
define('_ADRESSEPASOK', "Cette adresse e-mail n'est pas enregistrée !");
define('_PASSENONOK', "Ce mot de passe n'est pas correct !");
define('_MODIFIERVOSINFOS', 'Modifiez vos informations !');
define('_FAIREUNTEST', 'Faire un test ?');
define('_LETTRE', 'Lettre');
define('_RECU', ' reçu :');
define('_MODIFIER', 'Modifier');
define('_VOIRARCHIVES', 'Voir Les Archives');
define('_SUPPRIMEADRESSE', 'Supprimer Votre Adresse E-Mail');
define('_PROBLEMEID', "Problème lors de l'identification !");
define('_SUJETMODIFICATION', 'Modifications infos [Programme de newsletter de ');
define('_VOUSAVEZMODIFIER', 'Vous avez modifié les informations vous concernant');
define('_MODIFICATIONOK', 'Modifications effectuées correctement !');
define('_IDPROBLEMES', 'Votre ID a causée un problème !');
define('_SUPPRIMERABONNE', "Suppression d'un abonné !");
define('_CONFIRMATION', 'Confirmation');
define('_ETESVOUSSUR', 'Êtes vous sûr de vouloir supprimer votre adresse e-mail<br>de ce programme de newsletter ?');
define('_INFOVOUSCONSENRANT', 'Infos vous concernant :');
define('_INFOMAIL', 'Infos sur le mail');
define('_SUPPRIMER', 'Supprimer');
define('_ANNULER', 'Annuler');
define('_EFFECTUER', 'Effectuer');
define('_SUPPCOMFIRMER', 'Suppression de votre e-mail confirmée !');
define('_FAITEMODIFESDESIRER', 'Faites les modifications désirées');
define('_SUJETSUPPRESSION', 'Suppression du compte [Programme de newsletter de ');

/****************************************************
 * Fichiers : modules/PP-News/test_mail.php
 *****************************************************/
define('_TESTERMAILFORMAT', 'Tester le format du mail.');
define('_ADRESSEDESTINATION', 'Adresse de destination >>');
define('_INFOS', 'Infos');
define('_FORMATACTUEL', 'Actuellement,<br>vous recevrez la lettre dans le format');
define('_INFOMAIL1', 'Cliquez sur le bouton &quot;<i>Recevoir le mail en html</i>&quot; .');
define('_INFOMAIL2', 'Vous allez recevoir un e-mail en .html.');
define('_INFOMAIL3', 'Réceptionnez le e-mail et regardez si il est bien lisible.');
define('_INFOMAIL4', 'Si oui, vous pouvez choisir le format .html.');
define('_INFOMAIL5', 'Après avoir cliquez le bouton vous verez un modèle.');
define('_INFOMAIL6', 'Il doit être identique au modèle');
define('_RECEVOIRMAILHTML', 'Recevoir le mail en html');
define('_SUJETTESTMAILHTML', 'Test e-mail en HTML [Programme de newsletter de ');
define('_MESSAGEHTML', 'Message test en html');
define('_POUVEZLIRECORRECTEMENT', 'Pouvez-vous lire ce message correctement ?<br>Si oui, vous pouvez configurer la newsletter sur html !');
define('_CLIQUEZICIRETOUR', 'Cliquez ici pour retourner dans les modifications de la newsletter');
define('_MODELMAILHTML', 'Model du message envoyé');
define('_RETOURMODIFES', 'Retour Modifications');

/****************************************************
 * Fichiers : modules/PP-News/passe_perdu.php
 *****************************************************/
define('_RECEVOIRPASSE', 'Recevoir le mot de passe.');
define('_INFOSPASSEPERDU', "Entrez votre adresse e-mail dans la zone texte et cliquez sur &quot;recevoir&quot;<br>\nLe mot de passe sera envoyé à l'adresse indiquée.");
define('_SIBDDOK', '(Si celle-ci figure dans la base de données)');
define('_RECEVOIR', 'Recevoir');
define('_SUJETPASSEPERDU', 'Demande de Mot de Passe [Programme de newsletter de ');
define('_MAILPASSEPERDU', 'Vous (ou une autre personne) avez fait une demande de nouveau mot de passe pour cause de "passe perdu".');
define('_INFOMAILPARTIES', "Les infos vous consernants viennent d'êtres envoyées par mail.");
define('_ADRESSERECEPTION', 'Adresse de reception >>');
define('_VOTREMOTDEPASSE', '- Votre mot de passe : ');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_ajout_user.php
 *****************************************************/
define('_INSOK', "L'inscription c'est bien déroulée !");
define('_MAILENVOYER', "Un mail de confirmation vient d'être envoyé");
define('_MAILPASENVOYER', "Aucun mail de confirmation n'a été envoyé.");
define('_DEMENVMAIL', 'Envoyer un mail de confirmation ?');
define('_OUI', ' Oui');
define('_NON', ' Non');
//define("_DATE2","Date :");
//define("_EMAIL2","E-mail :");

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_modif_user.php
 *****************************************************/
define('_MODIFIERMEMBRE', 'Modifier un membre de la newsletter');
define('_CHOIXEMAIL', "Choisissez l'adresse à modifier.");
define('_MODIFIERMAIL', 'Modifier le compte :');
define('_ENOM', 'Nom :');
define('_EMAIL', 'E-mail :');
define('_MODIFESOK', "La modification c'est bien déroulée !");

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_supp_user.php
 *****************************************************/
define('_SUPPRIMERMEMBRE', 'Supprimer un membre de la newsletter');
define('_CHOIXEMAILM', "Choisissez l'adresse à supprimer.");
define('_SUPPRIMEMAIL', 'Supprimer le compte :');
define('_DATEABONNEMENT', "Date de l'abonnement :");
define('_SUPPOK', '<b><i>Suppression</i></b> du membre confirmée !');
define('_SUPPSIC', 'Êtes vous sûr de vouloir supprimer cette adresse e-mail du programme de newsletter ?');
define('_INFOMAIL20', 'Infos sur votre configuration :');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_voir_user.php
 *****************************************************/
define('_VOIRABONNES', 'Visualiser les abonnés au programme newsletter de');
define('_INSCRIENT', 'inscrits');
define('_INSCRIT', 'inscrit');
define('_ILYA', 'Il y a');
define('_MEMBRE', 'membre');
define('_AJOUTERMAIL', 'Ajouter un e-mail');
define('_DATEAJOUT', 'Date de publication :');
define('_MAILRECU', 'Mail reçu :');
define('_ACTION', 'Action');
define('_VOIR', 'Voir');
define('_INFOABB', "Infos sur l'abonné");
define('_LES1', 's');
define('_LES2', '');

/****************************************************
 * Fichiers : modules/PP-News/conf/admin_envois_mails.php
 *****************************************************/
define('_NUMTITRE', 'N°- TITRE');
define('_TOUSLESSONDAGE', 'Tous les sondages');
define('_VOTES', 'Votes');
define('_HITS', 'Hits');
define('_TOUSTELECHARGEMENTS', 'Tous les téléchargement');
define('_TOUSLESLIENS', "Tous les liens de l'annuaire");
define('_TITRE', 'Titre : ');
define('_PPNEWS_URL', 'URL : ');
define('_PPNEWS_CATEGORIES', 'Catégorie : ');
define('_SUJET', 'Sujet : ');
define('_LALETTREDINFOS', "Lettre d'information de ");
define('_RETROUVEZAUSSI', 'Retrouvez aussi dans ce mail :');
define('_DEFINIPARUSER', "Définit par l'utilisateur");
define('_VALEURPARDEFAUT', 'Valeurs par défaut :');
define('_ADMIN', 'Administration');
define('_FONCTIONDEACTIVER', 'Fonction désactivée.');
define('_ENVOYERMAILING', 'Envoyer un mail');
define('_MODIFIERDEFAUT', 'Modifier les valeurs par défaut');
define('_ECRIRELALETTRE', 'Préparer le mail :');
define('_MSGPRINCIPAL', 'Inscrire ici le message principal.<br><i>Il sera dans le haut du mail.</i>');
define('_MSGSECONDAIRE', 'Inscrire ici le bas du message.<br><i>Il sera après tout le reste et avant la signature</i>');
define('_NLENVOYERA', 'Mail envoyé à');
define('_POURCONTROLE', 'pour contr&ocirc;les !');
define('_TRANSLE', ', transmis le ');
define('_TRANSLE2', 'Transmis le ');

/****************************************************
 * Fichiers : admin/modules/admin_psn-newsletter.php
 *****************************************************/
define('_ADMINNEWSLETTER', 'Administration de la newsletter');
define('_LANEWSLETTER', 'La newsletter');
define('_CONFIGNEWSL', 'Configuration de la newsletter');
define('_MAX', 'Max ');
define('_DEACTIVER', 'Désactiver');
define('_ENREGISTRER', 'Enregistrer');
define('_MSGINSCDEINSC', 'Messages pour inscriptions / désinscriptions');
define('_MSGINSCIRPTION', "Message reçu lors de l'inscription :");
define('_MSGDEINSCRIPTION', 'Message reçu lors de la désinscription :');
define('_VOTRESIGNATURE', 'Votre signature :');
define('_MSGOK', 'Messages enregistrés');
define('_METTREENTIERPOUR', 'Vous devez mettre un entier comme valeur pour les ');
define('_CONFIGUEOK', 'Configuration enregistrée');
define('_CONFIGUEDEFAUT', 'Configuration par défaut de la newsletter');
define('_MSGDEFAUT', "Donnez une configuration par défaut de la newsletter.<br>\nCelle-ci sera donnée aux personnes qui inscrivent que leur adresse e-mail et ne prennent pas le temps de remplir le formulaire.<br>\nUn mot de passe aléatoire sera attribué à toutes ces personnes&nbsp;!");
define('_DEFAULTOK', 'Valeurs par défauts enregistrées');
define('_ARCHIVESUPPRIMER', 'Archive supprimée');
define('_ERREURARCHIVE', 'Erreur : Archive non trouvée !');
define('_NOTE', 'Note :');
define('_INFOSHELP', " Pour avoir de l'aide cliquez sur \"<i>Manuel en ligne</i>\" ou cliquez");
define('_ICI', 'ici');
define('_LESMEMBRES', 'Les Membres');
define('_AJOUTER', 'Ajouter');
define('_VISUALISER', 'Visualiser');
define('_LALETTRE', 'La Lettre');
define('_ENVOYER', 'Envoyer');
define('_CONFIGURER', 'Configurer');
define('_VALEURSPARDEFAULTS', 'Valeurs par défaut');
define('_MESSAGES', 'Messages');
define('_ARCHIVES', 'Archives');
define('_ARTICLES', 'Articles');
define('_ERRMAIL1', "Erreur : Votre mail n'a pas ete envoyé. Verifiez que votre fonction mail fonctionne correctement");
define('_PPNEWSDA', 'NewsLetter de ');
define('_ERRMAIL2', 'Le répertoire ');
define('_ERRMAIL3', "n'existe pas");
define('_ERRMAIL4', 'ne possede pas les droits en ecriture ');
define('_INVADM', 'Administration');
define('_MDPPERDU', 'Mot de passe perdu');
define('_MODIFICATION', 'Modification');
define('_SUPPRESSION', 'Suppression');
define('_INSCRIPTIONEN', 'Inscription');
define('_RETROUVEZAUSSI0', 'En haut');

define('_BGCOLOR_1', 'Couleur de fond pour les  rang&eacute;e de contenu&nbsp;1 (en html) :');
define('_BGCOLOR_2', 'Couleur de fond pour les rang&eacute;e de contenu&nbsp;2&nbsp;:');
define('_TEXTCOLOR_1', 'Couleur des textes&nbsp;:');
define('_TEXTCOLOR_2', 'Couleur des liens&nbsp;:');

//--> Fin du fichier lang-francais.php (Réalisé par Laurent Besses)
