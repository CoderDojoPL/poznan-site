<?php

namespace Migrate;

use Doctrine\DBAL\Connection;
use ItePHP\Core\Container;

class Version20160927001653
{

    public function up(Container $container)
    {
        $sql = "CREATE TABLE newsletters (id INT NOT NULL, address VARCHAR(100) NOT NULL, token VARCHAR(32) NOT NULL, PRIMARY KEY(id));";

        /**
         * @var Connection $connection
         */
        $connection = $container->getConnection();

        $connection->exec($sql);
    }

    public function down(Container $container)
    {
        $sql = "DROP TABLE newsletters;";

        /**
         * @var Connection $connection
         */
        $connection = $container->getConnection();

        $connection->exec($sql);
    }

}