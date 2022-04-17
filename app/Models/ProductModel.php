<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table = 'product';
    protected $useTimestamps = true;
    protected $primaryKey = 'pro_id';
    protected $allowedFields = ['pro_category','pro_slug','pro_client','pro_url','pro_nameUrl','pro_image','pro_detail'];
    
    public function getProduct($pro_slug = false){
      if($pro_slug == false){
        return $this->findAll();
      } 

      return $this->where(['pro_slug' =>$pro_slug])->first();
    }
}