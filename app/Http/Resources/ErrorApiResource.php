<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $lang = \App::getLocale();
        return [
            // 'id' => $this->id,
            // 'messages' => $this->notes[$lang],
            'version' => $this->version,
            'error_version' => $this->error_version,

        ];
    }
}