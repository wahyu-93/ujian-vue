<?php

namespace App\Http\Resources\Nilai;

use Illuminate\Http\Resources\Json\JsonResource;

class NilaiResource extends JsonResource
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
            'id'            => $this->id,
            'android_id'    => $this->user->android_id,
            'name'          => $this->user->name,
            'kelas'         => $this->user->kelas,
            'nik'           => $this->user->nik,
            'jenis_kelamin' => $this->user->jenis_kelamin,
            'benar'         => $this->benar,
            'salah'         => $this->salah,
            'kosong'        => $this->kosong,
            'nilai'         => $this->score,
            'keterangan'    => $this->keterangan,
            'tanggal'       => $this->created_at,
            'image'         => $this->user->image
        ];
    }
}
