<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180220162942 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tribe ADD id INT AUTO_INCREMENT NOT NULL, ADD id_sender_id INT DEFAULT NULL, ADD id_receiver_id INT DEFAULT NULL, DROP user_id, DROP friend_user_id, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE tribe ADD CONSTRAINT FK_2653B55876110FBA FOREIGN KEY (id_sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tribe ADD CONSTRAINT FK_2653B558D5412041 FOREIGN KEY (id_receiver_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2653B55876110FBA ON tribe (id_sender_id)');
        $this->addSql('CREATE INDEX IDX_2653B558D5412041 ON tribe (id_receiver_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tribe MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE tribe DROP FOREIGN KEY FK_2653B55876110FBA');
        $this->addSql('ALTER TABLE tribe DROP FOREIGN KEY FK_2653B558D5412041');
        $this->addSql('DROP INDEX IDX_2653B55876110FBA ON tribe');
        $this->addSql('DROP INDEX IDX_2653B558D5412041 ON tribe');
        $this->addSql('ALTER TABLE tribe DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tribe ADD user_id INT NOT NULL, ADD friend_user_id INT NOT NULL, DROP id, DROP id_sender_id, DROP id_receiver_id');
    }
}
