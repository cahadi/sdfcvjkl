<?php

declare(strict_types=1);
namespace App\Models;

class ArticlesModel extends \App\Core\CoreModel
{
    public function __construct( $tableName)
    {
        parent::__construct( $tableName);
    }
}