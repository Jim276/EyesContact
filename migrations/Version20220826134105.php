<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220826134105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color_attribute (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (product_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_CDFC73564584665A (product_id), INDEX IDX_CDFC735612469DE2 (category_id), PRIMARY KEY(product_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC73564584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category ADD CONSTRAINT FK_CDFC735612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F033DA5256D');
        $this->addSql('ALTER TABLE product_image DROP FOREIGN KEY FK_64617F034584665A');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE product_image');
        $this->addSql('ALTER TABLE address ADD city VARCHAR(255) NOT NULL, ADD name VARCHAR(255) NOT NULL, DROP street_number, CHANGE zip_code zip_code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE category DROP parent');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product DROP category_id, CHANGE image_product image_product VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE variation ADD color_id INT DEFAULT NULL, DROP type, DROP value');
        $this->addSql('ALTER TABLE variation ADD CONSTRAINT FK_629B33EA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color_attribute (id)');
        $this->addSql('CREATE INDEX IDX_629B33EA7ADA1FB5 ON variation (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE variation DROP FOREIGN KEY FK_629B33EA7ADA1FB5');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_image (product_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_64617F033DA5256D (image_id), INDEX IDX_64617F034584665A (product_id), PRIMARY KEY(product_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F033DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_image ADD CONSTRAINT FK_64617F034584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC73564584665A');
        $this->addSql('ALTER TABLE product_category DROP FOREIGN KEY FK_CDFC735612469DE2');
        $this->addSql('DROP TABLE color_attribute');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('ALTER TABLE address ADD street_number INT DEFAULT NULL, DROP city, DROP name, CHANGE zip_code zip_code INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD parent VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD category_id INT NOT NULL, CHANGE image_product image_product VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('DROP INDEX IDX_629B33EA7ADA1FB5 ON variation');
        $this->addSql('ALTER TABLE variation ADD type VARCHAR(255) NOT NULL, ADD value VARCHAR(255) NOT NULL, DROP color_id');
    }
}
