<?
require "config.php";
require "recaptchalib.php";

//секретный ключ
$secret = $cnf['public_key'];
//ответ
$response = null;
//проверка секретного ключа
$reCaptcha = new ReCaptcha($secret);
 
if (!empty($_POST)) {
 
    //Валидация $_POST['name'] и $_POST['email']
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
 
    if ($response != null && $response->success) {
        echo "Все хорошо.";
    } else {
        echo "Вы точно человек?";
    }
 
}
?>