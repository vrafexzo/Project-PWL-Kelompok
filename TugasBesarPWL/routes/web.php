<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('register');
// });

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "Vico Rafelino",
        "image" => "fotoprofil.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "tittle" => "Judul Post Pertama",
            "author" => "Vico Rafelino",
            "body" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ],
        [
            "tittle" => "Judul Post Kedua",
            "author" => "Vico Rafelino",
            "body" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]
        ];
    return view('posts',[
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});
