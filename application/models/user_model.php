<?php  
 class user_model extends CI_Model  
 {  
      var $table = "user";  
      var $select_column = array("id", "first_name", "last_name", "image");  
      var $order_column = array(null, "first_name", "last_name", null, null);  

    

     function insert_data($table,$arr)
         {
            $this->db->insert('user',$arr);  
          
        }

     function update_data($table,$update_arr,$id)
         {    
    
              $this->db->where('id',$id);
              $update = $this->db->update('user',$update_arr);
         }

      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           
           if($this->db->where('is_deleted',0))
            {
              return true;
            }
              else
            {
              return false;
            }
            
           if(isset($_POST["search"]["value"]))  
           {  
                //for search tab
                $this->db->like("first_name", $_POST["search"]["value"]);  
                $this->db->or_like("last_name", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){ 

           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
            // $q = "select * from $table where is_deleted = 0 ";
            // $query = $this->db->query($q);
           $query = $this->db->get();
           //echo $this->db->last_query();exit;
           return $query->result();  
             
      }  
      function get_filtered_data(){  
           $this->make_query();  
        
             $query = $this->db->get();  
             // echo $this->db->last_query();exit;
             return $query->num_rows();  
      }       
      function get_all_data()  
      {  

           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  

  public function delete($table,$update_arr,$id)
    {
        $this->db->where('id',$id);
        $update = $this->db->update('user',$update_arr);

    }

 }  