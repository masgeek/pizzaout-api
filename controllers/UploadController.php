<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 15-Jan-18
 * Time: 12:35
 */

namespace app\controllers;

use app\model_extended\MENU_ITEMS;
use app\model_extended\USERS_MODEL;
use Yii;
use yii\web\Controller;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\helpers\Json;

class UploadController extends Controller
{
    /**
     * @return string
     * @throws \yii\base\Exception
     */
public function actionIndex()
{
    $model = new MENU_ITEMS();

    $imageFile = UploadedFile::getInstance($model, 'IMAGE_FILE');

    $directory = Yii::getAlias('@foodimages') . DIRECTORY_SEPARATOR;

    if (!is_dir($directory)) {
        FileHelper::createDirectory($directory);
    }

    if ($imageFile) {
        $uid = uniqid(time(), true);
        $fileName = $uid . '.' . $imageFile->extension;
        $filePath = $directory . $fileName;

        return $filePath;
        if ($imageFile->saveAs($filePath)) {
            $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
            return Json::encode([
                'files' => [
                    [
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        'url' => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl' => 'image-delete?name=' . $fileName,
                        'deleteType' => 'POST',
                    ],
                ],
            ]);
        }
    }

    return '';
}

    public function actionImageDelete($name)
    {
        $directory = Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file) {
            $fileName = basename($file);
            $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
            $output['files'][] = [
                'name' => $fileName,
                'size' => filesize($file),
                'url' => $path,
                'thumbnailUrl' => $path,
                'deleteUrl' => 'image-delete?name=' . $fileName,
                'deleteType' => 'POST',
            ];
        }
        return Json::encode($output);
    }
}