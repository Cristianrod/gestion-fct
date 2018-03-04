<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180304171135 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE profesores ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP usuario, DROP correo');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29C62D8C92FC23A8 ON profesores (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29C62D8CA0D96FBF ON profesores (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29C62D8CC05FB297 ON profesores (confirmation_token)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_29C62D8C92FC23A8 ON profesores');
        $this->addSql('DROP INDEX UNIQ_29C62D8CA0D96FBF ON profesores');
        $this->addSql('DROP INDEX UNIQ_29C62D8CC05FB297 ON profesores');
        $this->addSql('ALTER TABLE profesores ADD usuario VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, ADD correo VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles');
    }
}
