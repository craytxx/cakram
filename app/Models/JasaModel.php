<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaModel extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'kode_jasa';
    protected $allowedFields = ['kode_jasa', 'nama','harga'];

    public function getJasa($kodejasa = false)
    {
        if ($kodejasa == false) {
            return $this->findAll();
        }
        return $this->where(['kode_jasa' => $kodejasa])->first();
    }

    public function getJasaInfo($kodejasa)
    {
        $jasaInfo = $this->where('kode_jasa', $kodejasa)->first();
        log_message('info', print_r($jasaInfo, true)); 
        return $jasaInfo;
    }

    public function search($keyword)
    {
        return $this->table('jasa')->like('kode_jasa', $keyword)->orLike('nama', $keyword);
    }
}
