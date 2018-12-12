<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web_modal extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  function adduser() {
$data = array(
  'userid' => $this->input->post("userid"),
  'useremail' => $this->input->post("useremail"),
  'password' => $this->input->post("userpassword"),
  'username' => $this->input->post("username")
  );
$this->db->insert('user', $data);

$lastuserid = $this->db->insert_id();


return 1;
}

  function login($username, $password)
  {
    $sql = "select useremail from User where username ='$username' AND password='$password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)

    {
      return 1;
    }
    else {
      return 0;
    }
    }
    function loginadmin($admincode)
    {
      $sql = "select admincode from admin where $admincode='101'";
      $query = $this->db->query($sql);
      if(count($query->result()) == 1)
       {
        return $query->row()->admincode;
      }
      else {
        return 0;
      }
      }
}
