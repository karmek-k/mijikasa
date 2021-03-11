<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311074135 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Change PK from id to hash';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE link_id_seq CASCADE');
//        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE link DROP id');
        $this->addSql('ALTER TABLE link ADD PRIMARY KEY (hash)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE link_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX link_pkey');
        $this->addSql('ALTER TABLE link ADD id INT NOT NULL');
        $this->addSql('ALTER TABLE link ADD PRIMARY KEY (id)');
    }
}
