<?php
require 'config/db.php';
require 'model/Url.php';

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['url']) && $_POST['url'] != '') {
        $url = new Url();
        $url->longUrl = $_POST['url'];
        if ($url->save()) {
            echo 'http://' . $_SERVER['SERVER_NAME'] . '/' . Url::id2short($url->id);
        } else {
            echo $url->message;
        }
    }
} else {
    if (isset($_GET['url']) && preg_match("/^[0-9a-zA-Z]+$/", $_GET['url'])) {
        $id = Url::short2id($_GET['url']);
        $url = Url::findById($id);
        if ($url != null) {
            require 'view/viewRedirect.php';
        } else {
            require 'view/view404.php';
        }
    } else {
        require 'view/viewDefault.php';
    }
}