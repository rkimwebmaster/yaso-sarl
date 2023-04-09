<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409212025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__carousel AS SELECT id, titre, description, photo960x556 FROM carousel');
        $this->addSql('DROP TABLE carousel');
        $this->addSql('CREATE TABLE carousel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo960x440 VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO carousel (id, titre, description, photo960x440) SELECT id, titre, description, photo960x556 FROM __temp__carousel');
        $this->addSql('DROP TABLE __temp__carousel');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__carousel AS SELECT id, titre, description, photo960x440 FROM carousel');
        $this->addSql('DROP TABLE carousel');
        $this->addSql('CREATE TABLE carousel (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo960x556 VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO carousel (id, titre, description, photo960x556) SELECT id, titre, description, photo960x440 FROM __temp__carousel');
        $this->addSql('DROP TABLE __temp__carousel');
    }
}
