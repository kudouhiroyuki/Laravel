<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder {
	public function run() {
		DB::table('blog_categorys')->insert([
			['category_id' => 'A0001', 'category_name' => 'ブログの始め方'],
			['category_id' => 'B0001', 'category_name' => '動画編集の始め方'],
		]);
		DB::table('blog_posts')->insert([
			[
				'title' => 'さくらのレンタルサーバのWordPressブログの始め方【2022年最新版】',
				'body' => 'さくらのレンタルサーバは、月500円の安さで利用できるレンタルサーバー。1996年から運営されており、サーバーの安定感において国内トップクラスの信頼を集めています。<br>今回は、さくらのレンタルサーバでWordPressブログを始める方法を画像付きでわかりやすく解説します。ブログ開設後にすべきことも紹介するので、最後まで読めばブログ運営の準備はすべて整いますよ。',
				'category_id' => 'A0001',
				'main_image' => 'images/119358684dffc0b226c7b59372776a88.png'
			],[
				'title' => '【無料】動画編集におすすめのフリーBGMサイト12選【素材の選び方】',
				'body' => '動画編集において、BGMの役割はとても重要です。最適なBGMを挿入することによって、視聴者にメインコンテンツで伝えたい内容や動画の雰囲気を分かりやすく伝えることができます。<br>しかし、動画編集を始めたばかりの方の中には「どうやってBGM入手すればいいのか分からない」といった悩みを抱えている方も多いでしょう。',
				'category_id' => 'B0001',
				'main_image' => 'images/119358684dffc0b226c7b59372776a88.png'
			],
		]);
	}
}

