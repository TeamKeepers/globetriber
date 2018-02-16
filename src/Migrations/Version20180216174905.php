<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180216174905 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sleep (id INT NOT NULL, bed INT NOT NULL, desk TINYINT(1) NOT NULL, airConditioning TINYINT(1) NOT NULL, washingMachine TINYINT(1) NOT NULL, outlet VARCHAR(255) NOT NULL, other VARCHAR(255) NOT NULL, INDEX bed_index (bed), INDEX desk_index (desk), INDEX airConditioning_index (airConditioning), INDEX washingMachine_index (washingMachine), INDEX outlet_index (outlet), INDEX other_index (other), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work (id INT NOT NULL, capacity INT NOT NULL, privateDesk TINYINT(1) NOT NULL, computer TINYINT(1) NOT NULL, printer TINYINT(1) NOT NULL, scanner TINYINT(1) NOT NULL, projector TINYINT(1) NOT NULL, napStation TINYINT(1) NOT NULL, whiteBoard TINYINT(1) NOT NULL, terrace TINYINT(1) NOT NULL, freeDrink TINYINT(1) NOT NULL, freeSnack TINYINT(1) NOT NULL, INDEX capacity_index (capacity), INDEX privateDesk_index (privateDesk), INDEX computer_index (computer), INDEX printer_index (printer), INDEX scanner_index (scanner), INDEX projector_index (projector), INDEX napStation_index (napStation), INDEX whiteBoard_index (whiteBoard), INDEX terrace_index (terrace), INDEX freeDrink_index (freeDrink), INDEX freeSnack_index (freeSnack), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sleep ADD CONSTRAINT FK_F33C2ACBF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880BF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE amenities');
        $this->addSql('DROP TABLE tribe');
        $this->addSql('ALTER TABLE media CHANGE id_place place INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD internet VARCHAR(100) NOT NULL, ADD image VARCHAR(255) NOT NULL, ADD accessibility TINYINT(1) NOT NULL, ADD kitchen TINYINT(1) NOT NULL, ADD parking TINYINT(1) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD user INT DEFAULT NULL, ADD owner INT DEFAULT NULL, ADD bookings INT DEFAULT NULL, ADD medias INT DEFAULT NULL, ADD recommendations INT DEFAULT NULL, ADD discr VARCHAR(255) NOT NULL, DROP place_type, DROP id_user, DROP owned, CHANGE title title VARCHAR(100) NOT NULL, CHANGE lng lng NUMERIC(11, 8) NOT NULL, CHANGE lat lat NUMERIC(11, 8) NOT NULL');
        $this->addSql('ALTER TABLE recommendation CHANGE id_place place INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tchat ADD users INT DEFAULT NULL, DROP id_sender, DROP id_receiver');
        $this->addSql('ALTER TABLE user ADD recommendations INT DEFAULT NULL, ADD friendsWithMe INT NOT NULL, ADD myFriends INT NOT NULL, ADD messages INT NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE amenities (id INT AUTO_INCREMENT NOT NULL, id_place INT DEFAULT NULL, bed INT NOT NULL, wifi VARCHAR(32) NOT NULL COLLATE latin1_swedish_ci, desk TINYINT(1) NOT NULL, air_conditioning TINYINT(1) NOT NULL, washing_machine TINYINT(1) NOT NULL, kitchen TINYINT(1) NOT NULL, outlet VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, other VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tribe (id INT AUTO_INCREMENT NOT NULL, id_sender INT DEFAULT NULL, id_receiver INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE sleep');
        $this->addSql('DROP TABLE work');
        $this->addSql('ALTER TABLE media CHANGE place id_place INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD place_type VARCHAR(32) NOT NULL COLLATE utf8_unicode_ci, ADD id_user INT DEFAULT NULL, ADD owned INT DEFAULT NULL, DROP internet, DROP image, DROP accessibility, DROP kitchen, DROP parking, DROP address, DROP user, DROP owner, DROP bookings, DROP medias, DROP recommendations, DROP discr, CHANGE title title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE lng lng NUMERIC(11, 0) NOT NULL, CHANGE lat lat NUMERIC(11, 0) NOT NULL');
        $this->addSql('ALTER TABLE recommendation CHANGE place id_place INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tchat ADD id_receiver INT DEFAULT NULL, CHANGE users id_sender INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP recommendations, DROP friendsWithMe, DROP myFriends, DROP messages');
    }
}
