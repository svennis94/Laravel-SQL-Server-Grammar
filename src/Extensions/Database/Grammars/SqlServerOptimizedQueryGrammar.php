<?php namespace SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars;

use Illuminate\Database\Query\Grammars\SqlServerGrammar;

class SqlServerOptimizedQueryGrammar extends SqlServerGrammar
{
    /**
     * Get the format for database stored dates.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return config('database.date_format', 'Y-m-d H:i:s.000');
    }
}