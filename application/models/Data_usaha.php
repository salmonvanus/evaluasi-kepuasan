<?php

class Data_usaha extends CI_Model
{

	private $table = "shop";

	function show_shop($id_user)
	{
		$this->db->where('user_id', $id_user);
		return $this->db->get($this->table)->result();
	}

	function show_umkm()
	{
		$this->db->join('user', 'shop.user_id = user.user_id');
		$this->db->where('shop_status', 'yes');
		return $this->db->get($this->table)->result();
	}

	function show_umkm_limit(){
		$this->db->join('user', 'shop.user_id = user.user_id');
		$this->db->where('shop_status', 'yes');
		$this->db->limit(4);
		$this->db->order_by('shop_id', "DESC");
		return $this->db->get($this->table)->result();
	}

	function show_shop_by_id($id_user)
	{
		$this->db->join('user', 'shop.user_id = user.user_id');
		$this->db->where('shop.user_id', $id_user);
		return $this->db->get($this->table)->result();
	}

	function show_user_by_shop($shop_id){
		$this->db->join('user', 'shop.user_id = user.user_id');
		$this->db->where('shop.shop_id', $shop_id);
		return $this->db->get($this->table)->result();
	}

	function show_shop_cannot_image($id_user)
	{
		$sql = $this->db->query("SELECT * FROM user JOIN shop on user.user_id=shop.user_id where user.user_id=$id_user");
		$result = $sql->result();
		return $result;
	}

	function show_waiting_list()
	{
		$this->db->join('user', 'shop.user_id = user.user_id');
		$this->db->where('shop_status', 'no');
		return $this->db->get($this->table)->result();
	}


	function get($id)
	{
		$this->db->where('shop_id', $id);
		return $this->db->get($this->table)->row();
	}

	function get_shop($id)
	{
		$this->db->where('shop_id', $id);
		return $this->db->get($this->table)->result();
	}

	// function get_letter_city($id) {
	// 	$this->db->join('city','letter.city_id = city.city_id');
	// 	$this->db->where('letter_id', $id);
	// 	return $this->db->get($this->table)->row();
	// }

	function insert_data($data)
	{
		$this->db->insert($this->table, $data);
	}

	function update_by_id($id, $description, $logo, $bg_image)
	{
		$this->db->set('shop_description', $description);
		$this->db->set('shop_logo', $logo);
		$this->db->set('shop_bg_image', $bg_image);
		$this->db->where('shop_id', $id);
		$this->db->update('shop');
	}

	function delete($id)
	{
		$this->db->delete($this->table, $id);
	}

	function edit($id, $data)
	{
		$this->db->where($id);
		$this->db->update($this->table, $data);
	}

	function show_usaha($id)
	{
		$this->db->where('shop_id', $id);
		return $this->db->get($this->table)->row();
	}

	function status_usaha()
	{
		$this->db->where('shop_status', 'yes');
		return $this->db->get($this->table)->result();
	}

	function status_belum_diteruskan()
	{
		$this->db->where('shop_status', 'no');
		return $this->db->get($this->table)->result();
	}

	function home_show_shop_id($shop_id){
		$this->db->where('shop_id', $shop_id);
		return $this->db->get($this->table)->result();
	}
}
