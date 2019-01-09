<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109140635 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE public.user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
//        $this->addSql('CREATE TABLE public."user" (id INT NOT NULL, uuid VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_327C5DE7D17F50A6 ON public."user" (uuid)');
//        $this->addSql('DROP TABLE "user"');
        $this->addSql('ALTER TABLE factorial_result ALTER rezult TYPE TEXT');
        $this->addSql('ALTER TABLE factorial_result ALTER rezult DROP DEFAULT');
//        $this->addSql('ALTER TABLE factorial_result ADD CONSTRAINT FK_9D4C63D19D86650F FOREIGN KEY (user_id_id) REFERENCES public."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE factorial_result DROP CONSTRAINT FK_9D4C63D19D86650F');
        $this->addSql('DROP SEQUENCE public.user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, uuid VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d649d17f50a6 ON "user" (uuid)');
        $this->addSql('DROP TABLE public."user"');
        $this->addSql('ALTER TABLE factorial_result ALTER rezult TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE factorial_result ALTER rezult DROP DEFAULT');
    }
}
