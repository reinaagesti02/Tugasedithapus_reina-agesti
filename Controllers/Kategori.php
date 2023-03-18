<?php
namespace App\Controllers;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$Kategoris = new KategoriModel();
		$pager = \config\Services::pager();
		
		$data = array(
		    'kategoris' => $Kategoris->paginate(2, 'kategori'),
			'pager' => $Kategoris->pager
		);
		
		return view('kategori', $data);
	}
	public function update($id) 
	{
	    $model = new KategoriModel(); // = include/koneksi file KategoriModel
		$data['product'] = $model->getKategoriById($id)->getRow(); //ambil function getKategoriById di model
        echo view('edit_kategori_view', $data);
	}
	public function edit() 
	{
	    $model = new KategoriModel();
        $id = $this->request->getPost('id_kategori');
        $data = array(
            'nama_kategori'  => $this->request->getPost('nama_kategori'),
            'status' => $this->request->getPost('status'),
        );
        $model->updateKategori($data, $id);
        return redirect()->to('/kategori');
	}
	public function delete($id) 
	{
		$model = new KategoriModel();
        $model->deleteKategori($id);
        return redirect()->to('/kategori');
	}
	public function insert()
	{
		
	}
}