<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function index()
    {
        $data['products'] = $this->ProductModel->get_all_products();
        $this->call->view('products/index', $data);
    }

    public function create()
    {
        if ($this->io->method() === 'post') {

            $data = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'      => $this->io->post('quantity')
            ];

            $this->ProductModel->create_product($data);

            $this->redirect_to('/products');
        }

        $this->call->view('products/create');
    }

    public function edit($id)
    {
        $data['product'] = $this->ProductModel->get_product($id);

        if (empty($data['product'])) {
            show_404();
            return;
        }

        if ($this->io->method() === 'post') {

            $update = [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'      => $this->io->post('quantity')
            ];

            $this->ProductModel->update_product($id, $update);

            $this->redirect_to('/products');
        }

        $this->call->view('products/edit', $data);
    }

    public function delete($id)
    {
        if ($this->io->method() !== 'post') {
            show_404();
            return;
        }

        $this->ProductModel->delete_product($id);

        $this->redirect_to('/products');
    }

    private function redirect_to($path)
    {
        header('Location: ' . $path, true, 302);
        exit;
    }
}
?>
