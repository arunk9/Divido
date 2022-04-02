# Coding Challenge (Configuration)
This assessment is focused around writing a parser for configuration files.

## Scenario

For our (fictional) application to work correctly, we need to
be able to load one or more configuration files from disk and
merge them together. We have the following requirements:

1. It must be possible to specify multiple configuration files
   to be loaded, and have later files override settings
   in earlier ones.

2. It must be possible to retrieve parts of the configuration
   by a dot-separated path; this should work for both sections
   and for individual keys, no matter how deeply nested.

3. Your code should expose a method that accepts a string with
   the dotted notation, eg: `get("database.host")` please do not
   just convert the JSON into an object, the aim of this test is
   to see how you implement that retrival logic

So, for the following configuration file:
```json
{
  "environment": "production",
  "database": {
    "host": "mysql",
    "port": 3306,
    "username": "divido",
    "password": "divido"
  },
  "cache": {
    "redis": {
      "host": "redis",
      "port": 6379
    }
  }
}
```

The key `database.host` should return the string `mysql` and the key `cache` should return the entire contents of the `cache` property.

## Steps to run application

1. Clone the application
2. Run ``composer install``
3. Create instance of ``Config`` and use ``get`` method to read the configuration variable

## Example
``$instance = \Divido\Config::getInstance();``    
``$instance->get('database');``

## Steps to run unit tests
``php vendo/bin/codecept run unit ``
