<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $SupplierModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->SupplierModel = new SupplierModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_supplier') ?
            $this->request->getVar('page_supplier') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $supplier = $this->SupplierModel->search($keyword);
        } else {
            $supplier = $this->SupplierModel;
        }

        $data = [
            'judul' => 'Daftar Supplier',
            // 'supplier' => $this->SupplierModel->getSupplier(),
            'supplier' => $supplier->paginate(10, 'supplier'),
            'pager' => $this->SupplierModel->pager,
            'currentPage' => $currentPage
        ];
        return view('supplier/index', $data);
    }

    // public function detail($kodepulsa)
    // {
    //     $data = [
    //         'judul' => 'Detail Pulsa',
    //         'pulsa' => $this->PulsaModel->getPulsa($kodepulsa)
    //     ];
    //     return view('pulsa/detail', $data);
    // }

    public function tambah()
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'judul' => 'Tambah Supplier',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
        ];
        return view('supplier/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (
            !$this->validate([
                'kode_supplier' => [
                    'rules' => 'required|is_unique[supplier.kode_supplier]',
                    'errors' => [
                        'required' => '{field} Kode wajib di isi',
                        'is_unique' => '{field} Kode sudah ada'
                    ]
                ],
            ])
        ) {

            //menampilkan pesan kesalahan
            $data = [
                'judul' => 'Tambah Supplier',
                'error' => $this->validator->getErrors()
            ];
            return view('supplier/tambah', $data);
        }

        $this->SupplierModel->insert([
            'kode_supplier' => $this->request->getVar('kode_supplier'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/supplier');
    }

    public function hapus($kodesupplier)
    {
        $this->SupplierModel->delete($kodesupplier);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/supplier');
    }

    public function ubah($kodesupplier)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'judul' => 'Ubah Data Supplier',
            'validation' => \Config\Services::validation(),
            'supplier' => $this->SupplierModel->getSupplier($kodesupplier)

        ];
        return view('supplier/ubah', $data);
    }

    public function update($kodesupplier)
    {

        $this->SupplierModel->update($kodesupplier, [
            'kode_supplier' => $this->request->getVar('kode_supplier'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Supplier Sudah Di Ubah');
        return redirect()->to('/supplier');
    }

    public function cetak()
    {
        $data = [
            'supplier' => $this->SupplierModel->getSupplier(),
        ];

        $view = view('supplier/laporan_supplier', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data Supplier.pdf', 'D');
    }
}
