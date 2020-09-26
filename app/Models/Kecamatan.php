<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Kecamatan extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "kecamatan";
    protected $fillable = [];
    protected $guarded = [];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function getNamaKabupatenAttribute()
    {
        if ($this->kabupaten) {
            return $this->kabupaten->nama;
        }
    }
}
