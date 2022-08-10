<?php

namespace App\Models;

// use App\Models\Category;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post
{
    // use HasFactory;

    // protected $guarded = ['id'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    private static $blog_posts = [
        [
            'judul' => 'Judul Berita utama',
            'slug' => 'judul-berita-utama',
            'author' => 'Rahmad Riskiadi',
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus fugit, nesciunt delectus voluptatum cupiditate ea ad? Eaque exercitationem voluptate cumque sequi sint magni, ex inventore animi atque facilis, natus quo. Doloribus voluptate blanditiis facere asperiores odit iste voluptatum corporis atque eaque! Dicta, alias amet eius animi voluptatem fugit eos rem est laboriosam adipisci dignissimos, eum pariatur quod inventore recusandae nisi aliquid atque saepe accusamus debitis! Accusamus magnam provident omnis laborum repellendus quibusdam quas illum vel sequi maxime fugiat veniam quaerat velit, pariatur dolor itaque molestiae ipsa quae incidunt assumenda praesentium. Explicabo odio eveniet sequi quo ea rerum aut autem dicta.'
        ],
        [
            'judul' => 'Judul Berita Keduass',
            'slug' => 'judul-berita-kedua',
            'author' => 'Radevanka Albiansyah Rahmadi',
            'isi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus rem repudiandae veritatis labore suscipit deserunt natus incidunt iste sit, voluptate, aut enim, nemo aspernatur vitae a eaque. Maiores laboriosam nesciunt sequi debitis quos officia, temporibus deserunt nulla? Quam similique fugiat asperiores ea maxime? Reprehenderit, molestias labore suscipit libero quod ea accusantium vitae quos aliquam voluptatibus deleniti veritatis quidem nemo perspiciatis delectus iusto aut, et, sequi sed laboriosam repudiandae totam voluptates quae? Adipisci eveniet expedita eum aspernatur deserunt, maiores cumque! Excepturi, tempore? Ut ad nemo omnis. Qui illum est voluptatem sequi. Natus soluta porro praesentium ea voluptas aliquam unde, officia libero quidem repellendus quibusdam fuga odit ut inventore earum quia in. Temporibus maxime saepe voluptatibus aperiam eum ex sapiente excepturi quasi asperiores debitis ab, quisquam consequatur sequi modi alias facere vero. Recusandae et, repudiandae sit quibusdam eius in reprehenderit iusto earum, perspiciatis obcaecati quia quasi architecto culpa. Error ab quae perferendis.'
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p){
        //     if ($p['slug']===$slug) {
        //         $post = $p;

        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }

}
