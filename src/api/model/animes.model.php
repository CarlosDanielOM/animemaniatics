<?php
require_once './config/database.config.php';
class animesModel {
    public static function createAnime($anime_data) {
        $x = Database::connect();
        $stm = $x->prepare('INSERT INTO animes (name, img, description, caption, status, release_date, ended, episodes, bg_img, type, tags, ENG_name, hiragana_name, second_ENG_name) VALUES (:name, :img, :description, :caption, :status, :release_date, :ended, :episodes, :bg_img, :type, :tags, :ENG_name, :hiragana_name, :second_ENG_name)');
        $stm->bindParam(':name', $anime_data['name'], PDO::PARAM_STR);
        $stm->bindParam(':img', $anime_data['img'], PDO::PARAM_STR);
        $stm->bindParam(':description', $anime_data['description'], PDO::PARAM_STR);
        $stm->bindParam(':caption', $anime_data['caption'], PDO::PARAM_STR);
        $stm->bindParam(':status', $anime_data['status'], PDO::PARAM_STR);
        $stm->bindParam(':release_date', $anime_data['release_date'], PDO::PARAM_STR);
        $stm->bindParam(':ended', $anime_data['ended'], PDO::PARAM_STR);
        $stm->bindParam(':episodes', $anime_data['episodes'], PDO::PARAM_INT);
        $stm->bindParam(':bg_img', $anime_data['bg_img'], PDO::PARAM_STR);
        $stm->bindParam(':type', $anime_data['type'], PDO::PARAM_STR);
        $stm->bindParam(':tags', $anime_data['tags'], PDO::PARAM_STR);
        $stm->bindParam(':ENG_name', $anime_data['ENG_name'], PDO::PARAM_STR);
        $stm->bindParam(':hiragana_name', $anime_data['hiragana_name'], PDO::PARAM_STR);
        $stm->bindParam(':second_ENG_name', $anime_data['second_ENG_name'], PDO::PARAM_STR);
        if($stm->execute()) {
            return 'Anime was saved successfully';
        } else {
            return 'Anime was not saved';
        }
    }

    public static function getAnime($name) {
        $x = Database::connect();
        $stm = $x->prepare('SELECT * FROM animes WHERE name = :name');
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->execute();
        $anime = $stm->fetch();
        if(isset($anime)) {
            return $anime;
        } else {
            return 'Error getting anime';
        }
    }

    public static function getAllAnimes() {
        $x = Database::connect();
        $stm = $x->prepare('SELECT * FROM animes');
        $stm->execute();
        $animes = $stm->fetchAll();
        if(isset($animes)) {
            return $animes;
        } else {
            return 'Error getting all animes';
        }
    }

    public static function updateAnime($update_data) {
        $x = Database::connect();
        $stm = $x->prepare('UPDATE animes SET name = :name, img = :img, description = :description, caption = :caption, status = :status, bg_img = :bg_img, tags = :tags WHERE id = :id');
        $stm->bindParam(':id', $update_data['id'], PDO::PARAM_INT);
        $stm->bindParam(':name', $update_data['name'], PDO::PARAM_STR);
        $stm->bindParam(':img', $update_data['img'], PDO::PARAM_STR);
        $stm->bindParam(':description', $update_data['description'], PDO::PARAM_STR);
        $stm->bindParam(':caption', $update_data['caption'], PDO::PARAM_STR);
        $stm->bindParam(':status', $update_data['status'], PDO::PARAM_STR);
        $stm->bindParam(':bg_img', $update_data['bg_img'], PDO::PARAM_STR);
        $stm->bindParam(':tags', $update_data['tags'], PDO::PARAM_STR);
        if($stm->execute()) {
            return 'Anime update';
        } else {
            return 'Error updating anime';
        }
    }

    public static function checkAnimeExistance($name) {
        $x = Database::connect();
        $stm = $x->prepare('SELECT id from animes WHERE name = :name');
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->execute();
        if($stm->fetch() != false) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkIfFinished($id) {
        $x = Database::connect();
        $stm = $x->prepare('SELECT status FROM animes WHERE id = :id');
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        $status = $stm->fetch();
        if(isset($status)) {
            return $status;
        } else {
            return 'There was a problem getting anime status';
        }
    }
}