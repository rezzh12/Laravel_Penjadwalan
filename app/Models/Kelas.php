<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public static function getDataKelas()
    {
        $kelas = kelas::all();

        $kelas_filter = [];

        $no = 1;
        for ($i = 0; $i < $kelas->count(); $i++) {
            $kelas_filter[$i]['no'] = $no++;
            $kelas_filter[$i]['nama'] = $kelas[$i]->nama_kelas;
            $kelas_filter[$i]['kapasitas'] = $kelas[$i]->kapasitas;
        }

        return $kelas_filter;
    }
}
