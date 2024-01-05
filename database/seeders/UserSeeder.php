<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $table = new User();
        $table->name = $faker->name;
            $table->email = "admin@admin.com";
            $table->active = "true";
            $table->password = bcrypt("password");
            $table->sliderPermission = "edit";
            $table->noticePermission = "edit";
            $table->servicePermission = "edit";
            $table->teacherPermission = "edit";
            $table->schedulePermission = "edit";
            $table->galleryPermission = "edit";
            $table->userPermission = "edit";

        $table->save();
        $table = new User();
        $table->name = $faker->name;
            $table->email = "user@user.com";
            $table->active = "true";
            $table->password = bcrypt("password");
            $table->noticePermission = "view";
            $table->sliderPermission = "view";
            $table->servicePermission = "view";
            $table->teacherPermission = "view";
            $table->schedulePermission = "view";
            $table->galleryPermission = "view";
            $table->userPermission = "view";

        $table->save();

        $table = new User();
        $table->name = $faker->name;
            $table->email = "noperm@noperm.com";
            $table->active = "true";
            $table->password = bcrypt("password");
            $table->sliderPermission = "none";
            $table->noticePermission = "none";
            $table->servicePermission = "none";
            $table->teacherPermission = "none";
            $table->schedulePermission = "none";
            $table->galleryPermission = "none";
            $table->userPermission = "none";

        $table->save();
    }
}
