<?php

class loginmod extends CI_Model
{
    /* public function insertqa($ab)
    {
        //echo "<pre>"; print_r($ab);exit;
        $this->db->insert('qatable', $ab);
    } */

    function getDataForAddpoints()
    {
      // echo "hello"; exit;
    $query = $this->db->get('ruletable');
    return  $query->result_array();
    // echo "<pre>"; print_r($x); exit;
    }

    public function insertrules($rulearray)
    {
        $this->db->insert('ruletable', $rulearray);
    }

    public function insertque($ab)
    {
    $this->session->userdata('id');
    $setRules = $this->db->get('qatable');
    $total = $setRules->num_rows();

    $RulesPoints = 0;
    $point = 0;
    $data = $this->db->get('ruletable');
    $result = $data->result_array();
    if(empty($result))
    {    
    $getId =  $this->session->userdata('id');
    $id_sel = $getId;
    $que = array(
      'sport' => $this->input->post('sport'),
      'sportsman' => $this->input->post('sportsman'),
      'gamertag' => $this->input->post('gamertag'),
      'user_id' => $id_sel,
      'points' => 0
    );
    }else{
    foreach ($result as $rules) {
      $RulesPoints = $RulesPoints + $rules['rule'];

      if ($total < $RulesPoints) {
        $point = $rules['points'];
        break;
      }
    }
    $list = $this->db->select("*")->limit(1)->order_by('id', "DESC")->get("ruletable")->row();
    if ($point == 0) {
     $point = $list->points;
    }

    //echo $a;exit;
    $getId =  $this->session->userdata('id');
    $id_sel = $getId;
    $que = array(
      'sport' => $this->input->post('sport'),
      'sportsman' => $this->input->post('sportsman'),
      'gamertag' => $this->input->post('gamertag'),
      'user_id' => $id_sel,
      'points' => $point
    );
  }
    $this->db->insert('qatable', $que);
  }

  public function getanswers()
  {
    $query = $this->db->get('qatable');
    return $query->result_array();
  }


   function getDataForQuepage()
  {
    $this->db->select('u.id,q.*');
    $this->db->from('qatable q');
    $this->db->join('usertbl u', 'u.id = q.user_id', 'left');
    $query = $this->db->get();
    //  echo $this->db->last_query();exit;
    return $query->result_array();
  } 

  public function user($id)
  {
    $query = $this->db->get_where('qatable', array('user_id' => $id));
    echo $this->db->last_query();
    //print_r($query->row_array()); exit;
    return $query->row_array();
  }
}

