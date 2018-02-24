<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180218080725 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE nombre nombre VARCHAR(50) NOT NULL, CHANGE apellido1 apellido1 VARCHAR(50) NOT NULL, CHANGE apellido2 apellido2 VARCHAR(50) NOT NULL, CHANGE direccion direccion VARCHAR(100) DEFAULT NULL, CHANGE poblacion poblacion VARCHAR(100) DEFAULT NULL, CHANGE correo correo VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE nombre nombre VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido1 apellido1 VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE apellido2 apellido2 VARCHAR(40) NOT NULL COLLATE utf8_unicode_ci, CHANGE direccion direccion VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE poblacion poblacion VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE correo correo VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
