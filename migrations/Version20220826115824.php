<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826115824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color_attribute (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variation_color_attribute (variation_id INT NOT NULL, color_attribute_id INT NOT NULL, INDEX IDX_972C3BB15182BFD8 (variation_id), INDEX IDX_972C3BB1BF2C1BAC (color_attribute_id), PRIMARY KEY(variation_id, color_attribute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE variation_color_attribute ADD CONSTRAINT FK_972C3BB15182BFD8 FOREIGN KEY (variation_id) REFERENCES variation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE variation_color_attribute ADD CONSTRAINT FK_972C3BB1BF2C1BAC FOREIGN KEY (color_attribute_id) REFERENCES color_attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE variation DROP type, DROP value');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation_color_attribute DROP FOREIGN KEY FK_972C3BB15182BFD8');
        $this->addSql('ALTER TABLE variation_color_attribute DROP FOREIGN KEY FK_972C3BB1BF2C1BAC');
        $this->addSql('DROP TABLE color_attribute');
        $this->addSql('DROP TABLE variation_color_attribute');
        $this->addSql('ALTER TABLE variation ADD type VARCHAR(255) NOT NULL, ADD value VARCHAR(255) NOT NULL');
    }
}
