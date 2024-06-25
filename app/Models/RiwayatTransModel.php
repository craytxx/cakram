<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatTransModel extends Model
{
    protected $table = 'riwayat_trans';
    protected $primaryKey = 'log_trans';
    protected $allowedFields = ['*'];

    public function getRiwayatTrans($koderiwayattrans = false)
    {
        if ($koderiwayattrans == false) {
            return $this->findAll();
        }
        return $this->where(['log_trans' => $koderiwayattrans])->first();
    }

    public function getRiwayatTransInfo($koderiwayattrans)
    {
        $riwayattransInfo = $this->where('log_trans', $koderiwayattrans)->first();
        log_message('info', print_r($riwayattransInfo, true)); 
        return $riwayattransInfo;
    }

    public function search($keyword)
    {
        return $this->table('riwayat_trans')->like('no_fak', $keyword)->orLike('nama', $keyword);
    }
}
