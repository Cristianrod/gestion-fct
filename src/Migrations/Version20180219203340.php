<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180219203340 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fct DROP FOREIGN KEY FK_AAA3E3C1E52BD977');
        $this->addSql('ALTER TABLE fct ADD CONSTRAINT FK_AAA3E3C1E52BD977 FOREIGN KEY (profesor_id) REFERENCES profesores (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fct DROP FOREIGN KEY FK_AAA3E3C1E52BD977');
        $this->addSql('ALTER TABLE fct ADD CONSTRAINT FK_AAA3E3C1E52BD977 FOREIGN KEY (profesor_id) REFERENCES empresas (id)');
    }
}
