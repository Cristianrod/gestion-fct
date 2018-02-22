<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222181608 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE nombre nombre VARCHAR(40) NOT NULL, CHANGE apellido1 apellido1 VARCHAR(40) NOT NULL, CHANGE apellido2 apellido2 VARCHAR(40) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido1 apellido1 VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido2 apellido2 VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
