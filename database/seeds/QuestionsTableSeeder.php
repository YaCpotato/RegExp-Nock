<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期データ用意（列名をキーとする連想配列）
        $questions = [
                    [
                        'content' => 'サンプル質問1',
                        'answer' => '/.*>$/',
                        'user_id' => 1,
                        'comments' => 'サンプルコメント'
                    ],
                    [   
                        'content' => 'サンプル質問2',
                        'answer' => '/.*>$/',
                        'user_id' => 2,
                        'comments' => 'サンプルコメント'
                    ],
                    [   
                        'content' => 'サンプル質問3',
                        'answer' => '/.*>$/',
                        'user_id' => 2,
                        'comments' => 'サンプルコメント'
                    ],
                    [
                        'content' => 'サンプル質問4',
                        'answer' => '/.*>$/',
                        'user_id' => 3,
                        'comments' => 'サンプルコメント'
                    ]
                ];

        // 登録
        foreach($questions as $question) {
            \App\Question::create($question);
        }
    }
}
