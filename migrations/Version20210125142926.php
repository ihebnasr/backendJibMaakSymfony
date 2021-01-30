<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125142926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (idAdmin INT AUTO_INCREMENT NOT NULL, Nom_admin VARCHAR(50) NOT NULL, Prenom_admin VARCHAR(50) NOT NULL, tel_Admin INT NOT NULL, PRIMARY KEY(idAdmin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (idart INT AUTO_INCREMENT NOT NULL, code_cate INT DEFAULT NULL, designation_art VARCHAR(50) NOT NULL, prix_art NUMERIC(10, 3) NOT NULL, date_cration DATETIME NOT NULL, date_modif_art DATETIME NOT NULL, actif INT DEFAULT NULL, image INT DEFAULT NULL, prix_promo_art INT DEFAULT NULL, en_promo INT DEFAULT NULL, INDEX code_cate (code_cate), PRIMARY KEY(idart)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_commande (idartcmd INT AUTO_INCREMENT NOT NULL, idcmd INT DEFAULT NULL, idart INT DEFAULT NULL, Qte_art INT NOT NULL, Prix_u_art NUMERIC(10, 3) NOT NULL, prix_total_art NUMERIC(10, 3) NOT NULL, INDEX idart (idart), INDEX idcmd (idcmd), PRIMARY KEY(idartcmd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (code_cate INT AUTO_INCREMENT NOT NULL, designatio_cate VARCHAR(50) NOT NULL, image_cate VARCHAR(500) NOT NULL, PRIMARY KEY(code_cate)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (idclient INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(50) NOT NULL, Prenom VARCHAR(50) NOT NULL, adresse VARCHAR(100) NOT NULL, date_naissance DATE DEFAULT NULL, tel1 INT NOT NULL, profile1 VARCHAR(50) NOT NULL, tel2 INT DEFAULT NULL, profile2 VARCHAR(50) DEFAULT NULL, tel3 INT DEFAULT NULL, profile3 VARCHAR(50) DEFAULT NULL, photo VARCHAR(500) DEFAULT NULL, sexe VARCHAR(1) NOT NULL, PRIMARY KEY(idclient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (idcmd INT AUTO_INCREMENT NOT NULL, idclient INT DEFAULT NULL, date_cmd DATETIME NOT NULL, prix_total NUMERIC(10, 3) NOT NULL, adresse_cmd VARCHAR(50) NOT NULL, etat_cmd INT NOT NULL, date_prevue DATETIME NOT NULL, frais_liv NUMERIC(5, 3) NOT NULL, IdLiv INT DEFAULT NULL, INDEX IdLiv (IdLiv), INDEX idclient (idclient), PRIMARY KEY(idcmd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livreur (IdLivreur INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel INT NOT NULL, PRIMARY KEY(IdLivreur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (idliv INT DEFAULT NULL, idclient INT DEFAULT NULL, Idutilisateur INT AUTO_INCREMENT NOT NULL, login INT NOT NULL, mot_de_passe INT NOT NULL, role VARCHAR(50) NOT NULL, idAdmin INT DEFAULT NULL, INDEX idclient (idclient), INDEX idliv (idliv), INDEX idAdmin (idAdmin), PRIMARY KEY(Idutilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E661A26502 FOREIGN KEY (code_cate) REFERENCES categories (code_cate)');
        $this->addSql('ALTER TABLE article_commande ADD CONSTRAINT FK_3B025216365947A7 FOREIGN KEY (idcmd) REFERENCES commande (idcmd)');
        $this->addSql('ALTER TABLE article_commande ADD CONSTRAINT FK_3B025216E5308D33 FOREIGN KEY (idart) REFERENCES article (idart)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D535CDD32 FOREIGN KEY (IdLiv) REFERENCES livreur (IdLivreur)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA3F9A9F9 FOREIGN KEY (idclient) REFERENCES clients (idclient)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B39FCA4E6B FOREIGN KEY (idAdmin) REFERENCES administrateur (idAdmin)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3AAD0B4D6 FOREIGN KEY (idliv) REFERENCES livreur (IdLivreur)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A3F9A9F9 FOREIGN KEY (idclient) REFERENCES clients (idclient)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B39FCA4E6B');
        $this->addSql('ALTER TABLE article_commande DROP FOREIGN KEY FK_3B025216E5308D33');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E661A26502');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA3F9A9F9');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3A3F9A9F9');
        $this->addSql('ALTER TABLE article_commande DROP FOREIGN KEY FK_3B025216365947A7');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D535CDD32');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3AAD0B4D6');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_commande');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE utilisateur');
    }
}
