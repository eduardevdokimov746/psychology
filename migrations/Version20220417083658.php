<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417083658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Создает тип данных: Gender';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TYPE gender as ENUM ('male', 'female')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TYPE gender');
    }
}
