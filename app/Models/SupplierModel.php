<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'kode_supplier';
    protected $allowedFields = ['kode_supplier', 'nama', 'alamat', 'telp'];

    public function getSupplier($kodesuppl = false)
    {
        if ($kodesuppl == false) {
            return $this->findAll();
        }
        return $this->where(['kode_supplier' => $kodesuppl])->first();
    }

    public function getSupplierInfo($kodesuppl)
    {
        $supplierInfo = $this->where('kode_supplier', $kodesuppl)->first();
        log_message('info', print_r($supplierInfo, true)); 
        return $supplierInfo;
    }

    public function search($keyword)
    {
        return $this->table('supplier')->like('kode_supplier', $keyword)->orLike('nama', $keyword);
    }
}
