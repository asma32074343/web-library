<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class webweb_modal extends CI_Model {
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




}
