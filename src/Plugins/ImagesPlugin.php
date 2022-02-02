<?php

namespace App\Plugins;

class ImagesPlugin
{
    protected string $img;

    public function __construct (string $img)
    {
        $this->img = $img;
    }

    public function check(): array
    {
        if ($this->checkSize() === false) {
            $answer['success'] = false;
            $answer['errors']['size'] = 'Размер картинки превышает 10Мб';
        }

        if ($this->checkExt() === false) {
            $answer['success'] = false;
            $answer['errors']['ext'] = 'Картинка не соответсвует допустимым расширениям: jpg, png, webp';
        }

        return $answer['sucess'] === false ?  $answer :  $answer['sucess'] = true;
    }

    public function checkSize(): bool
    {
        if (filesize($this->img) <= 10485760) {
            return true;
        } else {
            return false;
        }
    }

    public function checkExt(): bool
    {
        $allowedExt = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $ext = pathinfo($this->img, PATHINFO_EXTENSION);

        return in_array($ext, $allowedExt);
    }
}
