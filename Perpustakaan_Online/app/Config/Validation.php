<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules

	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'nama_user' => [
			'rules' => 'required',
		],
		'alamat_user' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		],
		'password_confirm' => [
			'rules' => 'required|matches[password]',
		]
	];

	public $register_errors = [
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 5 karakter,'
		],
		'nama_user' => [
			'required' => '{field} Harus diisi',
		],
		'alamat_user' => [
			'required' => '{field} Harus diisi',
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
		'password_confirm' => [
			'required' => '{field} Harus diisi',
			'matches' => '{field} Tidak sama dengan Password',
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 5 karakter,'
		],
		'password' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $penerbit_update = [
		'nama_penerbit' => [
			'rules' => 'required',
		],
		'alamat_penerbit' => [
			'rules' => 'required',
		],
		'tahun_berdiri' => [
			'rules' => 'required',
		],
	];

	public $penerbit_update_errors = [
		'nama_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'alamat_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'tahun_berdiri' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $penerbit = [
		'nama_penerbit' => [
			'rules' => 'required',
		],
		'alamat_penerbit' => [
			'rules' => 'required',
		],
		'tahun_berdiri' => [
			'rules' => 'required',
		],
	];

	public $penerbit_errors = [
		'nama_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'alamat_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'tahun_berdiri' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $rak_update = [
		'lokasi' => [
			'rules' => 'required',
		],
	];

	public $rak_update_errors = [
		'lokasi' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $rak = [
		'lokasi' => [
			'rules' => 'required',
		],
	];

	public $rak_errors = [
		'lokasi' => [
			'required' => '{field} Harus diisi',
		],
	];


	public $editor = [
		'nama_editor' => [
			'rules' => 'required|min_length[3]',
		],
		'email_editor' => [
			'rules' => 'required',
		],
		'foto_editor' => [
			'rules' => 'uploaded[foto_editor]',
		],
	];

	public $editor_errors = [
		'nama_editor' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'email_editor' => [
			'required' => '{field} Harus diisi',
		],
		'foto_editor' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $editor_update = [
		'nama_editor' => [
			'rules' => 'required|min_length[3]',
		],
		'email_editor' => [
			'rules' => 'required',
		],
	];

	public $editor_update_errors = [
		'nama_editor' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'email_editor' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $penulis = [
		'nama_penulis' => [
			'rules' => 'required|min_length[3]',
		],
		'usia_penulis' => [
			'rules' => 'required',
		],
		'asal_penulis' => [
			'rules' => 'required',
		],
		'foto_penulis' => [
			'rules' => 'uploaded[foto_penulis]',
		],
	];

	public $penulis_errors = [
		'nama_penulis' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'usia_penulis' => [
			'required' => '{field} Harus diisi',
		],
		'asal_penulis' => [
			'required' => '{field} Harus diisi',
		],
		'foto_penulis' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $penulis_update = [
		'nama_penulis' => [
			'rules' => 'required|min_length[3]',
		],
		'usia_penulis' => [
			'rules' => 'required',
		],
		'asal_penulis' => [
			'rules' => 'required',
		],
	];

	public $penulis_update_errors = [
		'nama_penulis' => [
			'required' => '{field} Harus diisi',
			'min_length' => '{field} Minimal 3 karakter'
		],
		'usia_penulis' => [
			'required' => '{field} Harus diisi',
		],
		'asal_penulis' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $buku = [
		'id_penulis' => [
			'rules' => 'required',
		],
		'id_penerbit' => [
			'rules' => 'required',
		],
		'id_editor' => [
			'rules' => 'required',
		],
		'id_rak' => [
			'rules' => 'required',
		],
		'nama_buku' => [
			'rules' => 'required',
		],
		'jumlah_buku' => [
			'rules' => 'required',
		],
		'tahun_terbit' => [
			'rules' => 'required',
		],
		'foto_buku' => [
			'rules' => 'uploaded[foto_buku]',
		],
	];

	public $buku_errors = [
		'id_penulis' => [
			'required' => '{field} Harus diisi',
		],
		'id_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'id_editor' => [
			'required' => '{field} Harus diisi',
		],
		'id_rak' => [
			'required' => '{field} Harus diisi',
		],
		'nama_buku' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tahun_terbit' => [
			'required' => '{field} Harus diisi',
		],
		'foto_buku' => [
			'uploaded' => '{field} Harus di upload',
		],
	];

	public $buku_update = [
		'id_penulis' => [
			'rules' => 'required',
		],
		'id_penerbit' => [
			'rules' => 'required',
		],
		'id_editor' => [
			'rules' => 'required',
		],
		'id_rak' => [
			'rules' => 'required',
		],
		'nama_buku' => [
			'rules' => 'required',
		],
		'jumlah_buku' => [
			'rules' => 'required',
		],
		'tahun_terbit' => [
			'rules' => 'required',
		],
	];

	public $buku_update_errors = [
		'id_penulis' => [
			'required' => '{field} Harus diisi',
		],
		'id_penerbit' => [
			'required' => '{field} Harus diisi',
		],
		'id_editor' => [
			'required' => '{field} Harus diisi',
		],
		'id_rak' => [
			'required' => '{field} Harus diisi',
		],
		'nama_buku' => [
			'required' => '{field} Harus diisi',
		],
		'jumlah_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tahun_terbit' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $peminjaman = [
		'id_user' => [
			'rules' => 'required',
		],
		'id_buku' => [
			'rules' => 'required',
		],
		'tanggal_peminjaman' => [
			'rules' => 'required',
		],
	];

	public $peminjaman_errors = [
		'id_user' => [
			'required' => '{field} Harus diisi',
		],
		'id_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_peminjaman' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $peminjaman_update = [
		'id_user' => [
			'rules' => 'required',
		],
		'id_buku' => [
			'rules' => 'required',
		],
		'tanggal_peminjaman' => [
			'rules' => 'required',
		],
	];

	public $peminjaman_update_errors = [
		'id_user' => [
			'required' => '{field} Harus diisi',
		],
		'id_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_peminjaman' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pengembalian = [
		'id_peminjaman' => [
			'rules' => 'required',
		],
		'id_user' => [
			'rules' => 'required',
		],
		'id_buku' => [
			'rules' => 'required',
		],
		'tanggal_pengembalian' => [
			'rules' => 'required',
		],
	];

	public $pengembalian_errors = [
		'id_peminjaman' => [
			'required' => '{field} Harus diisi',
		],
		'id_user' => [
			'required' => '{field} Harus diisi',
		],
		'id_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_pengembalian' => [
			'required' => '{field} Harus diisi',
		],
	];

	public $pengembalian_update = [
		'id_peminjaman' => [
			'rules' => 'required',
		],
		'id_user' => [
			'rules' => 'required',
		],
		'id_buku' => [
			'rules' => 'required',
		],
		'tanggal_pengembalian' => [
			'rules' => 'required',
		],
	];

	public $pengembalian_update_errors = [
		'id_peminjaman' => [
			'required' => '{field} Harus diisi',
		],
		'id_user' => [
			'required' => '{field} Harus diisi',
		],
		'id_buku' => [
			'required' => '{field} Harus diisi',
		],
		'tanggal_pengembalian' => [
			'required' => '{field} Harus diisi',
		],
	];

	//--------------------------------------------------------------------
}
