<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pensync_M extends CI_Model {
	function getAllRoom() {
		$query = $this->db->get('room'); 
		return $query->result();
	}
	function getAllUserContact() {
		$query = $this->db->select('userid, name, kontak')
						  ->from('user')
						  ->get();
		return $query->result();
	}
	function getAllAdminContact() {
		$query = $this->db->select('baakid, name, kontak')
						  ->from('baak')
						  ->get();
		return $query->result();
	}
	function getRequestByDate($tanggal) {
		$newDate = date("Y-m-d", strtotime($tanggal));
		$join = '`r`.`roomid` = `ro`.`roomid` AND `r`.`userid` = `u`.`userid` AND `r`.`event_date` = "'.$newDate.'"';
		$query = $this->db->select('ro.nama, r.start_time ,r.finish_time ,u.name ,r.event, r.reqid')
						  ->from('request r, user u, room ro') 
						  ->where($join)
						  ->where_in('req_stats', array(1, 2, 3, 4))
						  ->get();
		return $query->result();
	}
	function getRequestByRoomDate($tanggal, $room) {
		$newDate = date("Y-m-d", strtotime($tanggal));
		$join = '`r`.`roomid` = `ro`.`roomid` AND `r`.`userid` = `u`.`userid` AND `r`.`event_date` = "'.$newDate.'" AND `r`.`roomid` = "'.$room.'"';
		$query = $this->db->select('ro.nama, r.start_time ,r.finish_time ,u.name ,r.event')
						  ->from('request r, user u, room ro') 
						  ->where($join)
						  ->where_in('req_stats', array(1, 2, 3, 4))
						  ->get();
		return $query->result();
	}
	function getRequestByTime($tanggal, $start, $end) {
		$request = $this->getRequestByRoomDate($tanggal, $_POST['room']);
		if (request != null) {
			$event_start = date("h:i:s", strtotime($start));
			$event_end = date("h:i:s", strtotime($end));

			foreach ($request as $row) {
				if ($row->start_time >= $event_start && $row->finish_time <= $event_end) {
					return $row;
				} else if ($row->start_time <= $event_start && $row->finish_time >= $event_end) {
					return $row;
				} else if ($row->start_time <= $event_start && $row->finish_time <= $event_end) {
					if ($row->finish_time > $event_start) {
						return false;
					} else {
						return $row;
					}
				} else if ($row->start_time >= $event_start && $row->finish_time >= $event_end) {
					if ($row->start_time < $event_end) {
						return false;
					} else {
						return $row;
					}
				}
			}
		} else {
			return false;
		}
	}
	function getAllEventType() {
		$query = $this->db->get('eventtype');
		return $query->result();
	}
	function countMonthlyRequest() {
		$now = date("Y-m-");
		$lastMonth = date("Y-m-", strtotime("last month"));
		$total['now'] = $this->db->select('reqid')
					  ->from('request')
					  ->like('event_date', $now, 'after')
					  ->where('req_stats', 4)
					  ->count_all_results();
		$total['last_month'] = $this->db->select('reqid')
					  ->from('request')
					  ->like('event_date', $lastMonth, 'after')
					  ->where('req_stats', 4)
					  ->count_all_results();
		return $total;
	}
	function getMonthlyRequest($signal) {
		if ($signal == 1){
			$date = date("Y-m-");
		} else if ($signal == 0){
			$date = date("Y-m-", strtotime("last month"));
		}
		$join = '`r`.`roomid` = `ro`.`roomid` AND `r`.`userid` = `u`.`userid`';
		$query = $this->db->select('ro.nama, r.start_time ,r.finish_time ,u.name ,r.event, r.event_date, r.verif_code')
					->from('request r, room ro, user u')
					->like('event_date', $date, 'after')
					->where('req_stats', 4)
					->where($join)
					->get();
		return $query->result();
	}
	function getRequestByID($reqid) {
		$join = '`r`.`roomid` = `ro`.`roomid` AND `r`.`userid` = `u`.`userid` AND `r`.`event_type` = `e`.`type` AND `r`.`req_stats` = `rs`.`status`';
		$query = $this->db->select('r.*, ro.nama, u.name, e.info type, rs.info status')
						->from('request r, room ro, user u, eventtype e, reqstatus rs')
						->where($join)
						->where('reqid', $reqid)
						->get();
		return $query->result();
	}
	function getDistinctDate($signal) {
		if ($signal == 1){
			$date = date("Y-m-");
		} else if ($signal == 0){
			$date = date("Y-m-", strtotime("last month"));
		}
		$query = $this->db->select('event_date')
					->distinct()
					->from('request')
					->like('event_date', $date, 'after')
					->where('req_stats', 4)
					->order_by('event_date', 'ASC')
					->get();
		return $query->result();
	}
	function getPassword() {
		if ($this->session->userdata('level') == 'user') {
			$query = $this->db->select('password')->from('user')->where('userid', $this->session->userdata('userid'))->get();
		} else if ($this->session->userdata('level') == 'admin') {
			$query = $this->db->select('password')->from('baak')->where('baakid', $this->session->userdata('baakid'))->get();
		}
	
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function setPassword($password) {
		if ($this->session->userdata('level') == 'user') {
			$this->db->set('password', md5($password))->where('userid', $this->session->userdata('userid'))->update('user');
		} else if ($this->session->userdata('level') == 'admin') {
			$this->db->set('password', md5($password))->where('baakid', $this->session->userdata('baakid'))->update('baak');
		}
	}
	/* function getAllUser(){
		return $this->db->get('user')->result();
	}
	function setAllPassword($userid, $password){
		$this->db->set('password', md5($password."123"))->where('userid', $userid)->update('user');
	} */

	function login() {
		if ($_POST['level'] == 'user') {
			$query = $this->db->select('userid, name, kontak')
						  ->from('user')
						  ->where('username', $_POST['username'])
						  ->where('password', md5($_POST['password']))
						  ->limit(1)
						  ->get();
		} else if ($_POST['level'] == 'admin') {
			$query = $this->db->select('baakid, name, kontak')
						  ->from('baak')
						  ->where('username', $_POST['username'])
						  ->where('password', md5($_POST['password']))
						  ->limit(1)
						  ->get();
		}

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function insertRequest() {
		$query = $this->db->select('current_seq')
						  ->from('sequence')
						  ->where('name', 'request')
						  ->get()
						  ->result();
		$sequence = $query[0]->current_seq;
		$this->db->where('name', 'request');
		$this->db->update('sequence', array('current_seq' => ($sequence + 1)));

		if(strlen((string)$sequence) == 1){
			$id = "RE00".(string)$query[0]->current_seq;
		} else if (strlen((string)$sequence) == 2) {
			$id = "RE0".(string)$query[0]->current_seq;
		} else if (strlen((string)$sequence) == 3) {
			$id = "RE".(string)$query[0]->current_seq;
		}
		$data = array(
			'reqid' => $id,
			'event' => $_POST['event-name'],
			'event_type' => $_POST['event-type'],
			'event_date' => date("Y-m-d", strtotime(str_replace(',', ' ', $_POST['tanggal']))),
			'start_time'=> $_POST['start-time'],
			'finish_time' => $_POST['finish-time'],
			'verif_code' => $this->generateRandomString(),
			'userid' => $this->session->userdata('userid'),
			'roomid' => $_POST['room'],
			'req_stats' => 1,
			'pj' => $_POST['pj'],
			'nrp' => $_POST['nrp']
		);
		$this->db->insert('request', $data);
	}
	
	
	
	function generateRandomString() {
		$length = 10;
		$string = str_split("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ");
		$charactersLength = count($string);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		    $randomString .= $string[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
?>