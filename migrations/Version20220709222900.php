<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709222900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE book_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE book (id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, authors TEXT NOT NULL, publication_date DATE NOT NULL, meap BOOLEAN DEFAULT false NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN book.authors IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE book_book_category (book_id INT NOT NULL, book_category_id INT NOT NULL, PRIMARY KEY(book_id, book_category_id))');
        $this->addSql('CREATE INDEX IDX_7A5A379416A2B381 ON book_book_category (book_id)');
        $this->addSql('CREATE INDEX IDX_7A5A379440B1D29E ON book_book_category (book_category_id)');
        $this->addSql('CREATE TABLE book_category (id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE book_book_category ADD CONSTRAINT FK_7A5A379416A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_book_category ADD CONSTRAINT FK_7A5A379440B1D29E FOREIGN KEY (book_category_id) REFERENCES book_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book_book_category DROP CONSTRAINT FK_7A5A379416A2B381');
        $this->addSql('ALTER TABLE book_book_category DROP CONSTRAINT FK_7A5A379440B1D29E');
        $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE book_category_id_seq CASCADE');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_book_category');
        $this->addSql('DROP TABLE book_category');
    }
}
