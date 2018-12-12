<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

		public function __construct() {
	    parent::__construct();
      $this->load->model('adminmodal');

			$this->load->helper('url');

	  }
public function reserchadminresult()
{

    $this->load->view('admin-reserchresult');

}

public function reserchtitleadmin ()
{
  if($this->input->post("itemtitle"))
  {
    $result = $this->adminmodal->searchcontantbytitle($this->input->post("itemtitle"));
    $data = array();
    $data['searchresult'] = $result;
    $this->load->view('admin-reserchresult',$data);
  }
  else
  {
    $this->load->view('admin-reserchresult');
  }
  }

public function reserchauthernameadmin() {

    if($this->input->post("AutherName"))
    {
      $result = $this->adminmodal->searchietmsbyautername($this->input->post("AutherName"));
      $data = array();
      $data['searchresult'] = $result;
      $this->load->view('try',$data);
    }
    else
    {
      $this->load->view('try');
    }
    }

    public function reserchadmin()
    {

        $this->load->view('adminreserch');

    }

		public function addbookresult()
		{
			if($this->input->post("studentName") || $this->input->post("studentAge") || $this->input->post("studentMajor"))
			{
				$result = $this->student_model->addStudent();
				$data = array();
				$data['result'] = $result;
				$this->load->view('add_student_result',$data);
			}
		}
		public function add_book()
		{
			$result=$this->adminmodal->getauther();
			$data['autherList'] = $result;
			$result=$this->adminmodal->getgenreq();
			$data['generList'] = $result;
			$this->load->view('add',$data);
		}
		public function add_book_result()
		{
			if($this->input->post("IsbnNnumber") || $this->input->post("ItemTitle") || $this->input->post("NumberPage")|| $this->input->post("printdate") ||$this->input->post("FormType") ||$this->input->post("publishingdate") ||	 $this->input->post("bestcollection")
			||$this->input->post("EditionNumber") ||$this->input->post("FormType"))
			{
				$result = $this->adminmodal->addbook();
				$data = array();
				$data['result'] = $result;
				$this->load->view('add-result',$data);
			}
		}
		public function editbook($isbnnumber)
		{
			$result = $this->adminmodal->getauther();
			$data['autherList'] = $result;
			$result = $this->adminmodal->getgenreq();
			$data['genreList'] = $result;
			$result = $this->adminmodal->getisbnnumber($isbnnumber);
			$data['contant'] = array_pop($result);
			$result = $this->adminmodal->getautherbyID($autherid);
			$data['auther'] = $result;
			$result = $this->adminmodal->getgenrebyID($genreid);
			$data['genre'] = $result;
			$this->load->view('edit',$data);
		}
		public function add_auther ()
		{
			if($this->input->post("AutherId") || $this->input->post("AutherName") )
			{
				$result = $this->adminmodal->add_auther();
				$data = array();
				$data['result'] = $result;
				$this->load->view('addautherresult',$data);
	}
	else
	{
		$this->load->view('addautherresult');
	}
/*public function add_genre ()
	{
		if($this->input->post("GenreId") || $this->input->post("genretype") )
		{
			$result = $this->adminmodal->add_genre();
			$data = array();
			$data['result'] = $result;
			$this->load->view('addgenreresult',$data);
}
else
{
	*/
	$this->load->view('addautherresult');
}
	public function addauthor()
	{
		$this->load->view('addauther');
	}
	public function addgenre()
	{
		$this->load->view('addgenre');
	}
	public function genre()
	{
		$this->load->view('adminge');
	}
	public function auther()
	{
		$this->load->view('adminaut');
	}
/*	public function addgenre()
	{
		$this->load->view('addgenre');
	}
	*/
	public function linc()
	{
		$this->load->view('addlinc');
	}

		public function delate()
		{
		$result= $this->adminmodal->delateitem($IsbnNnumber);
		$data[contant]= $this->adminmodal->getcontant();
		$data[edition]= $this->adminmodal->getedition();
		$this->load->view('admin-reserch',$data);
		}
		public function updateStudent()
		{

			if($this->input->post("IsbnNnumber") || $this->input->post("ItemTitle") || $this->input->post("NumberPage")|| $this->input->post("printdate") ||$this->input->post("FormType") ||$this->input->post("publishingdate") ||	 $this->input->post("bestcollection")
						||$this->input->post("EditionNumber") ||$this->input->post("FormType"))
			{
				$result = $this->adminmodal->updatbook();
				$data = array();
				$data['result'] = $result;
				$this->load->view('edit-result',$data);

    }
	}
}
