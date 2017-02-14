<?php

class Admin extends CI_Controller {

    public function index($page = 'admin') {
        if (!file_exists(APPPATH . 'views/admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

}
