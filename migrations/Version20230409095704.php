<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409095704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_qsn AS SELECT id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM page_qsn');
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO page_qsn (id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois) SELECT id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM __temp__page_qsn');
        $this->addSql('DROP TABLE __temp__page_qsn');
        $this->addSql('CREATE TEMPORARY TABLE __temp__service AS SELECT id, categorie_service_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM service');
        $this->addSql('DROP TABLE service');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_service_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL, CONSTRAINT FK_E19D9AD27395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO service (id, categorie_service_id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois) SELECT id, categorie_service_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM __temp__service');
        $this->addSql('DROP TABLE __temp__service');
        $this->addSql('CREATE INDEX IDX_E19D9AD27395634A ON service (categorie_service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__page_qsn AS SELECT id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM page_qsn');
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO page_qsn (id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois) SELECT id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM __temp__page_qsn');
        $this->addSql('DROP TABLE __temp__page_qsn');
        $this->addSql('CREATE TEMPORARY TABLE __temp__service AS SELECT id, categorie_service_id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM service');
        $this->addSql('DROP TABLE service');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_service_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL, CONSTRAINT FK_E19D9AD27395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO service (id, categorie_service_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois) SELECT id, categorie_service_id, titre, description, contenu, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois FROM __temp__service');
        $this->addSql('DROP TABLE __temp__service');
        $this->addSql('CREATE INDEX IDX_E19D9AD27395634A ON service (categorie_service_id)');
    }
}
