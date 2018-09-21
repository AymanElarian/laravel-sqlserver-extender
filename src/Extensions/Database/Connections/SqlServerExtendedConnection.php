<?php 
	namespace AymanElarian\Extensions\SqlServer;

use Illuminate\Database\SqlServerConnection;
use AymanElarian\Extensions\SqlServer\Grammars\SqlServerExtendedGrammar as SchemaGrammar;

class SqlServerExtendedConnection extends SqlServerConnection {

    /**
     * Get the default schema grammar instance.
     *
     * @return \AymanElarian\Extensions\SqlServer\Grammars\SqlServerExtendedGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }

   
}