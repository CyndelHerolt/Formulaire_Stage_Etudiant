<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005073501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formulaire (id VARCHAR(255) NOT NULL, adresse VARCHAR(100) DEFAULT NULL, adss_suite VARCHAR(100) DEFAULT NULL, adss_complement VARCHAR(100) DEFAULT NULL, adss_cp INT DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) DEFAULT NULL, nom_secu VARCHAR(100) DEFAULT NULL, adss_secu VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, nom VARCHAR(100) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, tel INT DEFAULT NULL, portable INT DEFAULT NULL, fax INT DEFAULT NULL, raison_sociale VARCHAR(100) DEFAULT NULL, siret INT DEFAULT NULL, fonction VARCHAR(100) DEFAULT NULL, debut DATE DEFAULT NULL, fin DATE DEFAULT NULL, nbjour INT DEFAULT NULL, service VARCHAR(100) DEFAULT NULL, mission VARCHAR(500) DEFAULT NULL, activites VARCHAR(500) DEFAULT NULL, interruptions VARCHAR(100) DEFAULT NULL, dth INT DEFAULT NULL, commdth VARCHAR(500) DEFAULT NULL, amenagement VARCHAR(100) DEFAULT NULL, gratif VARCHAR(100) DEFAULT NULL, periodegratif VARCHAR(100) DEFAULT NULL, montantgratif INT DEFAULT NULL, avantages VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE formulaire');
    }
}
