<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $Settings = [
            [
                'key'=>'phone',
                'type'=>SettingType::Constant,
                'name'=>'رقم الهاتف',
                'title'=>'',
                'value'=>'082812345',
                'image'=>'',
            ],
            [
                'key'=>'mobile',
                'type'=>SettingType::Constant,
                'name'=>'رقم الجوال',
                'title'=>'',
                'value'=>'0595613282',
                'image'=>'',
            ],
            [
                'key'=>'email',
                'type'=>SettingType::Constant,
                'name'=>'البريد الالكتروني',
                'title'=>'',
                'value'=>'p.r@alazhar.edu.ps',
                'image'=>'',
            ],
            [
                'key'=>'facebook_url',
                'type'=>SettingType::Constant,
                'name'=>'رابط الفيسبوك',
                'title'=>'',
                'value'=>'https://www.facebook.com/profile.php?id=100079631564228',
                'image'=>'',
            ],
            [
                'key'=>'youtube_url',
                'type'=>SettingType::Constant,
                'name'=>'رابط اليوتيوب',
                'title'=>'',
                'value'=>'https://www.facebook.com/profile.php?id=100079631564228',
                'image'=>'',
            ],
            [
                'key'=>'university_url',
                'type'=>SettingType::Constant,
                'name'=>'رابط الجامعة',
                'title'=>'',
                'value'=>'https://www.facebook.com/profile.php?id=100079631564228',
                'image'=>'',
            ],
            [
                'key'=>'footer_about',
                'type'=>SettingType::Constant,
                'name'=>'وصف الفوتر',
                'title'=>'',
                'value'=>'',
                'image'=>'',
            ],
            [
                'key'=>'address',
                'type'=>SettingType::Constant,
                'name'=>'العنوان',
                'title'=>'',
                'value'=>'غزة-فلسطين',
                'image'=>'',
            ],
            [
                'key'=>'about',
                'type'=>SettingType::Page,
                'name'=>'من نحن',
                'title'=>'',
                'value'=>'',
                'image'=>'',
            ],
        ];
        Setting::insert($Settings);
    }
}
