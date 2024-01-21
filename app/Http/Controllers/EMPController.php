<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SIASNController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EMPController extends Controller
{
    private $siasn;

    public function __construct()
    {
        $this->siasn = new SIASNController;
    }

    public function aktif()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function cpns()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 1 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function pns()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 2 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function pppk()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 7 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function pensiun()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 3 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function pindah()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND p.kode_status_pegawai = 6 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function all()
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        foreach ($datasets as $key => $value) {
            if ($value->KESELON === "" || $value->KESELON === null || empty($value->KESELON)) {
                $value->KESELON = "99";
            }
            $value->PROYEKSI_TGL_BUP = null;
            $value->PROYEKSI_USIA_BUP = null;
            $value->FILE_BMP = "http://presensi.mempawahkab.go.id/upload/foto/140012.png";
            $value->FILE_EXISTS = null;
        }

        return response()->json($datasets);
    }

    public function person(string $nip)
    {
        $datasets = DB::select('SELECT p.nip as NIP, p.gelar_depan as GLDEPAN, p.nama as NAMA, p.gelar_belakang as GLBLK, j.kode_eselon as KESELON, j.nama_jab as KJAB, p.kode_jns_kelamin as KJKEL, p.kode_agama as KAGAMA, p.kota_lahir as KTLAHIR, p.tanggal_lahir as TLAHIR, p.alamat as ALJALAN, p.rt as ALRT, p.rw as ALRW, g.nama_gol_ruang as NGOLRU, g.nama_pangkat as PANGKAT FROM (((pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.nip = '.$nip.' AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');
        if ($datasets[0]->KESELON === "" || $datasets[0]->KESELON === null || empty($datasets[0]->KESELON)) {
            $datasets[0]->KESELON = "99";
        }
        $datasets[0]->PROYEKSI_TGL_BUP = null;
        $datasets[0]->PROYEKSI_USIA_BUP = null;
        $datasets[0]->FILE_EXISTS = null;

        $this->siasn->get_api_ws();
        $this->siasn->get_bkn_sso();

        $foto_pegawai = $this->siasn->foto_pegawai($nip);
        ($foto_pegawai[0] === "{") ? $foto_pegawai = null : $foto_pegawai = 'data:image/jpeg;base64,'.base64_encode($foto_pegawai);
        $datasets[0]->FILE_BMP = $foto_pegawai;

        return response()->json($datasets);
    }
}
