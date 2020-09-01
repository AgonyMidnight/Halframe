<?php

namespace Core;

class DB
{
    public static $conn;
    private static $query = null;
    private static $instance = null;

    public function __construct()
    {
        self::getInstance();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = self::setConnect();
        }
        return self::$instance;
    }

    public static function setConnect()
    {
        try {
            if (self::$conn == null) {
                $servername = 'localhost';
                $DB = 'one';
                $username = 'root';
                $password = 'root';
                self::$conn = new \PDO ("mysql:host=$servername;dbname=$DB", $username, $password);
                self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                echo "good";
            }
        } catch (\PDOException $e) {
            echo "nope" . "<br> " . "{$e->getMessage()}";
            exit();
        }
    }

    public function getArayDate(int $number)
    {
        switch ($number) {
            case 1:
            {
                self::$query = "SELECT entity_id, sku, created_at, value, attribute_code FROM catalog_product_entity_text cpet
            JOIN catalog_product_entity cpe on cpet.row_id = cpe.row_id
            JOIN eav_attribute ea on cpet.attribute_id = ea.attribute_id
            WHERE attribute_code = 'page_layout'";
                break;
            }
            case 2:
            {
                self::$query = "SELECT * FROM catalog_product_entity_text JOIN catalog_product_entity cpe
                    on catalog_product_entity_text.row_id = cpe.row_id
                    WHERE created_at > '2017-09-20 16:03:28'";
                break;
            }
            case 3:
            {
                self::$query = "SELECT entity_id, sku, created_at, value FROM catalog_product_entity_text cpet
              JOIN catalog_product_entity cpe on cpet.row_id = cpe.row_id
              JOIN eav_attribute eav on eav.attribute_id = cpet.attribute_id
               WHERE LOCATE('11', cpe.sku)";
                break;
            }
            default:
            {
                echo "Error";
                exit();
            }
        }
        $array[] = array();
        $sth = self::$conn->prepare(self::$query);
        $sth->execute();

        while ($result = $sth->fetch(\PDO::FETCH_BOTH)) {
            $array[] = $result;
        }
        return $array;
    }
}