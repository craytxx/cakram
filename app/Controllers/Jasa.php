<?php

namespace App\Controllers;

use App\Models\JasaModel;

class Jasa extends BaseController
{
    protected $JasaModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->JasaModel = new JasaModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_jasa') ?
            $this->request->getVar('page_jasa') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $jasa = $this->JasaModel->search($keyword);
        } else {
            $jasa = $this->JasaModel;
        }

        $data = [
            'judul' => 'Daftar Jasa',
            'jasa' => $this->JasaModel->getJasa(),
            // 'jasa' => $jasa->paginate(10, 'jasa'),
            'pager' => $this->JasaModel->pager,
            'currentPage' => $currentPage
        ];
        return view('jasa/index', $data);
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
            'judul' => 'Tambah Jasa',
            'error' => $this->validator == null ? [] : $this->validator->getErrors(),
        ];
        return view('jasa/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (
            !$this->validate([
                'kode_jasa' => [
                    'rules' => 'required|is_unique[jasa.kode_jasa]',
                    'errors' => [
                        'required' => '{field} Kode wajib di isi',
                        'is_unique' => '{field} Kode sudah ada'
                    ]
                ],
            ])
        ) {

            //menampilkan pesan kesalahan
            $data = [
                'judul' => 'Tambah Jasa',
                'error' => $this->validator->getErrors()
            ];
            return view('jasa/tambah', $data);
        }

        $this->JasaModel->insert([
            'kode_jasa' => $this->request->getVar('kode_jasa'),
            'nama' => $this->request->getVar('nama'),
            'harga' => $this->request->getVar('harga'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/jasa');
    }

    public function hapus($kodejasa)
    {
        $this->JasaModel->delete($kodejasa);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/jasa');
    }

    public function ubah($kodejasa)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'judul' => 'Ubah Data Jasa',
            'validation' => \Config\Services::validation(),
            'jasa' => $this->JasaModel->getJasa($kodejasa)

        ];
        return view('jasa/ubah', $data);
    }

    public function update($kodejasa)
    {

        $this->JasaModel->update($kodejasa, [
            'kode_jasa' => $this->request->getVar('kode_jasa'),
            'nama' => $this->request->getVar('nama'),
            'harga' => $this->request->getVar('harga'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Jasa Sudah Di Ubah');
        return redirect()->to('/jasa');
    }

    public function cetak()
    {
        $data = [
            'jasa' => $this->JasaModel->getJasa(),
        ];

        $view = view('jasa/laporan_jasa', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data Jasa.pdf', 'D');
    }
}
