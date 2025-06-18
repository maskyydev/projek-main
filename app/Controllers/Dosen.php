<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		use App\Models\DosenModel;
        use App\Models\UserModel;
		class Dosen extends BaseController
		{
			

		function __construct()
		{
    		$this->DosenModel = new DosenModel();
            $this->userModel = new UserModel();
		}

			
			public function index()
			{
				$data = array_merge($this->data, [
            'title' => 'Dosen',
            'Dosen'    => $this->DosenModel->getDosen()
        	]);
        		return view('dosenList', $data);
			}
			
			public function form()
			{
				$userModel = new \App\Models\UserModel();
                $users = $userModel->getUsersBelumDipakai();
                
                $data = array_merge($this->data, [
					'title'         => 'Dosen',
                    'users'        => $users
				]);
				return view('dosenForm', $data);
			}

	public function createDosen1()
    {
        $createDosen = $this->DosenModel->createDosen($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createDosen) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Dosen</b>');
            return redirect()->to(base_url('dosen'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Dosen</b>');
            return redirect()->to(base_url('dosen'));
        }
    }

    
    public function createDosen()
    {
    $dosenModel = new \App\Models\DosenModel();

    $data = [
        'id_dosen'     => $this->request->getPost('inputIdDosen'), // diisi dari date('YmdHis')
        'nidn'         => $this->request->getPost('inputNidn'),
        'niy'          => $this->request->getPost('inputNiy'),
        'nama_lengkap' => $this->request->getPost('inputNamaLengkap'),
        'alamat'       => $this->request->getPost('inputAlamat'),
        'user_id'      => $this->request->getPost('inputUserId'),
    ];

    // Opsional: Validasi user_id tidak dipakai dua kali
    if ($dosenModel->userSudahMenjadiDosen($data['user_id'])) {
        return redirect()->back()->with('error', 'User tersebut sudah terdaftar sebagai dosen.');
    }

    $dosenModel->simpanDosen($data);
    return redirect()->to('/Dosen')->with('success', 'Data dosen berhasil disimpan.');
    }

	public function updateDosen()
        {
            $updateDosen = $this->DosenModel->updateDosen($this->request->getPost(null, FILTER_UNSAFE_RAW));
            if ($updateDosen) {
                session()->setFlashdata('notif_success', '<b>Successfully update Dosen</b>');
                return redirect()->to(base_url('dosen'));
            } else {
                session()->setFlashdata('notif_error', '<b>Failed to update Dosen</b>');
                return redirect()->to(base_url('dosen'));
            }
        }

		 public function deleteDosen($DosenID)
        {
            if (!$DosenID) {
                return redirect()->to(base_url('dosen'));
            }
            $deleteDosen = $this->DosenModel->deleteDosen($DosenID);
            if ($deleteDosen) {
                session()->setFlashdata('notif_success', '<b>Successfully delete Dosen</b>');
                return redirect()->to(base_url('dosen'));
            } else {
                session()->setFlashdata('notif_error', '<b>Failed to delete Dosen</b>');
                return redirect()->to(base_url('dosen'));
            }
        }

		}
		