<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207101257 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ijsrecept ADD fruit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ijsrecept ADD CONSTRAINT FK_82829C96BAC115F0 FOREIGN KEY (fruit_id) REFERENCES fruit (id)');
        $this->addSql('CREATE INDEX IDX_82829C96BAC115F0 ON ijsrecept (fruit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ijsrecept DROP FOREIGN KEY FK_82829C96BAC115F0');
        $this->addSql('DROP INDEX IDX_82829C96BAC115F0 ON ijsrecept');
        $this->addSql('ALTER TABLE ijsrecept DROP fruit_id');
    }
}
