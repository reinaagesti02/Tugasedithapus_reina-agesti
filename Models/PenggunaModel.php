<?php namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    /**
	 * table name
	 */
	protected $table = "pengguna";
	
	/**
	 * allowed field
	 */
	protected $allowedFields = [
	    'email',
		'nama',
		'verifikasi'
	];
	
	 public function getPengguna()
	{
	    return $this->findAll();
	}
	
	public function getPenggunaById($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_pengguna' => $id]);
        }   
    }
	
	 public function updatePengguna($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_pengguna' => $id));
        return $query;
    }
	
	public function deletePengguna($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_pengguna' => $id));
        return $query;
    }
}