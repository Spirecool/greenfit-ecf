<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220829093651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partners DROP FOREIGN KEY FK_EFEB516467B3B43D');
        $this->addSql('DROP INDEX UNIQ_EFEB516467B3B43D ON partners');
        $this->addSql('ALTER TABLE partners DROP users_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partners ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partners ADD CONSTRAINT FK_EFEB516467B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EFEB516467B3B43D ON partners (users_id)');
    }
}
