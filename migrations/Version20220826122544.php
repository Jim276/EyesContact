<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826122544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variation ADD CONSTRAINT FK_629B33EA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color_attribute (id)');
        $this->addSql('CREATE INDEX IDX_629B33EA7ADA1FB5 ON variation (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation DROP FOREIGN KEY FK_629B33EA7ADA1FB5');
        $this->addSql('DROP INDEX IDX_629B33EA7ADA1FB5 ON variation');
        $this->addSql('ALTER TABLE variation DROP color_id');
    }
}
