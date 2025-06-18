<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class Daftar_tilik extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Daftar Tilik'
				]);
				return view('daftartilikList', $data);
			}
			public function form()
			{
				$data = array_merge($this->data, [
					'title'         => 'Daftar Tilik'
				]);
				return view('daftartilikForm', $data);
			}
		}
		