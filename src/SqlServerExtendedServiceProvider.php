<?php

	namespace AymanElarian\Extensions\SqlServer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;
use AymanElarian\Extensions\SqlServer\SqlServerExtendedConnection;

class SqlServerExtendedServiceProvider extends ServiceProvider
{
    /**
     * Register the application services and bind the sqlsrv driver to our custom connection
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('sqlsrv', function ($connection, $database, $prefix, $config) {
            return new SqlServerExtendedConnection($connection, $database, $prefix, $config);
        });
    }
}
