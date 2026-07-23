<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardSimpegController extends Controller
{
    public function dashboard()
    {
        $CountAktif = DB::select('SELECT count(*) as CountAktif FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1');
        $CountWanita = DB::select('SELECT count(*) as CountWanita FROM pegawai WHERE is_deleted = 0 AND kode_jns_kelamin = 2 AND kode_kedudukan_pegawai = 1');
        $CountPria = DB::select('SELECT count(*) as CountPria FROM pegawai WHERE is_deleted = 0 AND kode_jns_kelamin = 1 AND kode_kedudukan_pegawai = 1');
        $CountPNS = DB::select('SELECT count(*) as CountPNS FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 2');
        $CountPPPK = DB::select('SELECT count(*) as CountPPPK FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 7');
        $CountPPPKPW = DB::select('SELECT count(*) as CountPPPKPW FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 9');
        $CountCPNS = DB::select('SELECT count(*) as CountCPNS FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1 AND kode_status_pegawai = 1');
        $CountCPNSTenagaTeknis = DB::select('SELECT count(*) as CountCPNSTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_kategori_jab = 1');
        $CountCPNSTenagaKesehatan = DB::select('SELECT count(*) as CountCPNSTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_kategori_jab = 2');
        $CountCPNSTenagaGuru = DB::select('SELECT count(*) as CountCPNSTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_kategori_jab = 3');
        $CountPNSTenagaTeknis = DB::select('SELECT count(*) as CountPNSTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_kategori_jab = 1');
        $CountPNSTenagaKesehatan = DB::select('SELECT count(*) as CountPNSTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_kategori_jab = 2');
        $CountPNSTenagaGuru = DB::select('SELECT count(*) as CountPNSTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_kategori_jab = 3');
        $CountPPPKTenagaTeknis = DB::select('SELECT count(*) as CountPPPKTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_kategori_jab = 1');
        $CountPPPKTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_kategori_jab = 2');
        $CountPPPKTenagaGuru = DB::select('SELECT count(*) as CountPPPKTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_kategori_jab = 3');
        $CountPPPKPWTenagaTeknis = DB::select('SELECT count(*) as CountPPPKPWTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_kategori_jab = 1');
        $CountPPPKPWTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKPWTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_kategori_jab = 2');
        $CountPPPKPWTenagaGuru = DB::select('SELECT count(*) as CountPPPKPWTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_kategori_jab = 3');
        $CountJabatanStruktural = DB::select('SELECT count(*) as CountJabatanStruktural FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 1');
        $CountJabatanFungsional = DB::select('SELECT count(*) as CountJabatanFungsional FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 2');
        $CountJabatanPelaksana = DB::select('SELECT count(*) as CountJabatanPelaksana FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_jns_jab = 3');












        $CountCPNSStruktural = DB::select('SELECT count(*) as CountCPNSStruktural FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 1');

        $CountCPNSJafungTenagaTeknis = DB::select('SELECT count(*) as CountCPNSJafungTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 1');
        $CountCPNSJafungTenagaKesehatan = DB::select('SELECT count(*) as CountCPNSJafungTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 2');
        $CountCPNSJafungTenagaGuru = DB::select('SELECT count(*) as CountCPNSJafungTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 3');

        $CountCPNSPelaksanaTenagaTeknis = DB::select('SELECT count(*) as CountCPNSPelaksanaTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 1');
        $CountCPNSPelaksanaTenagaKesehatan = DB::select('SELECT count(*) as CountCPNSPelaksanaTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 2');
        $CountCPNSPelaksanaTenagaGuru = DB::select('SELECT count(*) as CountCPNSPelaksanaTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 1 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 3');


        $CountPNSStruktural = DB::select('SELECT count(*) as CountPNSStruktural FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 1');

        $CountPNSJafungTenagaTeknis = DB::select('SELECT count(*) as CountPNSJafungTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 1');
        $CountPNSJafungTenagaKesehatan = DB::select('SELECT count(*) as CountPNSJafungTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 2');
        $CountPNSJafungTenagaGuru = DB::select('SELECT count(*) as CountPNSJafungTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 3');

        $CountPNSPelaksanaTenagaTeknis = DB::select('SELECT count(*) as CountPNSPelaksanaTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 1');
        $CountPNSPelaksanaTenagaKesehatan = DB::select('SELECT count(*) as CountPNSPelaksanaTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 2');
        $CountPNSPelaksanaTenagaGuru = DB::select('SELECT count(*) as CountPNSPelaksanaTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 2 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 3');


        $CountPPPKStruktural = DB::select('SELECT count(*) as CountPPPKStruktural FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 1');

        $CountPPPKJafungTenagaTeknis = DB::select('SELECT count(*) as CountPPPKJafungTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 1');
        $CountPPPKJafungTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKJafungTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 2');
        $CountPPPKJafungTenagaGuru = DB::select('SELECT count(*) as CountPPPKJafungTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 3');

        $CountPPPKPelaksanaTenagaTeknis = DB::select('SELECT count(*) as CountPPPKPelaksanaTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 1');
        $CountPPPKPelaksanaTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKPelaksanaTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 2');
        $CountPPPKPelaksanaTenagaGuru = DB::select('SELECT count(*) as CountPPPKPelaksanaTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 7 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 3');


        $CountPPPKPWStruktural = DB::select('SELECT count(*) as CountPPPKPWStruktural FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 1');

        $CountPPPKPWJafungTenagaTeknis = DB::select('SELECT count(*) as CountPPPKPWJafungTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 1');
        $CountPPPKPWJafungTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKPWJafungTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 2');
        $CountPPPKPWJafungTenagaGuru = DB::select('SELECT count(*) as CountPPPKPWJafungTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 2 AND j.kode_kategori_jab = 3');

        $CountPPPKPWPelaksanaTenagaTeknis = DB::select('SELECT count(*) as CountPPPKPWPelaksanaTenagaTeknis FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 1');
        $CountPPPKPWPelaksanaTenagaKesehatan = DB::select('SELECT count(*) as CountPPPKPWPelaksanaTenagaKesehatan FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 2');
        $CountPPPKPWPelaksanaTenagaGuru = DB::select('SELECT count(*) as CountPPPKPWPelaksanaTenagaGuru FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_status_pegawai = 9 AND j.kode_jns_jab = 3 AND j.kode_kategori_jab = 3');














        $CountEselon1a = DB::select('SELECT count(*) as CountEselon1a FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 11');
        $CountEselon1b = DB::select('SELECT count(*) as CountEselon1b FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 12');
        $CountEselon2a = DB::select('SELECT count(*) as CountEselon2a FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 21');
        $CountEselon2b = DB::select('SELECT count(*) as CountEselon2b FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 22');
        $CountEselon3a = DB::select('SELECT count(*) as CountEselon3a FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 31');
        $CountEselon3b = DB::select('SELECT count(*) as CountEselon3b FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 32');
        $CountEselon4a = DB::select('SELECT count(*) as CountEselon4a FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 41');
        $CountEselon4b = DB::select('SELECT count(*) as CountEselon4b FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 42');
        $CountEselon5a = DB::select('SELECT count(*) as CountEselon5a FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 51');
        $CountEselon5b = DB::select('SELECT count(*) as CountEselon5b FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = 52');
        $CountNonEselon = DB::select("SELECT count(*) as CountNonEselon FROM (pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND j.kode_eselon = ''");
        $Pangkat = DB::select('SELECT p.nip, r.kode_gol_ruang FROM (((((((((((((((( pegawai p LEFT JOIN master_jab j ON p.nip = j.nip_defenitif ) LEFT JOIN riw_pangkat r ON p.nip = r.nip ) LEFT JOIN ref_wil_prov rwp ON p.kode_wil_prov = rwp.kode ) LEFT JOIN ref_wil_kab rwkab ON p.kode_wil_kab = rwkab.kode ) LEFT JOIN ref_wil_kec rwkec ON p.kode_wil_kec = rwkec.kode ) LEFT JOIN ref_wil_kel rwkel ON p.kode_wil_kel = rwkel.kode ) LEFT JOIN ref_jns_kelamin jk ON p.kode_jns_kelamin = jk.kode ) LEFT JOIN ref_agama ra ON p.kode_agama = ra.kode ) LEFT JOIN ref_status_pegawai rsp ON p.kode_status_pegawai = rsp.kode ) LEFT JOIN ref_jns_pegawai rjp ON p.kode_jns_pegawai = rjp.kode ) LEFT JOIN ref_status_kawin rsk ON p.kode_status_kawin = rsk.kode ) LEFT JOIN ref_gol_darah rgd ON p.kode_gol_darah = rgd.kode ) LEFT JOIN ref_eselon re ON j.kode_eselon = re.keselon ) LEFT JOIN master_satuan_kerja msk ON j.id_satker = msk.kode_satker ) LEFT JOIN ref_jns_jab rjj ON j.kode_jns_jab = rjj.kode ) LEFT JOIN ref_kategori_jab rkj ON j.kode_kategori_jab = rkj.kode ) WHERE p.is_deleted = 0 AND j.is_delete = 0 AND p.kode_kedudukan_pegawai = 1 AND r.is_deleted = 0 AND r.tmt_pangkat = ( SELECT MAX( riw_pangkat.tmt_pangkat ) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip AND riw_pangkat.is_deleted = 0 )');
        $CountPangkat0 = $CountPangkat1a = $CountPangkat1b = $CountPangkat1c = $CountPangkat1d = $CountPangkat2a = $CountPangkat2b = $CountPangkat2c = $CountPangkat2d = $CountPangkat3a = $CountPangkat3b = $CountPangkat3c = $CountPangkat3d = $CountPangkat4a = $CountPangkat4b = $CountPangkat4c = $CountPangkat4d = $CountPangkat4e = 0;
        foreach ($Pangkat as $key => $value) {
            switch ($value->kode_gol_ruang) {
                case 0:
                    $CountPangkat0++;
                    break;
                case 11:
                    $CountPangkat1a++;
                    break;
                case 12:
                    $CountPangkat1b++;
                    break;
                case 13:
                    $CountPangkat1c++;
                    break;
                case 14:
                    $CountPangkat1d++;
                    break;
                case 21:
                    $CountPangkat2a++;
                    break;
                case 22:
                    $CountPangkat2b++;
                    break;
                case 23:
                    $CountPangkat2c++;
                    break;
                case 24:
                    $CountPangkat2d++;
                    break;
                case 31:
                    $CountPangkat3a++;
                    break;
                case 32:
                    $CountPangkat3b++;
                    break;
                case 33:
                    $CountPangkat3c++;
                    break;
                case 34:
                    $CountPangkat3d++;
                    break;
                case 41:
                    $CountPangkat4a++;
                    break;
                case 42:
                    $CountPangkat4b++;
                    break;
                case 43:
                    $CountPangkat4c++;
                    break;
                case 44:
                    $CountPangkat4d++;
                    break;
                case 45:
                    $CountPangkat4e++;
                    break;
                default:
                    break;
            }
        }
        $CountPangkatPPPKIII = DB::select('SELECT count(*) as CountPangkatPPPKIII FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 48 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKV = DB::select('SELECT count(*) as CountPangkatPPPKV FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 50 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKVII = DB::select('SELECT count(*) as CountPangkatPPPKVII FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 70 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKIX = DB::select('SELECT count(*) as CountPangkatPPPKIX FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 90 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountPangkatPPPKX = DB::select('SELECT count(*) as CountPangkatPPPKX FROM pegawai a INNER JOIN riw_pangkat b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_gol_ruang = 100 AND b.id = (SELECT MAX(id) FROM riw_pangkat WHERE b.nip = nip)');
        $CountSD = DB::select("SELECT count(*) as CountSD FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '01' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountSMP = DB::select("SELECT count(*) as CountSMP FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '02' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountSMA = DB::select("SELECT count(*) as CountSMA FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '03' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD1 = DB::select("SELECT count(*) as CountD1 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '04' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD2 = DB::select("SELECT count(*) as CountD2 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '05' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD3 = DB::select("SELECT count(*) as CountD3 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '06' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountD4 = DB::select("SELECT count(*) as CountD4 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '07' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS1 = DB::select("SELECT count(*) as CountS1 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '08' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS2 = DB::select("SELECT count(*) as CountS2 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '09' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountS3 = DB::select("SELECT count(*) as CountS3 FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '10' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $CountProfesi = DB::select("SELECT count(*) as CountProfesi FROM pegawai a INNER JOIN riw_pendidikan b ON a.nip = b.nip WHERE a.kode_kedudukan_pegawai = 1 AND a.is_deleted = 0 AND b.is_deleted = 0 AND kode_tingkat_pendidikan = '11' AND b.kode_tingkat_pendidikan = (SELECT MAX(kode_tingkat_pendidikan) FROM riw_pendidikan WHERE b.nip = nip)");
        $Year1 = date("Y")+1;
        $Year2 = date("Y")+2;
        $Year3 = date("Y")+3;
        $Year4 = date("Y")+4;
        $Year5 = date("Y")+5;
        $CountYear1 = 0;
        $CountYear2 = 0;
        $CountYear3 = 0;
        $CountYear4 = 0;
        $CountYear5 = 0;
        $findAktif = DB::select("SELECT p.nip, LEFT(p.nip, 4) as tahun_lahir, p.gelar_depan, p.nama, p.gelar_belakang, j.kode_eselon, j.kode_jns_jab, j.nama_jab, p.kode_jns_kelamin, p.kode_agama, p.kota_lahir, p.tanggal_lahir, p.alamat, p.rt, p.rw, g.kode, g.nama_gol_ruang, g.nama_pangkat FROM (((pegawai p INNER JOIN master_jab j ON p.nip = j.nip_defenitif) INNER JOIN riw_pangkat r ON p.nip = r.nip) INNER JOIN ref_gol_ruang g ON r.kode_gol_ruang = g.kode) WHERE p.kode_kedudukan_pegawai = 1 AND p.is_deleted = 0 AND j.is_delete = 0 AND r.tmt_pangkat = (SELECT MAX(riw_pangkat.tmt_pangkat) FROM riw_pangkat WHERE p.nip = riw_pangkat.nip)");
        foreach ($findAktif as $key => $value) {
            $usia1 = $Year1 - $value->tahun_lahir;
            $usia2 = $Year2 - $value->tahun_lahir;
            $usia3 = $Year3 - $value->tahun_lahir;
            $usia4 = $Year4 - $value->tahun_lahir;
            $usia5 = $Year5 - $value->tahun_lahir;
            if ($value->kode_jns_jab === "1") {
                if ($value->kode_eselon === "22" || $value->kode_eselon === "21" || $value->kode_eselon === "12" || $value->kode_eselon === "11") {
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
            } else if ($value->kode_jns_jab == "2") {
                if ($value->kode === "41" || $value->kode === "42" || $value->kode === "43" || $value->kode === "44" || $value->kode === "45") {
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
        $datasets["CountAktif"] = $CountAktif[0]->CountAktif;
        $datasets["CountWanita"] = $CountWanita[0]->CountWanita;
        $datasets["CountPria"] = $CountPria[0]->CountPria;
        $datasets["CountPNS"] = $CountPNS[0]->CountPNS;
        $datasets["CountPPPK"] = $CountPPPK[0]->CountPPPK;
        $datasets["CountPPPKPW"] = $CountPPPKPW[0]->CountPPPKPW;
        $datasets["CountCPNS"] = $CountCPNS[0]->CountCPNS;
        $datasets["CountCPNSTenagaTeknis"] = $CountCPNSTenagaTeknis[0]->CountCPNSTenagaTeknis;
        $datasets["CountCPNSTenagaKesehatan"] = $CountCPNSTenagaKesehatan[0]->CountCPNSTenagaKesehatan;
        $datasets["CountCPNSTenagaGuru"] = $CountCPNSTenagaGuru[0]->CountCPNSTenagaGuru;
        $datasets["CountPNSTenagaTeknis"] = $CountPNSTenagaTeknis[0]->CountPNSTenagaTeknis;
        $datasets["CountPNSTenagaKesehatan"] = $CountPNSTenagaKesehatan[0]->CountPNSTenagaKesehatan;
        $datasets["CountPNSTenagaGuru"] = $CountPNSTenagaGuru[0]->CountPNSTenagaGuru;
        $datasets["CountPPPKTenagaTeknis"] = $CountPPPKTenagaTeknis[0]->CountPPPKTenagaTeknis;
        $datasets["CountPPPKTenagaKesehatan"] = $CountPPPKTenagaKesehatan[0]->CountPPPKTenagaKesehatan;
        $datasets["CountPPPKTenagaGuru"] = $CountPPPKTenagaGuru[0]->CountPPPKTenagaGuru;
        $datasets["CountPPPKPWTenagaTeknis"] = $CountPPPKPWTenagaTeknis[0]->CountPPPKPWTenagaTeknis;
        $datasets["CountPPPKPWTenagaKesehatan"] = $CountPPPKPWTenagaKesehatan[0]->CountPPPKPWTenagaKesehatan;
        $datasets["CountPPPKPWTenagaGuru"] = $CountPPPKPWTenagaGuru[0]->CountPPPKPWTenagaGuru;
        $datasets["CountJabatanStruktural"] = $CountJabatanStruktural[0]->CountJabatanStruktural;
        $datasets["CountJabatanFungsional"] = $CountJabatanFungsional[0]->CountJabatanFungsional;
        $datasets["CountJabatanPelaksana"] = $CountJabatanPelaksana[0]->CountJabatanPelaksana;

        $datasets["CountCPNSStruktural"] = $CountCPNSStruktural[0]->CountCPNSStruktural;
        $datasets["CountCPNSJafungTenagaTeknis"] = $CountCPNSJafungTenagaTeknis[0]->CountCPNSJafungTenagaTeknis;
        $datasets["CountCPNSJafungTenagaKesehatan"] = $CountCPNSJafungTenagaKesehatan[0]->CountCPNSJafungTenagaKesehatan;
        $datasets["CountCPNSJafungTenagaGuru"] = $CountCPNSJafungTenagaGuru[0]->CountCPNSJafungTenagaGuru;
        $datasets["CountCPNSPelaksanaTenagaTeknis"] = $CountCPNSPelaksanaTenagaTeknis[0]->CountCPNSPelaksanaTenagaTeknis;
        $datasets["CountCPNSPelaksanaTenagaKesehatan"] = $CountCPNSPelaksanaTenagaKesehatan[0]->CountCPNSPelaksanaTenagaKesehatan;
        $datasets["CountCPNSPelaksanaTenagaGuru"] = $CountCPNSPelaksanaTenagaGuru[0]->CountCPNSPelaksanaTenagaGuru;
        $datasets["CountPNSStruktural"] = $CountPNSStruktural[0]->CountPNSStruktural;
        $datasets["CountPNSJafungTenagaTeknis"] = $CountPNSJafungTenagaTeknis[0]->CountPNSJafungTenagaTeknis;
        $datasets["CountPNSJafungTenagaKesehatan"] = $CountPNSJafungTenagaKesehatan[0]->CountPNSJafungTenagaKesehatan;
        $datasets["CountPNSJafungTenagaGuru"] = $CountPNSJafungTenagaGuru[0]->CountPNSJafungTenagaGuru;
        $datasets["CountPNSPelaksanaTenagaTeknis"] = $CountPNSPelaksanaTenagaTeknis[0]->CountPNSPelaksanaTenagaTeknis;
        $datasets["CountPNSPelaksanaTenagaKesehatan"] = $CountPNSPelaksanaTenagaKesehatan[0]->CountPNSPelaksanaTenagaKesehatan;
        $datasets["CountPNSPelaksanaTenagaGuru"] = $CountPNSPelaksanaTenagaGuru[0]->CountPNSPelaksanaTenagaGuru;
        $datasets["CountPPPKStruktural"] = $CountPPPKStruktural[0]->CountPPPKStruktural;
        $datasets["CountPPPKJafungTenagaTeknis"] = $CountPPPKJafungTenagaTeknis[0]->CountPPPKJafungTenagaTeknis;
        $datasets["CountPPPKJafungTenagaKesehatan"] = $CountPPPKJafungTenagaKesehatan[0]->CountPPPKJafungTenagaKesehatan;
        $datasets["CountPPPKJafungTenagaGuru"] = $CountPPPKJafungTenagaGuru[0]->CountPPPKJafungTenagaGuru;
        $datasets["CountPPPKPelaksanaTenagaTeknis"] = $CountPPPKPelaksanaTenagaTeknis[0]->CountPPPKPelaksanaTenagaTeknis;
        $datasets["CountPPPKPelaksanaTenagaKesehatan"] = $CountPPPKPelaksanaTenagaKesehatan[0]->CountPPPKPelaksanaTenagaKesehatan;
        $datasets["CountPPPKPelaksanaTenagaGuru"] = $CountPPPKPelaksanaTenagaGuru[0]->CountPPPKPelaksanaTenagaGuru;
        $datasets["CountPPPKPWStruktural"] = $CountPPPKPWStruktural[0]->CountPPPKPWStruktural;
        $datasets["CountPPPKPWJafungTenagaTeknis"] = $CountPPPKPWJafungTenagaTeknis[0]->CountPPPKPWJafungTenagaTeknis;
        $datasets["CountPPPKPWJafungTenagaKesehatan
"] = $CountPPPKPWJafungTenagaKesehatan
[0]->CountPPPKPWJafungTenagaKesehatan
;
        $datasets["CountPPPKPWJafungTenagaGuru"] = $CountPPPKPWJafungTenagaGuru[0]->CountPPPKPWJafungTenagaGuru;
        $datasets["CountPPPKPWPelaksanaTenagaTeknis"] = $CountPPPKPWPelaksanaTenagaTeknis[0]->CountPPPKPWPelaksanaTenagaTeknis;
        $datasets["CountPPPKPWPelaksanaTenagaKesehatan"] = $CountPPPKPWPelaksanaTenagaKesehatan[0]->CountPPPKPWPelaksanaTenagaKesehatan;
        $datasets["CountPPPKPWPelaksanaTenagaGuru"] = $CountPPPKPWPelaksanaTenagaGuru[0]->CountPPPKPWPelaksanaTenagaGuru;

        $datasets["CountEselon1a"] = $CountEselon1a[0]->CountEselon1a;
        $datasets["CountEselon1b"] = $CountEselon1b[0]->CountEselon1b;
        $datasets["CountEselon2a"] = $CountEselon2a[0]->CountEselon2a;
        $datasets["CountEselon2b"] = $CountEselon2b[0]->CountEselon2b;
        $datasets["CountEselon3a"] = $CountEselon3a[0]->CountEselon3a;
        $datasets["CountEselon3b"] = $CountEselon3b[0]->CountEselon3b;
        $datasets["CountEselon4a"] = $CountEselon4a[0]->CountEselon4a;
        $datasets["CountEselon4b"] = $CountEselon4b[0]->CountEselon4b;
        $datasets["CountEselon5a"] = $CountEselon5a[0]->CountEselon5a;
        $datasets["CountEselon5b"] = $CountEselon5b[0]->CountEselon5b;
        $datasets["CountNonEselon"] = $CountNonEselon[0]->CountNonEselon;
        $datasets["CountPangkat1a"] = $CountPangkat1a;
        $datasets["CountPangkat1b"] = $CountPangkat1b;
        $datasets["CountPangkat1c"] = $CountPangkat1c;
        $datasets["CountPangkat1d"] = $CountPangkat1d;
        $datasets["CountPangkat2a"] = $CountPangkat2a;
        $datasets["CountPangkat2b"] = $CountPangkat2b;
        $datasets["CountPangkat2c"] = $CountPangkat2c;
        $datasets["CountPangkat2d"] = $CountPangkat2d;
        $datasets["CountPangkat3a"] = $CountPangkat3a;
        $datasets["CountPangkat3b"] = $CountPangkat3b;
        $datasets["CountPangkat3c"] = $CountPangkat3c;
        $datasets["CountPangkat3d"] = $CountPangkat3d;
        $datasets["CountPangkat4a"] = $CountPangkat4a;
        $datasets["CountPangkat4b"] = $CountPangkat4b;
        $datasets["CountPangkat4c"] = $CountPangkat4c;
        $datasets["CountPangkat4d"] = $CountPangkat4d;
        $datasets["CountPangkat4e"] = $CountPangkat4e;
        $datasets["CountPangkatPPPKIII"] = $CountPangkatPPPKIII[0]->CountPangkatPPPKIII;
        $datasets["CountPangkatPPPKV"] = $CountPangkatPPPKV[0]->CountPangkatPPPKV;
        $datasets["CountPangkatPPPKVII"] = $CountPangkatPPPKVII[0]->CountPangkatPPPKVII;
        $datasets["CountPangkatPPPKIX"] = $CountPangkatPPPKIX[0]->CountPangkatPPPKIX;
        $datasets["CountPangkatPPPKX"] = $CountPangkatPPPKX[0]->CountPangkatPPPKX;
        $datasets["CountSD"] = $CountSD[0]->CountSD;
        $datasets["CountSMP"] = $CountSMP[0]->CountSMP;
        $datasets["CountSMA"] = $CountSMA[0]->CountSMA;
        $datasets["CountD1"] = $CountD1[0]->CountD1;
        $datasets["CountD2"] = $CountD2[0]->CountD2;
        $datasets["CountD3"] = $CountD3[0]->CountD3;
        $datasets["CountD4"] = $CountD4[0]->CountD4;
        $datasets["CountS1"] = $CountS1[0]->CountS1;
        $datasets["CountS2"] = $CountS2[0]->CountS2;
        $datasets["CountS3"] = $CountS3[0]->CountS3;
        $datasets["CountProfesi"] = $CountProfesi[0]->CountProfesi;
        $datasets["Year1"] = $Year1;
        $datasets["Year2"] = $Year2;
        $datasets["Year3"] = $Year3;
        $datasets["Year4"] = $Year4;
        $datasets["Year5"] = $Year5;
        $datasets["CountYear1"] = $CountYear1;
        $datasets["CountYear2"] = $CountYear2;
        $datasets["CountYear3"] = $CountYear3;
        $datasets["CountYear4"] = $CountYear4;
        $datasets["CountYear5"] = $CountYear5;
        return response()->json($datasets);
    }

    public function aktif() {
        $rest_api_url = 'https://dashboard.sipmewah.masariuman.com/v2/api/sipmewah/dashboard';
        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $rest_api_url);

        // return the transfer as a string, also with setopt()
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // curl_exec() executes the started curl session
        // $output contains the output string
        $response_data = curl_exec($curl);

        // close curl resource to free up system resources
        // (deletes the variable made by curl_init)
        curl_close($curl);

        dd(json_decode($response_data));

        // $CountAktif = DB::select('SELECT count(*) as CountAktif FROM pegawai WHERE is_deleted = 0 AND kode_kedudukan_pegawai = 1');
        // $datasets["CountAktif"] = $CountAktif[0]->CountAktif;
        // return response()->json($datasets);
    }
}
