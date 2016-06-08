<?php

namespace SeBuDesign\SqlServerGrammar\Tests;

class SchemaGrammarTest extends TestCase
{
    /**
     * It should use our custom SQL Server Grammar
     */
    public function testSchemaGrammarIsOverridden()
    {
        $grammar = $this->getGrammar();
        $this->assertInstanceOf('SeBuDesign\SqlServerGrammar\Extensions\Database\Grammars\SqlServerOptimizedGrammar', $grammar);
    }

    /**
     * Text should be a varchar(8000) column instead of a nvarchar(max)
     */
    public function testTextIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->text('text_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"text_column" varchar(8000) not null', $columnsSql[0]);
    }

    /**
     * Medium text should be a varchar(8000) column instead of a nvarchar(max)
     */
    public function testMediumTextIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->mediumText('text_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"text_column" varchar(8000) not null', $columnsSql[0]);
    }

    /**
     * Long text should be a varchar(8000) column instead of a nvarchar(max)
     */
    public function testLongTextIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->longText('text_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"text_column" varchar(8000) not null', $columnsSql[0]);
    }

    /**
     * Char should be a char(20) column instead of a nchar(20)
     */
    public function testCharIsChar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->char('char_column', 20);

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"char_column" char(20) not null', $columnsSql[0]);
    }

    /**
     * String should be a varchar(20) column instead of a nvarchar(20)
     */
    public function testStringIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->string('string_column', 20);

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"string_column" varchar(20) not null', $columnsSql[0]);
    }

    /**
     * String cannot get a 'max' as length
     * 
     * @expectedException \Exception
     */
    public function testStringLengthMaxNotAllowed()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->string('string_column', 'max');

        $grammar = $this->getGrammar();
        $this->getColumnSql($grammar, $blueprint);
    }

    /**
     * Char cannot get a 'max' as length
     * 
     * @expectedException \Exception
     */
    public function testCharLengthMaxNotAllowed()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->char('char_column', 'max');

        $grammar = $this->getGrammar();
        $this->getColumnSql($grammar, $blueprint);
    }

    /**
     * JSON should be a varchar(8000) column instead of a nvarchar(max)
     */
    public function testJsonIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->json('json_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"json_column" varchar(8000) not null', $columnsSql[0]);
    }

    /**
     * JSONb should be a varchar(8000) column instead of a nvarchar(max)
     */
    public function testJsonbIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->jsonb('jsonb_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"jsonb_column" varchar(8000) not null', $columnsSql[0]);
    }

    /**
     * Enum should be a varchar(255) column instead of a nvarchar(255)
     */
    public function testEnumIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->enum('enum_column', ['option_1', 'option_2']);

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"enum_column" varchar(255) not null', $columnsSql[0]);
    }
    
    /**
     * IP Address should be a varchar(45) column instead of a nvarchar(45)
     */
    public function testIpAddressIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->ipAddress('ip_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"ip_column" varchar(45) not null', $columnsSql[0]);
    }
    
    /**
     * Mac Address should be a varchar(17) column instead of a nvarchar(17)
     */
    public function testMacAddressIsVarchar()
    {
        $blueprint = $this->getNewBlueprint();
        $blueprint->macAddress('mac_column');

        $grammar = $this->getGrammar();
        $columnsSql = $this->getColumnSql($grammar, $blueprint);

        $this->assertEquals('"mac_column" varchar(17) not null', $columnsSql[0]);
    }
}