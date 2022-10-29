<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221028124331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_etudiant ADD date_debut_stage DATETIME NOT NULL, DROP date_debtut_stage, CHANGE date_fin_stage date_fin_stage DATETIME NOT NULL, CHANGE duree_jours_stage duree_jours_stage INT NOT NULL, CHANGE duree_hebdomadaire duree_hebdomadaire INT NOT NULL, CHANGE gratification gratification TINYINT(1) NOT NULL, CHANGE amenagement_stagec amenagement_stage VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_etudiant ADD date_debtut_stage DATETIME DEFAULT NULL, DROP date_debut_stage, CHANGE date_fin_stage date_fin_stage DATETIME DEFAULT NULL, CHANGE duree_jours_stage duree_jours_stage INT DEFAULT NULL, CHANGE duree_hebdomadaire duree_hebdomadaire INT DEFAULT NULL, CHANGE gratification gratification TINYINT(1) DEFAULT NULL, CHANGE amenagement_stage amenagement_stagec VARCHAR(255) DEFAULT NULL');
    }
}
