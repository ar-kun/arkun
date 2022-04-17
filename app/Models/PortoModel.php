<?php 

namespace App\Models;
use CodeIgniter\Model;

class PortoModel extends Model{
    // protected $table = 'education';
   public function getEdu()
    {
         return $this->db->table('education')
         ->join('organisasi','organisasi.edu_id=education.edu_id','inner')
         ->get()->getResultArray();  
    }
}