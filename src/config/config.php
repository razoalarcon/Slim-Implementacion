<?php

namespace App\config;

/**
 * @brief Interfaz php
 *
 * Almacena la cadena de conexion a MySql
 */
interface config{
    const DB_HOST = 'localhost';
    const DB_NAME = 'farma';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_CHAR = 'utf8';
}
