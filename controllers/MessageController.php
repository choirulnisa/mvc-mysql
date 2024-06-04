<?php
require_once __DIR__ . '/../models/MessageModel.php';

class MessageController {
    private $model;

    public function __construct() {
        $this->model = new MessageModel();
    }

    public function fetchMessages() {
        $messages = $this->model->getMessages();
        header('Content-Type: application/json');
        echo json_encode($messages);
    }

    public function sendMessage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $message = $_POST['message'];
            $this->model->saveMessage($username, $message);
        }
    }
}

// Route the request based on URL path
$controller = new MessageController();

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($requestPath) {
    case '/public/fetch_messages.php':
        $controller->fetchMessages();
        break;
    case '/public/send_message.php':
        $controller->sendMessage();
        break;
}
?>
