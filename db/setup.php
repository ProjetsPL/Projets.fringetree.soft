<?php
/**
 *
 * Connection to database
 * with ORM ReadBean
 *
 */
RedBeanPHP\R::setup('mysql:host=' . $connection['host'] . ';dbname='. $connection['db']. ';port=3306',
        $connection['user'],
        $connection['pass']);

/**
 *
 * ORM DEBUG MODE
 *
 */
 RedBeanPHP\R::debug( TRUE, 1);
?>
