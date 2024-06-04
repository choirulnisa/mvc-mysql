<?php
class MessageModel {
    private $db;

    public function __construct() {
        $host = 'localhost'; 
        $dbname = 'mvc_pwti'; 
        $username = 'root'; 
        $password = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getMessages() {
        $stmt = $this->db->query('SELECT username, message, timestamp FROM messages ORDER BY timestamp ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveMessage($username, $message) {
        $stmt = $this->db->prepare('INSERT INTO messages (username, message) VALUES (:username, :message)');
        $stmt->execute(['username' => $username, 'message' => $message]);
    }
}
?>
