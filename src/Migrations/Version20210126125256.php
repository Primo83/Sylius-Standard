<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210126125256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add new property "color" in product object';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE sylius_product ADD color VARCHAR(7) DEFAULT "blue"');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE sylius_product DROP color');
    }
}
