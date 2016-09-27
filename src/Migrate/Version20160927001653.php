<?php

namespace Migrate;

use Doctrine\DBAL\Connection;
use ItePHP\Core\Container;

class Version20160927001653
{

    public function up(Container $container)
    {
        $sql = "
            CREATE SEQUENCE newsletters_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
            CREATE TABLE newsletters (id INT NOT NULL, address VARCHAR(100) NOT NULL, token VARCHAR(32) NOT NULL, PRIMARY KEY(id));
            CREATE UNIQUE INDEX UNIQ_8ECF000CD4E6F81 ON newsletters (address);
            CREATE UNIQUE INDEX UNIQ_8ECF000C5F37A13B ON newsletters (token);
          ";

        /**
         * @var Connection $connection
         */
        $connection = $container->getService('doctrine')->getEntityManager()->getConnection();

        $connection->exec($sql);
    }

    public function down(Container $container)
    {
        $sql = "DROP SEQUENCE newsletters_id_seq;
            DROP TABLE newsletters;
           ";

        /**
         * @var Connection $connection
         */
        $connection = $container->getService('doctrine')->getEntityManager()->getConnection();

        $connection->exec($sql);
    }

}