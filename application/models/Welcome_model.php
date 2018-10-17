<?php

class Welcome_model extends CI_Model
{
	
    public function insert_record($para)
    {
        $this->db->insert('user_details',$para);
    	
    	
        if($this->db->insert_id())
        {

            $response = array(
                "rc" => TRUE,
                "msg" => "succesufully"
            );
        }
        else
        {
            $response = array(
                "rc" => FALSE,
                "msg" => "Failed"
            );   
        }

        return $response;
    }

    public function insert_cart_data($cart_data)
    {

        // $result_status = "";
        $userid=$this->db->insert_id();
    	foreach($cart_data as $val)
    	{
    		$qty=$val['qty'];
    		$name=$val['name'];
    		$price=$val['price'];

    		$data['user_id']=$userid;
    		$data['quantity']=$qty;
    		$data['product_name']=$name;
    		$data['total_price']=$price;
    		$this->db->insert('order_details',$data);

            // $result_status = TRUE;
        }

       
        $response = array(
                "rc" => TRUE,
                "msg" => "succesufully"
            ); 

        return $response;
        
    }
        
}
   
?>