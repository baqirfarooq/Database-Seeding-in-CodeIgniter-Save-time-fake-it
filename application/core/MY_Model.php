<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Model extends CI_Model
{

    protected $table_name;
    protected $primary_key = 'id';
    protected $order_by;
    protected $timestamps = true;
    protected $excluded = array();
    protected $faker;

    public $rules = array();

    public function __construct()
    {
        parent::__construct();
        $this->faker = Faker\Factory::create();
    }

    public function get($id = null, $single = false, $limit = null, $offset = null)
    {
        if ($id != null) {
            $id = intval($id);
            $this->db->where($this->primary_key, $id);
            $method = "row";
        } elseif ($single == true) {
            $method = "row";
        } else {
            $method = "result";
        }

        return $this->db->get($this->table_name, $limit, $offset)->$method();
    }

    public function get_by(array $where, $single = false, $limit = null, $offset = null)
    {
        $this->db->where($where);
        return $this->get(null, $single, $limit, $offset);
    }

    public function save(array $data, $id = null)
    {
        if ($id === null){
            if (isset($data[$this->primary_key])) {
                $data[$this->primary_key] = null;
            }

            $this->db->set($data);
            $this->db->insert($this->table_name);
            $id = $this->db->insert_id();
        } else {
            $id = intval($id);
            $this->db->set($data);
            $this->db->where($this->primary_key, $id);
            $this->db->update($this->table_name);
        }

        return $id;
    }

    public function delete($id)
    {
        $id = intval($id);

        if (!$id) {
            return false;
        }

        $this->db->where($this->primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->table_name);
    }

    public function _new()
    {
        $obj = new stdClass();
        $fields = $this->db->list_fields($this->table_name);
        foreach ($fields as $key => $field) {
            if (!in_array($field, $this->excluded)) {
                $obj->$field = '';
            }
        }

        return $obj;
    }

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */