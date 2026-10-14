<?php
/**
 * IDM Térmicas - Database
 * Singleton PDO — lee las constantes definidas en config.php
 */
class Database
{
    private static ?PDO $pdo = null;

    public static function get(): PDO
    {
        if (!self::$pdo) {
            $dsn = 'mysql:host=' . DB_HOST
                 . ';dbname='   . DB_NAME
                 . ';charset='  . DB_CHARSET;

            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }
        return self::$pdo;
    }
}