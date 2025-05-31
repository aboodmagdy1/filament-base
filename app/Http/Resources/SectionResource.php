<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'section_type' => $this->section_type,
            'order' => $this->order,
            'data' => $this->getSectionDataBasedOnType($request),
        ];
    }

    public function getSectionDataBasedOnType(Request $request)
    {
        return $this->section_type === 'services' ? ServiceResource::collection($this->getSectionData())->toArray($request) : CategoryResource::collection($this->getSectionData())->toArray($request);
    }
}
