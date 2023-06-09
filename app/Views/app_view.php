<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Word with ChatGPT</title>
    <link rel="icon" type="image/png" href="ai.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Poppins", sans-serif
        }

        body {
            font-size: 16px;
        }

        .w3-half img {
            margin-bottom: -6px;
            margin-top: 16px;
            opacity: 0.8;
            cursor: pointer
        }

        .w3-half img:hover {
            opacity: 1
        }

        .bgimg {
            background-image: url("BG3.jpg");
            background-position: center;
            background-size: cover;
            min-height: 100%;
        }
    </style>
</head>

<body class="bgimg">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding"
        style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft"
            style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64"><b>IS215<br>A5-GROUP1</b></h3>
        </div>
        <div class="w3-bar-block">
            <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <a href="#instructions" onclick="w3_close(); document.getElementById('instructions_modal').style.display='block'; " class="w3-bar-item w3-button w3-hover-white">Instructions</a>
            <a href="#game" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Game</a>
            <!--<a href="#packages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Packages</a>-->
            <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Group Members</a>
        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
        <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
        <span>IS215 A5-GROUP1</span>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
        id="myOverlay"></div>

    <!-- Image loader -->
    <div id='loader' class="w3-overlay w3-black w3-opacity" style="z-index: 100">
        <div class="w3-center w3-padding-top-48"><img class="w3-image" src='loader_red.gif'></div>
    </div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px" id="content">

        <!-- Header -->
        <div class="w3-container" style="margin-top:40px" id="showcase">
            <h1 class="w3-jumbo"><b>Guess the word</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>with ChatGPT.</b></h1>
            <!-- <hr style="width:100px;border:5px solid red" class="w3-round"> -->
        </div>

        <!-- Instructions-->
        <div style="display: <?= $started?"none":"block" ?>">
            <div class="w3-container" >
                <h1 class="w3-xxxlarge w3-text-red"><b>Instructions.</b></h1>
                <hr style="width:100px;border:5px solid red" class="w3-round">

                <h3>How to play:</h3>
                <ul>
                    <li>Enter your name and click <b>Start Game</b>.</li>
                    <li>Click <b>Start Round</b> to let the app choose a random category.</li>
                    <li>App will request a word from ChatGPT for the chosen category, and 10 clues for the word.</li>
                    <li>Click <b>Get Clue</b> and try to guess the word.</li>
                    <li>If you have a guess in mind, enter the word and <b>submit your answer</b>.</li>
                    <li>If you guess the word, you earn 1 point and you can start a <b>next round</b> or <b>end the game</b>.</li>
                    <li>After the 10 clues and you have not guessed the word, the mystery word will be shown. You won't earn
                        a point but you can start a <b>next round</b> or <b>end the game</b>.</li>
                </ul>
            </div>
        </div>

        <!-- Instructions Modal-->
        <div id="instructions_modal" class="w3-modal">
            <div class="w3-container w3-padding-large w3-padding-24 w3-modal-content w3-card-4" id="instructions">
                <span onclick="document.getElementById('instructions_modal').style.display='none'" class="w3-button w3-display-topright w3-xxlarge w3-hover-red">&times;</span>
                <h1 class="w3-xxxlarge w3-text-red"><b>Instructions.</b></h1>
                <hr style="width:100px;border:5px solid red" class="w3-round">

                <h3>How to play:</h3>
                <ul>
                    <li>Enter your name and click <b>Start Game</b>.</li>
                    <li>Click <b>Start Round</b> to let the app choose a random category.</li>
                    <li>App will request a word from ChatGPT for the chosen category, and 10 clues for the word.</li>
                    <li>Click <b>Get Clue</b> and try to guess the word.</li>
                    <li>If you have a guess in mind, enter the word and <b>submit your answer</b>.</li>
                    <li>If you guess the word, you earn 1 point and you can start a <b>next round</b> or <b>end the game</b>.</li>
                    <li>After the 10 clues and you have not guessed the word, the mystery word will be shown. You won't earn
                        a point but you can start a <b>next round</b> or <b>end the game</b>.</li>
                </ul>
            </div>
        </div>

        <!-- Game -->
        <div class="w3-container" id="game" style="margin-top:0px">
            <h1 class="w3-xxxlarge w3-text-red"><b>Game.</b></h1>
            <hr style="width:100px;border:5px solid red" class="w3-round">
            <h2>Let's Play
                <?= " " . $player_name ?>!
            </h2>
            <div style="display: <?= $started ? "none" : "block" ?>">
                <form method="post" action="<?= base_url() ?>">
                    <label>Enter your name:</label>
                    <input class="w3-input w3-border" type="text" name="name" id="playerName" value="" <?= $started ? "readonly" : "" ?> required />
                    <button class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom" type="submit"
                        id="startGame" name="startGame" <?= $started ? "disabled" : "" ?>>Start Game</button>

                </form>
            </div>
            <div class="w3-row" style="display: <?= $started ? "block" : "none" ?>">
                <button href="#game" class="w3-button w3-blue w3-block w3-padding-large" id="getCategory" <?= $started ? "" : "disabled" ?>>Start Round</button>
            </div>

            <!-- Category and Clue -->
            <div class="w3-row" style="margin-top:30px; display: <?= $started ? "block" : "none" ?>" id="cat_clue">
                <div class="w3-col m4 w3-margin-bottom w3-center w3-padding-small">
                    <ul class="w3-ul w3-light-grey w3-center">
                        <li class="w3-red w3-large w3-padding-16">Category</li>
                        <li class="w3-padding-16" style="min-height: 120px;">
                            <h3><span id="category" style="color: blue"><span></h3>
                        </li>
                    </ul>
                </div>

                <div class="w3-col m8 w3-margin-bottom w3-padding-small">
                    <ul class="w3-ul w3-light-grey w3-center">
                        <li class="w3-red w3-large w3-padding-16">Clue</li>
                        <li class="w3-padding-16" style="min-height: 120px;">
                            <h3><span id="clue" style="color: blue"> </span></h3>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Game -->
            <div class=" w3-margin-bottom w3-light-grey" style="display: <?= $started ? "block" : "none" ?>">
                <div class="w3-card-4">
                    <div class="w3-container">
                        <h3>Enter your guess here:</h3>
                    </div>
                    <form class="w3-container">
                        <p>
                            <input class="w3-input" type="text" name="guess" id="guess" required readonly>
                        </p>
                    </form>
                    <div class="w3-container">
                        <h2><span id="message"></span></h2>
                    </div>
                    <div class="w3-container">
                        <button class="w3-button w3-blue w3-block w3-hover-black w3-margin-bottom" id="getClue"
                            <?= $started ? "disabled" : "disabled" ?>>Get Clue</button>
                        <button class="w3-button w3-green w3-block w3-margin-bottom" id="checkAnswer"
                            <?= $started ? "disabled" : "disabled" ?>>Submit Answer</button>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="w3-row-padding w3-grayscale" style="display: <?= $started ? "block" : "none" ?>">
                <h3><b>Game Stats</b>:</h3>
                <div class="w3-col m4 w3-margin-bottom">
                    <div class="w3-light-grey">
                        <div class="w3-container w3-center">
                            <h3 style="min-height: 70px">WINS</h3>
                            <p class="w3-opacity w3-large w3-text-blue"><span id="num_wins">
                                    <?= $num_wins ?>
                                </span></p>
                        </div>
                    </div>
                </div>
                <div class="w3-col m4 w3-margin-bottom">
                    <div class="w3-light-grey">
                        <div class="w3-container w3-center">
                            <h3 style="min-height: 70px">ROUNDS</h3>
                            <p class="w3-opacity w3-large w3-text-blue"><span id="num_games_played">
                                    <?= $num_games_played ?>
                                </span></p>
                        </div>
                    </div>
                </div>
                <div class="w3-col m4 w3-margin-bottom">
                    <div class="w3-light-grey">
                        <div class="w3-container w3-center">
                            <h3 style="min-height: 70px">ATTEMPTS THIS ROUND</h3>
                            <p class="w3-opacity w3-large w3-text-blue"><span id="num_attempts">
                                    <?= $num_attempts ?>
                                </span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next round and End Game -->
            <div class="w3-row-padding" style="margin-top:30px;display: <?= $started ? "block" : "none" ?>">
                <div class="w3-half w3-margin-bottom">
                    <button class="w3-button w3-block w3-blue w3-padding-large" id="reset" <?= $started ? "disabled" : "disabled" ?>>Next Round</button>
                </div>

                <div class="w3-half">
                    <button class="w3-button w3-block w3-blue w3-padding-large" id="endGame" <?= $started ? "" : "disabled" ?>>End Game</button>
                </div>
            </div>
        </div>

        <!-- Members w3-block w3-padding-large w3-red w3-margin-bottom-->
        <div class="w3-container" id="contact" style="margin-top:75px">
            <h1 class="w3-xxxlarge w3-text-red"><b>Group Members.</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
            <p>Presented by A5-Group1</p>
            <ul>
                <li>Hannah Patricia Alcancia</li>
                <li>Garry Balinon</li>
                <li>Joseph Concepcion</li>
                <li>Jon Paolo Panis</li>
                <li>Aldwin Sumalinog</li>
                <li>Jean Tonogbanua</li>
            </ul>
        </div>
    </div>

    <!-- End page content -->
    </div>

    <!-- W3.CSS Container -->
    <div class="w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
        <!-- <p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS"
                target="_blank" class="w3-hover-opacity">w3.css</a></p> -->
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        $(document).ready(function () {

            $("#getCategory").click(function () {

                var ajxCategory = $.ajax({
                    //url: '<?= base_url('get_category') ?>',
                    url: '<?= base_url('api/get_category') ?>',
                    type: 'post',
                    //data: {search:search},
                    beforeSend: function () {
                        // Show image container
                        $("#getCategory").prop('disabled', true);
                        $("#loader").show();
                        $("#content").hide();
                    },
                    success: function (data, status, jqXhr) {
                        console.log(data);
                        $("#category").html(data.categoryTitle);
                        $("#num_games_played").html(data.num_games_played);
                        $("#num_attempts").html(data.num_attempts);
                        $("#num_wins").html(data.num_wins);
                        $("#reset").prop('disabled', false);
                        $("#getClue").prop('disabled', false);
                        $("#checkAnswer").prop('disabled', false);
                        if (data.next_round == true) {
                            $("#checkAnswer").prop('disabled', true);
                            $("#guess").prop('readonly', true);
                        } else {
                            $("#checkAnswer").prop('disabled', false);
                            //$("#getClue").prop('disabled', false);
                            $("#guess").prop('readonly', false);
                        }
                    }
                }),
                    ajxWord = ajxCategory.then(function (data) {
                        return $.ajax({
                            url: '<?= base_url('api/initialize_word') ?>',
                            //url: '<?= base_url('initialize_word') ?>',
                            type: 'post',
                            success: function (data, status, jqXhr) {
                                console.log(data);
                            }
                        });
                    }),
                    ajxClues = ajxWord.then(function (data) {
                        return $.ajax({
                            url: '<?= base_url('api/initialize_clues') ?>',
                            //url: '<?= base_url('initialize_clues') ?>',
                            type: 'post',
                            success: function (data, status, jqXhr) {
                                console.log(data);
                            }
                        });

                    });

                ajxClues.done(function (data) {
                    //console.log(data);
                    $("#loader").hide();
                    $("#content").show();
                    $('html, body').animate({
                        scrollTop: $("#game").offset().top,
                        },
                        500
                    );
                });
            });

            $("#guess").keypress(function (e) {
                if(e.key == "Enter")
                    e.preventDefault();
            });

            $("#getClue").click(function () {
                $.ajax({
                    url: '<?= base_url('api/get_clue') ?>',
                    //url: '<?= base_url('get_clue') ?>',
                    type: 'post',
                    beforeSend: function () {
                        // Show image container
                        $("#loader").show();
                        $("#content").hide();
                    },
                    success: function (data, status) {
                        console.log(data);
                        $("#clue").html(data.clue);
                        $("#num_games_played").html(data.num_games_played);
                        $("#num_attempts").html(data.num_attempts);
                        $("#num_wins").html(data.num_wins);
                        $("#checkAnswer").prop('disabled', false);
                        $("#guess").prop('readonly', false);
                        if (data.next_round === true) {
                            $("#checkAnswer").prop('disabled', true);
                            $("#guess").prop('readonly', true);
                            $("#getClue").prop('disabled', true);
                        }

                        $("#message").html("");
                    },
                    complete: function (data) {
                        // Hide image container
                        $("#loader").hide();
                        $("#content").show();
                        $('html, body').animate({
                            scrollTop: $("#cat_clue").offset().top,
                            },
                            500
                        );
                    }
                });
            });

            $("#checkAnswer").click(function () {

                let guess = $("#guess").val();
                console.log(guess);
                if (guess != "") {
                    
                    $("#checkAnswer").prop('disabled', true);
                    $("#guess").prop('readonly', true);
                    
                    $('html, body').animate({
                        scrollTop: $("#cat_clue").offset().top,
                        },
                        500
                    );
                    //$.post("<?= base_url('check_answer') ?>",
                    $.post("<?= base_url('api/check_answer') ?>",
                    {
                        answer: guess,
                    },
                    function (data, status) {
                        //console.log(data);
                        $("#message").html(data.message);
                        $("#guess").val("");
                        $("#num_games_played").html(data.num_games_played);
                        $("#num_attempts").html(data.num_attempts);
                        $("#num_wins").html(data.num_wins);
                        if (data.next_round === true) {
                            $("#getClue").prop('disabled', true);
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please type in your answer first.',
                    })
                }
            });


            $("#reset").click(function () {
                Swal.fire({
                    title: 'Another Round?',
                    text: "This will end the current round",
                    icon: 'warning',
                    showDenyButton: true,
                    //showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    denyButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post("<?= base_url('api/reset') ?>",
                        //$.post("<?= base_url('reset') ?>",
                            function (data, status) {
                                $("#clue").html("");
                                $("#num_games_played").html(data.num_games_played);
                                $("#num_attempts").html("0");
                                $("#num_wins").html(data.num_wins);
                                $("#mystery_word").html("");
                                $("#category").html("");
                                $("#getCategory").prop('disabled', false);
                                $("#reset").prop('disabled', true);
                                $("#revealWord").prop('disabled', true);
                                $("#getClue").prop('disabled', true);
                                $("#startGame").prop('disabled', true);
                                $("#checkAnswer").prop('disabled', true);
                                $("#message").html("");
                            });
                        
                            $('html, body').animate({
                                scrollTop: $("#game").offset().top,
                                },
                                500
                        );
                    }
                })
            });

            $('#endGame').click(function(e) {
                Swal.fire({
                    title: 'End Game?',
                    text: "Your stats will be reset.",
                    icon: 'warning',
                    //showCancelButton: true,
                    confirmButtonColor: '#d33',
                    denyButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, I quit.',
                    showDenyButton: true,
                    //showCancelButton: true,
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='<?= base_url('api/end_game') ?>';
                    }
                })
            });

        });
    </script>
</body>

</html>