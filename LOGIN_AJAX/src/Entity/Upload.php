<?php

require_once '../Controller/shared.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Upload
{

    public static function uploadFile($file_name, $user_id)
    {

        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('INSERT INTO upload (`file_name`, `user_id`)
                VALUES (:file_name, :user_id)');

            $query->execute(array(
                'file_name' => $file_name,
                'user_id' => $user_id,
            ));

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        error_log($GLOBALS['db']->lastInsertId());
        return $GLOBALS['db']->lastInsertId();

    }

}