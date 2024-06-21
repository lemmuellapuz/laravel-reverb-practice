<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chat-container {
            max-width: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .chat-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 1.2rem;
        }

        .messages {
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
        }

        .message {
            background-color: #f2f2f2;
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 4px;
        }

        .message.from-me {
            background-color: #DCF8C6;
            align-self: flex-end;
        }

        .message.from-other {
            background-color: #E5E4E2;
        }

        .message-content {
            word-wrap: break-word;
        }

        .input-container {
            display: flex;
            align-items: center;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        .input-container input[type=text] {
            flex: 1;
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .input-container button {
            padding: 8px 16px;
            font-size: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .input-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            Simple Messaging App
        </div>
        <div class="messages" id="messages-container">
            <!-- Messages will be dynamically added here -->
        </div>
        <div style="color:gray; margin:10px; text-align:right; font-size:13px;"><small id="status" ></small></div>
        <div class="input-container">
            <input type="text" id="input-message" placeholder="Type your message...">
            <button id="button-send">Send</button>
        </div>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
         $(document).ready(function() {
            
            $('#input-message').on('input', function() {
                axios.post('/user-typing', {
                    name: 'User 2'
                })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.error('Error broadcasting typing event:', error);
                });
            });

            Echo.channel('user-chat-typing')
                .listen('UserChatTypingEvent', (event) => {
                    if(event.name != 'User 2')
                        $('#status').text(`${event.name} is typing...`)
                });

        });
    </script>
</body>
</html>