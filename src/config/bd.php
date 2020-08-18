<?php

namespace App\config;

use App\config\config;
use \PDO;

/** @class bd *
 *  @brief Representa la nueva instancia de PDO*/
class bd
{

    protected $pdo;
    /** @brief Constructor */
    /** @param  $opt contendra la configuracion de la BD  */
    public function  __construct()
    {
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];
        $dsn = "mysql:host=" . config::DB_HOST . ";dbname=" . config::DB_NAME . ";charset=" . config::DB_CHAR;
        $this->pdo = new PDO($dsn, config::DB_USER, config::DB_PASS, $opt);
    }
    /** @param $arg  contendra los datos del request 
     *   @param $sql  almacenara la consulta si es que hay datos en el query
     *   @return json de los datos  
     */
    public function run($sql, $arg = [])
    {
        if (!$arg) {
            $data = $this->pdo->query($sql);
            return $data;
        }
        $sentence = $this->pdo->prepare($sql);
        $sentence->execute($arg);
        return $sentence;
    }
}
