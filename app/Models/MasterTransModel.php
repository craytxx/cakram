<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterTransModel extends Model
{
    protected $table = 'master_trans';
    protected $primaryKey = 'no_fak';
    protected $allowedFields = ['no_fak', 'tgl_trans', 'tot_harga'];

    public function getMasterTrans($kodetrans = false)
    {
        if ($kodetrans == false) {
            return $this->findAll();
        }
        return $this->where(['no_fak' => $kodetrans])->first();
    }

    public function getMasterTransInfo($kodetrans)
    {
        $mastertransInfo = $this->where('no_fak', $kodetrans)->first();
        log_message('info', print_r($mastertransInfo, true)); 
        return $mastertransInfo;
    }

    public function search($keyword)
    {
        return $this->table('master_trans')->like('no_fak', $keyword)->orLike('tgl_trans', $keyword);
    }
}
