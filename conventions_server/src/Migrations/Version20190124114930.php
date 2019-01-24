<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190124114930 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE zespol ADD stoisko_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE zespol ADD CONSTRAINT FK_C1B34A00DD4FBD51 FOREIGN KEY (stoisko_id) REFERENCES stoisko (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C1B34A00DD4FBD51 ON zespol (stoisko_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE zespol DROP FOREIGN KEY FK_C1B34A00DD4FBD51');
        $this->addSql('DROP INDEX UNIQ_C1B34A00DD4FBD51 ON zespol');
        $this->addSql('ALTER TABLE zespol DROP stoisko_id');
    }
}
