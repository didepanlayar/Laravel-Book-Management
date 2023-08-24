<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->username = "administrator";
        $administrator->name = "Superuser";
        $administrator->email = "administrator@email.com";
        $administrator->roles = json_encode(["Administrator"]);
        $administrator->password = \Hash::make("Secret2023!");
        $administrator->avatar = "administrator.png";
        $administrator->address = "Jakarta Setalan, DKI Jakarta, Indonesia";
        $administrator->save();
        $this->command->info("Administrator user created successfully.");
    }
}
