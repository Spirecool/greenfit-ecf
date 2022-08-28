<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220828130150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partners_modules (partners_id INT NOT NULL, modules_id INT NOT NULL, INDEX IDX_5DFB55A7BDE7F1C6 (partners_id), INDEX IDX_5DFB55A760D6DC42 (modules_id), PRIMARY KEY(partners_id, modules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partners_modules ADD CONSTRAINT FK_5DFB55A7BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_modules ADD CONSTRAINT FK_5DFB55A760D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_partners DROP FOREIGN KEY FK_CE2BE89260D6DC42');
        $this->addSql('ALTER TABLE modules_partners DROP FOREIGN KEY FK_CE2BE892BDE7F1C6');
        $this->addSql('DROP TABLE modules_partners');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modules_partners (modules_id INT NOT NULL, partners_id INT NOT NULL, INDEX IDX_CE2BE89260D6DC42 (modules_id), INDEX IDX_CE2BE892BDE7F1C6 (partners_id), PRIMARY KEY(modules_id, partners_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE modules_partners ADD CONSTRAINT FK_CE2BE89260D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_partners ADD CONSTRAINT FK_CE2BE892BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_modules DROP FOREIGN KEY FK_5DFB55A7BDE7F1C6');
        $this->addSql('ALTER TABLE partners_modules DROP FOREIGN KEY FK_5DFB55A760D6DC42');
        $this->addSql('DROP TABLE partners_modules');
    }
}
