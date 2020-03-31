<?php
error_reporting(0);
echo"\t\t\033[1;33m 
  _     ___
 | |   / _ \
 | | _| | | | __ _ _______ _ __
 | |/ / | | |/ _` |_  / _ \ '__|
 |   <| |_| | (_| |/ /  __/ |
 |_|\_\\\___/ \__,_/___\___|_|
 
 // made with <3 by k0azer
 // nhansanc3z@gmail.com
 // covid19 checker v1";
$ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36';
date_default_timezone_set('Asia/Jakarta');
$waktu = date("d M Y - H:i:s");
echo "\n\n\033[1;36m Checking on \033[1;31m$waktu \033[1;36mPlease wait....\n\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.covid19.go.id');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $ua);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
$exec = curl_exec($ch);
$bhh = '/<strong>(.*?)<\/strong>/';
$aih = '/<span style="color: #ffffff;">(.*?)<\/span>/';
$jj = '/<p>(.*?)<\/p><\/div><\/div>/';
$ww = '/<div class="fusion-post-content post-content"><h2 class="blog-shortcode-post-title entry-title"><a href=(.*?)<\/a><\/h2>/';
$head = '/<b>(.*?)<\/b>/';
preg_match_all($aih, $exec, $matches, PREG_OFFSET_CAPTURE, 0);
preg_match_all($bhh, $exec, $bicis, PREG_OFFSET_CAPTURE, 0);
preg_match_all($jj, $exec, $berita, PREG_OFFSET_CAPTURE, 0);
preg_match_all($ww, $exec, $berita2, PREG_OFFSET_CAPTURE, 0);
preg_match_all($head, $exec, $judul, PREG_OFFSET_CAPTURE, 0);
//echo $exec;
//print_r($matches);
//print_r($bicis);
//print_r($berita);
//print_r($berita2);
//print_r($judul);
$positif = $bicis[1][4][0];
$sembuh = $bicis[1][5][0];
$meninggal = $bicis[1][6][0];
$kawasan = $bicis[1][8][0];
$kasus = $bicis[1][9][0];
$kematian = $bicis[1][10][0];
$tt = $judul[1][0][0];
$tanggal = $judul[1][1][0];
$date = explode("<br>", $tanggal);
$n1 = $berita2[1][1][0];
$n2 = $berita2[1][2][0];
$news1 = explode(">", $n1);
$news2 = explode(">", $n2);
//print_r($date);
//print_r($news1);
//print_r($news2);

if($positif){
	echo "\033[1;37m=====================================
 $tt\n
$date[0]
 $date[1]\n
 DI \033[1;31mINDO\033[1;37mNESIA\n
 \033[1;31mPositif : $positif
 \033[1;32mSembuh : $sembuh
 \033[1;36mMeninggal : $meninggal
\033[1;37m=====================================
 \033[1;37mDI \033[1;33mSELURUH DUNIA/\033[1;36mGLOBAL

 \033[1;32mNegara / Kawasan: $kawasan
 \033[1;33mKasus Terkonfirmasi: $kasus
 \033[1;31mKematian: $kematian
 \033[1;37m=====================================
 \033[1;33mINFORMASI DAN BERITA\n
 \033[1;32m$news1[1]
 \033[1;33mbaca di: \033[1;36m$news1[0]\n
 \033[1;32m$news2[1]
 \033[1;33mbaca di: \033[1;36m$news2[0]
 \033[1;37m=====================================\n\n";
	}
else{
	echo "\033[1;37m==============================================
\033[1;31m Gagal mengambil informasi, coba lagi nanti \n\n";
}
curl_close($ch);
