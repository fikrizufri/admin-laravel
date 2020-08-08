<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = [];
    protected $guarded = [];

    public function peserta()
    {
        return $this->belongsto(Peserta::class, 'id_peserta');
    }

    public function jadwal()
    {
        return $this->belongsto(Jadwal::class, 'id_jadwal');
    }

    public function getNamaPesertaAttribute()
    {
        if ($this->peserta) {
            return $this->peserta->nama;
        }
    }
    public function getNamaProgramAttribute()
    {
        if ($this->jadwal) {
            return $this->jadwal->nama_program;
        }
    }
    public function getNamaPengajarAttribute()
    {
        if ($this->jadwal) {
            return $this->jadwal->nama_pengajar;
        }
    }
}
