<?php
namespace App\Controllers;
use App\Models\DaerahModel;

class Daerah extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$Daerahs = new DaerahModel();
		$pager = \config\Services::pager();
		
		$data = array(
		    'daerahs' => $Daerahs->paginate(2, 'daerah'),
			'pager' => $Daerahs->pager
		);
		
		return view('daerah', $data);
	}
	public function update($id) 
	{
		$model = new DaerahModel();
		$data['product'] = $model->getDaerahById($id)->getRow(); //ambil function getDaerahById di model
        echo view('edit_daerah_view', $data);
	}
	public function edit() 
	{
		$model = new DaerahModel();
        $id = $this->request->getPost('id_daerah');
        $data = array(
            'nama_daerah'  => $this->request->getPost('nama_daerah'),
            'status' => $this->request->getPost('status'),
        );
        $model->updateDaerah($data, $id);
        return redirect()->to('/daerah');
	}
	public function delete($id) 
	{
		$model = new DaerahModel();
        $model->deleteDaerah($id);
        return redirect()->to('/daerah');
	}
	public function insert()
	{
		
	}

}