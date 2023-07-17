<?php

    /**
     * sebuah pattern untuk mengelompokkan beberapa method 
     * atau method tunggal yang melakukan tugas yang spesifik
     * dan lebih fokus pada satu tujuan
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