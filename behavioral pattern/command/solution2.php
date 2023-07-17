<?php

    /**
     * misalkan kita tidak mau membuang method yang ada di problem.php
     * karena terlalu banyak terkadang kita kesulitan
     * mak buat satu layer lagi untuk memecah/membagi method method tersebut
    */

    class BlogService
    {
        function save() {}
        function update() {}
        function delete() {}
        function getPost() {}
        function getPosts() {}
        function titleToSlug() {}
        function dataToHumanize() {}
        function getMostViewedPosts() {}
        function getFeaturedPosts() {}
        function getMonetizedPosts() {}
    }

    interface BlogPost
    {
        function execute($params);
    }

    class SaveBlogPost implements BlogPost
    {
        function execute($params) {
            $blog = new BlogService();
            $blog->titleToSlug();
            $blog->update();
        }
    }

    (new SaveBlogPost())->execute($params);