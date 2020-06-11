<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            "id"                => $this->id,
            "id_ruang"          => $this->id_ruang,
            "id_user"           => $this->id_user,
            "id_makanan"        => $this->id_makanan,
            "tanggal"           => $this->tanggal,
            "jam_mulai"         => $this->jam_mulai,
            "jam_selesai"       => $this->jam_selesai,
            "harga"             => $this->harga,
            "total_bayar"       => $this->total_bayar,
            "snap_token"        => $this->snap_token,
            "verifikasi"        => $this->verifikasi,
            "status"            => $this->status,
            "created_at"        => $this->created_at->format('d-m-Y'),
            "updated_at"        => $this->updated_at->format('d-m-Y'),

        ];
    }
}
