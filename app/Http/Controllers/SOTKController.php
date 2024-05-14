<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SOTKController extends Controller
{
    public function all() {
        $SOTK = [];

        $datasetsJabatan = DB::select('SELECT j.id_satker, j.id_unker, muk.unit_kerja, msk.satuan_kerja, g.nama_gol_ruang, p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.nama_jab, re.neselon FROM ((((((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) INNER JOIN ref_eselon re ON j.kode_eselon = re.keselon)LEFT JOIN master_unit_kerja muk ON j.id_unker = muk.id_unit_kerja)LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 1 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        $datasetsUnker = DB::select('SELECT id_unit_kerja AS id_sotk, id_satuan_kerja AS id_satker, unit_kerja AS nama_sotk, kode_sotk, nama_bentuk FROM master_unit_kerja WHERE is_delete = 0 AND aktif = 1 AND kode_sotk IS NOT NULL');

        $datasetsSatker = DB::select('SELECT id_satuan_kerja AS id_sotk, id_satuan_kerja AS id_satker, satuan_kerja AS nama_sotk, kode_sotk, nama_bentuk FROM master_satuan_kerja WHERE is_delete = 0 AND aktif = 1 AND kode_sotk IS NOT NULL');

        $datasetsSOTK = array_merge($datasetsUnker, $datasetsSatker);

        foreach ($datasetsSOTK as $key => $Q) {
            $array = [];
            $dataGol = "";
            $dataNip = "";
            $dataNama = "";
            $dataJabatan = "";
            $dataEselon = "";
            foreach ($datasetsJabatan as $key => $R) {
                if ($R->id_unker === $Q->id_sotk) {
                    $dataGol = $R->nama_gol_ruang;
                    $dataNip = $R->nip;
                    if ($R->gelar_depan != "") {
                        if ($R->gelar_belakang != "") {
                            $dataNama =  $R->gelar_depan . ". " . $R->nama . ", " . $R->gelar_belakang;
                        } else {
                            $dataNama = $R->gelar_depan . ". " . $R->nama;
                        }
                    } else if ($R->gelar_belakang != "") {
                        $dataNama = $R->nama . ", " . $R->gelar_belakang;
                    } else {
                        $dataNama = $R->nama;
                    }
                    $dataJabatan = $R->nama_jab;
                    $dataEselon = $R->neselon;
                }
            }
            $array['KODE'] = $Q->kode_sotk;
            $array['UNIT'] = $Q->nama_sotk;
            $array['NAMA_BENTUK'] = $Q->nama_bentuk;
            $array['GOL'] = $dataGol;
            $array['NIP'] = $dataNip;
            $array['NAMA'] = $dataNama;
            $array['JABATAN'] = $dataJabatan;
            $array['ESELON'] = $dataEselon;
            $SOTK[] = $array;
        }
        return response()->json($SOTK);
    }

    public function code(string $code)
    {
        $SOTK = [];
        $code =  $code.'%';

        $datasetsJabatan = DB::select('SELECT j.id_satker, j.id_unker, muk.unit_kerja, msk.satuan_kerja, g.nama_gol_ruang, p.nip, p.gelar_depan, p.nama, p.gelar_belakang, j.nama_jab, re.neselon FROM ((((((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) INNER JOIN ref_eselon re ON j.kode_eselon = re.keselon)LEFT JOIN master_unit_kerja muk ON j.id_unker = muk.id_unit_kerja)LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 1 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)');

        $datasetsUnker = DB::select('SELECT id_unit_kerja AS id_sotk, id_satuan_kerja AS id_satker, unit_kerja AS nama_sotk, kode_sotk, nama_bentuk FROM master_unit_kerja WHERE is_delete = 0 AND aktif = 1 AND kode_sotk LIKE ?',[$code]);

        $datasetsSatker = DB::select('SELECT id_satuan_kerja AS id_sotk, id_satuan_kerja AS id_satker, satuan_kerja AS nama_sotk, kode_sotk, nama_bentuk FROM master_satuan_kerja WHERE is_delete = 0 AND aktif = 1 AND kode_sotk LIKE ?',[$code]);

        $datasetsSOTK = array_merge($datasetsUnker, $datasetsSatker);

        foreach ($datasetsSOTK as $key => $Q) {
            $array = [];
            $dataGol = "";
            $dataNip = "";
            $dataNama = "";
            $dataJabatan = "";
            $dataEselon = "";
            foreach ($datasetsJabatan as $key => $R) {
                if ($R->id_unker === $Q->id_sotk) {
                    $dataGol = $R->nama_gol_ruang;
                    $dataNip = $R->nip;
                    if ($R->gelar_depan != "") {
                        if ($R->gelar_belakang != "") {
                            $dataNama =  $R->gelar_depan . ". " . $R->nama . ", " . $R->gelar_belakang;
                        } else {
                            $dataNama = $R->gelar_depan . ". " . $R->nama;
                        }
                    } else if ($R->gelar_belakang != "") {
                        $dataNama = $R->nama . ", " . $R->gelar_belakang;
                    } else {
                        $dataNama = $R->nama;
                    }
                    $dataJabatan = $R->nama_jab;
                    $dataEselon = $R->neselon;
                }
            }
            $array['KODE'] = $Q->kode_sotk;
            $array['UNIT'] = $Q->nama_sotk;
            $array['NAMA_BENTUK'] = $Q->nama_bentuk;
            $array['GOL'] = $dataGol;
            $array['NIP'] = $dataNip;
            $array['NAMA'] = $dataNama;
            $array['JABATAN'] = $dataJabatan;
            $array['ESELON'] = $dataEselon;
            $SOTK[] = $array;
        }
        return response()->json($SOTK);
    }
}
