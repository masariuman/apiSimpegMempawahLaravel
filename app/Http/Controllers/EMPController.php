<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EMPController extends Controller
{
    public function aktif()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function cpns()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 1 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function pns()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 2 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function pppk()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 7 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function pensiun()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 3 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function pindah()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 6 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function all()
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }

    public function person(string $nip)
    {
        $datasets = DB::select('SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.nip = '.$nip.' AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        return response()->json($datasets);
    }
}
