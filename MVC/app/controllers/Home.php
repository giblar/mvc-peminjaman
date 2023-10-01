<?php 

class Home  extends Controller{
    public function index()
    {
        $data['judul'] = 'Home';
      
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}