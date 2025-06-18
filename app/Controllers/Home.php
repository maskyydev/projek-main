<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		$data = array_merge($this->data, [
			'title'         => 'Dashboard Page'
		]);
		//var_dump($data);
		//die;
		return view('common/home', $data);
	}
}
