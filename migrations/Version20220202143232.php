<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202143232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_informations ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate_informations ADD CONSTRAINT FK_AD80C8F4A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_AD80C8F4A76ED395 ON candidate_informations (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_informations DROP FOREIGN KEY FK_AD80C8F4A76ED395');
        $this->addSql('DROP INDEX IDX_AD80C8F4A76ED395 ON candidate_informations');
        $this->addSql('ALTER TABLE candidate_informations DROP user_id');
    }
}
