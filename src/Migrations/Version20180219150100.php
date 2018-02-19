<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180219150100 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, arrival_date DATE NOT NULL, departure_date DATE NOT NULL, booking_status TINYINT(1) NOT NULL, INDEX IDX_E00CEDDEDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, place_id INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, size INT NOT NULL, INDEX IDX_6A2CA10CDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, recommendations_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description TEXT NOT NULL, internet VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, accessibility TINYINT(1) NOT NULL, kitchen TINYINT(1) NOT NULL, parking TINYINT(1) NOT NULL, address VARCHAR(255) NOT NULL, town VARCHAR(100) NOT NULL, lng NUMERIC(11, 8) NOT NULL, lat NUMERIC(11, 8) NOT NULL, country VARCHAR(100) NOT NULL, bed INT NOT NULL, desk TINYINT(1) NOT NULL, airConditioning TINYINT(1) NOT NULL, washingMachine TINYINT(1) NOT NULL, outlet VARCHAR(255) NOT NULL, other VARCHAR(255) NOT NULL, capacity INT NOT NULL, privateDesk TINYINT(1) NOT NULL, computer TINYINT(1) NOT NULL, printer TINYINT(1) NOT NULL, scanner TINYINT(1) NOT NULL, projector TINYINT(1) NOT NULL, napStation TINYINT(1) NOT NULL, whiteBoard TINYINT(1) NOT NULL, terrace TINYINT(1) NOT NULL, freeDrink TINYINT(1) NOT NULL, freeSnack TINYINT(1) NOT NULL, types VARCHAR(255) NOT NULL, INDEX IDX_741D53CDA76ED395 (user_id), INDEX IDX_741D53CD7E3C61F9 (owner_id), INDEX IDX_741D53CD70721739 (recommendations_id), INDEX bed_index (bed), INDEX desk_index (desk), INDEX airConditioning_index (airConditioning), INDEX washingMachine_index (washingMachine), INDEX outlet_index (outlet), INDEX other_index (other), INDEX capacity_index (capacity), INDEX privateDesk_index (privateDesk), INDEX computer_index (computer), INDEX printer_index (printer), INDEX scanner_index (scanner), INDEX projector_index (projector), INDEX napStation_index (napStation), INDEX whiteBoard_index (whiteBoard), INDEX terrace_index (terrace), INDEX freeDrink_index (freeDrink), INDEX freeSnack_index (freeSnack), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommendation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, validation TINYINT(1) NOT NULL, comment TEXT NOT NULL, INDEX IDX_433224D2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tchat (id INT AUTO_INCREMENT NOT NULL, content TEXT NOT NULL, sent_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, description TEXT NOT NULL, activity_status TINYINT(1) NOT NULL, roles VARCHAR(255) NOT NULL, photo_profile VARCHAR(255) DEFAULT \'default\' NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tribe (user_id INT NOT NULL, friend_user_id INT NOT NULL, INDEX IDX_2653B558A76ED395 (user_id), INDEX IDX_2653B55893D1119E (friend_user_id), PRIMARY KEY(user_id, friend_user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_tchat (user_id INT NOT NULL, tchat_id INT NOT NULL, INDEX IDX_6C6B67FCA76ED395 (user_id), INDEX IDX_6C6B67FCCACEEE58 (tchat_id), PRIMARY KEY(user_id, tchat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD70721739 FOREIGN KEY (recommendations_id) REFERENCES recommendation (id)');
        $this->addSql('ALTER TABLE recommendation ADD CONSTRAINT FK_433224D2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tribe ADD CONSTRAINT FK_2653B558A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tribe ADD CONSTRAINT FK_2653B55893D1119E FOREIGN KEY (friend_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_tchat ADD CONSTRAINT FK_6C6B67FCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_tchat ADD CONSTRAINT FK_6C6B67FCCACEEE58 FOREIGN KEY (tchat_id) REFERENCES tchat (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEDA6A219');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CDA6A219');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD70721739');
        $this->addSql('ALTER TABLE user_tchat DROP FOREIGN KEY FK_6C6B67FCCACEEE58');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDA76ED395');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD7E3C61F9');
        $this->addSql('ALTER TABLE recommendation DROP FOREIGN KEY FK_433224D2A76ED395');
        $this->addSql('ALTER TABLE tribe DROP FOREIGN KEY FK_2653B558A76ED395');
        $this->addSql('ALTER TABLE tribe DROP FOREIGN KEY FK_2653B55893D1119E');
        $this->addSql('ALTER TABLE user_tchat DROP FOREIGN KEY FK_6C6B67FCA76ED395');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE recommendation');
        $this->addSql('DROP TABLE tchat');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE tribe');
        $this->addSql('DROP TABLE user_tchat');
    }
}
