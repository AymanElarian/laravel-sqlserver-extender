<?php 
	namespace AymanElarian\Extensions\SqlServer\Grammars;

use Exception;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar;
use Illuminate\Support\Fluent;

class SqlServerExtendedGrammar extends SqlServerGrammar
{
    /**
     * Compile the query to determine if a table exists.
     *
     * @return string
     */
    public function compileTableExists()
    {
    return "select * from sys.objects inner join sys.schemas on objects.schema_id = schemas.schema_id where objects.type = 'U' and ( schemas.name + '.' + objects.name = ? or objects.name = ? )";
    }
}