<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Kelurahan extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "kelurahan";
    protected $fillable = [];
    protected $guarded = [];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function getNamakecamatanAttribute()
    {
        if ($this->kecamatan) {
            return $this->kecamatan->nama;
        }
    }
    public function getNamaKabupatenAttribute()
    {
        if ($this->kecamatan) {
            return $this->kecamatan->nama_kabupaten;
        }
    }
    public function getIdKabupatenAttribute()
    {
        if ($this->kecamatan) {
            return $this->kecamatan->kabupaten->id;
        }
    }
}
