<?php

declare(strict_types=1);

namespace App\CoreContext;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216235600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id VARCHAR(255) NOT NULL, `key` VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_application (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, application_id VARCHAR(255) DEFAULT NULL, installed_on DATETIME NOT NULL, uninstalled_on DATETIME DEFAULT NULL, INDEX IDX_BD8A6559979B1AD6 (company_id), INDEX IDX_BD8A65593E030ACD (application_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_application ADD CONSTRAINT FK_BD8A6559979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE company_application ADD CONSTRAINT FK_BD8A65593E030ACD FOREIGN KEY (application_id) REFERENCES application (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_application DROP FOREIGN KEY FK_BD8A65593E030ACD');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE company_application');
    }
}
