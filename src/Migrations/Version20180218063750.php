<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218063750 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE provincias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnos ADD provincia_id INT DEFAULT NULL, DROP provincia');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6AB4E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('CREATE INDEX IDX_5EC5A6AB4E7121AF ON alumnos (provincia_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6AB4E7121AF');
        $this->addSql('DROP TABLE provincias');
        $this->addSql('DROP INDEX IDX_5EC5A6AB4E7121AF ON alumnos');
        $this->addSql('ALTER TABLE alumnos ADD provincia INT NOT NULL, DROP provincia_id');
    }
}
