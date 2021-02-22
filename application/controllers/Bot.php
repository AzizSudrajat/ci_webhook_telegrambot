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
          $text = 'Hai Selamat datang di Contact Center NTTI DBS. Apabila Ingin berbicara dengan operator ketik/klik : /mulai';
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text);
        }else if(strpos($message, "/mulai") === 0){
          $text = 'Tunggu beberapa saat, Operator Kami Akan Menghubungi kamu, Chat Id kamu adalah '.$chatID;
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text);
        }else if(strpos($message, "/lapor") === 0){
          $text = 'Silakan masukan laporan ada di bawah ini, tandai dengan ketik/klik : /selesai';
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text);
        }else if(strpos($message, "/selesai") === 0){
          $text = 'Laporan anda sudah kami Terima. Akan segera kami proses, mohon pastikan Email anda Aktif. Apabila ingin Menghubungi Operator kami kembali ketik/klik : /mulai, Apabila Ingin Mengakhiri Chat ketik/klik : /end';
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text);
        }else if(strpos($message, "/end") === 0){
          $text = 'Terima Kasih Sudah Menghubungi Kami.';
          file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=".$text);
        }
    }


}
