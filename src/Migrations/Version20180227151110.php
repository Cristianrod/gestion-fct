<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180227151110 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE empresas ADD provincia_id INT DEFAULT NULL, DROP provincia, CHANGE nombre nombre VARCHAR(70) NOT NULL, CHANGE nombre_tutor nombre_tutor VARCHAR(100) NOT NULL, CHANGE direccion direccion VARCHAR(100) DEFAULT NULL, CHANGE poblacion poblacion VARCHAR(255) DEFAULT NULL, CHANGE codpostal codpostal INT DEFAULT NULL, CHANGE movil movil VARCHAR(255) NOT NULL, CHANGE fijo fijo VARCHAR(255) NOT NULL, CHANGE correo correo VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE empresas ADD CONSTRAINT FK_70DD49A54E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('CREATE INDEX IDX_70DD49A54E7121AF ON empresas (provincia_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE empresas DROP FOREIGN KEY FK_70DD49A54E7121AF');
        $this->addSql('DROP INDEX IDX_70DD49A54E7121AF ON empresas');
        $this->addSql('ALTER TABLE empresas ADD provincia INT NOT NULL, DROP provincia_id, CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE nombre_tutor nombre_tutor VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE direccion direccion VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE poblacion poblacion VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE codpostal codpostal INT NOT NULL, CHANGE movil movil INT NOT NULL, CHANGE fijo fijo INT NOT NULL, CHANGE correo correo VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
