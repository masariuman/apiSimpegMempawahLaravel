<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardSimpeg extends Controller
{
    public function aktif()
    {
        $CountAktif = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1');
        $CountWanita = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_jns_kelamin = 2');
        $CountPria = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_jns_kelamin = 1');
        $CountPNS = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 2');
        $CountPPPK = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 7');
        $CountCPNS = DB::select('SELECT count(*) FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 1');
        $CountJabatanStruktural = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 1');
        $CountJabatanFungsional = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 2');
        $CountJabatanPelaksana = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 3');
        $CountEselon1a = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 11');
        $CountEselon1b = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 12');
        $CountEselon2a = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 21');
        $CountEselon2b = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 22');
        $CountEselon3a = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 31');
        $CountEselon3b = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 32');
        $CountEselon4a = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 41');
        $CountEselon4b = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 42');
        $CountEselon5a = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 51');
        $CountEselon5b = DB::select('SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 52');
        $CountNonEselon = DB::select("SELECT count(*) FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = ''");
        $CountPangkat1a = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 11 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat1b = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 12 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat1c = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 13 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat1d = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 14 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat2a = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 21 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat2b = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 22 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat2c = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 23 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat2d = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 24 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat3a = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 31 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat3b = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 32 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat3c = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 33 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat3d = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 34 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat4a = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 41 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat4b = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 42 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat4c = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 43 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat4d = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 44 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkat4e = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 45 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKV = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 50 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKVII = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 70 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKIX = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 90 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKX = DB::select('SELECT count(*) FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 100 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountSD = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '01' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountSMP = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '02' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountSMA = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '03' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD1 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '04' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD2 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '05' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD3 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '06' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD4 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '07' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS1 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '08' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS2 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '09' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS3 = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '10' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountProfesi = DB::select("SELECT count(*) FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '11' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $Year1 = date("Y");
        $Year2 = date("Y")+1;
        $Year3 = date("Y")+2;
        $Year4 = date("Y")+3;
        $Year5 = date("Y")+4;
        $CountYear1 = 0;
        $CountYear2 = 0;
        $CountYear3 = 0;
        $CountYear4 = 0;
        $CountYear5 = 0;
        $findAktif = DB::select("SELECT p.nip, LEFT(p.nip, 4) as tahun_lahir, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.kode_jns_jab, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.kode, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)");
        foreach ($findAktif as $key => $value) {
            $usia1 = Year1 - $value["tahun_lahir"];
            $usia2 = Year2 - $value["tahun_lahir"];
            $usia3 = Year3 - $value["tahun_lahir"];
            $usia4 = Year4 - $value["tahun_lahir"];
            $usia5 = Year5 - $value["tahun_lahir"];
            if ($value["kode_jns_jab"] === "1") {
                if ($value["kode_eselon"] === "22" || $value["kode_eselon"] === "21" || $value["kode_eselon"] === "12" || $value["kode_eselon"] === "11") {
                    if ($usia1 === 60) {
                        $CountYear1++;
                    } else if ($usia2 === 60) {
                        $CountYear2++;
                    } else if ($usia3 === 60) {
                        $CountYear3++;
                    } else if ($usia4 === 60) {
                        $CountYear4++;
                    } else if ($usia5 === 60) {
                        $CountYear5++;
                    }
                } else {
                    if ($usia1 === 58) {
                        $CountYear1++;
                    } else if ($usia2 === 58) {
                        $CountYear2++;
                    } else if ($usia3 === 58) {
                        $CountYear3++;
                    } else if ($usia4 === 58) {
                        $CountYear4++;
                    } else if ($usia5 === 58) {
                        $CountYear5++;
                    }
                }
            } else if ($value["kode_jns_jab"] == "2") {
                if ($value["kode"] === "41" || $value["kode"] === "42" || $value["kode"] === "43" || $value["kode"] === "44" || $value["kode"] === "45") {
                    if ($usia1 === 60) {
                        $CountYear1++;
                    } else if ($usia2 === 60) {
                        $CountYear2++;
                    } else if ($usia3 === 60) {
                        $CountYear3++;
                    } else if ($usia4 === 60) {
                        $CountYear4++;
                    } else if ($usia5 === 60) {
                        $CountYear5++;
                    }
                } else {
                    if ($usia1 === 58) {
                        $CountYear1++;
                    } else if ($usia2 === 58) {
                        $CountYear2++;
                    } else if ($usia3 === 58) {
                        $CountYear3++;
                    } else if ($usia4 === 58) {
                        $CountYear4++;
                    } else if ($usia5 === 58) {
                        $CountYear5++;
                    }
                }
            } else {
                if ($usia1 == 58) {
                    $CountYear1++;
                } else if ($usia2 == 58) {
                    $CountYear2++;
                } else if ($usia3 == 58) {
                    $CountYear3++;
                } else if ($usia4 == 58) {
                    $CountYear4++;
                } else if ($usia5 == 58) {
                    $CountYear5++;
                }
            }
        }

        return response()->json($datasets);
    }
}
