<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517195107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_recipe_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_9474526CD9ED1E33 (id_recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE list_ingrdients (id INT AUTO_INCREMENT NOT NULL, id_ingredient_id INT NOT NULL, id_recipe_id INT NOT NULL, number INT NOT NULL, INDEX IDX_EA8424992D1731E9 (id_ingredient_id), INDEX IDX_EA842499D9ED1E33 (id_recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CD9ED1E33 FOREIGN KEY (id_recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE list_ingrdients ADD CONSTRAINT FK_EA8424992D1731E9 FOREIGN KEY (id_ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE list_ingrdients ADD CONSTRAINT FK_EA842499D9ED1E33 FOREIGN KEY (id_recipe_id) REFERENCES recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE list_ingrdients');
    }
}
