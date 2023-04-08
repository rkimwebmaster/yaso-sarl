<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408224145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO entreprise (id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays) SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
        $this->addSql('ALTER TABLE magazine ADD COLUMN date_publication DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN newsbg389x454 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN menu_banner295x320_premier VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN menu_banner295x320_deuxieme VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN menu_banner295x320_troisieme VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN main_banner1903x650_un VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD COLUMN main_banner1903x650_deux VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__magazine AS SELECT id, categorie_magazine_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois, is_recent, is_principal FROM magazine');
        $this->addSql('DROP TABLE magazine');
        $this->addSql('CREATE TABLE magazine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_magazine_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL, is_recent BOOLEAN NOT NULL, is_principal BOOLEAN NOT NULL, CONSTRAINT FK_378C2FE4E1466C14 FOREIGN KEY (categorie_magazine_id) REFERENCES categorie_magazine (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO magazine (id, categorie_magazine_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois, is_recent, is_principal) SELECT id, categorie_magazine_id, titre, description, contenue, photo1024x768, photo800x600_un, photo800x600_deux, photo800x600_trois, is_recent, is_principal FROM __temp__magazine');
        $this->addSql('DROP TABLE __temp__magazine');
        $this->addSql('CREATE INDEX IDX_378C2FE4E1466C14 ON magazine (categorie_magazine_id)');
    }
}
