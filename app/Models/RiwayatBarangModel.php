<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatBarangModel extends Model
{
    protected $table = 'riwayat_barang';
    protected $primaryKey = 'log_brg';
    protected $allowedFields = ['*'];

    public function getRiwayatBarang($koderiwayatbarang = false)
    {
        if ($koderiwayatbarang == false) {
            return $this->findAll();
        }
        return $this->where(['log_brg' => $koderiwayatbarang])->first();
    }

    public function getRiwayatBarangInfo($koderiwayatbarang)
    {
        $riwayatbarangInfo = $this->where('kode_barang', $koderiwayatbarang)->first();
        log_message('info', print_r($riwayatbarangInfo, true)); 
        return $riwayatbarangInfo;
    }

    public function search($keyword)
    {
        return $this->table('riwayat_barang')->like('kode_barang', $keyword)->orLike('nama', $keyword);
    }
}
