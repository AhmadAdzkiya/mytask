<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Maps_model extends CI_Model{


    public function get_compare_gender(){
        $res=$this->db->query("select jenis_kelamin, count(*) as count
                               from ( select case 
                                      when jenis_kelamin =1 then 'jml_l'
                                      when jenis_kelamin=2 then 'jml_p'
                                      else 'unknown'
                                      end AS jenis_kelamin,id 
                                      from 
                                      (select id, jenis_kelamin from profile) as subqueryalias
                                     ) as subqueryalias2
                                cross join (select count(*) as total from profile ) x 
                                group by jenis_kelamin");
        return $res->row();
    }

    public function get_compare_ages_gender(){
        $res=$this->db->query("select agegroup, jenis_kelamin, count(*) as count
                                from ( select case 
                                when umur between 0 and 9 then '0-9'
                                when umur between 10 and 19 then '10-19'
                                when umur between 20 and 29 then '20-29'
                                when umur between 30 and 39 then '30-39'
                                when umur between 40 and 49 then '40-49'
                                when umur between 50 and 59 then '50-59'
                                when umur between 60 and 69 then '60-69'
                                else 'unknown'
                                 end AS agegroup, jenis_kelamin 
                                 from 
                                 (select umur, jenis_kelamin from profile) as subqueryalias
                                 ) as subqueryalias2
                                cross join (select count(*) as total from profile ) x 
                                group by agegroup, jenis_kelamin");
        return $res->result();
    }
    
    public function get_total_odp(){
        $res=$this->db->query("SELECT sum(case when keterangan=1  then 1 else 0 end) as proses_pemantauan,sum(case when keterangan=2 then 1 else 0 end) as selesai_pantau
			FROM `diagnosa` as e where level=1 and state=1");
		return $res->row();
    }
    
    public function get_persebaran_kecamatan(){
        $res=$this->db->query("select c.KEC_KODE, c.KEC_NAMA, a.odp, a.pdp, a.covid
                    from  kecamatan c 
                    left join ( select 
                    a.no_kec
                    ,sum(case when b.level=1 then 1 else 0 end) as odp 
                    ,sum(case when b.level=2 then 1 else 0 end) as pdp
                    ,sum(case when b.level=3 then 1 else 0 end) as covid
                    from diagnosa b
                    inner join profile a on a.id=b.profile
                    group by a.no_kec
                    ) a on c.KEC_KODE=a.no_kec
                    group by c.KEC_KODE");
        return $res;
    }

}