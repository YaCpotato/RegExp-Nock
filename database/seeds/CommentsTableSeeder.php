<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'comment' => 'サンプルコメント1',
                'user_id' => 1,
                'question_id' => 2
            ],
            [
                'comment' => 'サンプルコメント2',
                'user_id' => 2,
                'question_id' => 2
            ],
            [
                'comment' => 'サンプルコメント3',
                'user_id' => 3,
                'question_id' => 1
            ],
            [
                'comment' => 'サンプルコメント4',
                'user_id' => 1,
                'question_id' => 2
            ]
        ];

        // 登録
        foreach($comments as $comment) {
            \App\Comment::create($comment);
            }
        
    }
}
