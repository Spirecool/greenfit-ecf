<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220829094008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation OneToOne entre Users et Structures';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD structure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E92534008B FOREIGN KEY (structure_id) REFERENCES structures (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E92534008B ON users (structure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E92534008B');
        $this->addSql('DROP INDEX UNIQ_1483A5E92534008B ON users');
        $this->addSql('ALTER TABLE users DROP structure_id');
    }
}
