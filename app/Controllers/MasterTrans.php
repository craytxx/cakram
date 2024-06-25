<?php

namespace App\Controllers;

use App\Models\MasterTransModel;

class MasterTrans extends BaseController
{
    protected $MasterTransModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->MasterTransModel = new MasterTransModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_master_trans') ?
            $this->request->getVar('page_master_trans') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $mastertrans = $this->MasterTransModel->search($keyword);
        } else {
            $mastertrans = $this->MasterTransModel;
        }

        $data = [
            'judul' => 'Daftar Master Transaksi',
            // 'barang' => $this->BarangModel->getBarang(),
            'mastertrans' => $mastertrans->paginate(10, 'mastertrans'),
            'pager' => $this->MasterTransModel->pager,
            'currentPage' => $currentPage
        ];
        return view('mastertrans/index', $data);
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
            'judul' => 'Tambah Master Transaksi',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
        ];
        return view('mastertrans/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (
            !$this->validate([
                'no_fak' => [
                    'rules' => 'required|is_unique[master_trans.no_fak]',
                    'errors' => [
                        'required' => '{field} Kode wajib di isi',
                        'is_unique' => '{field} Kode sudah ada'
                    ]
                ],
            ])
        ) {

            //menampilkan pesan kesalahan
            $data = [
                'judul' => 'Tambah Master Transaksi',
                'error' => $this->validator->getErrors()
            ];
            return view('mastertrans/tambah', $data);
        }

        $this->MasterTransModel->insert([
            'no_fak' => $this->request->getVar('no_fak'),
            'tgl_trans' => $this->request->getVar('tgl_trans'),
            'tot_harga' => $this->request->getVar('tot_harga'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/mastertrans');
    }

    public function hapus($kodemastertrans)
    {
        $this->MasterTransModel->delete($kodemastertrans);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/mastertrans');
    }

    public function ubah($kodemastertrans)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'judul' => 'Ubah Data Master Trans',
            'validation' => \Config\Services::validation(),
            'mastertrans' => $this->MasterTransModel->getMasterTrans($kodemastertrans)

        ];
        return view('mastertrans/ubah', $data);
    }

    public function update($kodemastertrans)
    {

        $this->MasterTransModel->update($kodemastertrans, [
            'no_fak' => $this->request->getVar('no_fak'),
            'tgl_trans' => $this->request->getVar('tgl_trans'),
            'tot_harga' => $this->request->getVar('tot_harga'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Master Transaksi Sudah Di Ubah');
        return redirect()->to('/mastertrans');
    }

    public function cetak()
    {
        $data = [
            'mastertrans' => $this->MasterTransModel->getMasterTrans(),
        ];

        $view = view('mastertrans/laporan_master_trans', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data MAster Transaksi.pdf', 'D');
    }
}
