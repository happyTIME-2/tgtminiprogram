<?php
/**
 * @date 2018-08-10 17:17
 * @author: johnsqliu
 */
namespace App;
class ErrorCode
{
    public static $OK = 0;
    public static $IllegalAesKey = -41001;
    public static $IllegalIv = -41002;
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;
}