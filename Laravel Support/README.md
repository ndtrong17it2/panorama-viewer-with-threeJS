## Require:

### MySQL database:

	+ Laravel 5+
	+ Create schemas/ db name: "test_db"
	+ Port: 3306
	
___*Delete folder Panorama-Laravel/public/storage if it exist___

## How to run:

1. Open Command Prompt(CMD) or GitBash in "Panorama-Laravel" folder.

2. Type:
```
composer install --no-scripts
```

```
php artisan migrate
```
 
 and
```
php artisan storage:link
```

 and then     
```
php artisan serve
```

3. Open ur browser with URL:
		```
		http://localhost:8000/
		```
                
4. Enjoy~~

## How to use:

1. You have to add the Area(Group of Image) first.

2. And then, you can add your panorama image.

___Self-Research!
