<?php
/**
 * 与图片相关的文件
 */
require_once 'string.func.php';

/**
 * 生成验证码
 * @param int $type
 * @param int $length
 * @param int $pixel
 * @param int $line
 * @param string $session_name
 */
function verifyImage($type=1,$length=4,$pixel=1,$line=1,$session_name = "verify")
{
    session_start();
    $width = 80;
    $height = 40;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    $_SESSION[$session_name] = $chars;
    $fontfiles = array("ARLRDBD.TTF", "BRLNSR.TTF", "ITCKRIST.TTF");
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 30);
        $color = imagecolorallocate($image, mt_rand(50, 180), mt_rand(50, 180), mt_rand(50, 180));
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles)-1)];
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    if ($pixel) {
        for ($i = 0; $i < 50; $i++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    if ($line) {
        for ($i = 1; $i <= $line; $i++) {
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
        }
    }
    header ( "content-type:image/gif" );
    imagegif ( $image );
    imagedestroy ( $image );
}