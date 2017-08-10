<?php namespace SeBuDesign\SqlServerGrammar\Extensions\Database\Connections;

use Illuminate\Database\SqlServerConnection;
use SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars\SqlServerOptimizedGrammar as SchemaGrammar;
use SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars\SqlServerOptimizedQueryGrammar as QueryGrammar;

class SqlServerOptimizedConnection extends SqlServerConnection {

    /**
     * Get the default schema grammar instance.
     *
     * @return \SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars\SqlServerOptimizedGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }

    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\SqlServerGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar);
    }
}