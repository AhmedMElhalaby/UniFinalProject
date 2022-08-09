<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $Links = (new Link())->whereNull('parent_id')->get();
        foreach ($Links as $Link){
            $ParentPermission = Permission::create([
                'name'=>$Link->name,
                'key'=>$Link->url,
                'link_id'=>$Link->id,
                'parent_id'=>null,
            ]);
            foreach ($Link->children as $child){
                 Permission::create([
                    'name'=>$child->name,
                    'key'=>$child->url,
                    'link_id'=>$child->id,
                    'parent_id'=>$ParentPermission->id,
                ]);
            }
        }
    }
}
