<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\SIASNController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\RefUnitKerja;
use App\Models\RefSatuanKerja;
use App\Models\RefTingkatPendidikan;
use App\Models\RiwPendidikan;
use App\Models\RiwJabatan;

class ASNController extends Controller
{
    public function person(string $nip)
    {
        $query = DB::select("SELECT p.nip, p.gelar_depan, p.nama, p.gelar_belakang, p.nama AS namaLengkap, p.kota_lahir, p.tanggal_lahir, jk.nama_jns_kelamin, p.nip as tingkatPendidikan, p.nip as programStudi, g.nama_gol_ruang, g.nama_pangkat, r.tmt_pangkat, r.no_sk, re.neselon, rjj.nama_jns_jab, rkj.nama_kategori_jab, j.nama_jab, j.nama_jab as tmt_jab, j.nama_jab as sk_jab, msk.satuan_kerja, j.id_unker AS idunkersimpeg, j.id_unker AS unker1, j.id_unker AS unker2, j.id_unker AS unker3, ra.nama_agama, rsp.nama_status_pegawai, rjp.nama_jns_pegawai, rsk.nama_status_kawin, rgd.nama_gol_darah, p.alamat, rwp.nama_wil_prov, rwkab.nama_wil_kab, rwkec.nama_wil_kec, rwkel.nama_wil_kel, p.rt, p.rw, p.no_hp, p.email, p.no_karpeg, p.no_bpjs, p.no_taspen, p.no_karis_su, p.npwp, p.nik, p.no_kk, p.no_akta, p.catatan, p.keterangan FROM ((((((((((((((((( pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif ) LEFT JOIN riw_pangkat r ON p.nip = r.nip ) LEFT JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode ) LEFT JOIN ref_wil_prov rwp ON p.kode_wil_prov = rwp.kode ) LEFT JOIN ref_wil_kab rwkab ON p.kode_wil_kab = rwkab.kode ) LEFT JOIN ref_wil_kec rwkec ON p.kode_wil_kec = rwkec.kode ) LEFT JOIN ref_wil_kel rwkel ON p.kode_wil_kel = rwkel.kode ) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode ) LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode ) LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode ) LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode ) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode ) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode ) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon ) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker ) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode ) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode ) WHERE p.nip = '".$nip."' AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND r.tmt_pangkat = ( SELECT MAX( riw_pangkat.tmt_pangkat ) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip AND riw_pangkat.is_deleted = 0 );");
        // dd($query);

        $refTingkatPendidikan = RefTingkatPendidikan::all();

        $satuanKerja = RefSatuanKerja::all();
        $unitKerja = RefUnitKerja::all();
        // $riwJab = RiwJabatan::all();
        $unitKerjaCount = 1;
        foreach ($satuanKerja as $key => $value) {
            $unor[$unitKerjaCount]['idUnor'] = $value['id_satuan_kerja'];
            $unor[$unitKerjaCount]['namaUnor'] = $value['satuan_kerja'];
            $unitKerjaCount++;
        }
        foreach ($unitKerja as $key => $value) {
            $unor[$unitKerjaCount]['idUnor'] = $value['id_unit_kerja'];
            $unor[$unitKerjaCount]['namaUnor'] = $value['unit_kerja'];
            $unitKerjaCount++;
        }
        foreach ($query as $key => $value) {
            $riwJab = RiwJabatan::where('is_deleted', '0')->where('nip',$value->nip)->orderByDesc('tmt_jab')->first();
            $unker1 = substr($value->unker3, 0, 6)."0000";
            $unker2 = substr($value->unker3, 0, 8)."00";
            $unker3 = $value->unker3;
            foreach ($unor as $key => $valueUnor) {
                if ($unker1 === $valueUnor["idUnor"]) {
                    $unitKerja1 = $valueUnor["namaUnor"];
                }
                if ($unker2 === $valueUnor["idUnor"]) {
                    $unitKerja2 = $valueUnor["namaUnor"];
                }
                if ($unker3 === $valueUnor["idUnor"]) {
                    $unitKerja3 = $valueUnor["namaUnor"];
                }
            }
            $value->unker1 = $unitKerja1;
            $value->unker2 = $unitKerja2;
            $value->unker3 = $unitKerja3;
            $value->tmt_jab = $riwJab->tmt_jab;
            $value->sk_jab = $riwJab->no_sk;
            $namaLengkap = $value->nama;
            if ($value->gelar_depan != null || !empty($value->gelar_depan) || $value->gelar_depan != "") {
                $namaLengkap = $value->gelar_depan.". ".$namaLengkap;
            }
            if ($value->gelar_belakang != null || !empty($value->gelar_belakang) || $value->gelar_belakang != "") {
                $namaLengkap = $namaLengkap.", ".$value->gelar_belakang;
            }
            $value->namaLengkap = $namaLengkap;
            $riwPendidikan = RiwPendidikan::where('is_deleted', '0')->where('nip',$value->nip)->orderByDesc('kode_tingkat_pendidikan')->first();
            if(!isset($riwPendidikan->program_studi)) {
                // dd($value->nip);
            }
            // Log::info($riwPendidikan);
            $value->programStudi = $riwPendidikan->program_studi;
            foreach ($refTingkatPendidikan as $key => $rtp) {
                if ($rtp->kode === $riwPendidikan->kode_tingkat_pendidikan) {
                    $value->tingkatPendidikan = $rtp->nama_tingkat_pendidikan_lengkap;
                }
            }
        }
        // dd($query);
        return $query;
        // return collect($query);
    }
}
