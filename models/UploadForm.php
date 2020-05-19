<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        // @url(https://yii2-framework.readthedocs.io/en/stable/guide/input-file-upload/)
        // Extension & mimeTypes Validation
        // [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        return [
            [['file'], 'file'],
        ];
    }
}