<?php

function issetInput($name, $val = '')
{
    if (isset($_POST[$name])) {
        echo "value='" . $_POST[$name] . "'";
    } else {
        echo "value='" . $val . "'";
    }
}

function issetInputImage($input, $val = '', $attr = 'src')
{
    if (isset($_POST[$input])) {
        echo $attr . '="' . $_POST[$input] . '"';
    } else {
        if (empty($val)) {
            echo $attr . '="public/images/upload.png"';
        } else {
            echo $attr . '="' . $val . '"';
        }
    }
}

function issetCheckbox($input, $data)
{

}

function issetSelect($select, $val, $data = '')
{
    if (isset($_POST[$select]) && $_POST[$select] == $val) {
        echo "selected";
    } else {
        if ($data == $val) {
            echo "selected";
        }
    }
}

function redirect($url = '')
{
    if (empty($url)) {
        header("location:index.php");
    } else {
        header("location:index.php?$url");
    }
    exit();
}

function getFlash($name)
{
    echo $_SESSION['flash'][$name];
    unset($_SESSION['flash'][$name]);
}

function setFlash($name, $value)
{
    if (!isset($_SESSION['flash'][$name])) {
        $_SESSION['flash'][$name] = $value;
    }
}

function hasFlash($name)
{
    return isset($_SESSION['flash'][$name]);
}

// Token F5

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function form_token()
{
    $form_token = generateRandomString(35);
    $_SESSION['token'] = $form_token;
    echo '<input type="hidden" name="token" value="' . $form_token . '"/>';
}

function token()
{
    return (isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']);
}

function emptyToNull($value)
{
    if ($value == '')
        return;
    else
        return $value;
}

function checkId($id, $url)
{
    settype($id, 'int');
    if ($id <= 0) {
        redirect($url);
    }
}

function cleanString($str)
{
    return trim(strip_tags(addslashes($str)));
}

//
function set_time_current($time)
{
    $time = gmdate("H:i:s - d/m/Y", $time + 3600 * (7 + date("I")));
    return $time;
}

// Lấy toàn bộ đường dẫn thanh địa chỉ
function url_origin($use_forwarded_host = false)
{
    $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');
    $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $_SERVER['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($use_forwarded_host = false)
{
    return url_origin($_SERVER, $use_forwarded_host) . $_SERVER['REQUEST_URI'];
}

// Hỗ trợ ghi log ra file
function logIp()
{
    $filename = "log.html";
    if (file_exists($filename) && filesize($filename) >= (50 * 1024)) {
        unlink($filename);
    } else {
        $file = fopen("log.html", "a");
        fwrite($file, "<b>Time: </b>" . set_time_current(time()) . "<br/>");
        fwrite($file, "<b>Ip Address: </b>" . $_SERVER['REMOTE_ADDR'] . "<br/>");
        fwrite($file, "<b>Referer: </b>" . full_url() . "<br />");
        fwrite($file, "<b>Browser: </b>" . $_SERVER['HTTP_USER_AGENT'] . "<hr/>");
        fclose($file);
    }
}

?>