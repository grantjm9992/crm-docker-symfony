<?php

declare(strict_types=1);

namespace App\CoreContext;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208183726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD second_surname VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD mobile VARCHAR(255) NOT NULL, ADD api_token VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP second_surname, DROP phone, DROP mobile, DROP api_token, DROP created_at, DROP updated_at');
    }
}
