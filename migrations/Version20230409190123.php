<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230409190123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE message_broadcast ADD COLUMN objet VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__message_broadcast AS SELECT id, user_id, contenu, date_emission FROM message_broadcast');
        $this->addSql('DROP TABLE message_broadcast');
        $this->addSql('CREATE TABLE message_broadcast (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, contenu CLOB NOT NULL, date_emission DATETIME NOT NULL, CONSTRAINT FK_F1487AC3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO message_broadcast (id, user_id, contenu, date_emission) SELECT id, user_id, contenu, date_emission FROM __temp__message_broadcast');
        $this->addSql('DROP TABLE __temp__message_broadcast');
        $this->addSql('CREATE INDEX IDX_F1487AC3A76ED395 ON message_broadcast (user_id)');
    }
}
