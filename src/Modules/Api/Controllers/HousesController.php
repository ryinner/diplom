<?php

namespace App\Modules\Api\Controllers;

use App\Interfaces\CRUDInterface;
use App\Models\Houses;
use App\Models\Images;
use App\Plugins\ImagesPlugin;
use stdClass;

class HousesController extends ControllerApiBase implements CRUDInterface
{
    public function initialize()
    {
        parent::initialize();
    }

    public function getAction(): string|false
    {
        return json_encode(Houses::find());
    }

    public function createAction(): string|false
    {
        $files = $this->request->getUploadedFiles();

        foreach ($files as $file) {
            $checkAnswer = new ImagesPlugin($file);
            if ($checkAnswer->check()['success'] === false) {
                return json_encode(['success' => false, 'error' => $checkAnswer->check()]);
                exit;
            }
        }

        $house = new Houses();
        $house->assign((array)$this->request->getPost());

        foreach ($files as $file) {
            $filePath = rand() . $file->getName();

            $file->moveTo(
                'img/houses/' . $filePath
            );

            $image = new Images([
                'name' => $file->getName(),
                'path' => $filePath,
                'house_id' => $house->id
            ]);

            $image->save();
        }


        if ($house->save()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false, 'error' => $house->getMessages()]);
        }
    }

    public function updateAction(int $id): string|false
    {
        $house = Houses::findFirst($id);

        $house->save();
        return json_encode([]);
    }

    public function deleteAction(int $id): string|false
    {
        $house = Houses::findFirst($id);

        $house->delete();
        return json_encode([]);
    }

    public function getForIndexAction(): string|false
    {
        $houses = new stdClass;

        $houses->buyAble = Houses::find([
            'type = 2',
            'status = 1',
            'order' => 'created_at',
            'limit' => 4,
        ]);

        $houses->rentAble = Houses::find(
            [
                'type = 1',
                'status = 2',
                'order' => 'created_at',
                'limit' => 4,
            ]
        );

        return json_encode($houses);
    }
}
