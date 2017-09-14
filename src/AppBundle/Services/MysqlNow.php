<?php

namespace AppBundle\Services;

use DateTime;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Statement;

/**
 * This class is intended to deploy into application the Time in terms of Database.
 *
 * Class MysqlNow
 * @package AppBundle\Services
 */
class MysqlNow
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * MysqlNow constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return DateTime
     */
    public function get()
    {
        /** @var Statement $stmt */
        $stmt = $this->connection->prepare('SELECT NOW() as now');
        $stmt->execute();
        $result = $stmt->fetch();

        return new DateTime($result['now']);
    }
}
