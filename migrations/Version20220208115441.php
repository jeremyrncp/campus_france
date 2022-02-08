<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208115441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cron_job (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, command VARCHAR(255) NOT NULL, arguments VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, running_instances INT UNSIGNED DEFAULT 0 NOT NULL, max_instances INT UNSIGNED DEFAULT 1 NOT NULL, number INT UNSIGNED DEFAULT 1 NOT NULL, period VARCHAR(255) NOT NULL, last_use DATETIME DEFAULT NULL, next_run DATETIME NOT NULL, enable TINYINT(1) DEFAULT 1 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cron_job_result (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, cron_job_id BIGINT UNSIGNED NOT NULL, run_at DATETIME NOT NULL, run_time DOUBLE PRECISION NOT NULL, status_code INT NOT NULL, output LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2CD346EE79099ED8 (cron_job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cron_job_result ADD CONSTRAINT FK_2CD346EE79099ED8 FOREIGN KEY (cron_job_id) REFERENCES cron_job (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cron_job_result DROP FOREIGN KEY FK_2CD346EE79099ED8');
        $this->addSql('DROP TABLE cron_job');
        $this->addSql('DROP TABLE cron_job_result');
        $this->addSql('ALTER TABLE candidate_informations CHANGE personal_informations_step_one personal_informations_step_one VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE personal_informations_step_two personal_informations_step_two VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE personal_informations_step_three personal_informations_step_three VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE basket_step_one basket_step_one VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE basket_step_two basket_step_two VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE submission_step_one submission_step_one VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE discussion CHANGE subject subject VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE internal_message CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE offer CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone_number phone_number VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reset_password_request CHANGE selector selector VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hashed_token hashed_token VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scraping CHANGE etat_infos_perso etat_infos_perso VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE identifiant_et_photos identifiant_et_photos VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mon_email mon_email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE identifiant_etudes_en_france identifiant_etudes_en_france VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_identite photo_identite VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_coordoonnees etat_coordoonnees VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_details contact_details LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE statut_parcours_diplomes statut_parcours_diplomes VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_cv statut_cv VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etudes etudes LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE statut_langues statut_langues VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE test_langues_fr test_langues_fr VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_niveau_fr statut_niveau_fr VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etude_du_francais etude_du_francais VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sejour_en_france sejour_en_france VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_niveau_anglais statut_niveau_anglais VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE scolarite_anglais scolarite_anglais VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE examen_anglais examen_anglais VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_langue autre_langue VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_panier_formation statut_panier_formation VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE panier_formation panier_formation LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE scolarite_france scolarite_france VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_identity etat_identity VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_statut_particulier statut_statut_particulier VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE task CHANGE path_scraping path_scraping VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE `user` CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username_campus_france username_campus_france VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password_campus_france password_campus_france VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE full_name full_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cv cv VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
