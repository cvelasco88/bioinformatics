<?php

namespace app\helpers;

use Exception;
use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class FileHelper
{
    /** 
     * Create
     * @param string $filepath
     * @param string $content
    */
    public static function save($filepath, $content)
    {
        $file = fopen($filepath, "w") or die("Unable to open file!");
        fwrite($file, $content);
        fclose($file);
    }

    /** 
     * Create
     * @param string $filepath
     * @param string $content
    */
    public static function read($filepath)
    {
        return file_get_contents($filepath);
    }

    /** 
     * Append
     * @param string $filepath
     * @param string $content
    */
    public static function append($filepath, $content)
    {
        $file = fopen($filepath, "wa+") or die("Unable to open file!");
        fwrite($file, $content);
        fclose($file);
    }

    /** 
     * Add
     * @param resource $file
     * @param string $content
    */
    public static function write($file, $content)
    {
        fwrite($file, $content);
    }
}
