<?php
namespace SeBuDesign\SqlServerGrammar\Tests;

use ReflectionMethod;

use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint as Blueprint;
use Illuminate\Database\Schema\Grammars\Grammar as Grammar;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use SeBuDesign\SqlServerGrammar\Tests\Stubs\PdoStub;

class TestCase extends BaseTestCase
{
    /**
     * Setup the test application
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = new Application();
        $app->register(\Illuminate\Database\DatabaseServiceProvider::class);
        $app->register(\SeBuDesign\SqlServerGrammar\SqlServerGrammarServiceProvider::class);

        return $app;
    }

    /**
     * Creates a new connection
     *
     * @return mixed
     */
    public function makeConnection()
    {
        $pdo = new PdoStub();

        return $this->app->make('db.connection.sqlsrv', [$pdo, 'database']);
    }

    /**
     * Creates a new Blueprint
     *
     * @param string $table
     *
     * @return \Illuminate\Database\Schema\Blueprint
     */
    public function getNewBlueprint($table = 'table')
    {
        return new Blueprint($table);
    }

    /**
     * Get the builder blueprint
     *
     * @param \Illuminate\Database\Schema\Builder $builder
     * @param string                              $table
     *
     * @return mixed
     */
    public function getBuilderBlueprint(Builder $builder, $table = 'table')
    {
        return $this->callRestrictedMethod($builder, 'createBlueprint', [$table]);
    }

    /**
     * Get the column sql
     *
     * @param \Illuminate\Database\Schema\Grammars\Grammar $grammar
     * @param \Illuminate\Database\Schema\Blueprint        $blueprint
     *
     * @return mixed
     */
    public function getColumnSql(Grammar $grammar, Blueprint $blueprint)
    {
        return $this->callRestrictedMethod($grammar, 'getColumns', [$blueprint]);
    }

    /**
     * Get the default schema
     * 
     * @return mixed
     */
    public function getGrammar()
    {
        $conn = $this->makeConnection();
        $conn->useDefaultSchemaGrammar();

        return $conn->getSchemaGrammar();
    }

    /**
     * Calls a restricted method
     *
     * @param object $object
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function callRestrictedMethod($object, $method, array $args = [])
    {
        $reflectionMethod = new ReflectionMethod($object, $method);
        $reflectionMethod->setAccessible(true);

        return $reflectionMethod->invokeArgs($object, $args);
    }
}