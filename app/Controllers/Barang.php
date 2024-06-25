<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $BarangModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_barang') ?
            $this->request->getVar('page_barang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $barang = $this->BarangModel->search($keyword);
        } else {
            $barang = $this->BarangModel;
        }

        $data = [
            'judul' => 'Daftar Barang',
            'barang' => $this->BarangModel->getBarang(),
            // 'barang' => $barang->paginate(100, 'barang'),
            'pager' => $this->BarangModel->pager,
            'currentPage' => $currentPage
        ];
        return view('barang/index', $data);
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
            'judul' => 'Tambah Barang',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
        ];
        return view('barang/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (
            !$this->validate([
                'kode_barang' => [
                    'rules' => 'required|is_unique[barang.kode_barang]',
                    'errors' => [
                        'required' => '{field} Kode wajib di isi',
                        'is_unique' => '{field} Kode sudah ada'
                    ]
                ],
            ])
        ) {

            //menampilkan pesan kesalahan
            $data = [
                'judul' => 'Tambah Barang',
                'error' => $this->validator->getErrors()
            ];
            return view('barang/tambah', $data);
        }

        $this->BarangModel->insert([
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama' => $this->request->getVar('nama'),
            'stok' => $this->request->getVar('stok'),
            'size' => $this->request->getVar('size'),
            'harga' => $this->request->getVar('harga'),
            'kode_supplier' => $this->request->getVar('kode_supplier'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/barang');
    }

    public function hapus($kodebarang)
    {
        $this->BarangModel->delete($kodebarang);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/barang');
    }

    public function ubah($kodebarang)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'judul' => 'Ubah Data Barang',
            'validation' => \Config\Services::validation(),
            'barang' => $this->BarangModel->getBarang($kodebarang)

        ];
        return view('barang/ubah', $data);
    }

    public function update($kodebarang)
    {

        $this->BarangModel->update($kodebarang, [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama' => $this->request->getVar('nama'),
            'stok' => $this->request->getVar('stok'),
            'size' => $this->request->getVar('size'),
            'harga' => $this->request->getVar('harga'),
            'kode_supplier' => $this->request->getVar('kode_supplier'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Barang Sudah Di Ubah');
        return redirect()->to('/barang');
    }

    public function cetak()
    {
        $data = [
            'barang' => $this->BarangModel->getBarang(),
        ];

        $view = view('barang/laporan_barang', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data Barang.pdf', 'D');
    }
}
