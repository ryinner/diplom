<?php

namespace App\Modules\Api\Controllers;

use Throwable;
use App\Models\Houses;

class SearchController extends ControllerApiBase
{
    public function housesAction(): string
    {
        $data = json_decode(file_get_contents('php://input'));
        $query = $data->query;
    try {
        $data = $this->modelsManager->createBuilder()
        ->columns(['h.id','h.adress'])
        ->from(['h' => Houses::class])
        ->where('h.adress LIKE (:query:)', ['query' => "%{$query}%"])
        ->limit(8)
        ->getQuery()

        ->execute();
    } catch (Throwable $e) {
        echo $e->getMessage();
    }

        return json_encode([
            'success' => true,
            'data' =>  $data
        ]);
    }
}
