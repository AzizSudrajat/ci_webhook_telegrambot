<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    function index(){
        $TOKEN = "1566766327:AAEtNMMkQ0jzTP-P97-J9IoyHNpWnq0Uv5U";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];

        if (strpos($message, "/start") === 0) {
        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Haloo, test webhooks, ChatID : ".$chatID);
        }
    }


}
