<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * UserModel class.
 * 
 * @extends CI_Model
 */
class UserModel extends CI_Model {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();
    }

    public function getAllUsers() {

        $users = $this->db->get('users');
        return $users->result();
    }

    /**
     * create_user function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $email
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function create_user($username, $email, $password,$type) {

        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $this->hash_password($password),
            'type' => $type,
            'created_at' => date('Y-m-j H:i:s'),
        );

        if ($this->db->insert('users', $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    
    public function update($username, $email, $password,$type) {
        if($password){
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $this->hash_password($password),
                'type' => $type,
                'created_at' => date('Y-m-j H:i:s'),
            );
        }else{
            $data = array(
                'username' => $username,
                'email' => $email,
                'type' => $type,
                'created_at' => date('Y-m-j H:i:s'),
            );
        }
        // Set the where condition
        $this->db->where('id', $this->input->post('id'));

        // Run update on table
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }
    public function delete($user_id) {

        $this->db->where('id', $user_id)
                ->delete('users');

        if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    public function getUser($id) {
        $this->db->select('id,username,email,type');
        $this->db->where('id', $id);
        $user = $this->db->get('users');
        return $user->result();
    }
    public function getUserTests($user_id) {
        $this->db->select('test_id');
        $this->db->from('user_tests');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result();
    }
    
    public function deleteUserTests($user_id) {
        $this->db->where('user_id', $user_id)
                ->delete('user_tests');
    }

    public function insertUserTest($user_id, $tests) {
        // Insert data
        foreach ($tests as $test) {
            $data = array(
                'user_id' => $user_id,
                'test_id' => $test
            );

            $this->db->insert('user_tests', $data);
        }
    }

    /**
     * resolve_user_login function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function userLogin($email, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($password, $hash);
    }


    /**
     * get_user function.
     * 
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function getUserByEmail($email) {

        $this->db->from('users');
        $this->db->where('email', $email);
        return $this->db->get()->row();
    }
    public function getAdmin() {
        $this->db->select('id,username,email,type');
        $this->db->where('type', 1);
        $user = $this->db->get('users');
        return $user->result();
    }

    /**
     * hash_password function.
     * 
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {

        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * verify_password_hash function.
     * 
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);
    }

}
