<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'type' => 'A',
        ]);
        $mal_ids = [1,19,22,47,68,71,120,123,135,139,150,169,175,199,205,227,249,320,356,371,
                    381,430,482,521,525,528,531,534,538,541,544,550,563,566,603,755,764,777,780,
                    795,813,853,936,1002,1011,1017,1126,1132,1164,1210,1364,1367,1519,1535,1559,
                    1726,1735,1840,2002,2107,2167,2217,2404];
        //$aux = 3001;
        //while($aux < 3000){
        foreach($mal_ids as $id){
            $url = 'https://api.jikan.moe/v3/anime/'.$id;
            try{
                $dado = json_decode(file_get_contents($url));
                DB::table('animes')->insert([
                    'mal_id' => $dado->mal_id,
                    'title' => $dado->title,
                    'title_english' => $dado->title_english,
                    'title_japanese' => $dado->title_japanese,
                    'episodes' => $dado->episodes,
                    'score' => $dado->score,
                    'scored_by' => $dado->scored_by,
                    'synopsis' => $dado->synopsis,
                    'url' => $dado->url,
                    'image_url' => $dado->image_url,
                ]);
                //$aux++;
                sleep(2);
            }catch(\Exception $ex){
                //$aux++;
            }
        }
    }
}
