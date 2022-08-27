<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827140904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation entre Modules et les tables Structures et Partners';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modules_partners (modules_id INT NOT NULL, partners_id INT NOT NULL, INDEX IDX_CE2BE89260D6DC42 (modules_id), INDEX IDX_CE2BE892BDE7F1C6 (partners_id), PRIMARY KEY(modules_id, partners_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modules_structures (modules_id INT NOT NULL, structures_id INT NOT NULL, INDEX IDX_ABE5A98960D6DC42 (modules_id), INDEX IDX_ABE5A9899D3ED38D (structures_id), PRIMARY KEY(modules_id, structures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modules_partners ADD CONSTRAINT FK_CE2BE89260D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_partners ADD CONSTRAINT FK_CE2BE892BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_structures ADD CONSTRAINT FK_ABE5A98960D6DC42 FOREIGN KEY (modules_id) REFERENCES modules (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modules_structures ADD CONSTRAINT FK_ABE5A9899D3ED38D FOREIGN KEY (structures_id) REFERENCES structures (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modules_partners DROP FOREIGN KEY FK_CE2BE89260D6DC42');
        $this->addSql('ALTER TABLE modules_partners DROP FOREIGN KEY FK_CE2BE892BDE7F1C6');
        $this->addSql('ALTER TABLE modules_structures DROP FOREIGN KEY FK_ABE5A98960D6DC42');
        $this->addSql('ALTER TABLE modules_structures DROP FOREIGN KEY FK_ABE5A9899D3ED38D');
        $this->addSql('DROP TABLE modules_partners');
        $this->addSql('DROP TABLE modules_structures');
    }
}
