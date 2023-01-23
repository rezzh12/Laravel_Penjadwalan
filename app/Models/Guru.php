<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public static function getDataGuru()
    {
        $guru = Guru::all();

        $guru_filter = [];

        $no = 1;
        for ($i = 0; $i < $guru->count(); $i++) {
            $guru_filter[$i]['no'] = $no++;
            $guru_filter[$i]['nip'] = $guru[$i]->nip;
            $guru_filter[$i]['nama_guru'] = $guru[$i]->nama_guru;
            $guru_filter[$i]['alamat'] = $guru[$i]->alamat;
            $guru_filter[$i]['jenis_kelamin'] = $guru[$i]->jenis_kelamin;
        }

        return $guru_filter;
    }
}
