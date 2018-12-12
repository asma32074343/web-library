<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminmodal extends CI_Model {
  function __construct() {
    parent::__construct();
  }


  function searchcontantbytitle($itemtitle) {
    $sql = "select contant.IsbnNnumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,edition.EditionNumber,edition.publishingdate,edition.printdate, form.FormType ,genre.GenerType ,auther.AutherName from ( ( (( (contant INNER join edition on contant.IsbnNnumber=edition.contant_IsbnNnumber) inner join form on form.contant_IsbnNnumber = contant.IsbnNnumber) INNER JOIN genre_has_contant on genre_has_contant.contant_IsbnNnumber=contant.IsbnNnumber) INNER JOIN genre ON genre.GenerType=genre_has_contant.genre_GenerType)INNER JOIN contant_has_auther on contant_has_auther.contant_IsbnNnumber=contant.IsbnNnumber)INNER JOIN auther ON auther.AutherId=contant_has_auther.auther_AutherId  where itemtitle LIKE '%{$itemtitle}%'";
    $query = $this->db->query($sql, $itemtitle);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }

    return $results;
  }
  function searchietmsbyautername($AutherName) {
    $sql = "select contant.IsbnNnumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,edition.EditionNumber,edition.publishingdate,edition.printdate, form.FormType ,genre.GenerType ,auther.AutherName from ( ( (( (contant INNER join edition on contant.IsbnNnumber=edition.contant_IsbnNnumber) inner join form on form.contant_IsbnNnumber = contant.IsbnNnumber) INNER JOIN genre_has_contant on genre_has_contant.contant_IsbnNnumber=contant.IsbnNnumber) INNER JOIN genre ON genre.GenerType=genre_has_contant.genre_GenerType)
    INNER JOIN contant_has_auther on contant_has_auther.contant_IsbnNnumber=contant.IsbnNnumber)
    INNER JOIN auther ON auther.AutherId=contant_has_auther.auther_AutherId
     where authername LIKE '%{$AutherName}%'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function searchcontantbygenre($GenerType	) {
    $sql = "select contant.IsbnNnumber,contant.ItemTitle,contant.NumberPage,contant.bestcollection,edition.EditionNumber,edition.publishingdate,edition.printdate, form.FormType ,genre.GenerType ,auther.AutherName from ( ( (( (contant INNER join edition on contant.IsbnNnumber=edition.contant_IsbnNnumber) inner join form on form.contant_IsbnNnumber = contant.IsbnNnumber) INNER JOIN genre_has_contant on genre_has_contant.contant_IsbnNnumber=contant.IsbnNnumber) INNER JOIN genre ON genre.GenerType=genre_has_contant.genre_GenerType)INNER JOIN contant_has_auther on contant_has_auther.contant_IsbnNnumber=contant.IsbnNnumber)INNER JOIN auther ON auther.AutherId=contant_has_auther.auther_AutherId  where GenerType LIKE '%{$GenerType	}%'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


  function getisbnnumber($isbnnumber)
  {
    $sql = "select * from contant where IsbnNnumber=$isbnnumber";
    $query = $this->db->query($sql);
    return $query->result();
  }
  function getgenrebyID($GenreId)
  {
    $sql = "SELECT * FROM `genre` WHERE GenreId='$GenreId'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function  getautherbyID($autherid)
  {
    $sql = " SELECT* FROM `auther` WHERE autherid='$autherid'";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function addbook() {
    $data = array(
      'printdate' => $this->input->post("printdate"),
      'publishingdate' => $this->input->post("publishingdate"),
      'EditionNumber' => $this->input->post("EditionNumber")
    );
      $this->db->insert('edition',$data);
      $data=array(
            'IsbnNnumber' => $this->input->post("IsbnNnumber"),
            'ItemTitle' => $this->input->post("ItemTitle"),
            'NumberPage' => $this->input->post("NumberPage"),
          ' bestcollection'=>$this->input->post(" bestcollection")
    );
    $this->db->insert('contant',$data);

    $lastIsbnNnumber = $this->db->insert_id();

    $AutherName = $this->input->post("AutherName");
      foreach($AutherName as $AutherName)
      {
        $data = array(
                'IsbnNnumber' => $lastIsbnNnumber,
                'AutherId' => $AutherName,
        );
        $this->db->insert('auther', $data);


    $GenerType = $this->input->post("GenerType");
      foreach($GenerType as $GenerType)
      {
        $data = array(
                'IsbnNnumber' => $lastIsbnNnumber,
                'GenreId' => $GenerType,
        );
        $this->db->insert('genre', $data);
      }

      return 1;
    }


  function getedition() {
    $sql = "select * from edition";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function getbestcollection() {
    $sql = "select * from contant";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function getform() {
    $sql = "select * from form";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function getauther() {
    $sql = "select * from auther";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function getcontant() {
    $sql = "select * from contant";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function getedition() {
    $sql = "select * from edition";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function   delateitem()
    {
      $this->db->from("contant");
      $this->db->join("edition", "contant.IsbnNnumber = edition.contant_IsbnNnumber");
      $this->db->where("edition.contant_IsbnNnumber", $lastIsbnNnumber);
      $this->db->delete("contant");

    }
  function getgener() {
  $data = array(
  'GenreId' => $this->input->post("GenreId"),
  'GenerType' => $this->input->post("GenerType")

  );
  $this->db->insert('genre', $data);

  $lastgenreid = $this->db->insert_id();


  return 1;
  }
  function getgenreq() {
    $sql = "select * from genre";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  function addaut() {
$data = array(
  'userid' => $this->input->post("AutherId"),
  'useremail' => $this->input->post("AutherName")

  );
$this->db->insert('auther', $data);

$lastuserid = $this->db->insert_id();


return 1;
}
}
}
