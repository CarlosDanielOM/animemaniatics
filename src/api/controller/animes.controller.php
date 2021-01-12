<?php
require_once './model/animes.model.php';
require_once './controller/functions.controller.php';
class animeController {
    public $id;
    public $name;
    public $img;
    public $description;
    public $caption;
    public $status;
    public $release_date;
    public $ended;
    public $episodes;
    public $bg_img;
    public $type;
    public $tags;
    public $ENG_name;
    public $hiragana_name;
    public $second_ENG_name;

    public function createAnime() {
        $anime_data = [
            "name" => $this->name,
            "img" => $this->img,
            "description" => $this->description,
            "caption" => $this->caption,
            "status" => $this->status,
            "release_date" => $this->release_date,
            "ended" => $this->ended,
            "episodes" => $this->episodes,
            "bg_img" => $this->bg_img,
            "type" => $this->type,
            "tags" => $this->tags,
            "ENG_name" => $this->ENG_name,
            "hiragana_name" => $this->hiragana_name,
            "second_ENG_name" => $this->second_ENG_name
        ];
        $exists = Functions::checkExistance('anime', $anime_data['name']);
        if($exists === false) {
            $saved = animesModel::createAnime($anime_data);
            return ["anime" => $saved];
        } else {
            return ["anime" => 'Anime already exists'];
        }
    }

    public function getAnime() {
        $anime_name = $this->name;
        $exists = Functions::checkExistance('anime', $anime_name);
        if($exists === true) {
            $anime = animesModel::getAnime($anime_name);
            return ["anime" => $anime];
        } else {
            return ["anime" => 'Anime doesn\'t exist'];
        }
    }

    public function getAllAnimes() {
        $animes = animesModel::getAllAnimes();
        return ['anime' => $animes];
    }

    public function updateAnime() {
        $update_data = [
            "id" => $this->id,
            "name" => $this->name,
            "img" => $this->img,
            "description" => $this->description,
            "caption" => $this->caption,
            "status" => $this->status,
            "bg_img" => $this->bg_img,
            "tags" => $this->tags
        ];
        $update = animesModel::updateAnime($update_data);
        return ['anime' => $update];
    }

    public function addAnimeEpisode() {
        $id = $this->id;
        $status = Functions::checkIfFinished('anime', $id);
        if($status === "Emision") {
            $update = animesModel::addAnimeEpisode($id);
            return ['anime' => $update];
        } else {
            return ['anime' => 'Anime already ended'];
        }
    }

    public function finishAnime() {
        $id = $this->id;
        $status = Functions::checkIfFinished('anime', $id);
        if($status === "Emision") {
            $update = animesModel::finishAnime($id);
            return ['anime' => $update];
        } else {
            return ['anime' => 'Anime is already in \'ended\' status'];
        }
    }

    public function changeAnimeNames() {
        
    }
}
