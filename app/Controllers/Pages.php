<?php

namespace App\Controllers;

use App\Models\PortoModel;
use App\Models\ProductModel;

class Pages extends BaseController
{
    // protected $PortoModel;
    protected $ProductModel;
    public function __construct()
    {
        // $this->PortoModel = new PortoModel();
        $this->ProductModel = new ProductModel();
    }
    public function index()
    {
        $Porto = new PortoModel();
        // $product = $this->ProductModel->findAll();
        $data = [
            'title'=>'Home | Portofolio',
            'porto' => $Porto->getEdu(),
            'product'=> $this->ProductModel->getProduct()
        ];
        return view('pages/home',$data);
    }
    public function detail($pro_slug)
    {
        $data = [
            'title'=>'Detail | Portofolio',
            'product' => $this->ProductModel->getProduct($pro_slug)
        ];
        if(empty($data["product"])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Product '.$pro_slug.'Tidak Di Temukan');
        }
        return view('pages/detail',$data);
    }
}