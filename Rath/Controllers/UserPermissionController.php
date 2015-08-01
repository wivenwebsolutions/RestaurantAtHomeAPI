<?php

require_once APPLICATION_PATH.'/Rath/Entities/ApiResponse.php';
require_once APPLICATION_PATH.'/Rath/Libraries/medoo.min.php';
require_once APPLICATION_PATH.'/Rath/Helpers/MedooFactory.php';
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 29/07/2015
 * Time: 20:42
 */

//namespace Rath\Controllers;


class UserPermissionController
{
    static function InsertUserPermissionSet(UserPermission $permission){
        $db = MedooFactory::CreateMedooInstance();
        $db->insert(UserPermission::TABLE_NAME,
            [
                UserPermission::USER_TYPE_COL => $permission->userType,
                UserPermission::ROUTE_COL => $permission->route,
                UserPermission::DISABLED_COL => $permission->disabled
            ]);
    }

    /**
     * @param $permissions UserPermission[]
     */
    static  function InsertUserPermissionSets(array $permissions){
        $db = MedooFactory::CreateMedooInstance();
        foreach($permissions as $permission ){
//            echo "inserting:";
//            var_dump($permission);
            $db->insert(UserPermission::TABLE_NAME,
                [
                    UserPermission::USER_TYPE_COL => $permission->userType,
                    UserPermission::ROUTE_COL => $permission->route,
                    UserPermission::DISABLED_COL => $permission->disabled
                ]);
        }
    }

    static function InsertUserPermissionSetForUser(UserPermission $permission, User $user){
        //TODO: implement when required
    }

    static function GetPermissionErrorMessage($route){
        $response = new ApiResponse();
        $response->code = 403;
        $response->message = "Access denied to route: ".$route;
        return $response;
    }
}