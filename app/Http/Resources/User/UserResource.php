<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'android_id'        => $this->android_id,
            'kelas'             => $this->kelas,
            'nik'               => $this->nik,
            'jenis_kelamin'     => $this->jenis_kelamin,
            'status'            => $this->status,
            'alamat'            => $this->alamat,
            'no_hp_ortu'        => $this->no_hp_ortu
        ];
    }
}
