<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->resource->id,
            "isbn" => $this->resource->isbn,
            "titulo" => $this->resource->titulo,
            "portada" => $this->resource->portada,
            "author_id" => $this->resource->author_id,
            'author' => [
                'id' => $this->resource->author->id,
                'apellido' => $this->resource->author->apellido,
                'nombre' => $this->resource->author->nombre,
            ],
            "editorial_id" => $this->resource->editorial_id,
            'editorial' => [
                'id' => $this->resource->editorial->id,
                'nombre' => $this->resource->editorial->nombre,
            ],
            "state_id" => $this->resource->state_id,
            'state' => [
                'id' => $this->resource->state->id,
                'descripcion' => $this->resource->state->descripcion,
            ],
        ];
    }
}
