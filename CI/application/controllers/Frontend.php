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


        public function product_list()
        {
            
            $this->$data['productList'] =
            [
                ["id" => "1", "title" => "TV"],
                ["id" => "2", "title" => "HomeCooker"],
            ];

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
            };

            redirect(base_url('product_detail/'.$product_id));


        }
    } 

?>