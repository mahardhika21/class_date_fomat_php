<?php

class calendar_format 
{
//return : Rabu, 20 april 2016
function full_long_date($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $hari=date('w', strtotime($cal));
    $arr_day=array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $hari=$arr_day[$hari];
    return $hari.', '.long_date($cal, $time, $fmt);
}

//return : Rabu, 20 apr 2016
function full_medium_date($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $hari=date('w', strtotime($cal));
    $arr_day=array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $hari=$arr_day[$hari];
    return $hari.', '.medium_date($cal, $time, $fmt);
}

//return : Rabu, 20 apr
function full_medium_MD($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $hari=date('w', strtotime($cal));
    $arr_day=array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $hari=$arr_day[$hari];
    
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return $hari.', '.date('j', strtotime($cal)).' '.$arr_month[date('n', strtotime($cal))].($time==TRUE?' '.date($fmt=='us'?'H:i A':'H:i', strtotime($cal)):NULL);
    
}

//return : 20 april 2016
function long_date($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'januari', 2=>'februari', 3=>'maret',
        4=>'april', 5=>'mei', 6=>'juni',
        7=>'juli', 8=>'agustus', 9=>'september',
        10=>'oktober', 11=>'november', 12=>'desember');
    return date('j', strtotime($cal)).' '.$arr_month[date('n', strtotime($cal))].' '.date('Y', strtotime($cal)).($time==TRUE?' '.date($fmt=='us'?'H:i A':'H:i', strtotime($cal)):NULL);
}

//return : 20 apr 2016
function medium_date($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return date('j', strtotime($cal)).' '.$arr_month[date('n', strtotime($cal))].' '.date('Y', strtotime($cal)).($time==TRUE?' '.date($fmt=='us'?'H:i A':'H:i', strtotime($cal)):NULL);
}


function long_MY($cal)
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'januari', 2=>'februari', 3=>'maret',
        4=>'april', 5=>'mei', 6=>'juni',
        7=>'juli', 8=>'agustus', 9=>'september',
        10=>'oktober', 11=>'november', 12=>'desember');
    return $arr_month[date('n', strtotime($cal))].' '.date('Y', strtotime($cal));
}


function medium_MY($cal)
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return $arr_month[date('n', strtotime($cal))].' '.date('Y', strtotime($cal));
}


function medium_MD($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return date('j', strtotime($cal)).' '.$arr_month[date('n', strtotime($cal))].($time==TRUE?' '.date($fmt=='us'?'H:i A':'H:i', strtotime($cal)):NULL);
}


function range_medium_date($first_cal, $second_cal)
{
    $CI =& get_instance();
    if(!empty($first_cal) && !empty($second_cal)){
        $year1 = date('Y', strtotime($first_cal));
        $month1 = date('n', strtotime($first_cal));

        $year2 = date('Y', strtotime($second_cal));
        $month2 = date('n', strtotime($second_cal));
        $CI->load->language('calendar');
        $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
        if($year1 != $year2){
            return date('j', strtotime($first_cal)).' '.$arr_month[date('n', strtotime($first_cal))].' '.date('Y', strtotime($first_cal)).' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
        elseif($year1 == $year2 && $month1 != $month2){
            return date('j', strtotime($first_cal)).' '.$arr_month[date('n', strtotime($first_cal))].' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
        else{
            if($first_cal==$second_cal)
                return date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
            else
                return date('j', strtotime($first_cal)).' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
    }
    elseif(!empty($first_cal) && empty($second_cal))return $CI->lang->line('weby_from').' '.full_medium_date($first_cal);
    elseif(empty($first_cal) && !empty($second_cal))return $CI->lang->line('weby_until').' '.full_medium_date($second_cal);
    else return $CI->lang->line('weby_until_now');
}


function range_long_date($first_cal, $second_cal)
{
    $CI =& get_instance();
    if(!empty($first_cal) && !empty($second_cal)){
        $year1 = date('Y', strtotime($first_cal));
        $month1 = date('n', strtotime($first_cal));

        $year2 = date('Y', strtotime($second_cal));
        $month2 = date('n', strtotime($second_cal));
        $CI->load->language('calendar');
        $arr_month = array(
        1=>'januari', 2=>'februari', 3=>'maret',
        4=>'april', 5=>'mei', 6=>'juni',
        7=>'juli', 8=>'agustus', 9=>'september',
        10=>'oktober', 11=>'november', 12=>'desember');
        if($year1 != $year2){
            return date('j', strtotime($first_cal)).' '.$arr_month[date('n', strtotime($first_cal))].' '.date('Y', strtotime($first_cal)).' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
        elseif($year1 == $year2 && $month1 != $month2){
            return date('j', strtotime($first_cal)).' '.$arr_month[date('n', strtotime($first_cal))].' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
        else{
            if($first_cal==$second_cal)
                return date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
            else
                return date('j', strtotime($first_cal)).' - '.date('j', strtotime($second_cal)).' '.$arr_month[date('n', strtotime($second_cal))].' '.date('Y', strtotime($second_cal));
        }
    }
    elseif(!empty($first_cal) && empty($second_cal))return $CI->lang->line('weby_from').' '.full_long_date($first_cal);
    elseif(empty($first_cal) && !empty($second_cal))return $CI->lang->line('weby_until').' '.full_long_date($second_cal);
    else return $CI->lang->line('weby_until_now');
}


function full_days($days)
{
    if(!empty($days)){
        $CI =& get_instance();
        $input = array();
        $day = array(
            0=>'minggu', 1=>'senin', 2=>'selasa',
            3=>'rabu', 4=>'kamis', 5=>'jumat',
            6=>'sabtu'
        );
        foreach ($days as $d)if(isset($d))$input[] = $day[$d];
        return implode(', ', $input);
    }
    else return NULL;
}


function medium_days($days)
{
    if(!empty($days)){
        $CI =& get_instance();
        $input = array();
        $day = array(
            0=>'min', 1=>'sen', 2=>'sel',
            3=>'rab', 4=>'kam', 5=>'jum',
            6=>'sab'
        );
        foreach ($days as $d)if(isset($d))$input[] = $day[$d];
        return implode(', ', $input);
    }
    else return NULL;
}


function medium_month($cal)
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return $arr_month[date('n', strtotime($cal))];
}


function long_month($cal)
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $arr_month = array(
        1=>'januari', 2=>'februari', 3=>'maret',
        4=>'april', 5=>'mei', 6=>'juni',
        7=>'juli', 8=>'agustus', 9=>'september',
        10=>'oktober', 11=>'november', 12=>'desember');
    return $arr_month[date('n', strtotime($cal))];
}

function get_airport($id=false, $field) {
    
    $CI = & get_instance();
    $CI->db->where('iata_code', $id);
    $result = $CI->db->get('airport')->row();
    
    return $result->$field;
}
//untuk menghitung selisih waktu
 function get_selisih_jam($jam_masuk,$jam_keluar) 
 {
      $awalss = substr($jam_masuk,0, 2);
      $akhirss = substr($jam_keluar,0, 2);
      
      if($awalss > $akhirss){
          $a='24:00:00';
          list($h_a,$m_a,$s_a) = explode(":",$jam_masuk); 
          $dtAwal_a = mktime($h_a,$m_a,$s_a,"1","1","1"); 
          list($h_a,$m_a,$s_a) = explode(":",$a); 
          $dtAkhir_a = mktime($h_a,$m_a,$s_a,"1","1","1"); 
          $dtSelisih_a = $dtAkhir_a-$dtAwal_a; 
          
          $b='00:00:00';
          list($h_b,$m_b,$s_b) = explode(":",$b); 
          $dtAwal_b = mktime($h_b,$m_b,$s_b,"1","1","1"); 
          list($h_b,$m_b,$s_b) = explode(":",$jam_keluar); 
          $dtAkhir_b = mktime($h_b,$m_b,$s_b,"1","1","1"); 
          $dtSelisih_b = $dtAkhir_b-$dtAwal_b; 
          
          $dtSelisih = $dtSelisih_a+$dtSelisih_b; 
          $totalmenit=$dtSelisih/60; 
          $jam =explode(".",$totalmenit/60); 
          $sisamenit=($totalmenit/60)-$jam[0]; 
          $sisamenit2=floor($sisamenit*60); 
          $jml_jam=$jam[0]; 
          if ($jml_jam==0) {
              return $sisamenit2." menit"; 
          } else {
              return $jml_jam." jam ".$sisamenit2." menit"; 
          }
          
      }else {
          list($h,$m,$s) = explode(":",$jam_masuk); 
          $dtAwal = mktime($h,$m,$s,"1","1","1"); 
          list($h,$m,$s) = explode(":",$jam_keluar); 
          $dtAkhir = mktime($h,$m,$s,"1","1","1"); 
          $dtSelisih = $dtAkhir-$dtAwal; 
          $totalmenit=$dtSelisih/60; 
          $jam =explode(".",$totalmenit/60); 
          $sisamenit=($totalmenit/60)-$jam[0]; 
          $sisamenit2=floor($sisamenit*60); 
          $jml_jam=$jam[0]; 
          if ($jml_jam==0) {
              return $sisamenit2." menit"; 
          } else {
              return $jml_jam." jam ".$sisamenit2." menit"; 
          }
      }
      
      
      
 }
 
 //return : Rabu, 20 apr 2018
function full_medium_full_ind($cal, $time=FALSE, $fmt='us')
{
    $CI =& get_instance();
    $CI->load->language('calendar');
    $hari=date('w', strtotime($cal));
    $arr_day=array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $hari=$arr_day[$hari];
    
    $arr_month = array(
        1=>'jan', 2=>'feb', 3=>'mar',
        4=>'apr', 5=>'mei', 6=>'jun',
        7=>'jul', 8=>'agu', 9=>'sep',
        10=>'okt', 11=>'nov', 12=>'des');
    return $hari.', '.date('j', strtotime($cal)).' '.$arr_month[date('n', strtotime($cal))].' '.date('Y', strtotime($cal)).($time==TRUE?' '.date($fmt=='us'?'H:i A':'H:i', strtotime($cal)):NULL);
    
}


}