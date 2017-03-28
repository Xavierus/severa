<?php

declare(strict_types=1);

final class init
{
    const DSN = "mysql:host=db;port=3306;dbname=demo";
    const LOGIN = "root";
    const PASSWORD = "root";

    const SCRIPT_NAME = 'kljngy8gnyu4gn4ign47gn48g';

    const RESULTS = [
        'normal', 'illegal', 'failed', 'success',
    ];

    const SQL_CREATE_TABLE = <<<EOL
DROP TABLE IF EXISTS `test`;    
    
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `script_name` varchar(25) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sort_index` smallint(6) NOT NULL,
  `result` enum('normal','illegal','failed','success') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `test` ADD PRIMARY KEY (`id`);

ALTER TABLE `test` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
EOL;

    /**
     * @var PDO
     */
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO(self::DSN, self::LOGIN, self::PASSWORD);
        $this->create();
        $this->fill();
    }

    /**
     * @return array
     */
    public function get(): array
    {
        $stmt = $this->connection->prepare("SELECT * FROM `test`");//" WHERE result = :resultNormal OR result = :resultSuccess");
        $resultNormal = 'normal';
        $resultSuccess = 'success';
        $stmt->bindParam('resultNormal', $resultNormal);
        $stmt->bindParam('resultSuccess', $resultSuccess);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return void
     */
    private function create()
    {
        $this->connection->query(self::SQL_CREATE_TABLE);
    }

    /**
     * @return void
     */
    private function fill()
    {
        $stmt = $this->connection->prepare("
            INSERT INTO `test` 
              (`script_name`, `sort_index`, `result`) 
            VALUES 
              (:scriptName, :sortIndex, :result);
        ");

        for ($i = 0; $i < rand(40,100); $i++) {
            $scriptName = str_shuffle(self::SCRIPT_NAME);
            $sortIndex = rand(0, 999);
            $result = self::RESULTS[rand(0, count(self::RESULTS)-1)];
            $stmt->bindParam('scriptName', $scriptName);
            $stmt->bindParam('sortIndex', $sortIndex);
            $stmt->bindParam('result', $result);
            $stmt->execute();
        }
    }
}