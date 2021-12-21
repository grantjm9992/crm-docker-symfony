<?php

declare(strict_types=1);

namespace App\CoreContext;

use App\CoreContext\Domain\Model\Application;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216235635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $reflectionClass = new \ReflectionClass(Application::class);
        $constants = $reflectionClass->getConstants();
        $createdAt = new \DateTime('now');
        $createdAt = $createdAt->format('Y-m-d H:i:s');
        foreach ($constants as $constant) {
            $this->addSql("INSERT INTO `application`(id, `key`, created_at, updated_at) VALUES('" . Uuid::uuid4()->toString() . "', '" . $constant . "', '$createdAt', '$createdAt')");
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
