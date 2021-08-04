<?php include 'config.php'; ?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>4aT - Your cool chat</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        #wrapper {
            width: 900px;
            margin: auto;
        }

        #inputs {
            display: flex;
        }

        button {
            width: 50%;
            height: 50px;
        }

        input#message {
            width: 50%;
            height: 50px;
            text-indent: 10px;
        }

        #all_messages {
            width: 100%;
            height: 300px;
            overflow: scroll;
        }

        #all_messages p {
            background-color: greenyellow;
            padding: 5px;
            border: 1px solid black;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="all_messages"></div>
        <div id="inputs">
            <input type="text" name="message" id="message" autofocus>
            <button>Click me or hit enter</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("input#message").focus;
            $("button").click(load);

            $('input#message').keypress(function(e) {
                if (e.which == 13) {
                    $('button').click();
                    return false; //<---- Add this line
                }
            });

            setInterval(function() {

                $.ajax({
                    url: "real_time_chat.php",
                    type: "POST",
                    dataType: "text",
                    success: function(data) {
                        $("#all_messages").html(data);
                        $("#all_messages").scrollTop($("#all_messages")[0].scrollHeight);
                    }

                })
            }, 700);

        });

        function load() {
            $.ajax({
                url: "load_chat.php",
                type: "POST",
                dataType: "text",
                data: {
                    message: $("input#message").val(),
                }

            }).done(function(response) {
                $("input#message").val("");
            });
        }
    </script>
</body>

</html>
