CREATE TABLE pp_newsletter (
    id_user     INT(6)      NOT NULL AUTO_INCREMENT,
    nom_user    VARCHAR(50) NOT NULL DEFAULT '',
    mail_user   VARCHAR(50) NOT NULL DEFAULT '',
    passe_user  VARCHAR(50) NOT NULL DEFAULT '',
    format_mail VARCHAR(4)  NOT NULL DEFAULT 'html',
    nb_js       TINYINT(3)  NOT NULL DEFAULT '10',
    nb_php      TINYINT(3)  NOT NULL DEFAULT '10',
    nb_lien     TINYINT(3)  NOT NULL DEFAULT '10',
    nb_new      TINYINT(3)  NOT NULL DEFAULT '10',
    date_in     INT(8)      NOT NULL DEFAULT '0',
    recu        INT(6)      NOT NULL DEFAULT '0',
    PRIMARY KEY (id_user),
    KEY nom_user (nom_user)
)
    ENGINE = ISAM;

