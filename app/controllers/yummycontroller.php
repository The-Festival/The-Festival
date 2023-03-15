<?php
class YummyController
{
    public function yummy()
    {
        require __DIR__ . '/../views/yummy/yummy.php';
    }
    public function yummyDetail()
    {
        require __DIR__ . '/../views/yummy/yummyDetail.php';
    }
}