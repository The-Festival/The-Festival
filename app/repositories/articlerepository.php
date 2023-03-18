<?php
require __DIR__ . '/baserepository.php';
require __DIR__ . '/../models/article.php';

class ArticleRepository extends BaseRepository {

    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM article");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}