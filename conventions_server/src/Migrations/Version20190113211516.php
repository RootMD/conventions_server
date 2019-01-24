<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190113211516 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilet DROP bilet_id');
        $this->addSql('ALTER TABLE czlonek_zespolu DROP FOREIGN KEY FK_7ADB5F6C78952F20');
        $this->addSql('DROP INDEX IDX_7ADB5F6C78952F20 ON czlonek_zespolu');
        $this->addSql('ALTER TABLE czlonek_zespolu ADD zespol_id INT NOT NULL, DROP zespol_id_id, DROP czlonek_zespolu_id');
        $this->addSql('ALTER TABLE czlonek_zespolu ADD CONSTRAINT FK_7ADB5F6C3EBF8048 FOREIGN KEY (zespol_id) REFERENCES zespol (id)');
        $this->addSql('CREATE INDEX IDX_7ADB5F6C3EBF8048 ON czlonek_zespolu (zespol_id)');
        $this->addSql('ALTER TABLE gra DROP gra_id');
        $this->addSql('ALTER TABLE konkurs DROP FOREIGN KEY FK_A165528925B3A2EB');
        $this->addSql('ALTER TABLE konkurs DROP FOREIGN KEY FK_A16552895901FA17');
        $this->addSql('DROP INDEX UNIQ_A16552895901FA17 ON konkurs');
        $this->addSql('DROP INDEX IDX_A165528925B3A2EB ON konkurs');
        $this->addSql('ALTER TABLE konkurs ADD konwent_id INT NOT NULL, ADD gra_id INT NOT NULL, DROP konwent_id_id, DROP gra_id_id');
        $this->addSql('ALTER TABLE konkurs ADD CONSTRAINT FK_A1655289A69FF984 FOREIGN KEY (konwent_id) REFERENCES konwent (id)');
        $this->addSql('ALTER TABLE konkurs ADD CONSTRAINT FK_A16552893DBBA1AA FOREIGN KEY (gra_id) REFERENCES gra (id)');
        $this->addSql('CREATE INDEX IDX_A1655289A69FF984 ON konkurs (konwent_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A16552893DBBA1AA ON konkurs (gra_id)');
        $this->addSql('ALTER TABLE konwent DROP konwent_id');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D25B3A2EB');
        $this->addSql('DROP INDEX IDX_DD5A5B7D25B3A2EB ON plan');
        $this->addSql('ALTER TABLE plan ADD konwent_id INT NOT NULL, DROP konwent_id_id, DROP plan_id');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7DA69FF984 FOREIGN KEY (konwent_id) REFERENCES konwent (id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7DA69FF984 ON plan (konwent_id)');
        $this->addSql('ALTER TABLE produkt DROP FOREIGN KEY FK_1B938EA5BC370D9E');
        $this->addSql('DROP INDEX IDX_1B938EA5BC370D9E ON produkt');
        $this->addSql('ALTER TABLE produkt ADD stoisko_id INT NOT NULL, DROP stoisko_id_id, DROP produkt_id');
        $this->addSql('ALTER TABLE produkt ADD CONSTRAINT FK_1B938EA5DD4FBD51 FOREIGN KEY (stoisko_id) REFERENCES stoisko (id)');
        $this->addSql('CREATE INDEX IDX_1B938EA5DD4FBD51 ON produkt (stoisko_id)');
        $this->addSql('ALTER TABLE stoisko DROP stoisko_id');
        $this->addSql('ALTER TABLE uczestnik DROP FOREIGN KEY FK_6441072030084A90');
        $this->addSql('ALTER TABLE uczestnik DROP FOREIGN KEY FK_644107205A529B16');
        $this->addSql('DROP INDEX UNIQ_6441072030084A90 ON uczestnik');
        $this->addSql('DROP INDEX IDX_644107205A529B16 ON uczestnik');
        $this->addSql('ALTER TABLE uczestnik ADD konkurs_id INT NOT NULL, ADD bilet_id INT NOT NULL, DROP konkurs_id_id, DROP bilet_id_id, DROP uczestnik_id');
        $this->addSql('ALTER TABLE uczestnik ADD CONSTRAINT FK_644107203DF04F9F FOREIGN KEY (konkurs_id) REFERENCES konkurs (id)');
        $this->addSql('ALTER TABLE uczestnik ADD CONSTRAINT FK_64410720BA7B6D6C FOREIGN KEY (bilet_id) REFERENCES bilet (id)');
        $this->addSql('CREATE INDEX IDX_644107203DF04F9F ON uczestnik (konkurs_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64410720BA7B6D6C ON uczestnik (bilet_id)');
        $this->addSql('ALTER TABLE zespol DROP FOREIGN KEY FK_C1B34A002CE2DBAB');
        $this->addSql('DROP INDEX UNIQ_C1B34A002CE2DBAB ON zespol');
        $this->addSql('ALTER TABLE zespol ADD plan_id INT NOT NULL, DROP plan_id_id, DROP zespol_id');
        $this->addSql('ALTER TABLE zespol ADD CONSTRAINT FK_C1B34A00E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C1B34A00E899029B ON zespol (plan_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bilet ADD bilet_id INT NOT NULL');
        $this->addSql('ALTER TABLE czlonek_zespolu DROP FOREIGN KEY FK_7ADB5F6C3EBF8048');
        $this->addSql('DROP INDEX IDX_7ADB5F6C3EBF8048 ON czlonek_zespolu');
        $this->addSql('ALTER TABLE czlonek_zespolu ADD czlonek_zespolu_id INT NOT NULL, CHANGE zespol_id zespol_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE czlonek_zespolu ADD CONSTRAINT FK_7ADB5F6C78952F20 FOREIGN KEY (zespol_id_id) REFERENCES zespol (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7ADB5F6C78952F20 ON czlonek_zespolu (zespol_id_id)');
        $this->addSql('ALTER TABLE gra ADD gra_id INT NOT NULL');
        $this->addSql('ALTER TABLE konkurs DROP FOREIGN KEY FK_A1655289A69FF984');
        $this->addSql('ALTER TABLE konkurs DROP FOREIGN KEY FK_A16552893DBBA1AA');
        $this->addSql('DROP INDEX IDX_A1655289A69FF984 ON konkurs');
        $this->addSql('DROP INDEX UNIQ_A16552893DBBA1AA ON konkurs');
        $this->addSql('ALTER TABLE konkurs ADD konwent_id_id INT NOT NULL, ADD gra_id_id INT NOT NULL, DROP konwent_id, DROP gra_id');
        $this->addSql('ALTER TABLE konkurs ADD CONSTRAINT FK_A165528925B3A2EB FOREIGN KEY (konwent_id_id) REFERENCES konwent (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE konkurs ADD CONSTRAINT FK_A16552895901FA17 FOREIGN KEY (gra_id_id) REFERENCES gra (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A16552895901FA17 ON konkurs (gra_id_id)');
        $this->addSql('CREATE INDEX IDX_A165528925B3A2EB ON konkurs (konwent_id_id)');
        $this->addSql('ALTER TABLE konwent ADD konwent_id INT NOT NULL');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7DA69FF984');
        $this->addSql('DROP INDEX IDX_DD5A5B7DA69FF984 ON plan');
        $this->addSql('ALTER TABLE plan ADD plan_id INT NOT NULL, CHANGE konwent_id konwent_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D25B3A2EB FOREIGN KEY (konwent_id_id) REFERENCES konwent (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D25B3A2EB ON plan (konwent_id_id)');
        $this->addSql('ALTER TABLE produkt DROP FOREIGN KEY FK_1B938EA5DD4FBD51');
        $this->addSql('DROP INDEX IDX_1B938EA5DD4FBD51 ON produkt');
        $this->addSql('ALTER TABLE produkt ADD produkt_id INT NOT NULL, CHANGE stoisko_id stoisko_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE produkt ADD CONSTRAINT FK_1B938EA5BC370D9E FOREIGN KEY (stoisko_id_id) REFERENCES stoisko (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1B938EA5BC370D9E ON produkt (stoisko_id_id)');
        $this->addSql('ALTER TABLE stoisko ADD stoisko_id INT NOT NULL');
        $this->addSql('ALTER TABLE uczestnik DROP FOREIGN KEY FK_644107203DF04F9F');
        $this->addSql('ALTER TABLE uczestnik DROP FOREIGN KEY FK_64410720BA7B6D6C');
        $this->addSql('DROP INDEX IDX_644107203DF04F9F ON uczestnik');
        $this->addSql('DROP INDEX UNIQ_64410720BA7B6D6C ON uczestnik');
        $this->addSql('ALTER TABLE uczestnik ADD konkurs_id_id INT NOT NULL, ADD bilet_id_id INT NOT NULL, ADD uczestnik_id INT NOT NULL, DROP konkurs_id, DROP bilet_id');
        $this->addSql('ALTER TABLE uczestnik ADD CONSTRAINT FK_6441072030084A90 FOREIGN KEY (bilet_id_id) REFERENCES bilet (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE uczestnik ADD CONSTRAINT FK_644107205A529B16 FOREIGN KEY (konkurs_id_id) REFERENCES konkurs (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6441072030084A90 ON uczestnik (bilet_id_id)');
        $this->addSql('CREATE INDEX IDX_644107205A529B16 ON uczestnik (konkurs_id_id)');
        $this->addSql('ALTER TABLE zespol DROP FOREIGN KEY FK_C1B34A00E899029B');
        $this->addSql('DROP INDEX UNIQ_C1B34A00E899029B ON zespol');
        $this->addSql('ALTER TABLE zespol ADD zespol_id INT NOT NULL, CHANGE plan_id plan_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE zespol ADD CONSTRAINT FK_C1B34A002CE2DBAB FOREIGN KEY (plan_id_id) REFERENCES plan (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C1B34A002CE2DBAB ON zespol (plan_id_id)');
    }
}
