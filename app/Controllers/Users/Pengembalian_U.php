<?php

namespace App\Controllers\Users;

use TCPDF;
use App\Controllers\BaseController;
use App\Models\Buku_M;
use App\Models\Anggota_M;
use App\Models\Peminjaman_M;
use App\Models\Pengembalian_M;
use App\Entities\Pengembalian_E;
use App\Entities\Buku_E;

class Pengembalian_U extends BaseController
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
        $model = new Pengembalian_M();

        // $pengembalian = $model->findAll();

        $data = [
            "pengembalian" => $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->where('tbl_pengembalian.id_user', session()->get('id_user'))->paginate(3, 'pengembalian'),
            "pager" => $model->pager,
        ];

        return view('Pengembalian/Pengembalian_User/view_pengembalian_user', $data);
    }


    public function view()
    {
        // Mengambil Id dari segment
        $id_pengembalian = $this->request->uri->getSegment(4);

        $model = new Pengembalian_M();

        $pengembalian = $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->where('tbl_pengembalian.id_pengembalian', $id_pengembalian)->first();

        $data = [
            'pengembalian' => $pengembalian,
        ];

        return view('Pengembalian/Pengembalian_User/view_pengembalian_specific_user', $data);
    }

    public function pdf()
    {
        // Mengambil Id dari segment
        $id_pengembalian = $this->request->uri->getSegment(4);

        $model = new Pengembalian_M();

        $pengembalian = $model->join('tbl_peminjaman', 'tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman')->join('tbl_user', 'tbl_user.id_user = tbl_pengembalian.id_user')->join('tbl_buku', 'tbl_buku.id_buku = tbl_pengembalian.id_buku')->where('tbl_pengembalian.id_pengembalian', $id_pengembalian)->first();

        $data = [
            'pengembalian' => $pengembalian,
        ];

        $html = view('Pengembalian/Pengembalian_User/view_invoice_pengembalian', $data);

        // Skrip menggunakan TCPDF
        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Muhammad Nazhim Maulana');
        $pdf->SetTitle('Invoice Pengembalian');
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
        $pdf->Output('Invoice_pengembalian.pdf', 'I');
    }

}
