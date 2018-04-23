# WPDB #

_MySQL Database Wrapper for WordPress Posts_

- **Author:** Roderic Linguri <rlinguri@meowwolf.com>
- **Copyright:** 2018 Digices LLC

### Installing with Composer ###

_1. Include the following in the root level of your composer.json:_

```JSON
{
    "repositories": [
        {
            "url": "https://github.com/digices-llc/wpdb",
            "type": "vcs"
        }
    ],
    "require": {
        "digices/wpdb": ">=0.6.3"
    }
}

```

_2. Navigate to your project directory and run:_ `composer install`


_3. Edit the file_ `./etc/config.php` _to provide your database connection details_

### Class Reference ###

### Change Log ###

###### Version 0.6.3 ######
Prevent db crash if ID less than zero

###### Version 0.6.2 ######
Add Source files

###### Version 0.6.1 ######
Create Project Framework
