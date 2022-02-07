<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203133314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scraping CHANGE etat_infos_perso etat_infos_perso VARCHAR(255) DEFAULT NULL, CHANGE identifiant_et_photos identifiant_et_photos VARCHAR(255) DEFAULT NULL, CHANGE mon_email mon_email VARCHAR(255) DEFAULT NULL, CHANGE identifiant_etudes_en_france identifiant_etudes_en_france VARCHAR(255) DEFAULT NULL, CHANGE photo_identite photo_identite VARCHAR(255) DEFAULT NULL, CHANGE etat_coordoonnees etat_coordoonnees VARCHAR(255) DEFAULT NULL, CHANGE contact_details contact_details LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE etat_civil etat_civil JSON DEFAULT NULL, CHANGE statut_parcours_diplomes statut_parcours_diplomes VARCHAR(255) DEFAULT NULL, CHANGE statut_cv statut_cv VARCHAR(255) DEFAULT NULL, CHANGE etudes etudes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE statut_langues statut_langues VARCHAR(255) DEFAULT NULL, CHANGE test_langues_fr test_langues_fr VARCHAR(255) DEFAULT NULL, CHANGE statut_niveau_fr statut_niveau_fr VARCHAR(255) DEFAULT NULL, CHANGE etude_du_francais etude_du_francais VARCHAR(255) DEFAULT NULL, CHANGE sejour_en_france sejour_en_france VARCHAR(255) DEFAULT NULL, CHANGE statut_niveau_anglais statut_niveau_anglais VARCHAR(255) DEFAULT NULL, CHANGE scolarite_anglais scolarite_anglais VARCHAR(255) DEFAULT NULL, CHANGE examen_anglais examen_anglais VARCHAR(255) DEFAULT NULL, CHANGE autre_langue autre_langue VARCHAR(255) DEFAULT NULL, CHANGE statut_panier_formation statut_panier_formation VARCHAR(255) DEFAULT NULL, CHANGE panier_formation panier_formation LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE liste_soumission_dossier liste_soumission_dossier JSON DEFAULT NULL, CHANGE statut_dossier statut_dossier JSON DEFAULT NULL, CHANGE scolarite_france scolarite_france VARCHAR(255) DEFAULT NULL, CHANGE etat_identity etat_identity VARCHAR(255) DEFAULT NULL, CHANGE statut_statut_particulier statut_statut_particulier VARCHAR(255) DEFAULT NULL, CHANGE statut_particulier statut_particulier JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scraping CHANGE etat_infos_perso etat_infos_perso VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE identifiant_et_photos identifiant_et_photos VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mon_email mon_email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE identifiant_etudes_en_france identifiant_etudes_en_france VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_identite photo_identite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_coordoonnees etat_coordoonnees VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_details contact_details LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE etat_civil etat_civil JSON NOT NULL, CHANGE statut_parcours_diplomes statut_parcours_diplomes VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_cv statut_cv VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etudes etudes LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE statut_langues statut_langues VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE test_langues_fr test_langues_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_niveau_fr statut_niveau_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etude_du_francais etude_du_francais VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sejour_en_france sejour_en_france VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_niveau_anglais statut_niveau_anglais VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE scolarite_anglais scolarite_anglais VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE examen_anglais examen_anglais VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE autre_langue autre_langue VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_panier_formation statut_panier_formation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE panier_formation panier_formation LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE liste_soumission_dossier liste_soumission_dossier JSON NOT NULL, CHANGE statut_dossier statut_dossier JSON NOT NULL, CHANGE scolarite_france scolarite_france VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_identity etat_identity VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_statut_particulier statut_statut_particulier VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE statut_particulier statut_particulier JSON NOT NULL');
    }
}
