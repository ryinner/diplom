<?php

namespace App\Plugins;

class ImagesPlugin
{
    protected $img;

    public function __construct($img)
    {
        $this->img = $img;
    }

    public function check(): array
    {
        $answer['success'] = true;

        if ($this->checkSize() === false) {
            $answer['success'] = false;
            $answer['errors']['size'] = 'Размер картинки превышает 10Мб';
        }

        if ($this->checkExt() === false) {
            $answer['success'] = false;
            $answer['errors']['ext'] = 'Картинка не соответсвует допустимым расширениям: jpg, png, webp';
        }

        return $answer;
    }

    private function checkSize(): bool
    {
        if ($this->img->getSize() <= 10485760) {
            return true;
        } else {
            return false;
        }
    }

    private function checkExt(): bool
    {
        $allowedExt = [
            'jpg',
            'jpeg',
            'png',
            'webp'
        ];

        $ext = pathinfo($this->img->getName(), PATHINFO_EXTENSION);

        return in_array($ext, $allowedExt);
    }
}
