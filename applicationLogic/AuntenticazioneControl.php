<?php



class AuntenticazioneControl
    {
    static function Logout(){
        session_destroy();
        header("Location: ../Utente/Homepage.php");
        exit;
    }
}