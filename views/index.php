<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" type="text/css" href="../public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body style="background-color: #F5F2F8;">
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <button id="chatBtn" class="btn btn-primary" style="background-color: #7D5CAB;">Chat</button>
                <div id="chatDialog" class="chat-dialog mt-3" style="display: none; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px;">
                    <div id="chatMessages" class="chat-messages p-3" style="max-height: 300px; overflow-y: auto;"></div>
                    <div class="input-group mt-3">
                        <input type="text" id="usernameInput" class="form-control" placeholder="Masukan username">
                        <input type="text" id="messageInput" class="form-control" placeholder="Tulis Pesan">
                        <div class="input-group-append">
                            <button id="sendBtn" class="btn btn-primary" style="background-color: #7D5CAB;">Send</button>
                            <button id="closeBtn" class="btn btn-secondary">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../public/script.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
