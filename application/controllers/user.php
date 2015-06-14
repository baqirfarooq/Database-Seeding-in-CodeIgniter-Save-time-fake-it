<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
 		 // initiate faker
        $this->faker = Faker\Factory::create();
 		
 		 // load any required models
        $this->load->model('user_model');
    }
 	
 	function index()
 	{
 		$data['users'] = $this->user_model->get();
 		$this->load->view('users', $data);
 	}
    /**
     * seed local database
     */
    function seed()
    {
        // purge existing data
        $this->_truncate_db();
 
        // seed users
        $this->_seed_users(25);
 
        // call more seeds here...
    }
 
    /**
     * seed users
     *
     * @param int $limit
     */
    function _seed_users($limit)
    {
     
 
        // create a bunch of base buyer accounts
        for ($i = 0; $i < $limit; $i++) {
          
 
            $data = array(
                'username' => $this->faker->unique()->userName, // get a unique nickname
                'password' => md5('12345'), // run this via your password hashing function
                'firstname' => $this->faker->firstName,
                'lastName' => $this->faker->lastName,
                'gender' => rand(0, 1) ? 'male' : 'female',
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, rem, est! Omnis perferendis, nisi obcaecati modi aliquam, neque! Culpa quia, animi itaque numquam praesentium nemo ut repudiandae eius, debitis nulla.',
                'address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'country' => $this->faker->country,
                'postcode' => $this->faker->postcode,
                'email' => $this->faker->email,
                'email_verified' => mt_rand(0, 1) ? '0' : '1',
                'phone' => $this->faker->phoneNumber,
                'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'registration_date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                'ip_address' => mt_rand(0, 1) ? $this->faker->ipv4 : $this->faker->ipv6,
                'status' => $i === 0 ? true : rand(0, 1),
            );
 
            $this->user_model->insert($data);
        }
 		$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        redirect('user/index', 'location');
    }
 
    private function _truncate_db()
    {
        $this->user_model->truncate();
    }



}

/* End of file user.php */
/* Location: ./application/controllers/user.php */