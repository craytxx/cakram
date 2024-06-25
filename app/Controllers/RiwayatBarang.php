<?php

namespace App\Controllers;

use App\Models\RiwayatBarangModel;

class RiwayatBarang extends BaseController
{
    protected $RiwayatBarangModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->RiwayatBarangModel = new RiwayatBarangModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_riwayat_barang') ?
            $this->request->getVar('page_riwayat_barang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $riwayatbarang = $this->RiwayatBarangModel->search($keyword);
        } else {
            $riwayatbarang = $this->RiwayatBarangModel;
        }

        $data = [
            'judul' => 'Daftar Riwayat Transaksi',
            'riwayatbarang' => $this->RiwayatBarangModel->getRiwayatBarang(),
            // 'riwayatbarang' => $riwayatbarang->paginate(10, 'riwayatbarang'),
            'pager' => $this->RiwayatBarangModel->pager,
            'currentPage' => $currentPage
        ];
        return view('riwayatbarang/index', $data);
    }
    public function cetak()
    {
        $data = [
            'riwayatbarang' => $this->RiwayatBarangModel->getRiwayatBarang(),
        ];

        $view = view('riwayatbarang/laporan_riwayat_barang', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data Riwayat Barang.pdf', 'D');
    }
}
