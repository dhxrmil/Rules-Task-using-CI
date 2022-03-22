<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('loginmod');
	}

	public function index()
	{
		//$this->load->view('ruleform');
		$this->load->view('login');
	}
	
	public function ruleform()
	{
		$this->load->view('ruleform');
	}


	  public function check()
	  {	
			$email = $this->input->POST('email');
			$password = $this->input->POST('password');
			$query = $this->db->get_where('usertbl', ['email' => $email, 'password' => $password]);
			$try = $query->result_array();
			$result = sizeof($try);
			if ($result == 0) 
			{
				echo "<h3><center><div style ='color:red;'>Credentials are Invalid!</div></center></h3>";
				$this->load->view('login');
			} 
			else 
			{
				//echo "fgdhv";exit;
				$data = array('id' => $try[0]['id'], 'email' => $email);
				// echo "<pre>"; print_r($data); exit;
				$this->session->set_userdata($data);
				//redirect('fetch');
				redirect('Welcome/showDataOfQuePage');   				
			  }		
	  }

	  public function fetch()  
      {
		$abc = $this->session->userdata('id');
		//print_r($abc);exit;
		if(empty($abc))
		{
			$this->load->view('login');
		}
		else
		{
			
		 
			$this->load->view('fetch'); 
		}
	  }
	   
	 /*  public function show()
	  {
		  $this->loginmod->button();
		  //$data['data'] = $this->loginmod->show_item();
		  $this->load->view('fetch');
	  } */
		
	  public function quesans()
	  {
		  $this->load->view('qaform');
	  }

	  public function ruleforms()
    {
        $data['data'] = $this->loginmod->getDataForAddpoints();
        // echo"<pre>";  print_r($data); exit;
        $this->load->view('ruleform', $data);
    }

	  public function addqa()
    {
        $getId = $this->session->userdata('id');
        // echo "<pre>"; print_r($abc); exit;
        $id_sel = $getId;
        //echo $id_sel;
        $ab = array(
            'sport' => $this->input->post('sport'),
            'sportsman' => $this->input->post('sportsman'),
            'gamertag' => $this->input->post('gamertag'),
            'user_id' => $id_sel
        );
        //echo "<pre>";print_r($que);exit;
        $this->loginmod->insertque($ab);
        redirect("qaform");
    }

	public function rules()
	{
		$this->load->view('ruleform');
		$rulearray = array(
            'rule' => $this->input->post('rules'),
            'points' => $this->input->post('points'),
        ); 
		//echo "<pre>"; print_r($rulearray); exit;
		$this->loginmod->insertrules($rulearray);
		redirect('ruleform');
	}

	public function showDataOfQuepage()
    {
        $data['list'] = $this->loginmod->getDataForQuepage();
	   	$r = $this->session->userdata('id');
	//	echo"<pre>";  print_r($this->session->userdata()); exit;
	   	$data['done'] = $this->loginmod->user($this->session->userdata('id'));
        $this->load->view('fetch',$data);
    }


	public function storePost()
    {
        $x = $this->input->post('rules');
		//echo "<pre>"; print_r($x); exit;
        $y = $this->input->post('points');
		//echo "<pre>"; print_r($y); exit;
       	$z = array_replace_recursive($x,$y);
		//echo "<pre>"; print_r($z); exit;

        if(!empty($z)){
            foreach ($z as $key => $value)
            {
                $this->db->insert('ruletable',$value);
            }
        }

        redirect('Welcome/ruleforms');
    }


	public function back()
	{
		redirect('fetch');
	}
	  public function logout()
	  {
		  redirect('Welcome/login');
	  }
}

