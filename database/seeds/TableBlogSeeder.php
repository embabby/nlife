<?php

use Illuminate\Database\Seeder;

class TableBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Blog::create([
            'image'=>'blog1.jpg',
            'cover_image'=>'blog1.jpg',
            'title'=>'This Blog No One',
            'body'=>'t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma',
        ]);
        \App\Blog::create([
            'image'=>'blog2.jpg',
            'cover_image'=>'blog2.jpg',
            'title'=>'This Blog No Two',
            'body'=>'t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma',
        ]);
        \App\Blog::create([
            'image'=>'blog3.jpg',
            'cover_image'=>'blog3.jpg',
            'title'=>'This Blog No Three',
            'body'=>'t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma t is a long established fact that a reader will be distracted by
             the readable content of a page when looking at its layout. 
            The point of using Lorem Ipsum is that it has a more-or-less norma',
        ]);
    }
}
