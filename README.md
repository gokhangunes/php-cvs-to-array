### Converts specified csv file to php array

```php
 	   $file = new CVS_ARRAY();
        $file->setFileName("data.csv");
        $file->toArray();

		print_r($file->getContent());
```
or
```php
 	   $file = new CVS_ARRAY();
        $file->setFileName("data.csv");
		
		print_r($file->toArray());

```