<?php

    /**
     * kelebihannya bisa memecah method yang sudah ada jadi beberapa class
    */

    interface BlogPost
    {
        function execute($params);
    }

    class BlogUtility
    {
        static function titleToSlug() {}
        static function dataToHumanize() {}
        static function getMostViewedPosts() {}
        static function getFeaturedPosts() {}
        static function getMonetizedPosts() {}
    }

    class SaveBlogPost implements BlogPost
    {
        function execute($params) {
            BlogUtility::titleToSlug();
            $this->save();
        }

        protected function save() {
            // menyimpan ke db
        }
    }

    class UpdateBlogPost implements BlogPost
    {
        function execute($params) {
            BlogUtility::titleToSlug();
            $this->update();
        }

        protected function update() {
            // menyimpan ke db
        }
    }

    class GetBlogPost implements BlogPost
    {
        function execute($params) {
            BlogUtility::dataToHumanize();
            if($singlePost) { // jika yang di post satu data
                $this->getPost();
            } else {
                $this->getPosts();
            }
        }

        function getPost() {

        }

        function getPosts() {
        
        }
    }

    (new SaveBlogPost())->execute($params);

