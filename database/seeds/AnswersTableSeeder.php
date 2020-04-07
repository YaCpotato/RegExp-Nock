<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期データ用意（列名をキーとする連想配列）
        $answers = [
                    [
                        'answer' => 'PHP Book',
                        'user_id' => 1,
                        'target_q_id' => 1,
                        'comments' => 'サンプルコメント'
                    ],
                    [
                        'answer' => 'Laravel Book',
                        'user_id' => 1,
                        'target_q_id' => 2,
                        'comments' => 'サンプルコメント'
                    ],
                    [
                        'answer' => 'Ruby Book',
                        'user_id' => 2,
                        'target_q_id' => 2,
                        'comments' => 'サンプルコメント'
                        ]
                    ];

        // 登録
        foreach($answers as $answer) {
            \App\Answer::create($answer);
        }
    }
}
