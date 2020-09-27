<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Saksi extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "saksi";
    protected $fillable = [];
    protected $guarded = [];

    public function tps()
    {
        return $this->belongsTo(tps::class, 'tps_id');
    }

    public function getNamaTpsAttribute()
    {
        if ($this->tps) {
            return $this->tps->nama;
        }
    }
    public function getIdtpsAttribute()
    {
        if ($this->tps) {
            return $this->tps->id;
        }
    }
    public function getNamaKelurahanAttribute()
    {
        if ($this->tps) {
            return $this->tps->nama_kelurahan;
        }
    }
    public function getNamaKecamatanAttribute()
    {
        if ($this->tps) {
            return $this->tps->nama_kecamatan;
        }
    }
    public function getIdKecamatanAttribute()
    {
        if ($this->tps) {
            return $this->tps->kecamatan_id;
        }
    }

    public function getNamaKabupatenAttribute()
    {
        if ($this->tps) {
            return $this->tps->nama_kabupaten;
        }
    }
    public function getIdKabupatenAttribute()
    {
        if ($this->tps) {
            return $this->tps->id_kabupaten;
        }
    }
}
