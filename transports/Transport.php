<?php
namespace bazilio\transports;

use bazilio\async\models\AsyncTask;
use bazilio\async\transports\Exception;

interface Transport
{
    function __construct(Array $connectionConfig);

    /**
     * @return bool
     * @throws Exception
     */
    public function disconnect();

    /**
     * @param string $text
     * @param string $queueName
     * @return bool|string false or message_id
     */
    public function send($text, $queueName);

    /**
     * @param string $queueName
     * @param bool $wait Wait for task
     * @return AsyncTask|bool
     */
    public function receive($queueName, $wait = false);

    /**
     * @param AsyncTask $task
     * @return bool
     */
    public function acknowledge(AsyncTask $task);

    /**
     * @param string $queueName
     * @return bool
     */
    public function purge($queueName);
} 