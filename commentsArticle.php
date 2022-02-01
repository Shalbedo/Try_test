<?php
class CommentsArticle {
    private $commentAndPoster;

    public function __construct(string $comment,string $poster)
    {
        $comments[$poster]=$comment;
        $this->commentAndPoster=$comments;
    }
}