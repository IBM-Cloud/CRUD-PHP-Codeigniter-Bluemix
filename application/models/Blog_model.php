<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record_count() {
        return $this->db->count_all("bloginfo");
    }

    function myFunc($limit, $start)
    {
      $this->db->limit($limit, $start);
      $data = $this->db->get('bloginfo');
      return $data->result_array();
    }
    function insertblog($field)
      {
      	$data=array('title'=>$field['title'],
      		'description'=>$field['description'],
      		'image'=>$field['blogimage'],
      		'created_date'=>date('Y-m-d')
      		);

      	if($field['blogimage']!= "") {

					$config['upload_path'] = 'assets/blogimages/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name']	= $field['blogimage'];
					$config['max_size']	= '500';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('blogimage'))
					{
						echo $error = $this->upload->display_errors();
						 /*?>print_r("<script>alert('".$error."');
								location.href='./';</script>");<?php */
					}
					else
					{
						$success1 = true;
					}
				}



      	$this->db->insert('bloginfo',$data);
      	return true;
      }

      function bloginfo($blog_id)
      {
      	$this->db->select('*');
      	$this->db->from('bloginfo');
      	$this->db->where('id',$blog_id);
      	$result=$this->db->get();
      	return $data=$result->result_array();
      }

      function updateblog($field)
      {
        if($field['blogimage']!="")
        {
        $data=array('title'=>$field['title'],
          'description'=>$field['description'],
          'image'=>$field['blogimage']
          );
        }
        else
        {
        $data=array('title'=>$field['title'],
          'description'=>$field['description']
          );
        }

        if($field['blogimage']!= "") {

          $config['upload_path'] = 'assets/blogimages/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['file_name']  = $field['blogimage'];
          $config['max_size'] = '500';
          $config['max_width']  = '1024';
          $config['max_height']  = '768';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('blogimage'))
          {
            echo $error = $this->upload->display_errors();
             /*?>print_r("<script>alert('".$error."');
                location.href='./';</script>");<?php */
          }
          else
          {
            $success1 = true;
          }
        }


    $this->db->where('id',$field['blog_id']);
        $this->db->update('bloginfo',$data);
        return true;
      }

      function delete($blog_id)
      {
        $data = $this->db->get_where('bloginfo',array('id'=>$blog_id));
        if($data->num_rows() > 0)
        {
          foreach($data->result_array() as $data1)
            $image = $data1['image'];
            if(!empty($image))
            {
              $url = "/home/g7ill70/public_html/BluemixCode/assets/blogimages/".$image;
                if(file_exists($url)){
                    unlink($url);
                }
            }

            $query = $this->db->delete('bloginfo',array('id'=>$blog_id));
            if($query)
            {
              return "Record Removed";
            }
            else
            {
              return "Something went wrong!";
            }
        }
        else
        {
          return "Incorrect Id";
        }
      }

       function insertblogapi($field)
      {
        $data=array('title'=>$field['title'],
          'description'=>$field['description'],
          'created_date'=>date('Y-m-d')
          );
        $this->db->insert('bloginfo',$data);
        return "Inserted Successfully";
      }

      
    }
    ?>