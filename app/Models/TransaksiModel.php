<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'no_fak';
    protected $allowedFields = ['no_fak', 'nama', 'kode_barang', 'kode_jasa', 'tgl','jumlah_brg' ,'jumlah_uang','total_bill', 'kembalian'];

    public function getTrans($kodetrans = false)
    {
        if ($kodetrans == false) {
            return $this->findAll();
        }
        return $this->where(['no_fak' => $kodetrans])->first();
    }

    public function search($keyword)
    {
        return $this->table('transaksi')->like('no_fak', $keyword)->orLike('nama', $keyword);
    }
}
