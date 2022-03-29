<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329123838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe_prof (classe_id INT NOT NULL, prof_id INT NOT NULL, INDEX IDX_45A9055D8F5EA509 (classe_id), INDEX IDX_45A9055DABC1F7FE (prof_id), PRIMARY KEY(classe_id, prof_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_prof ADD CONSTRAINT FK_45A9055D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_prof ADD CONSTRAINT FK_45A9055DABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD prof_principal_id INT NOT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF968553BF90 FOREIGN KEY (prof_principal_id) REFERENCES prof (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8F87BF968553BF90 ON classe (prof_principal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE classe_prof');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF968553BF90');
        $this->addSql('DROP INDEX UNIQ_8F87BF968553BF90 ON classe');
        $this->addSql('ALTER TABLE classe DROP prof_principal_id');
    }
}
