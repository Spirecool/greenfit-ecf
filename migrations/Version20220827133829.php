<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827133829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création table Structures et relation avec Partners et Users';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE structures (id INT AUTO_INCREMENT NOT NULL, partners_id INT DEFAULT NULL, users_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, manager_name VARCHAR(100) NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_5BBEC55ABDE7F1C6 (partners_id), UNIQUE INDEX UNIQ_5BBEC55A67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE structures ADD CONSTRAINT FK_5BBEC55ABDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id)');
        $this->addSql('ALTER TABLE structures ADD CONSTRAINT FK_5BBEC55A67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structures DROP FOREIGN KEY FK_5BBEC55ABDE7F1C6');
        $this->addSql('ALTER TABLE structures DROP FOREIGN KEY FK_5BBEC55A67B3B43D');
        $this->addSql('DROP TABLE structures');
    }
}
