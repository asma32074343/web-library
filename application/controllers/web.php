<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class web extends CI_Controller {

		public function __construct() {
	    parent::__construct();
      $this->load->model('webweb_modal');
      $this->load->model('web_modal');
			$this->load->helper('url');
      $this->load->library('table');
	  }


	public function index()
	{
		$this->load->view('homepage');
	}
	public function youareadminadmin()
	{
		$this->load->view('youareadmin');
	}
	public function admin()
	{
		$this->load->view('showadmin');
	}
	public function user()
	{
		$this->load->view('showuser');
	}
	public function creatcount()
	{
	$this->load->view('showcreatcount');
	}
	public function addd()
	{
	$this->load->view('add');
	}


	public function creatcountresult ()
	{
		if($this->input->post("name") || $this->input->post("useremail") || $this->input->post("username")|| $this->input->post("password")|| $this->input->post("userid"))
		{
			$result = $this->web_modal->adduser();
			$data = array();
			$data['result'] = $result;
			$this->load->view('showcreatcountresult',$data);
}
else
{
	$this->load->view('showcreatcountresult');
}
	}
	public function userlogin()
	{
		$this->load->view('login');
	}

		public function loginrequest()
		{
				 $result = $this->web_modal->login($this->input->post("username"),$this->input->post("userpassword"));
			 if($result == 0)
			 {
					echo "username or user incorect" ;
			 }
			else
			{
				 $this->session->set_userdata('isuserloggedin', 'true');
				 $this->session->set_userdata('username', $result);
				 redirect('/web/reserch');
			 }
		}

		public function loginrequestadmin()
		{



				$result = $this->web_modal->loginadmin($this->input->post("admincode"));
			if($result!=0)
			{
				$this->session->set_userdata('isuserloggedin', 'true');
				$this->session->set_userdata('admincode', $result);
				redirect('/web/youareadminadmin');
			}
			else
			 {
				 echo "code incorect" ;
				}
			}
				public function reserch()
				{

						$this->load->view('showreserch');

				}

				public function reserchtitle ()
				{
				  if($this->input->post("itemtitle"))
				  {
				    $result = $this->webweb_modal->searchcontantbytitle($this->input->post("itemtitle"));
				    $data = array();
				    $data['searchresult'] = $result;
				    $this->load->view('showresult',$data);
				  }
				  else
				  {
				    $this->load->view('showresult');
				  }
					}

   public function x() {

				    if($this->input->post("AutherName"))
				    {
				      $result = $this->webweb_modal->searchietmsbyautername($this->input->post("AutherName"));
				      $data = array();
				      $data['searchresult'] = $result;
							//print_r($data['searchresult']);
				      $this->load->view('show',$data);
				    }
				    else
				    {
				      $this->load->view('show');
				    }
						}
						public function reserchgenre ()
						{
							if($this->input->post("genre"))
							{
								$result = $this->webweb_modal->searchcontantbygenre($this->input->post("genre"));
								$data = array();
								$data['searchresult'] = $result;
								$this->load->view('try',$data);
							}
							else
							{
								$this->load->view('try');
							}
							}


								public function logout()
								{
									$this->session->unset_userdata('isuserloggedin');
									$this->session->unset_userdata('userid');
									redirect('/web');
								}





		}
