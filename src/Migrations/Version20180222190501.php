<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180222190501 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alumnos CHANGE usuario usuario VARCHAR(255) NOT NULL, CHANGE codpostal codpostal VARCHAR(255) DEFAULT NULL, CHANGE provincia provincia INT NOT NULL, CHANGE movil movil VARCHAR(255) NOT NULL, CHANGE fijo fijo VARCHAR(255) DEFAULT NULL, CHANGE correo correo VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5EC5A6ABADE62BBB ON alumnos (nif)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_5EC5A6ABADE62BBB ON alumnos');
        $this->addSql('ALTER TABLE alumnos CHANGE usuario usuario VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE codpostal codpostal INT DEFAULT NULL, CHANGE provincia provincia INT DEFAULT NULL, CHANGE movil movil INT DEFAULT NULL, CHANGE fijo fijo INT DEFAULT NULL, CHANGE correo correo VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
