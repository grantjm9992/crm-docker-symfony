<?php

declare(strict_types=1);

namespace App\CoreContext;

use App\CoreContext\Domain\Model\Role;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214095759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $createdAt = new \DateTime('now');
        $createdAt = $createdAt->format('Y-m-d H:i:s');
        $this->addSql("INSERT INTO role(id, name, created_at, updated_at) VALUES('" . Uuid::uuid4()->toString() . "', '" . Role::USER . "', '$createdAt', '$createdAt')");
        $this->addSql("INSERT INTO role(id, name, created_at, updated_at) VALUES('" . Uuid::uuid4()->toString() . "', '" . Role::ADMIN . "', '$createdAt', '$createdAt')");
        $this->addSql("INSERT INTO role(id, name, created_at, updated_at) VALUES('" . Uuid::uuid4()->toString() . "', '" . Role::SUPER_ADMIN . "', '$createdAt', '$createdAt')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
