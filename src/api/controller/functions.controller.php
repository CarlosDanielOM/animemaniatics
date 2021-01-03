<?php
require_once './model/animes.model.php';
class Functions {
    public static function checkExistance($object, $value) {
        switch($object) {
            case 'anime':
                return animesModel::checkAnimeExistance($value);
            break;
            default:
                return 'Wrong object';
            break;
        }
    }

    public static function checkIfFinished($object, $value) {
        switch($object) {
            case 'anime':
                return animesModel::checkIfFinished($value);
                break;
            default:
                return 'Wrong object';
            break;
        }
    }
}