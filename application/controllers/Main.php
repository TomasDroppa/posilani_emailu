<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author zdrh
 */
class Main extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function page1() {
        $this->load->helper('form');
        $this->load->view('contact_email_form');
    }
    public function send_mail() {
        $from_email = "email@example.com";
        $to_email = $this->input->post('email');
        $file = $this->input->post('file');
        //Load email library
        $this->load->library('email');
        $from = $this->config->item('smtp_user'); 
        $this->email->set_newline("\r\n");
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        $this->email->attach('C:\Users\droppa_tomas\Desktop\pozvánka_vizitka.png');

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
            echo json_encode($file);
        } else {
            show_error($this->email->print_debugger());
        }
        //Send mail
        

        $this->load->view('contact_email_form');
        
       }



}
