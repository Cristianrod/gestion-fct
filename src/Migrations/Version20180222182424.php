<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222182424 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE fotografia fotografia VARCHAR(255) DEFAULT NULL, CHANGE usuario usuario VARCHAR(255) DEFAULT NULL, CHANGE direccion direccion VARCHAR(255) DEFAULT NULL, CHANGE poblacion poblacion VARCHAR(255) DEFAULT NULL, CHANGE codpostal codpostal INT DEFAULT NULL, CHANGE provincia provincia INT DEFAULT NULL, CHANGE movil movil INT DEFAULT NULL, CHANGE fijo fijo INT DEFAULT NULL, CHANGE correo correo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE fotografia fotografia VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE usuario usuario VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE direccion direccion VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE poblacion poblacion VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE codpostal codpostal INT NOT NULL, CHANGE provincia provincia INT NOT NULL, CHANGE movil movil INT NOT NULL, CHANGE fijo fijo INT NOT NULL, CHANGE correo correo VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
