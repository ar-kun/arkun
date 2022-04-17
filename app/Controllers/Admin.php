<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Admin extends BaseController
{
    // protected $PortoModel;
    protected $ProductModel;
    public function __construct()
    {
        // $this->PortoModel = new PortoModel();
        $this->ProductModel = new ProductModel();
    }
    

    public function admin(){
        // $product = $this->ProductModel->findAll();
        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product'):1;

        $data = [
            'title'=>'Admin | CV',
            'product'=> $this->ProductModel->paginate(10,'product'),
            'pager' => $this->ProductModel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/admin',$data);
    }

    public function create(){
        // session();
        $data =[
            'title'=> 'Form Tambah Data',
            'validation'=> \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }
    public function save(){
        // dd($this->request->getVar());

        // Validasi input
        if(!$this->validate([
            'pro_nameUrl' => [
                'rules' => 'required',
                'errors' =>[
                    'required'=>'Name URL harus diisi.'
                ]
                ],
            'pro_category'=> [
                'rules' => 'required',
                'errors' =>[
                    'required'=>'Category harus diisi.'
                ]
                ],
            'pro_image' =>[
                'rules' => 'max_size[pro_image,3075]|is_image[pro_image]|mime_in[pro_image,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size'=> 'Ukuran gambar tidak boleh lebih dari 3Mb',
                    'is_image'=> 'Yang anda pilih bukan Image',
                    'mime_in'=> 'Masukan Image jpg/jpeg/png'
                ]
            ]

        ])){
            // $validation = \Config\Services::validation();
            
            // return redirect()->to(base_url('/create'))->withInput()->with('validation', $validation);
            return redirect()->to(base_url('/create'))->withInput();
        }
        
        // Kelola image
        $fileImage = $this->request->getFile('pro_image');
        // Cek gambar ada apa tidak
        if($fileImage->getError() == 4){
            $namaImage = 'default.jpg';
        } else{
            $namaImage = $fileImage->getRandomName();
            $fileImage->move('assets/img/portfolio',$namaImage);
        }
        // $namaImage = $fileImage->getName();

        $pro_slug = url_title($this->request->getVar('pro_nameUrl'),'-',true);
        $this->ProductModel->save([
            'pro_category'=>$this->request->getVar('pro_category'),
            'pro_slug'=>$pro_slug,
            'pro_client'=>$this->request->getVar('pro_client'),
            'pro_url'=>$this->request->getVar('pro_url'),
            'pro_nameUrl'=>$this->request->getVar('pro_nameUrl'),
            'pro_image'=>$namaImage,
            'pro_detail'=>$this->request->getVar('pro_detail')
        ]);
        session()->setFlashdata('Pesan','Data Berhasil Ditambahkan~');
       
       return redirect()->to(base_url('/admin'));
    }
    public function delete($pro_id){
        // menghapus gambar
        $product = $this->ProductModel->find($pro_id);
        // gambar default
        if($product["pro_image"] != 'default.jpg'){
            unlink('assets/img/portfolio/'.$product["pro_image"]);
        }

        $this->ProductModel->delete($pro_id);
        session()->setFlashdata('Pesan','Data Berhasil Dihapus~');
        return redirect()->to(base_url('/admin'));
    }
    public function edit($pro_slug){
        $data =[
            'title'=> 'Form Edit Data',
            'validation'=> \Config\Services::validation(),
            'product' =>$this->ProductModel->getProduct($pro_slug)
        ];
        return view('admin/edit', $data);
    }
    public function update($pro_id){
        // dd($this->request->getVar());
        // Cek uniq
        $slugLama = $this->ProductModel->getProduct($this->request->getVar('pro_slug'));
        if($slugLama['pro_nameUrl'] == $this->request->getVar('pro_nameUrl')){
            $rule_judul = 'required';
        } else{
            $rule_judul = 'required|is_unique[product.pro_nameUrl]';
        }

        if(!$this->validate([
            'pro_nameUrl' => [
                'rules' => $rule_judul,
                'errors' =>[
                    'required'=>'Category harus diisi.'
                ]
                ],
            'pro_category'=> [
                'rules' => 'required',
                'errors' =>[
                    'required'=>'Category harus diisi.'
                ]
                ],
            'pro_image' =>[
                'rules' => 'max_size[pro_image,3075]|is_image[pro_image]|mime_in[pro_image,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size'=> 'Ukuran gambar tidak boleh lebih dari 3Mb',
                    'is_image'=> 'Yang anda pilih bukan Image',
                    'mime_in'=> 'Masukan Image jpg/jpeg/png'
                ]
            ]

        ])){       
            
            return redirect()->to(base_url('/edit'.$this->request->getVar('pro_slug')))->withInput();
        }

        $fileImage = $this->request->getFile('pro_image');
        // Cek gambar apa ganti
        if($fileImage->getError() == 4){
            $namaImage = $this->request->getVar('imgLama');
        } else{
            $namaImage = $fileImage->getRandomName();
            $fileImage->move('assets/img/portfolio',$namaImage);
            if($this->request->getVar('imgLama') != 'default.jpg'){
            unlink('assets/img/portfolio/'.$this->request->getVar('imgLama'));
            }
        }

         $pro_slug = url_title($this->request->getVar('pro_nameUrl'),'-',true);
        $this->ProductModel->save([
            'pro_id' => $pro_id,
            'pro_category'=>$this->request->getVar('pro_category'),
            'pro_slug'=>$pro_slug,
            'pro_client'=>$this->request->getVar('pro_client'),
            'pro_url'=>$this->request->getVar('pro_url'),
            'pro_nameUrl'=>$this->request->getVar('pro_nameUrl'),
            'pro_image'=>$namaImage,
            'pro_detail'=>$this->request->getVar('pro_detail')
        ]);
        session()->setFlashdata('Pesan','Data Berhasil Di Update~');
       
       return redirect()->to(base_url('/admin'));
    }
}