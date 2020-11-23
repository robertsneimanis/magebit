<?php
  class Subscribes extends Controller {
    public function __construct(){
      $this->subscribeModel = $this->model('Subscribe');
    }

    public function index(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'email' => trim($_POST['email']),
          'terms' => isset($_POST['terms']) ? 'checked' : '',
          'email_err' => '',
          'terms_err' => ''
        ];

        if(empty($data['email'])){
          $data['email_err'] = 'Email address is required';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_err'] = 'Please provide a valid e-mail address';
        } else if (substr($data['email'], strrpos($data['email'], '.') + 1) == 'co') {
          $data['email_err'] = 'We are not accepting subscriptions from Colombia';
        }

        if(!isset($_POST['terms'])){
          $data['terms_err'] = 'You must accept the terms and conditions';
        }

        if(empty($data['email_err']) && empty($data['terms_err'])){
          if($this->subscribeModel->addSubscriber($data)){
            header('location: ' . URLROOT . '/subscribes/registered');
          } else {
            die('Something went wrong');
          }
        } else {
          $this->view('subscribe/index', $data);
        }

      } else {
        $data = [
          'email' => '',
          'terms' => '',
          'email_err' => '',
          'terms_err' => ''
        ];

        $this->view('subscribe/index', $data);
      }
    }

    public function registered(){
      $this->view('subscribe/registered');
    }

    public function list(){
      $products = $this->subscribeModel->getSubscribers();

      $data = [
        'subscribers' => $products
      ];

      $this->view('subscribe/list', $data);
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->subscribeModel->deleteSubscriber($id)){
          header('location: ' . URLROOT . '/subscribes/list');
        } else {
          die('Something went wrong');
        }
      }
    }
  }
