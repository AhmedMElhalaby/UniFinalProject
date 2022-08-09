<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Article;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Employee;
use App\Models\Lecturer;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Student;
use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    public function run(): void
    {
        $Employee = Employee::create([
            'name'=>'Ahmed M. Elhalaby',
            'email'=>'ahmedm.elhalaby@gmail.com',
            'password'=>'123456',
        ]);
        $Role = Role::create([
            'name'=>'المدير',
        ]);
        ModelRole::create([
            'model_id'=>$Employee->id,
            'role_id'=>$Role->id
        ]);
        foreach (Permission::all() as $permission){
            ModelPermission::create([
                'model_id'=>$Employee->id,
                'permission_id'=>$permission->id
            ]);
        }
//        Student::factory()->count(20)->create();
//        Lecturer::factory()->count(5)->create();
//        Course::factory()->count(20)->create();
//        Advertisement::factory()->count(3)->create();
//        Article::factory()->count(20)->create();
//        CourseStudent::factory()->count(20)->create();
    }
}
