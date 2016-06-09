<?php namespace SeBuDesign\SqlServerGrammar\Extensions\Database\Connections;

use Illuminate\Database\SqlServerConnection;
use SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars\SqlServerOptimizedGrammar as SchemaGrammar;

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

}