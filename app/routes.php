<?php

$app->get('/', 'App\Controllers\HomeController:index')->setName('home');

$app->get('/siswa/list', 'App\Controllers\SiswaController:getListSiswa')->setName('list.siswa');

$app->post('/siswa/register', 'App\Controllers\SiswaController:createSiswa')->setName('register.siswa');

$app->put('/siswa/update/{id}', 'App\Controllers\SiswaController:editSiswa')->setName('update.siswa');

$app->delete('/siswa/delete/{id}', 'App\Controllers\SiswaController:softDelete')->setName('delete.siswa');
