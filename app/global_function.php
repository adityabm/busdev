<?php

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}

function getFullDate($time = 0)
{
    if ($time == "") return $time;
    if ($time && $time != "0000-00-00") {
        $time = strtotime($time);
    } else {
        return "-";
    }
    return date("j", $time) . " " . listBulan()[date("n", $time)] . " " . date("Y", $time);
}

function listBulan()
{
    return ["" => "-", 1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
}

function getFullDateDayTime($time = 0)
{
    if ($time == "") return $time;
    if ($time && $time != "0000-00-00") {
        $time = strtotime($time);
    } else {
        return "-";
    }
    return listHari()[date("N", $time)] . ", " . date("j", $time) . " " . listBulan()[date("n", $time)] . " " . date("Y", $time) . " " . date("H:i:s", $time);
}

function getFullDateDay($time = 0)
{
    if ($time == "") return $time;
    if ($time && $time != "0000-00-00") {
        $time = strtotime($time);
    } else {
        return "-";
    }
    return listHari()[date("N", $time)] . ", " . date("j", $time) . " " . listBulan()[date("n", $time)] . " " . date("Y", $time);
}

function listHari()
{
    return ["" => "-", 1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
}