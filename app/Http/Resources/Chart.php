<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Morilog\Jalali\Jalalian;

class Chart extends JsonResource
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
            'month' => date('F', strtotime($this['date'])),
            'month_fa' => Jalalian::forge($this['date'])->format('%B'),
            'count' => $this['data'],
        ];
    }
}
