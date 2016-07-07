<?php
Class Settingdata extends CI_Model
{
 function getGpio($all=0)
 {
   $this->db->select('*');
   $this->db->from('gpio');
   if($all==0){
	 $this->db->where('used',0);
   }
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function getPointById($id=0)
 {
   $this->db->select('controll.*,gpio.command,gpio.chip_addr, gpio.is_i2c,');
   $this->db->from('controll');
   $this->db->join('gpio', 'controll.gpio_no = gpio.id');
   $this->db->where('controll.id',$id);
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getTimerById($id=0)
 {
   $this->db->select('*');
   $this->db->from('jadwal');
   $this->db->where('id',$id);
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getTimerByIdPoint($id_point=0)
 {
   $this->db->select('*');
   $this->db->from('jadwal');
   $this->db->where('id_controll',$id_point);
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getPoint()
 {
   $this->db->select('controll.*, gpio.id as relay, gpio.is_i2c,gpio.nama as gpio_name, gpio.is_i2c, gpio.chip_addr,gpio.command,gpio.i2c_addr,group_controll.nama as `group`,group_controll.id as `id_group`');
   $this->db->from('controll');
   $this->db->join('gpio', 'controll.gpio_no = gpio.id');
   $this->db->join('group_controll', 'controll.id_group = group_controll.id');
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getPointmonitor()
 {
   $this->db->select('(SELECT COUNT(*) FROM jadwal WHERE id_controll=controll.id AND nyala=1) as nyala, controll.*, gpio.id as relay, gpio.is_i2c,gpio.nama as gpio_name, gpio.is_i2c, gpio.chip_addr,gpio.command,gpio.i2c_addr,group_controll.nama as `group`,group_controll.id as `id_group`');
   $this->db->from('controll');
   $this->db->join('gpio', 'controll.gpio_no = gpio.id');
   $this->db->join('group_controll', 'controll.id_group = group_controll.id');
   $this->db->where('controll.aktif', 1);
   $this->db->where('group_controll.aktif', 1);
   $query =$this->db->get();
   //echo $this->db->last_query();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getPointByGroup($id_group=0,$aktif=null)
 {
   $this->db->select('controll.*, gpio.id as relay,gpio.nama as gpio_name, gpio.is_i2c, gpio.chip_addr,gpio.i2c_addr,group_controll.nama as `group`,group_controll.id as `id_group`');
   $this->db->from('controll');
   $this->db->join('gpio', 'controll.gpio_no = gpio.id');
   $this->db->join('group_controll', 'controll.id_group = group_controll.id');
   $this->db->where('id_group', $id_group);
   if($aktif!=null){
		$this->db->where('controll.aktif', $aktif);
   }
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function getGroup($filteraktif=0)
 {
   $this->db->select('*');
   $this->db->from('group_controll');
   if($filteraktif==1){
   $this->db->where('aktif',1);
   }
   $query =$this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getDataControll()
 {
   $this->db->select('*');
   $this->db->from('controll');

   $query =$this->db->get();

   if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>