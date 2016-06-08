<?php

namespace SeBuDesign\SqlServerGrammar\Tests;

class ConnectionTest extends TestCase
{
    /**
     * It should use our custom SQL Server connection
     */
    public function testSqlsrvConnectionIsOverridden()
    {
        $conn = $this->makeConnection();
        $this->assertInstanceOf('SeBuDesign\SqlServerGrammar\Extensions\Database\Connections\SqlServerOptimizedConnection', $conn);
    }
}