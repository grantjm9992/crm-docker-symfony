<?php

declare(strict_types=1);

namespace App\CrmContext;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215200513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id VARCHAR(255) NOT NULL, campaign_id VARCHAR(255) DEFAULT NULL, contact_interest_id VARCHAR(255) DEFAULT NULL, contact_method_id VARCHAR(255) DEFAULT NULL, contact_status_id VARCHAR(255) DEFAULT NULL, contact_type_id VARCHAR(255) DEFAULT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_4C62E638F639F774 (campaign_id), INDEX IDX_4C62E63834394037 (contact_interest_id), INDEX IDX_4C62E63877791A1C (contact_method_id), INDEX IDX_4C62E63850623C6 (contact_status_id), INDEX IDX_4C62E6385F63AD12 (contact_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_interest (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_method (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_status (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_type (id VARCHAR(255) NOT NULL, company_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63834394037 FOREIGN KEY (contact_interest_id) REFERENCES contact_interest (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63877791A1C FOREIGN KEY (contact_method_id) REFERENCES contact_method (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63850623C6 FOREIGN KEY (contact_status_id) REFERENCES contact_status (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6385F63AD12 FOREIGN KEY (contact_type_id) REFERENCES contact_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638F639F774');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63834394037');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63877791A1C');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63850623C6');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6385F63AD12');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_interest');
        $this->addSql('DROP TABLE contact_method');
        $this->addSql('DROP TABLE contact_status');
        $this->addSql('DROP TABLE contact_type');
    }
}
