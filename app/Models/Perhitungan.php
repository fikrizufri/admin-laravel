<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Perhitungan extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "perhitungan";
    protected $fillable = [];
    protected $guarded = [];

    public function paslon()
    {
        return $this->belongsTo(paslon::class, 'paslon_id');
    }

    public function saksi()
    {
        return $this->belongsTo(saksi::class, 'saksi_id');
    }

    public function getNamaKelurahanAttribute()
    {
        if ($this->saksi) {
            return $this->saksi->nama_kelurahan;
        }
    }
    public function getNamaTpsAttribute()
    {
        if ($this->saksi) {
            return $this->saksi->nama_tps;
        }
    }
    public function getNamaSaksiAttribute()
    {
        if ($this->saksi) {
            return $this->saksi->nama;
        }
    }
    public function getNamapaslonAttribute()
    {
        if ($this->paslon) {
            return $this->paslon->nama;
        }
    }
    public function getNourutAttribute()
    {
        if ($this->paslon) {
            return $this->paslon->nourut;
        }
    }
    public function getFotoAttribute()
    {
        if ($this->paslon) {
            return $this->paslon->foto;
        }
    }
}
