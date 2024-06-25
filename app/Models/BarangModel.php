<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = ['kode_barang', 'nama','stok', 'size', 'harga', 'kode_supplier'];

    public function getBarang($kodebarang = false)
    {
        if ($kodebarang == false) {
            return $this->findAll();
        }
        return $this->where(['kode_barang' => $kodebarang])->first();
    }

    public function getBarangInfo($kodebarang)
    {
        $barangInfo = $this->where('kode_barang', $kodebarang)->first();
        log_message('info', print_r($barangInfo, true)); 
        return $barangInfo;
    }

    public function search($keyword)
    {
        return $this->table('barang')->like('kode_barang', $keyword)->orLike('nama', $keyword);
    }
}
