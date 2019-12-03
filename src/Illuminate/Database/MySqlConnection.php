<?php

namespace Audentio\LaravelBase\Illuminate\Database;

use Audentio\LaravelBase\Illuminate\Database\Schema\Blueprint;
use Audentio\LaravelBase\Illuminate\Database\Schema\Grammars\MySqlGrammar as SchemaGrammar;

class MySqlConnection extends \Illuminate\Database\MySqlConnection
{
    public function getSchemaBuilder()
    {
        $builder = parent::getSchemaBuilder();

        $builder->blueprintResolver(function($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }

    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }
}