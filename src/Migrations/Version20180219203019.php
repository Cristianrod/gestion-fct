<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180219203019 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fct (id INT AUTO_INCREMENT NOT NULL, profesor_id INT DEFAULT NULL, alumno_id INT DEFAULT NULL, empresa_id INT DEFAULT NULL, anio INT NOT NULL, periodo VARCHAR(255) NOT NULL, INDEX IDX_AAA3E3C1E52BD977 (profesor_id), INDEX IDX_AAA3E3C1FC28E5EE (alumno_id), INDEX IDX_AAA3E3C1521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fct ADD CONSTRAINT FK_AAA3E3C1E52BD977 FOREIGN KEY (profesor_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE fct ADD CONSTRAINT FK_AAA3E3C1FC28E5EE FOREIGN KEY (alumno_id) REFERENCES alumnos (id)');
        $this->addSql('ALTER TABLE fct ADD CONSTRAINT FK_AAA3E3C1521E1991 FOREIGN KEY (empresa_id) REFERENCES empresas (id)');
        $this->addSql('ALTER TABLE alumnos ADD ciclo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6ABD8F6DC8 FOREIGN KEY (ciclo_id) REFERENCES ciclo (id)');
        $this->addSql('CREATE INDEX IDX_5EC5A6ABD8F6DC8 ON alumnos (ciclo_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fct');
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6ABD8F6DC8');
        $this->addSql('DROP INDEX IDX_5EC5A6ABD8F6DC8 ON alumnos');
        $this->addSql('ALTER TABLE alumnos DROP ciclo_id');
    }
}
