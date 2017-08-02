<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_konsultasi_siswa extends CI_Controller 
{
	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
	}
	//****************************** KONSULTASI SISWA *****************************************************
	public function konsul()
	{
		$query = $this->db->query('SELECT a.id_konsul, a.pelajaran, a.id_siswa, a.materi, a.tanggal_kirim, c.nama_depan, c.nama_belakang, c.kelas, c.level, a.status_konsultasi FROM data_konsultasi_siswa a  
				LEFT JOIN data_siswa c ON a.id_siswa = c.id_siswa 
				INNER JOIN (SELECT MAX(tanggal_kirim) as maxtime, id_siswa from data_konsultasi_siswa WHERE status_konsultasi = "BELUM DITERIMA" GROUP BY id_siswa) b ON a.id_siswa = b.id_siswa AND a.tanggal_kirim = maxtime WHERE a.status_konsultasi="BELUM DITERIMA"
				ORDER BY a.tanggal_kirim DESC');

		if($query->num_rows() > 0)
		{
			$output_string = $query->num_rows();
		}
		else
		{
			$output_string = 0;
		}
		echo $output_string;
	}

	public function detail()
	{
		date_default_timezone_set('Asia/Jakarta');
		$query['data'] = $this->db->query('SELECT a.id_konsul, a.pelajaran, a.id_siswa, a.materi, a.tanggal_kirim, c.nama_depan, c.nama_belakang, c.kelas, c.level, a.status_konsultasi FROM data_konsultasi_siswa a  
				LEFT JOIN data_siswa c ON a.id_siswa = c.id_siswa 
				INNER JOIN (SELECT MAX(tanggal_kirim) as maxtime, id_siswa from data_konsultasi_siswa WHERE status_konsultasi = "BELUM DITERIMA" GROUP BY id_siswa) b ON a.id_siswa = b.id_siswa AND a.tanggal_kirim = maxtime WHERE a.status_konsultasi="BELUM DITERIMA"
				ORDER BY a.tanggal_kirim DESC')->result();

		$row = $this->db->query('SELECT a.id_konsul, a.pelajaran, a.id_siswa, a.materi, a.tanggal_kirim, c.nama_depan, c.nama_belakang, c.kelas, c.level, a.status_konsultasi FROM data_konsultasi_siswa a  
				LEFT JOIN data_siswa c ON a.id_siswa = c.id_siswa 
				INNER JOIN (SELECT MAX(tanggal_kirim) as maxtime, id_siswa from data_konsultasi_siswa WHERE status_konsultasi = "BELUM DITERIMA" GROUP BY id_siswa) b ON a.id_siswa = b.id_siswa AND a.tanggal_kirim = maxtime WHERE a.status_konsultasi="BELUM DITERIMA"
				ORDER BY a.tanggal_kirim DESC')->num_rows();
		
		if($row > 0)
		{
			foreach ($query['data'] as $data) 
			{
				$start_date = date('Y-m-d');
				$arrtanggal = explode(" ", $data->tanggal_kirim);
				$since_start = date_diff(date_create($start_date), date_create($arrtanggal[0]));

				echo "<div>Pesan dari <b>".$data->nama_depan." ".$data->nama_belakang." (".$data->kelas." ".$data->level.")</b></div>".$arrtanggal[0]." ".$arrtanggal[1]." (".$since_start->format("%a hari yang lalu").") <i></i><br><br>";
			}
		}
		else
		{
			echo "Tidak ada pesan baru saat ini";
		}
	}
	//****************************** USER ONLINE *****************************************************
	public function user()
	{
		$query_siswa = $this->db->where('online','YES')->get('data_siswa');
		$query_guru = $this->db->where('online','YES')->get('data_guru');
		if($query_siswa->num_rows() > 0 || $query_guru->num_rows() > 0)
		{
			$output_siswa = $query_siswa->num_rows();
			$output_guru = $query_guru->num_rows();
		}
		else
		{
			$output_siswa = 0;
			$output_guru = 0;
		}
		echo $output_siswa + $output_guru;
	}

	public function user_detail()
	{
		$siswa['data'] = $this->db->where('online','YES')->get('data_siswa')->result();
		$guru['data'] = $this->db->where('online','YES')->get('data_guru')->result();
		foreach ($siswa['data'] as $data) 
		{
			echo "<div><i class='fa fa-circle text-green'></i> <b>".$data->nama_depan." ".$data->nama_belakang."(".$data->kelas." ".$data->level.")</b> Online Sekarang</div>".date('Y-m-d')."<br><br>";
		}
		foreach ($guru['data'] as $data) 
		{
			echo "<div><i class='fa fa-circle text-green'></i> <b>".$data->nama_depan." ".$data->nama_belakang."(".$data->level.")</b> Online Sekarang</div>".date('Y-m-d')."<br><br>";
		}
	}

	public function home()
	{
		$this->load->helper('url');

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_konsultasi_siswa/home',$data);
	}
	public function detail_konsul()
	{
		$this->load->helper('url');

		$query = $this->db->select('b.id_konsul, b.pelajaran, b.id_siswa, a.nama_depan, a.nama_belakang, b.pelajaran, b.materi, a.kelas, a.level, a.jurusan, b.tanggal, b.jam, b.status_konsultasi')->join('data_siswa a','a.id_siswa = b.id_siswa', 'left')->order_by('b.tanggal DESC')->get('data_konsultasi_siswa b');

		$data['data_konsultasi'] = $query->result();
		$file = $query->num_rows();
		if($file > 0)
		{
			foreach ($data['data_konsultasi'] as $post) 
			{
				if($post->status_konsultasi == "BELUM DITERIMA")
				{
		            echo "<tr>
		               <td>".$post->nama_depan." ".$post->nama_belakang."</td>
		               <td>".$post->kelas." ".$post->level." ".$post->jurusan."</td>
		               <td>".$post->pelajaran."</td>
		               <td>".$post->materi."</td>
		               <td>".$post->tanggal."</td>
		               <td>".$post->jam."</td>
		               <td><span class='label label-danger'>".$post->status_konsultasi."</span></td>
		               <td>".anchor('admin/data_konsultasi_siswa/hapus_konsultasi/'.$post->id_konsul,'<i class="ion-trash-a"></i> Hapus')."</td>
		               <td>".anchor('admin/data_konsultasi_siswa/ubah_konsultasi/'.$post->id_konsul,'<i class="ion-reply"></i> Terima Notif')."</td>
		            </tr>"; 
		        }
		        else
		        {
		        	$arrtanggal = explode(" ", $post->tanggal);
		        	echo "<tr>
		               <td>".$post->nama_depan." ".$post->nama_belakang."</td>
		               <td>".$post->kelas." ".$post->level." ".$post->jurusan."</td>
		               <td>".$post->pelajaran."</td>
		               <td>".$post->materi."</td>
		               <td>".$post->tanggal."</td>
		               <td>".$post->jam."</td>
		               <td><span class='label label-success'>".$post->status_konsultasi."</span></td>
		               <td>".anchor('admin/data_konsultasi_siswa/hapus_konsultasi/'.$post->id_konsul,'<i class="ion-trash-a"></i> Hapus')."</td>
		               <td></td>
		            </tr>"; 
		        } 
			}
		}
		else
		{
			echo "<tr>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	               <td></td>
	            </tr>";  
		}
	}
	public function hapus_konsultasi($id){
		$this->load->helper('url');
		$query = $this->db->where('id_konsul',$id)->delete('data_konsultasi_siswa');
		redirect('admin/data_konsultasi_siswa/home');
	}
	public function ubah_konsultasi($id){
		$this->load->helper('url');
		$data = array(
			'status_konsultasi'=> 'diterima'
		);
		$query = $this->db->where('id_konsul', $id)->update('data_konsultasi_siswa',$data);
		redirect('admin/data_konsultasi_siswa/home');
	}
}