<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170713173201 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE oddzialy (id INT AUTO_INCREMENT NOT NULL, nazwa VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pracownicy (id INT AUTO_INCREMENT NOT NULL, oddzialy_id INT DEFAULT NULL, imie VARCHAR(255) NOT NULL, nazwisko VARCHAR(255) NOT NULL, data_dodania DATETIME NOT NULL, czy_pracuje TINYINT(1) NOT NULL, INDEX IDX_242FF0D342CB9659 (oddzialy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pracownicy ADD CONSTRAINT FK_242FF0D342CB9659 FOREIGN KEY (oddzialy_id) REFERENCES oddzialy (id)');
        $this->addSql('INSERT INTO oddzialy(id,nazwa) VALUES (1,"Warszawa"), (2,"Lublin"); ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pracownicy DROP FOREIGN KEY FK_242FF0D342CB9659');
        $this->addSql('DROP TABLE oddzialy');
        $this->addSql('DROP TABLE pracownicy');
        $this->addSql('DELETE FROM oddzialy WHERE id IN (1,2)');
    }
}
