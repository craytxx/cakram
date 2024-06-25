<?php

namespace App\Controllers;

use App\Models\JasaModel;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
// use App\Models\PulsaModel;

class Transaksi extends BaseController
{
    protected $TransaksiModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_transaksi') ?
            $this->request->getVar('page_transaksi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $transaksi = $this->TransaksiModel->search($keyword);
        } else {
            $transaksi = $this->TransaksiModel;
        }

        $data = [
            'judul' => 'Daftar Transaksi',
            //'transaksi' => $this->TransaksiModel->getTrans(),
            'transaksi' => $transaksi->paginate(8, 'transaksi'),
            'pager' => $this->TransaksiModel->pager,
            'currentPage' => $currentPage
        ];
        return view('transaksi/index', $data);
    }

    public function detail($notrans)
    {
        $data = [
            'judul' => 'Detail Transaksi',
            'transaksi' => $this->TransaksiModel->getTrans($notrans)
        ];
        return view('transaksi/detail', $data);
    }

    public function tambah()
    {
        // Memuat model
        $barangModel = new BarangModel();
        $jasaModel = new JasaModel();

        // Mengambil data barang dan jasa
        $barangOptions = $barangModel->findAll();
        $jasaOptions = $jasaModel->findAll();

        // Menyiapkan data untuk view
        $data = [
            'judul' => 'Tambah Transaksi',
            'error' => session()->getFlashdata('error') ?? [],
            'barangOptions' => $barangOptions,
            'jasaOptions' => $jasaOptions,
        ];

        return view('transaksi/tambah', $data);
    }

    public function simpan()
    {
        // Validasi input data
        if (!$this->validate([
            'no_fak' => [
                'rules' => 'required[transaksi.no_fak]',
                'errors' => [
                    'required' => '{field} Kode wajib diisi',
                ]
            ],
            'kode_barang' => 'required',
            'kode_jasa' => 'required',
            'tgl' => 'required',
            'jumlah_brg' => 'required',
            'jumlah_uang' => 'required|numeric',
        ])) {
            // Memuat model
            $barangModel = new BarangModel();
            $jasaModel = new JasaModel();

            // Mengambil data dari model
            $barangOptions = $barangModel->findAll();
            $jasaOptions = $jasaModel->findAll();

            // Menyiapkan data untuk view
            $data = [
                'judul' => 'Tambah Transaksi',
                'error' => $this->validator->getErrors(),
                'barangOptions' => $barangOptions,
                'jasaOptions' => $jasaOptions,
            ];

            return view('transaksi/tambah', $data);
        }

        // Ambil data total bill dan jumlah uang dari form
        $total_bill = $this->request->getVar('total_bill');
        $jumlah_uang = $this->request->getVar('jumlah_uang');

        // Hitung kembalian
        $kembalian = $jumlah_uang - $total_bill;

        // Simpan data ke database
        $this->TransaksiModel->insert([
            'no_fak' => $this->request->getVar('no_fak'),
            'nama' => $this->request->getVar('nama'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'kode_jasa' => $this->request->getVar('kode_jasa'),
            'tgl' => $this->request->getVar('tgl'),
            'jumlah_brg' => $this->request->getVar('jumlah_brg'),
            'jumlah_uang' => $jumlah_uang,
            'total_bill' => $total_bill,
            'kembalian' => $kembalian,
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('/transaksi');
    }

    public function getBarangInfo($kode_barang)
    {
        $barangModel = new BarangModel();
        $data = $barangModel->find($kode_barang);

        if ($data) {
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON(['error' => 'Barang not found'], 404);
        }
    }

    public function getJasaInfo($kode_jasa)
    {
        $jasaModel = new JasaModel();
        $data = $jasaModel->find($kode_jasa);

        if ($data) {
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON(['error' => 'Jasa not found'], 404);
        }
    }

    public function cetakbynotrans($notrans)
    {
        $data = [
            'transaksi' => $this->TransaksiModel->getTrans($notrans),
        ];

        $view = view('transaksi/laporan_struk_transaksi', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Struk Transaksi Pulsa.pdf', 'D');
    }

    public function cetakAll()
    {
        $data = [
            'transaksi' => $this->TransaksiModel->getTrans(),
        ];

        $view = view('transaksi/laporan_All_Trans', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Semua Transaksi Cakram.pdf', 'D');
    }
}
