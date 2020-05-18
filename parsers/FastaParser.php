<?php

namespace app\parsers;

use Exception;
use stdClass;
use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class FastaParser
{
    /** 
     * @param string $filepath
     * @return array
    */
    public static function parse($filepath)
    {
        $result = [];
        $handle = fopen($filepath, "r");
        if ($handle) {
            $item = null;
            while (($line = fgets($handle)) !== false) {
                // process the line read.
                $linefix = trim($line);
                if(strlen($linefix) > 0){
                    if($linefix[0] == ">"){
                        // add item
                        if(isset($item)){
                            array_push($result, $item);
                        }
                        // create new
                        $item = new stdClass;
                        $item->header = $linefix;
                        $item->body = "";
                        
                    } else {
                        if(isset($item)){
                            $item->body .= $linefix;
                        }
                    }
                }
            }
            // add item
            if(isset($item)){
                array_push($result, $item);
            }

            fclose($handle);
        } else {
            // error opening the file.
            throw new Exception("Error parsing file");
        }
        return $result;
    }

    /** 
     * @param string $content
     * @return array
    */
    public static function parseContent($content)
    {
        $result = [];
        $lines = explode(PHP_EOL, $content);
        $nLines = count($lines);
        $index = 0;
        $item = null;
        while ($index < $nLines) {
            $line = $lines[$index];
            // process the line read.
            $linefix = trim($line);
            if(strlen($linefix) > 0){
                if($linefix[0] == ">"){
                    // add item
                    if(isset($item)){
                        array_push($result, $item);
                    }
                    // create new
                    $item = new stdClass;
                    $item->header = $linefix;
                    $item->body = "";
                    
                } else {
                    if(isset($item)){
                        $item->body .= $linefix;
                    }
                }
            }
            // iter
            $index++;
        }
        // add item
        if(isset($item)){
            array_push($result, $item);
        }

        return $result;
    }
}
