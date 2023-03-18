<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    /**
	 * table name
	 */
	protected $table = "kategori";
	
	/**
	 * allowed field
	 */
	protected $allowedFields = [
		'nama_kategori',
		'status'
	];
	
	 public function getKategori()
	{
	    return $this->findAll();
	}
	
	public function getKategoriById($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_kategori' => $id]);
        }   
    }
	
	 public function updateKategori($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_kategori' => $id));
        return $query;
    }
	
	public function deleteKategori($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_kategori' => $id));
        return $query;
    }
}