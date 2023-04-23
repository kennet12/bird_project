<?
class Gio_hang extends CI_Controller {
    var $_breadcrumb = array();

    function __construct() {
        parent::__construct();
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url()));
    }

    public function index() {
        $this->_breadcrumb = array_merge($this->_breadcrumb, array("Giỏ hàng" => site_url($this->util->slug($this->router->fetch_class()))));
        
        $view_data = array();
		$view_data['carts'] 		= $this->cart->contents();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("cart/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
    }

    public function them() {
        $productId = $_POST['productId'];
        $qty = $_POST['qty']; // post du lieu

        if (empty($productId) || empty($qty)) { //  kiem tra productId,qty khac rong
            echo json_encode(false);
        } else {
            $product = $this->m_product->load($productId); // load product trong co so du lieu ra
            if (!empty($product)) {
                $info = new stdClass();
                $info->product_id = $product->id;
                $image = $this->m_product_gallery->items($info,1);
                $product->image = !empty($image)?$image[0]->thumbnail:null; // lay danh hinh anh chi tiết của sản phẩm

                $data = array(
                    'id'        => $product->id,
                    'qty'       => $qty,
                    'price'     => $product->price,
                    'name'      => str_replace('%','',$product->title),
                    'thumbnail' => $product->image
                );
                $this->cart->insert($data); // insert gio hang
                $carts = $this->cart->contents();// lay danh sach gio hang

                setcookie('basa_cart', json_encode($carts), time() + (86400 * 30), "/");

                echo json_encode($carts); 
            } else {
                echo json_encode(false); 
            }
        }
    }

    public function cap_nhat() {
        $rowId = $_POST['rowId'];// post du lieu rowId 
        $qty = $_POST['qty'];

        if (empty($rowId) || empty($qty) || ($qty < 1)) { //kiem tra rowId,qty khac rong
            echo json_encode(false);
        } else {
            $data = array(
                'rowid' => $rowId,
                'qty'   => $qty
            );
            if($this->cart->update($data)) { // update gio hang
                $carts = $this->cart->contents();// lay danh sach gio hang
                setcookie('basa_cart', json_encode($carts), time() + (86400 * 30), "/");
                $total = $this->cart->total();
                echo json_encode([$carts, $total]); 
            } else {
                echo json_encode(false); 
            }
        }
    }

    public function xoa() {
        $rowId = $_POST['rowId']; // post du lieu rowId 
        if (empty($rowId)) { // kiem tra rowId khac rong
            echo json_encode(false);
        } else {
            if($this->cart->remove($rowId)) { // xoa gio hang
                $carts = $this->cart->contents();// lay danh sach gio hang
                setcookie('basa_cart', json_encode($carts), time() + (86400 * 30), "/"); // luu cookie vao brower
                echo json_encode($carts); 
            } else {
                echo json_encode(false);
            }
        }
    }
}