<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Hutang extends CI_Model {
	
  var $table = 'hutang_elektrik';
  var $column_order = array(null,null,'harga_jual'); //file table
	var $column_search = array('nama_brg'); //pencarian yg d ijinkan
	var $order = array('id_hutang_elektrik' => 'desc'); // default order

	var $table_produk = 'hutang_produk';
  var $column_order_produk = array(null,null, 'total_harga'); //file table
	var $column_search_produk = array('peminjam'); //pencarian yg d ijinkan
	var $order_produk = array('id_hutang_produk' => 'desc'); // default order
	
	function insert_hutang($data)
	{
		return $this->db->insert($this->table, $data);
  }

  function insert_hutang_produk($data)
	{
		return $this->db->insert('hutang_produk', $data);
  }
  
  function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where('status =', 'hutang');
		$query = $this->db->get();
		return $query->result();
  }

  function get_datatables_produk()
	{
		$this->_get_datatables_query_produk();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where('status =', 'hutang');
		$query = $this->db->get();
		return $query->result();
  }
  
  private function _get_datatables_query()
	{
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) {
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}

			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
  }

  private function _get_datatables_query_produk()
	{
		$this->db->from($this->table_produk);
		$i = 0;
		foreach ($this->column_search_produk as $item) {
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) {
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_produk) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}

			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_produk[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order_produk))
		{
			$order = $this->order_produk;
			$this->db->order_by(key($order), $order[key($order)]);
		}
  }
  
  function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
  }
  
  function count_filtered_produk()
	{
		$this->_get_datatables_query_produk();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
  }

  public function count_all_produk()
	{
		$this->db->from($this->table_produk);
		return $this->db->count_all_results();
  }
  
  public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
  }

  public function update_produk($where, $data)
	{
		$this->db->update($this->table_produk, $data, $where);
		return $this->db->affected_rows();
  }

  public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_hutang_elektrik',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_hutang_elektrik',$id);
		return $this->db->delete($this->table);
	}
  
  public function get_by_id_produk($id)
	{
		$this->db->from($this->table_produk);
		$this->db->where('id_hutang_produk',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_total_hutang()
	{
		$query = $this->db->query("SELECT sum(harga_jual) as total FROM `hutang_elektrik` WHERE status='hutang'");
		return $query->row();
  }
  
  public function get_total_hutang_produk()
	{
		$query = $this->db->query("SELECT sum(total_harga) as total FROM `hutang_produk` WHERE status='hutang'");
		return $query->row();
	}
	
}