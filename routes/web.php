<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('mikrotik/getconfig/{serial}/generate-rsc','App\Http\Controllers\MikroTikController@generateRsc')->name('mikrotik.generate-rsc');
Route::get('mikrotik/getconfig/{serial}/alter-rsc.alter','App\Http\Controllers\MikroTikController@alterRsc')->name('mikrotik.alter-rsc');
Route::get('mikrotik/downloads/{version}/{arch}/generate-upgrade-xml.xml','App\Http\Controllers\MikroTikController@generateUpgradeXml')->name('mikrotik.generate-upgrade-xml');
Route::get('mikrotik/downloads/{version}/{arch}/{extrapackage}/generate-upgrade-xml.xml','App\Http\Controllers\MikroTikController@generateUpgradeXml')->name('mikrotik.generate-upgrade-xml-with-extra-package');
