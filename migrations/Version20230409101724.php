<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409101724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temoignage ADD COLUMN photo400x400 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__temoignage AS SELECT id, nom, fonction, contenue FROM temoignage');
        $this->addSql('DROP TABLE temoignage');
        $this->addSql('CREATE TABLE temoignage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, contenue VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO temoignage (id, nom, fonction, contenue) SELECT id, nom, fonction, contenue FROM __temp__temoignage');
        $this->addSql('DROP TABLE __temp__temoignage');
    }
}
