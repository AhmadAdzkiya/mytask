<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-06 16:03:27 --> 404 Page Not Found: /index
ERROR - 2022-07-06 16:07:56 --> 404 Page Not Found: /index
ERROR - 2022-07-06 23:28:45 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'mulan.a.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `a`.*, (select sum(xx.nominal) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'jml_tagihan', (select sum(xx.sisa) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'sisa_tagihan', (select sum(xx.bayar) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'bayar_tagihan', e.nama as 'siswa_nama', e.jenis_kelamin as 'siswa_jenis_kelamin', b.nama as 'kelas_nama', b.id as 'kelas_master_id', c.nama as 'prodi_nama', c.id as 'prodi_master_id', d.nama as 'jurusan_nama', d.id as 'jurusan_master_id'
FROM `mulan_tagihan` `a`
LEFT JOIN `mulan_siswa` `e` ON `a`.`nisn`=`e`.`nisn`
LEFT JOIN `mulan_kelas` `b` ON `b`.`id`=`e`.`kelas_id`
LEFT JOIN `mulan_prodi` `c` ON `c`.`id`=`e`.`prodi_id`
LEFT JOIN `mulan_jurusan` `d` ON `d`.`id`=`c`.`jurusan_id`
WHERE `a`.`aktif` = '1' 
AND `e`.`trashed` = '0'
AND `e`.`aktif` = '1'
GROUP BY `e`.`nisn`
ORDER BY `e`.`nama` ASC
ERROR - 2022-07-06 23:28:52 --> Severity: error --> Exception: Class 'GuzzleHttp\Client' not found D:\softwareInstalled\laragon\www\lkpp\application\modules\dash\controllers\laporan\Lkpp.php 34
ERROR - 2022-07-06 23:29:14 --> Severity: error --> Exception: Class 'Client' not found D:\softwareInstalled\laragon\www\lkpp\application\modules\dash\controllers\laporan\Lkpp.php 34
ERROR - 2022-07-06 23:29:43 --> Severity: error --> Exception: Class 'GuzzleHttp\Client' not found D:\softwareInstalled\laragon\www\lkpp\application\modules\dash\controllers\laporan\Lkpp.php 34
ERROR - 2022-07-06 23:31:39 --> Severity: error --> Exception: Class 'GuzzleHttp\Client' not found D:\softwareInstalled\laragon\www\lkpp\application\modules\dash\controllers\laporan\Lkpp.php 34
ERROR - 2022-07-06 23:38:48 --> Severity: error --> Exception: Class 'GuzzleHttp\Client' not found D:\softwareInstalled\laragon\www\lkpp\application\modules\dash\controllers\laporan\Lkpp.php 34
ERROR - 2022-07-06 23:39:19 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'mulan.a.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `a`.*, (select sum(xx.nominal) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'jml_tagihan', (select sum(xx.sisa) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'sisa_tagihan', (select sum(xx.bayar) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'bayar_tagihan', e.nama as 'siswa_nama', e.jenis_kelamin as 'siswa_jenis_kelamin', b.nama as 'kelas_nama', b.id as 'kelas_master_id', c.nama as 'prodi_nama', c.id as 'prodi_master_id', d.nama as 'jurusan_nama', d.id as 'jurusan_master_id'
FROM `mulan_tagihan` `a`
LEFT JOIN `mulan_siswa` `e` ON `a`.`nisn`=`e`.`nisn`
LEFT JOIN `mulan_kelas` `b` ON `b`.`id`=`e`.`kelas_id`
LEFT JOIN `mulan_prodi` `c` ON `c`.`id`=`e`.`prodi_id`
LEFT JOIN `mulan_jurusan` `d` ON `d`.`id`=`c`.`jurusan_id`
WHERE `a`.`aktif` = '1' 
AND `e`.`trashed` = '0'
AND `e`.`aktif` = '1'
GROUP BY `e`.`nisn`
ORDER BY `e`.`nama` ASC
ERROR - 2022-07-06 23:44:43 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'mulan.a.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `a`.*, (select sum(xx.nominal) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'jml_tagihan', (select sum(xx.sisa) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'sisa_tagihan', (select sum(xx.bayar) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'bayar_tagihan', e.nama as 'siswa_nama', e.jenis_kelamin as 'siswa_jenis_kelamin', b.nama as 'kelas_nama', b.id as 'kelas_master_id', c.nama as 'prodi_nama', c.id as 'prodi_master_id', d.nama as 'jurusan_nama', d.id as 'jurusan_master_id'
FROM `mulan_tagihan` `a`
LEFT JOIN `mulan_siswa` `e` ON `a`.`nisn`=`e`.`nisn`
LEFT JOIN `mulan_kelas` `b` ON `b`.`id`=`e`.`kelas_id`
LEFT JOIN `mulan_prodi` `c` ON `c`.`id`=`e`.`prodi_id`
LEFT JOIN `mulan_jurusan` `d` ON `d`.`id`=`c`.`jurusan_id`
WHERE `a`.`aktif` = '1' 
AND `e`.`trashed` = '0'
AND `e`.`aktif` = '1'
GROUP BY `e`.`nisn`
ORDER BY `e`.`nama` ASC
ERROR - 2022-07-06 23:44:53 --> Severity: error --> Exception: cURL error 28: Resolving timed out after 2002 milliseconds (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) D:\softwareInstalled\laragon\www\lkpp\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php 207
ERROR - 2022-07-06 23:45:22 --> Severity: error --> Exception: cURL error 28: Resolving timed out after 2000 milliseconds (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) D:\softwareInstalled\laragon\www\lkpp\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php 207
ERROR - 2022-07-06 23:45:25 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'mulan.a.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `a`.*, (select sum(xx.nominal) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'jml_tagihan', (select sum(xx.sisa) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'sisa_tagihan', (select sum(xx.bayar) from  mulan_tagihan xx where xx.nisn=a.nisn) as 'bayar_tagihan', e.nama as 'siswa_nama', e.jenis_kelamin as 'siswa_jenis_kelamin', b.nama as 'kelas_nama', b.id as 'kelas_master_id', c.nama as 'prodi_nama', c.id as 'prodi_master_id', d.nama as 'jurusan_nama', d.id as 'jurusan_master_id'
FROM `mulan_tagihan` `a`
LEFT JOIN `mulan_siswa` `e` ON `a`.`nisn`=`e`.`nisn`
LEFT JOIN `mulan_kelas` `b` ON `b`.`id`=`e`.`kelas_id`
LEFT JOIN `mulan_prodi` `c` ON `c`.`id`=`e`.`prodi_id`
LEFT JOIN `mulan_jurusan` `d` ON `d`.`id`=`c`.`jurusan_id`
WHERE `a`.`aktif` = '1' 
AND `e`.`trashed` = '0'
AND `e`.`aktif` = '1'
GROUP BY `e`.`nisn`
ORDER BY `e`.`nama` ASC
ERROR - 2022-07-06 23:47:16 --> Severity: error --> Exception: cURL error 6: Could not resolve host: isb (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) D:\softwareInstalled\laragon\www\lkpp\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php 207
ERROR - 2022-07-06 23:48:38 --> Severity: error --> Exception: cURL error 6: Could not resolve host: isb (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) D:\softwareInstalled\laragon\www\lkpp\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php 207
ERROR - 2022-07-06 23:51:25 --> Severity: error --> Exception: cURL error 6: Could not resolve host: isb (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) D:\softwareInstalled\laragon\www\lkpp\vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php 207
