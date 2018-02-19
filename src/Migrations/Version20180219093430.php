<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180219093430 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, place INT DEFAULT NULL, photo VARCHAR(255) NOT NULL, size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tchat (id INT AUTO_INCREMENT NOT NULL, users INT DEFAULT NULL, content TEXT NOT NULL, sent_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description TEXT NOT NULL, internet VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, accessibility TINYINT(1) NOT NULL, kitchen TINYINT(1) NOT NULL, parking TINYINT(1) NOT NULL, address VARCHAR(255) NOT NULL, town VARCHAR(100) NOT NULL, lng NUMERIC(11, 8) NOT NULL, lat NUMERIC(11, 8) NOT NULL, country VARCHAR(100) NOT NULL, user INT DEFAULT NULL, owner INT DEFAULT NULL, bookings INT DEFAULT NULL, medias INT DEFAULT NULL, recommendations INT DEFAULT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sleep (id INT NOT NULL, bed INT NOT NULL, desk TINYINT(1) NOT NULL, airConditioning TINYINT(1) NOT NULL, washingMachine TINYINT(1) NOT NULL, outlet VARCHAR(255) NOT NULL, other VARCHAR(255) NOT NULL, INDEX bed_index (bed), INDEX desk_index (desk), INDEX airConditioning_index (airConditioning), INDEX washingMachine_index (washingMachine), INDEX outlet_index (outlet), INDEX other_index (other), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work (id INT NOT NULL, capacity INT NOT NULL, privateDesk TINYINT(1) NOT NULL, computer TINYINT(1) NOT NULL, printer TINYINT(1) NOT NULL, scanner TINYINT(1) NOT NULL, projector TINYINT(1) NOT NULL, napStation TINYINT(1) NOT NULL, whiteBoard TINYINT(1) NOT NULL, terrace TINYINT(1) NOT NULL, freeDrink TINYINT(1) NOT NULL, freeSnack TINYINT(1) NOT NULL, INDEX capacity_index (capacity), INDEX privateDesk_index (privateDesk), INDEX computer_index (computer), INDEX printer_index (printer), INDEX scanner_index (scanner), INDEX projector_index (projector), INDEX napStation_index (napStation), INDEX whiteBoard_index (whiteBoard), INDEX terrace_index (terrace), INDEX freeDrink_index (freeDrink), INDEX freeSnack_index (freeSnack), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, description TEXT NOT NULL, activity_status TINYINT(1) NOT NULL, status TINYINT(1) NOT NULL, photo_profile VARCHAR(255) NOT NULL, createdPlace VARCHAR(100) NOT NULL, ownedPlace INT NOT NULL, recommendations INT DEFAULT NULL, friendsWithMe INT NOT NULL, myFriends INT NOT NULL, messages INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, id_place INT DEFAULT NULL, arrival_date DATE NOT NULL, departure_date DATE NOT NULL, booking_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommendation (id INT AUTO_INCREMENT NOT NULL, place INT DEFAULT NULL, id_user INT DEFAULT NULL, validation TINYINT(1) NOT NULL, comment TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sleep ADD CONSTRAINT FK_F33C2ACBF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E6880BF396750 FOREIGN KEY (id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sleep DROP FOREIGN KEY FK_F33C2ACBF396750');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E6880BF396750');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE tchat');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE sleep');
        $this->addSql('DROP TABLE work');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE recommendation');
    }
}
