<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = "peserta";
    protected $fillable = [];
    protected $guarded = [];

    public function getJenisKelaminAttribute()
    {
        if ($this->jk == 1) {
            return "Laki-laki";
        } else {
            return "Perempuan";
        }
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_peserta', 'id');
    }

    public function getNamaProgramAttribute()
    {
        if ($this->pembayaran) {
            $jadwalId = $this->pembayaran()->get()->pluck('id_jadwal');
            $jadwal = Jadwal::whereIn('id', $jadwalId)->get()->pluck('id_program');
            $program = Program::whereIn('id', $jadwal)->get()->pluck('nama');
            return $program;
        }
    }
}
