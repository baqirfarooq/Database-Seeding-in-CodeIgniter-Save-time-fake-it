<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {
  	

    protected $faker;
    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker\Factory::create();
    }

	// form validation
	public function _seed() {
	
		$this->db->empty_table('user');  //optional 
		foreach (range(1, 10) as $index) {
		
			$title = $this->faker->company;
			$data_seed = [
				  'username' => $this->faker->unique()->userName, // get a unique nickname
                'password' => 'awesomepassword', // run this via your password hashing function
                'firstname' => $this->faker->firstName,
                'lastName' => $this->faker->lastName,
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
			];
			$this->db->insert('user', $data_seed);
			echo "Fake Record Added: " . $data_seed['username'] . "<br>";
		}

	}

}

/* End of file company_model.php */
/* Location: ./application/models/company_model.php */