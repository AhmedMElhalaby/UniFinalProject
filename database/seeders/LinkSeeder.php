<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        $Links = [
            [
                'name'=>'إدارة الموقع',
                'url'=>'website_managements',
                'icon'=>'',
                'order'=>1,
                'parent_id'=>null,
            ],
            [
                'name'=>'الموظفين',
                'url'=>'employees',
                'icon'=>'supervisor_account',
                'order'=>2,
                'parent_id'=>1,
            ],
            [
                'name'=>'الأدوار',
                'url'=>'roles',
                'icon'=>'manage_accounts',
                'order'=>3,
                'parent_id'=>1,
            ],
            [
                'name'=>'محتوى الموقع',
                'url'=>'website_data',
                'icon'=>'',
                'order'=>4,
                'parent_id'=>null,
            ],
            [
                'name'=>'الإعدادات',
                'url'=>'settings',
                'icon'=>'settings',
                'order'=>5,
                'parent_id'=>4,
            ],
            [
                'name'=>'الإعلانات',
                'url'=>'advertisements',
                'icon'=>'featured_video',
                'order'=>6,
                'parent_id'=>4,
            ],
            [
                'name'=>'المقالات',
                'url'=>'articles',
                'icon'=>'article',
                'order'=>7,
                'parent_id'=>4,
            ],
            [
                'name'=>'إدارة الدورات',
                'url'=>'course_managements',
                'icon'=>'',
                'order'=>8,
                'parent_id'=>null,
            ],
            [
                'name'=>'المحاضرين',
                'url'=>'lecturers',
                'icon'=>'local_library',
                'order'=>9,
                'parent_id'=>8,
            ],
            [
                'name'=>'الدورات',
                'url'=>'courses',
                'icon'=>'cast_for_education',
                'order'=>10,
                'parent_id'=>8,
            ],
            [
                'name'=>'اقتراحات الدورات',
                'url'=>'suggestions',
                'icon'=>'history_edu',
                'order'=>11,
                'parent_id'=>8,
            ],
            [
                'name'=>'إدارة الطلبة',
                'url'=>'student_managements',
                'icon'=>'',
                'order'=>12,
                'parent_id'=>null,
            ],
            [
                'name'=>'الطلبة',
                'url'=>'students',
                'icon'=>'school',
                'order'=>13,
                'parent_id'=>12,
            ],
        ];
        Link::insert($Links);
    }
}
