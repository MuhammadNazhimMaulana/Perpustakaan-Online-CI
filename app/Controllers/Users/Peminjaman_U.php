<?php

namespace App\Controllers\Users;

use TCPDF;
use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Anggota_M;
use App\Models\Peminjaman_M;
use App\Entities\Peminjaman_E;
use App\Entities\Buku_E;

class Peminjaman_U extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }

    public function read()
    {
        $model = new Peminjaman_M();

        // Get all data
        // $peminjaman = $model->findAll();

        $data = [
            "peminjaman" => $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->where('tbl_peminjaman.id_user', session()->get('id_user'))->paginate(3, 'peminjaman'),
            "pager" => $model->pager,
        ];

        return view('Peminjaman/Peminjaman_User/view_peminjaman_user', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_peminjaman = $this->request->uri->getSegment(4);

        $model = new Peminjaman_M();

        $peminjaman = $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->where('tbl_peminjaman.id_peminjaman', $id_peminjaman)->first();

        $data = [
            'peminjaman' => $peminjaman,
        ];

        return view('Peminjaman/Peminjaman_User/view_peminjaman_specific_user', $data);
    }

    public function pdf()
    {
        // Mengambil Id dari segment
        $id_peminjaman = $this->request->uri->getSegment(4);

        $model = new Peminjaman_M();

        $peminjaman = $model->join('tbl_user', 'tbl_user.id_user = tbl_peminjaman.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku')->where('tbl_peminjaman.id_peminjaman', $id_peminjaman)->first();

        $data = [
            'peminjaman' => $peminjaman,
        ];

        $html = view('Peminjaman/Peminjaman_User/view_invoice_user', $data);

        // Skrip menggunakan TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Muhammad Nazhim Maulana');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        // Menghilangkan garis header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // Output HTML
        $pdf->writeHTML($html, true, false, true, false, '');

        // Penting agar browser menampilkan pdf
        $this->response->setContentType('application/pdf');

        // Membuat dokumen pdf (F untuk write file di folder yang dipilih)
        $pdf->Output('Invoice.pdf', 'I');
    }
}
