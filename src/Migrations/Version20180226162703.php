<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180226162703 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profesores CHANGE nombre nombre VARCHAR(50) NOT NULL, CHANGE apellido1 apellido1 VARCHAR(50) NOT NULL, CHANGE apellido2 apellido2 VARCHAR(50) NOT NULL, CHANGE fotografia fotografia VARCHAR(255) DEFAULT NULL, CHANGE usuario usuario VARCHAR(50) NOT NULL, CHANGE movil movil VARCHAR(255) NOT NULL, CHANGE fijo fijo VARCHAR(255) NOT NULL, CHANGE correo correo VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profesores CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido1 apellido1 VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido2 apellido2 VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE fotografia fotografia VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE usuario usuario VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE movil movil INT NOT NULL, CHANGE fijo fijo INT NOT NULL, CHANGE correo correo VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
