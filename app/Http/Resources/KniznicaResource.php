<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KniznicaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id'=>$this->id,
          'nazov'=>$this->nazov,
          'isbn'=>$this->isbn,
          'cena'=>$this->cena,
          'autor'=>$this->autor,
          'autor1'=>$this->autor1,
          'kategoria'=>$this->kategoria,

        ];
    }
}
