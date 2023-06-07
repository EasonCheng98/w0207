<?php
    class Frontend extends CI_Controller
    {
        private $data = [];

        public function __construct()
        {
            parent::__construct();
            $this->load->model("Product_model");
            $this->load->model("Cart_model");

            $sid = session_id();

            $this->data['cartTotal']= $this->Cart_model->record_count(array(
                'sid' => $sid,
                'is_deleted' => 0,
            ));

            $this->data['cartList'] = $this->Cart_model->get_where(array(
                'sid' => $sid,
                'is_deleted' => 0,
            ));
        }
        
        public function home()
        {
            $this->data['arrivalList'] = $this->Product_model->get_where(array('latest'=>1, ));
            $this->data['featuredList'] = $this->Product_model->get_where(array('featured'=>1, ));
            $this->data['topsellList'] = $this->Product_model->get_where(array('topsell'=>1, ));

            //$data = [ 'arrivalList'=>$arrivalList, 'featuredList'=>$featuredList, 'topsellList'=>$topsellList,];
            //$this->data['arrivalList'] = $arrivalList;
            //$this->data['featuredList'] = $featuredList;
            //$this->data['topsellList'] = $topsellList;
            
            $this->load->view("header", $this->data);
            $this->load->view("home", $this->data);
            $this->load->view("footer",$this->data);       
         }


        public function product_list($page=1)
        {
            $sql = array();

            /* SELECT * FROM tablename WHERE ....LIMT start, item_per_page
            page = 1, start = (1-1)*10 = 0
            page = 2, start = (2-1)*10 = 10
            page = 1, start = (3-1)*10 = 20
            */

            $item_per_page = 10;
            $start = ($page - 1) * $item_per_page;
            $total_records = $this->Product_model->record_count($sql);

            $this->data['product_list'] = $this->Product_model->fetch($sql, $start, $item_per_page);

            $this->load->library('pagination');
            $config['base_url']= base_url('product_list') ;
            $config['total_rows']= $total_records ;
            $config['per_page']= $item_per_page ;
            $config['use_page_numbers']= true ;
            $config['full_tag_open']= "<ul class='pagination'>" ;
            $config['full_tag_close']= "</ul>"  ;

            $config['first_link']= "First" ;
            $config['first_tag_open']= "<li>" ;
            $config['first_tag_close']= "</li>" ;

            $config['last_link']= "Last" ;
            $config['last_tag_open']= "<li>" ;
            $config['last_tag_close']= "</li>" ;

            $config['prev_link']= "<i class ='fa fa-angle-left'></i>";
            $config['prev_tag_open']= "<li>" ;
            $config['prev_tag_close']= "</li>" ;

            $config['next_link']= "<i class ='fa fa-angle-right'></i>";
            $config['next_tag_open']= "<li>" ;
            $config['next_tag_close']= "</li>" ;

            $config['num_tag_open']= "<li>" ;
            $config['num_tag_close']= "</li>" ;
            $config['cur_tag_open']= '<li class="active"><a href="#">' ;
            $config['cur_tag_close']= "</a></li>" ;
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();

            




            $this->data['arrivalList'] = $this->Product_model->get_where(array('latest'=>1, ));
            $this->data['featuredList'] = $this->Product_model->get_where(array('featured'=>1, ));
            $this->data['topsellList'] = $this->Product_model->get_where(array('topsell'=>1, ));

            //$data['productList'] = $productList;
            //$this->$data['productList'] = $productList ;

            $this->load->view("header", $this->data);
            $this->load->view("product_list", $this->data);
            $this->load->view("footer", $this->data);


        }

        public function product_detail($product_id)
        {
            
            $this->data['productData'] = $this->Product_model->getOne(array('id'=>$product_id));

            //$data = ['productData' => $productdata];
            //$this->data['productData'] = $productdata ;

            $this->load->view("header", $this->data);
            $this->load->view("product_detail",$this->data);
            $this->load->view("footer", $this->data);
        }

        public function addCart()
        {
            $sid = session_id();

            $product_id = $this->input->post("product_id", true);
            $qty        = $this->input->post("qty", true);

            

            $productData = $this->Product_model->getOne(array('id'=> $product_id,));

            $cartExists = $this->Cart_model->getOne(array(
                'sid' => $sid,
                'product_id' => $product_id,
            ));

            if(empty($cartExists))
            {
            $this->Cart_model->insert(array(
                'sid' => $sid,
                'product_id'=> $product_id,
                'product_title'=> $productData['title'],
                'qty'=> $qty,
                'product_price'=> $productData['price'],
                'created_date'=> date("Y-m-d H:i:s")
            ));
            }
            else 
            {
                $this->Cart_model->update(array('id' => $cartExists['id']), 
                array(
                    'qty'=> ($cartExists['qty']+$qty),
                    'modified_date'=> date("Y-m-d H:i:s")
                ));
            }

            $this->load->library("emailer");
            $this->emailer->sendmail("Someone Add Cart", "Yeah! Someone Add cart");

            redirect(base_url('product_detail/'.$product_id));


        }
    } 

?>