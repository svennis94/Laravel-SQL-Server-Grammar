<?php namespace SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars;

use Exception;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar;
use Illuminate\Support\Fluent;

class SqlServerOptimizedGrammar extends SqlServerGrammar
{
    /**
     * Check the length attribute and throw exception if it is max
     * 
     * @param mixed $length
     *
     * @throws \Exception
     */
    protected function checkColumnLength($length)
    {
        if ($length === 'max') {
            throw new Exception("Max not allowed as length due to performance", 500);
        }
    }
    
    /**
     * Create the column definition for a char type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeChar(Fluent $column)
    {
        $this->checkColumnLength($column->length);

        return "char({$column->length})";
    }

    /**
     * Create the column definition for a string type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeString(Fluent $column)
    {
        $this->checkColumnLength($column->length);

        return "varchar({$column->length})";
    }

    /**
     * Create the column definition for a text type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeText(Fluent $column)
    {
        return 'varchar(8000)';
    }

    /**
     * Create the column definition for a medium text type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeMediumText(Fluent $column)
    {
        return 'varchar(8000)';
    }

    /**
     * Create the column definition for a long text type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeLongText(Fluent $column)
    {
        return 'varchar(8000)';
    }

    /**
     * Create the column definition for an enum type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeEnum(Fluent $column)
    {
        return 'varchar(255)';
    }

    /**
     * Create the column definition for a json type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeJson(Fluent $column)
    {
        return 'varchar(8000)';
    }

    /**
     * Create the column definition for a jsonb type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeJsonb(Fluent $column)
    {
        return 'varchar(8000)';
    }

    /**
     * Create the column definition for an IP address type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeIpAddress(Fluent $column)
    {
        return 'varchar(45)';
    }

    /**
     * Create the column definition for a MAC address type.
     *
     * @param  \Illuminate\Support\Fluent $column
     *
     * @return string
     */
    protected function typeMacAddress(Fluent $column)
    {
        return 'varchar(17)';
    }

}