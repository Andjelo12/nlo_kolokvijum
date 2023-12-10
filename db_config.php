<?php
$GLOBALS['pdo'] = connectDb($dsn, $pdoOptions);
/**Function tries to connect to database using PDO.
 * @param string $dsn
 * @param array $pdoOptions
 * @return PDO
 */
function connectDb(string $dsn, array $pdoOptions): PDO
{

    try {
        $pdo = new PDO($dsn, PARAMS['USER'], PARAMS['PASSWORD'], $pdoOptions);
    } catch (\PDOException $e) {
        var_dump($e->getCode());
        throw new \PDOException($e->getMessage());
    }
    return $pdo;
}