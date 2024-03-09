<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'id' => $this->id,
            // 'name' => $this->name ? $this->name[$lang] : "",
            'image' => $this->image ?? "",
            // 'notes' => $this->notes ? $this->notes[$lang] : "",
            'type' => $this->type,
            'status' => $this->status,
            'url' => $this->url?? null,
            'item' => new ItemsResource($this->item) ?? null,
        ];
    }
}
