<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 25/07/2015
 * Time: 20:23
 */

namespace Rath\helpers;

use Rath\Libraries\medoo;
use Exception;


class MedooFactory
{
    /**
     * @var medoo
     */
    private static $db;

    /**
     * @return medoo
     * @throws Exception
     */
    static function getMedooInstance(){
        if(empty(MedooFactory::$db))
            MedooFactory::createMedooInstance();
        return MedooFactory::$db;
    }

    private static function createMedooInstance(){
        if(APP_MODE == 'LOCAL')
            MedooFactory::$db =  new medoo([
                // required
                'database_type' => 'mysql',
                'database_name' => 'rathdev',
                'server' => 'localhost',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',

                // optional
                'port' => 3306,
                // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
                //            'option' => [
                //                PDO::ATTR_CASE => PDO::CASE_NATURAL
                //            ]
            ]);
        else if(APP_MODE == 'APIDEV')
            MedooFactory::$db =  new medoo([
                // required
                'database_type' => 'mysql',
                'database_name' => 'deb84843n3_rathdev',
                'server' => 'localhost',
                'username' => 'deb84843n3_tdp',
                'password' => 'gEcDgPOy',
                'charset' => 'utf8',

                // optional
                'port' => 3306,
                // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
                //            'option' => [
                //                PDO::ATTR_CASE => PDO::CASE_NATURAL
                //            ]
            ]);
        else if(APP_MODE == 'TEST')
         MedooFactory::$db = new medoo([
             // required
             'database_type' => 'mysql',
             'database_name' => 'deb84843n3_rathtest',
             'server' => 'localhost',
             'username' => 'deb84843n3_tdp',
             'password' => 'gEcDgPOy',
             'charset' => 'utf8',

             // optional
             'port' => 3306,
             // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
             //            'option' => [
             //                PDO::ATTR_CASE => PDO::CASE_NATURAL
             //
         ]);
        else
            throw new Exception("Application Mode not defined.");
    }
}