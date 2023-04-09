<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409204941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, carousel_un_id INTEGER NOT NULL, carousel_deux_id INTEGER NOT NULL, carousel_trois_id INTEGER NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, CONSTRAINT FK_D19FA607A7FDD76 FOREIGN KEY (carousel_un_id) REFERENCES carousel (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D19FA60DEBA07A1 FOREIGN KEY (carousel_deux_id) REFERENCES carousel (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D19FA60677198F8 FOREIGN KEY (carousel_trois_id) REFERENCES carousel (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO entreprise (id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays) SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA607A7FDD76 ON entreprise (carousel_un_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60DEBA07A1 ON entreprise (carousel_deux_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60677198F8 ON entreprise (carousel_trois_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprise AS SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM entreprise');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO entreprise (id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays) SELECT id, nom_entreprise, slogan, idnat, rccm, sigle, logo, description, responsable, phone_number, email, website, whatsapp_number, facebook, linked_in, twitter, adresse, ville, pays FROM __temp__entreprise');
        $this->addSql('DROP TABLE __temp__entreprise');
    }
}
