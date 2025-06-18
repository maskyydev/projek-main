<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;
use App\Models\MenuModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['cookie', 'date', 'security', 'menu', 'useraccess'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;
    protected $data 	= [];
	protected $userModel;
	protected $session;
	protected $segment;
	protected $db;
	protected $validation;
	protected $encrypter;
	protected $menuModel;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        // Load necessary services and models
        $this->session 		= \Config\Services::session();
		$this->segment 	  	= \Config\Services::request();
		$this->db         	= \Config\Database::connect();
		$this->validation 	= \Config\Services::validation();
		$this->encrypter 	= \Config\Services::encrypter();
		$this->userModel  	= new UserModel();
		$this->menuModel  	= new MenuModel();
		$user 				= $this->userModel->getUser(username: session()->get('username'));
		$segment 			= $this->request->getUri(1);
		if ($segment) {
			$subsegment 	= $this->request->getUri(2);
		} else {
			$subsegment 	= '';
		}
		$this->data			= [
			'segment' 		=> $segment,
			'subsegment' 	=> $subsegment,
			'user' 			=> $user,
			'MenuCategory' 	=> $this->userModel->getAccessMenuCategory(session()->get('role'))
		];
	}
}
