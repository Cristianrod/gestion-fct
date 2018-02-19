<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180219182027 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alumnos (id INT AUTO_INCREMENT NOT NULL, nif VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido1 VARCHAR(255) NOT NULL, apellido2 VARCHAR(255) NOT NULL, fotografia VARCHAR(255) NOT NULL, usuario VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, poblacion VARCHAR(255) NOT NULL, codpostal INT NOT NULL, provincia INT NOT NULL, movil INT NOT NULL, fijo INT NOT NULL, correo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ciclo (id INT AUTO_INCREMENT NOT NULL, codigo INT NOT NULL, nombre VARCHAR(255) NOT NULL, grado VARCHAR(255) NOT NULL, horas INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresas (id INT AUTO_INCREMENT NOT NULL, cif VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, nombre_tutor VARCHAR(255) NOT NULL, direccion VARCHAR(255) NOT NULL, poblacion VARCHAR(255) NOT NULL, codpostal INT NOT NULL, provincia INT NOT NULL, movil INT NOT NULL, fijo INT NOT NULL, correo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profesores (id INT AUTO_INCREMENT NOT NULL, nif VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido1 VARCHAR(255) NOT NULL, apellido2 VARCHAR(255) NOT NULL, fotografia VARCHAR(255) NOT NULL, usuario VARCHAR(255) NOT NULL, movil INT NOT NULL, fijo INT NOT NULL, correo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE alumnos');
        $this->addSql('DROP TABLE ciclo');
        $this->addSql('DROP TABLE empresas');
        $this->addSql('DROP TABLE profesores');
    }
}
