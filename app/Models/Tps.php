<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Tps extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "tps";
    protected $fillable = [];
    protected $guarded = [];

    public function kelurahan()
    {
        return $this->belongsTo(kelurahan::class, 'kelurahan_id');
    }

    public function getNamaKelurahanAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->nama;
        }
    }
    public function getIdKelurahanAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->id;
        }
    }
    public function getNamaKecamatanAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->nama_kecamatan;
        }
    }
    public function getIdKecamatanAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->kecamatan_id;
        }
    }

    public function getNamaKabupatenAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->nama_kabupaten;
        }
    }
    public function getIdKabupatenAttribute()
    {
        if ($this->kelurahan) {
            return $this->kelurahan->id_kabupaten;
        }
    }
}
