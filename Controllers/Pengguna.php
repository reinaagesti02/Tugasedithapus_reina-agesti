<?php
namespace App\Controllers;
use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$Penggunas = new PenggunaModel();
		$pager = \config\Services::pager();
		
		$data = array(
		    'penggunas' => $Penggunas->paginate(2, 'pengguna'),
			'pager' => $Penggunas->pager
		);
		
		return view('pengguna', $data);
	}
	public function update($id) 
	{
		$model = new PenggunaModel();
		$data['product'] = $model->getPenggunaById($id)->getRow(); //ambil function getKategoriById di model
        echo view('edit_pengguna_view', $data);
	}
	public function edit() 
	{
		$model = new PenggunaModel();
        $id = $this->request->getPost('id_pengguna');
        $data = array(
            'email'  => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
			'verifikasi' => $this->request->getPost('verifikasi'),
        );
        $model->updatePengguna($data, $id);
        return redirect()->to('/pengguna');
	}
	public function delete($id) 
	{
		$model = new PenggunaModel();
        $model->deletePengguna($id);
        return redirect()->to('/pengguna');
	}
	public function insert()
	{
		
	}
	
		
}