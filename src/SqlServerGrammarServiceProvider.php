<?php

namespace SeBuDesign\SqlServerGrammar;

use Illuminate\Support\ServiceProvider;

class SqlServerGrammarServiceProvider extends ServiceProvider
{
    /**
     * Register the application services and bind the sqlsrv driver to our custom connection
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('db.connection.sqlsrv', 'SeBuDesign\SqlServerGrammar\Extensions\Database\Connections\SqlServerOptimizedConnection');
    }
}
