<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = "pengajar";
    protected $fillable = [];
    protected $guarded = [];

    public function program()
    {
        return $this->belongsto(Program::class, 'id_program');
    }

    public function getJenisKelaminAttribute()
    {
        if ($this->jk == 1) {
            return "Laki-laki";
        } else {
            return "Perempuan";
        }
    }

    public function getNamaProgramAttribute()
    {
        if ($this->program) {
            return $this->program->nama;
        }
    }
}
