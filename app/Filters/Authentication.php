<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Authentication implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		if (is_null(session()->get('id'))) :
			return redirect()->to(base_url('/'));
		endif;

		//if(is_null(session()->get('isLoggedIn')))
        //{
         //   return redirect()->to(base_url('login/index'));
        //}
	}
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
