<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220828154519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE structures_modules (structures_id INT NOT NULL, modules_id INT NOT NULL, INDEX IDX_6F3F71579D3ED38D (structures_id), INDEX IDX_6F3F715760D6DC42 (modules_id), PRIMARY KEY(structures_id, modules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE structures_modules ADD CONSTRAINT FK_6F3F71579D3ED38D FOREIGN KEY (structures_id) REFERENCES structures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE structures_modules ADD CONSTRAINT FK_6F3F715760D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_structures DROP FOREIGN KEY FK_ABE5A9899D3ED38D');
        $this->addSql('ALTER TABLE modules_structures DROP FOREIGN KEY FK_ABE5A98960D6DC42');
        $this->addSql('DROP TABLE modules_structures');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modules_structures (modules_id INT NOT NULL, structures_id INT NOT NULL, INDEX IDX_ABE5A98960D6DC42 (modules_id), INDEX IDX_ABE5A9899D3ED38D (structures_id), PRIMARY KEY(modules_id, structures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE modules_structures ADD CONSTRAINT FK_ABE5A9899D3ED38D FOREIGN KEY (structures_id) REFERENCES structures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_structures ADD CONSTRAINT FK_ABE5A98960D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE structures_modules DROP FOREIGN KEY FK_6F3F71579D3ED38D');
        $this->addSql('ALTER TABLE structures_modules DROP FOREIGN KEY FK_6F3F715760D6DC42');
        $this->addSql('DROP TABLE structures_modules');
    }
}
