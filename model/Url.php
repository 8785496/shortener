<?php

class Url {

    public $id;
    public $longUrl;
    public $message;

    const digits = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function id2short($id) {
        $digits = self::digits;
        $short = '';
        do {
            $dig = $id % 62;
            $short = $digits[$dig] . $short;
            $id = floor($id / 62);
        } while ($id != 0);
        return $short;
    }

    public static function short2id($short) {
        $id = 0;
        $len = strlen($short);
        for ($i = 0; $i < $len; $i++) {
            $sym = $short[$len - $i - 1];
            $id += strpos(self::digits, $sym) * pow(62, $i);
        }
        return $id;
    }

    public function save() {
        if ($this->validate()) {
            try {
                global $db;
                $dbh = new PDO($db['dsn'], $db['username'], $db['password']);
                $stmt = $dbh->prepare("INSERT INTO url (long_url) VALUES (:longUrl)");
                $stmt->bindParam(':longUrl', $this->longUrl, PDO::PARAM_STR);
                $stmt->execute();
                $this->id = $dbh->lastInsertId();
                $dbh = null;
                return true;
            } catch (PDOException $e) {
                $this->message = 'No connection to the database.'; //$e->getMessage();
                return false;
            }
        } else {
            $this->message = "Incorrect URL";
            return false;
        }
    }

    public static function findById($id) {
        try {
            global $db;
            $dbh = new PDO($db['dsn'], $db['username'], $db['password']);
            $stmt = $dbh->prepare("SELECT * FROM url WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch();
            $dbh = null;
            if ($row) {
                $url = new Url();
                $url->id = $row['id'];
                $url->longUrl = $row['long_url'];
                return $url;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function validate() {
        if (preg_match("/^https?:\/\/[^\/\?\#]/i", $this->longUrl)) {
            return true;
        } else {
            return false;
        }
    }

}
