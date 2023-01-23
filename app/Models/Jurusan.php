<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    public static function getDataJurusan()
    {
        $jurusan = jurusan::all();

        $jurusan_filter = [];

        $no = 1;
        for ($i = 0; $i < $jurusan->count(); $i++) {
            $jurusan_filter[$i]['no'] = $no++;
            $jurusan_filter[$i]['kode'] = $jurusan[$i]->kode;
            $jurusan_filter[$i]['jurusan'] = $jurusan[$i]->jurusan;
        }

        return $jurusan_filter;
    }
}
