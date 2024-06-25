<?php

namespace App\Controllers;

use App\Models\RiwayatTransModel;

class RiwayatTrans extends BaseController
{
    protected $RiwayatTransModel;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->RiwayatTransModel = new RiwayatTransModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_riwayat_trans') ?
            $this->request->getVar('page_riwayat_trans') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $riwayattrans = $this->RiwayatTransModel->search($keyword);
        } else {
            $riwayattrans = $this->RiwayatTransModel;
        }

        $data = [
            'judul' => 'Daftar Riwayat Transaksi',
            'riwayattrans' => $riwayattrans->paginate(10, 'riwayattrans'),
            'pager' => $this->RiwayatTransModel->pager,
            'currentPage' => $currentPage
        ];
        return view('riwayattrans/index', $data);
    }
    public function cetak()
    {
        $data = [
            'riwayattrans' => $this->RiwayatTransModel->getRiwayatTrans(),
        ];

        $view = view('riwayattrans/laporan_riwayat_trans', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($view);
        $mpdf->output('Laporan Data Riwayat Transaksi.pdf', 'D');
    }
}
