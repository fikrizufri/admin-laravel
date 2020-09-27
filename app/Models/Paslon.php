<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Paslon extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $table = "paslon";
    protected $fillable = [];
    protected $guarded = [];

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class);
    }

    public function getSuaraAttribute()
    {
        if ($this->perhitungan) {
            return $this->perhitungan->sum('jumlah');
        }
    }
}
