<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\MenuModel;

class Authorization implements FilterInterface
{
	protected $userModel;
	protected $menuModel;
	public function before(RequestInterface $request, $arguments = null)
{
    // Initialize models
    $this->userModel = new UserModel();
    $this->menuModel = new MenuModel();

    // Get the first segment of the URL
    $segment = $request->getUri()->getSegment(1);

    // Check if the segment exists
    if ($segment) {
        // Get the menu by URL
        $menu = $this->menuModel->getMenuByUrl($segment);

        // If the menu does not exist, redirect to the base URL
        if (!$menu) {
            return redirect()->to(base_url('/'));
        } else {
            // Prepare data for checking user access
            $dataAccess = [
                'roleID' => session()->get('role'),
                'menuID' => $menu['id']
            ];

            // Check user access
            $userAccess = $this->userModel->checkUserAccess($dataAccess);

            // If the user does not have access, redirect to the blocked page
            if (!$userAccess) {
                return redirect()->to(base_url('blocked'));
            }
        }
    }
}

public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
{
    // No operation
}
}
