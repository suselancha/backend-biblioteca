<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            "id" => $this->resource->id,
            "dni" => $this->resource->dni,
            "surname" => $this->resource->surname,
            "name" => $this->resource->name,
            "email" => $this->resource->email,
            "phone" => $this->resource->phone,
            "address" => $this->resource->address,
            "role" => $this->resource->roles->first(),
        ];
    }
}
