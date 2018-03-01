<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180301162744 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alumnos (id INT AUTO_INCREMENT NOT NULL, provincia_id INT DEFAULT NULL, ciclo_id INT DEFAULT NULL, nif VARCHAR(255) NOT NULL, nombre VARCHAR(50) NOT NULL, apellido1 VARCHAR(50) NOT NULL, apellido2 VARCHAR(50) NOT NULL, fotografia VARCHAR(255) DEFAULT NULL, fecha_subida DATETIME DEFAULT NULL, direccion VARCHAR(100) DEFAULT NULL, poblacion VARCHAR(100) DEFAULT NULL, codpostal VARCHAR(255) DEFAULT NULL, movil VARCHAR(255) NOT NULL, fijo VARCHAR(255) DEFAULT NULL, correo VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_5EC5A6ABADE62BBB (nif), INDEX IDX_5EC5A6AB4E7121AF (provincia_id), INDEX IDX_5EC5A6ABD8F6DC8 (ciclo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ciclos (id INT AUTO_INCREMENT NOT NULL, codigo INT NOT NULL, nombre VARCHAR(255) NOT NULL, grado VARCHAR(255) NOT NULL, horas INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresas (id INT AUTO_INCREMENT NOT NULL, provincia_id INT DEFAULT NULL, cif VARCHAR(255) NOT NULL, nombre VARCHAR(70) NOT NULL, nombre_tutor VARCHAR(100) NOT NULL, direccion VARCHAR(100) DEFAULT NULL, poblacion VARCHAR(255) DEFAULT NULL, codpostal VARCHAR(255) DEFAULT NULL, movil VARCHAR(255) NOT NULL, fijo VARCHAR(255) DEFAULT NULL, correo VARCHAR(100) NOT NULL, INDEX IDX_70DD49A54E7121AF (provincia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fcts (id INT AUTO_INCREMENT NOT NULL, profesor_id INT DEFAULT NULL, alumno_id INT DEFAULT NULL, empresa_id INT DEFAULT NULL, ciclo_id INT DEFAULT NULL, anio INT NOT NULL, periodo VARCHAR(255) NOT NULL, INDEX IDX_F7C79ECEE52BD977 (profesor_id), INDEX IDX_F7C79ECEFC28E5EE (alumno_id), INDEX IDX_F7C79ECE521E1991 (empresa_id), INDEX IDX_F7C79ECED8F6DC8 (ciclo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profesores (id INT AUTO_INCREMENT NOT NULL, nif VARCHAR(255) NOT NULL, nombre VARCHAR(50) NOT NULL, apellido1 VARCHAR(50) NOT NULL, apellido2 VARCHAR(50) NOT NULL, fotografia VARCHAR(255) DEFAULT NULL, fecha_subida DATETIME DEFAULT NULL, usuario VARCHAR(50) NOT NULL, movil VARCHAR(255) NOT NULL, fijo VARCHAR(255) DEFAULT NULL, correo VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profesor_ciclo (profesor_id INT NOT NULL, ciclo_id INT NOT NULL, INDEX IDX_B4B7CD53E52BD977 (profesor_id), INDEX IDX_B4B7CD53D8F6DC8 (ciclo_id), PRIMARY KEY(profesor_id, ciclo_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provincias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6AB4E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6ABD8F6DC8 FOREIGN KEY (ciclo_id) REFERENCES ciclos (id)');
        $this->addSql('ALTER TABLE empresas ADD CONSTRAINT FK_70DD49A54E7121AF FOREIGN KEY (provincia_id) REFERENCES provincias (id)');
        $this->addSql('ALTER TABLE fcts ADD CONSTRAINT FK_F7C79ECEE52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
        $this->addSql('ALTER TABLE fcts ADD CONSTRAINT FK_F7C79ECEFC28E5EE FOREIGN KEY (alumno_id) REFERENCES alumnos (id)');
        $this->addSql('ALTER TABLE fcts ADD CONSTRAINT FK_F7C79ECE521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE fcts ADD CONSTRAINT FK_F7C79ECED8F6DC8 FOREIGN KEY (ciclo_id) REFERENCES ciclos (id)');
        $this->addSql('ALTER TABLE profesor_ciclo ADD CONSTRAINT FK_B4B7CD53E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profesor_ciclo ADD CONSTRAINT FK_B4B7CD53D8F6DC8 FOREIGN KEY (ciclo_id) REFERENCES ciclos (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fcts DROP FOREIGN KEY FK_F7C79ECEFC28E5EE');
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6ABD8F6DC8');
        $this->addSql('ALTER TABLE fcts DROP FOREIGN KEY FK_F7C79ECED8F6DC8');
        $this->addSql('ALTER TABLE profesor_ciclo DROP FOREIGN KEY FK_B4B7CD53D8F6DC8');
        $this->addSql('ALTER TABLE fcts DROP FOREIGN KEY FK_F7C79ECE521E1991');
        $this->addSql('ALTER TABLE fcts DROP FOREIGN KEY FK_F7C79ECEE52BD977');
        $this->addSql('ALTER TABLE profesor_ciclo DROP FOREIGN KEY FK_B4B7CD53E52BD977');
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6AB4E7121AF');
        $this->addSql('ALTER TABLE empresas DROP FOREIGN KEY FK_70DD49A54E7121AF');
        $this->addSql('DROP TABLE alumnos');
        $this->addSql('DROP TABLE ciclos');
        $this->addSql('DROP TABLE empresas');
        $this->addSql('DROP TABLE fcts');
        $this->addSql('DROP TABLE profesores');
        $this->addSql('DROP TABLE profesor_ciclo');
        $this->addSql('DROP TABLE provincias');
    }
}
