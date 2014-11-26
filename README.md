ZF2Doctrine2SqlsrvTypes
=======================
If you are working with Microsoft MSSQL and its "Sqlsrv"-Driver with Zend Framework2 and Doctrine2 you will
have some troubles with the "datetime" and "date" types in Doctrine2. The MSSQL-Server doesn't accept the defined standard
format "Y-m-D H:i:s" or "Y-m-D" in Doctrine2.

To avoid problems with the format use the **ZF2Doctrine2SqlsrvTypes** module which integrates the two new DBAL Types SqlsrvDatetime and SqlsrvDate.

After installing the module via composer just replace the types in your doctrine2 notation from "datetime" to "SqlsrvDatetime" and
from "date" to "SqlsrvDate".

Installation via Composer
--------
1. Composer

Just add the following dependency to your composer.json file

	```json
    {
        "require": {
			"maegnes/ZF2Doctrine2SqlsrvTypes": "dev-master"
    }
	```
2. Or clone this project into your `./vendor/` directory.