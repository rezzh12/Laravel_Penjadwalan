<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    public static function getDataWaktu()
    {
        $waktu = waktu::all();

        $waktu_filter = [];

        $no = 1;
        for ($i = 0; $i < $waktu->count(); $i++) {
            $waktu_filter[$i]['no'] = $no++;
            $waktu_filter[$i]['mapel'] = $waktu[$i]->mapel;
            $waktu_filter[$i]['semester'] = $waktu[$i]->semester;
            $waktu_filter[$i]['id_jurusan'] = $waktu[$i]->id_jurusan;
        }

        return $mapel_filter;
    }
}
