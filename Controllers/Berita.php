<?php
namespace App\Controllers;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$Beritas = new BeritaModel();
		$pager = \config\Services::pager();
		
		$data = array(
		    'beritas' => $Beritas->paginate(2, 'berita'),
			'pager' => $Beritas->pager
		);
		
		return view('berita', $data);
	}
	public function update($id) 
	{
		$model = new BeritaModel();
		$data['product'] = $model->getBeritaById($id)->getRow(); //ambil function getBeritaById di model
        echo view('edit_berita_view', $data);
	}
	public function edit() 
	{
		$model = new BeritaModel();
        $id = $this->request->getPost('id');
        $data = array(
            'judul'  => $this->request->getPost('judul'),
            'tanggal' => $this->request->getPost('tanggal'),
			'isi' => $this->request->getPost('isi'),
        );
        $model->updateBerita($data, $id);
        return redirect()->to('/reina');
	}
	public function delete($id) 
	{
		$model = new BeritaModel();
        $model->deleteBerita($id);
        return redirect()->to('/reina');
	}
	public function insert()
	{
		
	}
}