<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202130144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate_informations (id INT AUTO_INCREMENT NOT NULL, personal_informations_step_one VARCHAR(255) NOT NULL, personal_informations_step_two VARCHAR(255) NOT NULL, personal_informations_step_three VARCHAR(255) NOT NULL, basket_step1 VARCHAR(255) NOT NULL, basket_step_two VARCHAR(255) NOT NULL, submission_step1 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scraping DROP FOREIGN KEY FK_1B8A0FB4A76ED395');
        $this->addSql('ALTER TABLE scraping ADD CONSTRAINT FK_1B8A0FB4A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE candidate_informations');
        $this->addSql('ALTER TABLE scraping DROP FOREIGN KEY FK_1B8A0FB4A76ED395');
        $this->addSql('ALTER TABLE scraping ADD CONSTRAINT FK_1B8A0FB4A76ED395 FOREIGN KEY (user_id) REFERENCES scraping (id)');
    }
}
