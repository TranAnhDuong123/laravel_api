<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name_customer' => $this->name_customer,
            'phone_customer' => $this->phone_customer,
            'address_customer' => $this->address_customer,
            'email_customer' => $this->email_customer,
            'city_customer' => $this->city_customer
        ];
    }
}
