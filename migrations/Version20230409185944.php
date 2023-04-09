<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409185944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, telephone VARCHAR(14) NOT NULL, zone_livraison VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE categorie_image_gallerie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE TABLE categorie_magazine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE categorie_service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE commentaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, magazine_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, CONSTRAINT FK_67F068BC3EB84A1D FOREIGN KEY (magazine_id) REFERENCES magazine (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_67F068BC3EB84A1D ON commentaire (magazine_id)');
        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, message CLOB NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, slogan VARCHAR(255) NOT NULL, idnat VARCHAR(255) NOT NULL, rccm VARCHAR(255) NOT NULL, sigle VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, phone_number VARCHAR(14) NOT NULL, email VARCHAR(255) NOT NULL, website VARCHAR(255) NOT NULL, whatsapp_number VARCHAR(14) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, linked_in VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE faq (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question VARCHAR(255) NOT NULL, reponse CLOB NOT NULL)');
        $this->addSql('CREATE TABLE identite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, postnom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE image_gallerie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_image_gallerie_id INTEGER NOT NULL, photo800x600 VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, CONSTRAINT FK_ECA31469C9D48881 FOREIGN KEY (categorie_image_gallerie_id) REFERENCES categorie_image_gallerie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_ECA31469C9D48881 ON image_gallerie (categorie_image_gallerie_id)');
        $this->addSql('CREATE TABLE magazine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_magazine_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenue CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL, is_recent BOOLEAN NOT NULL, is_principal BOOLEAN NOT NULL, date_publication DATE NOT NULL, CONSTRAINT FK_378C2FE4E1466C14 FOREIGN KEY (categorie_magazine_id) REFERENCES categorie_magazine (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_378C2FE4E1466C14 ON magazine (categorie_magazine_id)');
        $this->addSql('CREATE TABLE message_broadcast (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, contenu CLOB NOT NULL, date_emission DATETIME NOT NULL, CONSTRAINT FK_F1487AC3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_F1487AC3A76ED395 ON message_broadcast (user_id)');
        $this->addSql('CREATE TABLE news_letter (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, message_broadcast_id INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , ip_adress VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_2AB2D7E587FB506 FOREIGN KEY (message_broadcast_id) REFERENCES message_broadcast (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_2AB2D7E587FB506 ON news_letter (message_broadcast_id)');
        $this->addSql('CREATE TABLE page_qsn (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE partenaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description CLOB NOT NULL, logo215x140 VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE service (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_service_id INTEGER NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, contenu CLOB NOT NULL, photo1024x768 VARCHAR(255) NOT NULL, photo800x600_un VARCHAR(255) NOT NULL, photo800x600_deux VARCHAR(255) NOT NULL, photo800x600_trois VARCHAR(255) NOT NULL, CONSTRAINT FK_E19D9AD27395634A FOREIGN KEY (categorie_service_id) REFERENCES categorie_service (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E19D9AD27395634A ON service (categorie_service_id)');
        $this->addSql('CREATE TABLE team_member (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, noms VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, dribble VARCHAR(255) DEFAULT NULL, pinterest VARCHAR(255) DEFAULT NULL, behance VARCHAR(255) DEFAULT NULL, photo_couleur390x390 VARCHAR(255) NOT NULL, photo_noir_blanc390x390 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE temoignage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, contenue VARCHAR(255) NOT NULL, photo400x400 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie_image_gallerie');
        $this->addSql('DROP TABLE categorie_magazine');
        $this->addSql('DROP TABLE categorie_service');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE identite');
        $this->addSql('DROP TABLE image_gallerie');
        $this->addSql('DROP TABLE magazine');
        $this->addSql('DROP TABLE message_broadcast');
        $this->addSql('DROP TABLE news_letter');
        $this->addSql('DROP TABLE page_qsn');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE temoignage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
