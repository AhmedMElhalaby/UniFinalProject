<?php



return [

    'Employee'=>[
        'crud_names' => 'الموظفين',
        'crud_name' => 'موظف',
        'crud_the_name' => 'الموظف',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'is_active' => 'الحالة',
        'avatar' => 'الصورة الشخصية',
    ],
    'Setting'=>[
        'crud_names' => 'الإعدادات',
        'crud_name' => 'اعداد',
        'crud_the_name' => 'الاعداد',
        'key' => 'الإعداد',
        'name' => 'الاسم',
        'value' => 'القيمة',
        'title' => 'العنوان',
        'page'=>'الصفحات الثابته',
        'constant'=>'الثوابت',
     ],
    'Permission'=>[
        'crud_names' => 'الصلاحيات',
        'crud_name' => 'صلاحية',
        'crud_the_name' => 'الصلاحية',
        'id' => '#',
        'name' => 'الاسم',
    ],
    'Role'=>[
        'crud_names' => 'الأدوار',
        'crud_name' => 'دور',
        'crud_the_name' => 'الدور',
        'id' => '#',
        'name' => 'الاسم',
        'permissions' => 'الصلاحيات',
    ],
    'Lecturer'=>[
        'crud_names' => 'المحاضرين',
        'crud_name' => 'محاضر',
        'crud_the_name' => 'المحاضر',
        'id' => '#',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'identity_number' => 'رقم الهوية',
        'address' => 'العنوان',
        'gender' => 'الجنس',
        'scientific_grade' => 'الدرجة العلمية',
        'avatar' => 'الصورة الشخصية',
        'is_active' => 'الحالة',
        'gender_enum'=>[
            \App\Enums\Gender::Male->value=>'ذكر',
            \App\Enums\Gender::Female->value=>'أنثى',
        ],
        'scientific_grade_enum'=>[
            \App\Enums\ScientificGrade::Bachelor->value=>'بكالوريوس',
            \App\Enums\ScientificGrade::Master->value=>'ماستر',
            \App\Enums\ScientificGrade::PHD->value=>'دكتوراه',
        ]
    ],
    'Course'=>[
        'crud_names' => 'الدورات',
        'crud_name' => 'دورة',
        'crud_the_name' => 'الدورة',
        'id' => '#',
        'name' => 'الاسم',
        'details' => 'التفاصيل',
        'location' => 'الموقع',
        'lecturer_id' => 'المحاضر',
        'start_date' => 'تاريخ بدايه الدورة',
        'end_date' => 'تاريخ نهايه الدورة',
        'course_days' => 'عدد أيام الدورة',
        'course_hours' => 'عدد ساعات الدورة',
        'lecture_start_time' => 'ساعه بدايه المحاضرة',
        'image' => 'الصورة',
        'is_active' => 'الحالة',
    ],
    'CourseSuggestion'=>[
        'crud_names' => 'اقتراحات الدورات',
        'crud_name' => 'اقتراح',
        'crud_the_name' => 'الاقتراح',
        'id' => '#',
        'course_name' => 'اسم الدورة',
        'student_id' => 'الطالب',
        'note' => 'ملاحظات'
    ],
    'Student'=>[
        'crud_names' => 'الطلبة',
        'crud_name' => 'طالب',
        'crud_the_name' => 'الطالب',
        'id' => '#',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'identity_number' => 'رقم الهوية',
        'std_number' => 'رقم الطالب الجامعي',
        'password' => 'كلمة المرور',
        'gender' => 'الجنس',
        'scientific_grade' => 'الدرجة العلمية',
        'birthday' => 'تاريخ الميلاد',
        'address' => 'العنوان',
        'avatar' => 'الصورة الشخصية',
        'is_active' => 'الحالة',
        'gender_enum'=>[
            \App\Enums\Gender::Male->value=>'ذكر',
            \App\Enums\Gender::Female->value=>'أنثى',
        ],
        'scientific_grade_enum'=>[
            \App\Enums\ScientificGrade::Bachelor->value=>'بكالوريس',
            \App\Enums\ScientificGrade::Master->value=>'ماستر',
            \App\Enums\ScientificGrade::PHD->value=>'دكتوراه',
        ]
    ],
    'Advertisement'=>[
        'crud_names' => 'الإعلانات',
        'crud_name' => 'إعلان',
        'crud_the_name' => 'الإعلان',
        'id' => '#',
        'title' => 'العنوان',
        'details' => 'التفاصيل',
        'url' => 'رابط الإعلان',
        'image' => 'صورة الإعلان',
        'is_active' => 'الحالة',
    ],
    'Article'=>[
        'crud_names' => 'المقالات',
        'crud_name' => 'مقال',
        'crud_the_name' => 'المقال',
        'id' => '#',
        'title' => 'العنوان',
        'details' => 'التفاصيل',
        'image' => 'صورة المقال',
        'is_active' => 'الحالة',
    ],
    'CourseStudent'=>[
        'crud_names' => 'الطلبه المسجلين',
        'crud_name' => 'طالب',
        'crud_the_name' => 'الطالب',
        'id' => '#',
        'student_id' => 'الطالب',
        'is_paid' => 'حالة الدفع',
    ],
];