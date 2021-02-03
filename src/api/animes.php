<?php
    require_once './controller/animes.controller.php';

    header("Access-Control-Allow-Origin: *");

    if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
        throw new Exception('Only POST requests are allowed');
    }

    // Make sure Content-Type is application/json 
    $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
    if (stripos($content_type, 'application/json') === false) {
    throw new Exception('Content-Type must be application/json');
    }
    
    $body = file_get_contents("php://input");
    $req = json_decode($body, true);
    if(isset($req)) {
        if(!is_array($req)) {
            throw new Exception("Error decoding JSON");
        }
    } else {
        echo 'hola';
    }
    $options = $req['options'];
    
    switch($options['object']) {
        case 'user':
        break;
        case 'anime':
            switch($options['action']){
                case 'create':
                    $anime = new animeController();
                    $anime->name = $req['name'];
                    $anime->img = $req['img'];
                    $anime->description = $req['description'];
                    $anime->caption = $req['caption'];
                    $anime->status = $req['status'];
                    $anime->release_date = $req['release_date'];
                    $anime->ended = $req['ended'];
                    $anime->episodes = $req['episodes'];
                    $anime->bg_img = $req['bg_img'];
                    $anime->type = $req['type'];
                    $anime->tags = $req['tags'];
                    $anime->ENG_name = $req['ENG_name'];
                    $anime->hiragana_name = $req['hiragana_name'];
                    $anime->second_ENG_name = $req['second_ENG_name'];
                    $res = $anime->createAnime();
                    echo json_encode(['res' => $res]);
                break;
                case 'get':
                    $anime = new animeController();
                    $anime->name = $req['name'];
                    $res = $anime->getAnime();
                    echo json_encode(['res' => $res]);
                break;
                case 'getAll':
                    $anime = new animeController();
                    $animes = $anime->getAllAnimes();
                    echo json_encode(['res' => $animes]);
                break;
                case 'update':
                    $anime = new animeController();
                    $anime->id = $req['id'];
                    $anime->name = $req['name'];
                    $anime->img = $req['img'];
                    $anime->img = $req['img'];
                    $anime->description = $req['description'];
                    $anime->caption = $req['caption'];
                    $anime->status = $req['status'];
                    $anime->bg_img = $req['bg_img'];
                    $anime->tags = $req['tags'];
                    $update = $anime->updateAnime();
                    echo json_encode(['res' => $update]);
                break;
                case 'addEpisode':
                    $anime = new animeController();
                    $anime->id = $req['id'];
                    $res = $anime->addAnimeEpisode();
                    echo json_encode(['res' => $res]);
                break;
                case 'finishAnime':
                    $anime = new animeController();
                    $anime->id = $req['id'];
                    $res = $anime->finishAnime();
                    echo json_encode(["res" => $res]);
                break;
                case 'changeNames':
                    $anime = new animeController();
                    $anime->id = $req['id'];
                    $anime->name = $req['name'];
                    $anime->ENG_name = $req['ENG_name'];
                    $anime->hiragana_name = $req['hiragana_name'];
                    $anime->second_ENG_name = $req['second_ENG_name'];
                    $res = $anime->
            }
        break;
        default:
        break;
    }
?>

<!-- Test comment in php? -->