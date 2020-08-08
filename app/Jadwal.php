<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal";
    protected $fillable = [];
    protected $guarded = [];

    public function program()
    {
        return $this->belongsto(Program::class, 'id_program');
    }

    public function pengajar()
    {
        return $this->belongsto(Pengajar::class, 'id_pengajar');
    }

    public function getNamaProgramAttribute()
    {
        if ($this->program) {
            return $this->program->nama;
        }
    }

    public function getNamaPengajarAttribute()
    {
        if ($this->pengajar) {
            return $this->pengajar->nama;
        }
    }
}
