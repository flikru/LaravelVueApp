<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $text = "Не срочная";
        $class = "";
        switch ($this->priority){
            case 1: $class='yellow'; $text =  "Важная"; break;
            case 2: $class='red'; $text =  "Срочная"; break;
        }
        $admin = 0;
        if(isset($_GET['admin'])){
            $admin = 1;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'status' => $this->status,
            'priority' => $this->priority,
            'priority_text' => $text,
            'priority_class' => $class,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d.m.Y'),
            'created_at_original' => $this->created_at,
            'http://localhost:8000/?admin=1' => $admin,
        ];
    }
}
