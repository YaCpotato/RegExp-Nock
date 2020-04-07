<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期データ用意（列名をキーとする連想配列）
        $users = [
                    [
                        'name' => 'サンプルユーザー1',
                        'email' => 'sample1@sample.com',
                        'password' => 'abc'
                    ],
                    [   
                        'name' => 'サンプルユーザー2',
                        'email' => 'sample2@sample.com',
                        'password' => 'def'
                    ],
                    [
                        'name' => 'サンプルユーザー3',
                        'email' => 'sample3@sample.com',
                        'password' => 'ghe'
                    ]
                ];

        // 登録
        foreach($users as $user) {
        \App\User::create($user);
        }
    }
}
