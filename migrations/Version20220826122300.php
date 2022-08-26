<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826122300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation DROP FOREIGN KEY FK_629B33EABF2C1BAC');
        $this->addSql('DROP INDEX IDX_629B33EABF2C1BAC ON variation');
        $this->addSql('ALTER TABLE variation DROP color_attribute_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation ADD color_attribute_id INT NOT NULL');
        $this->addSql('ALTER TABLE variation ADD CONSTRAINT FK_629B33EABF2C1BAC FOREIGN KEY (color_attribute_id) REFERENCES color_attribute (id)');
        $this->addSql('CREATE INDEX IDX_629B33EABF2C1BAC ON variation (color_attribute_id)');
    }
}
