## Postcoder API Wrapper

### Prerequisites

Laravel 11

Laravel Sanctum

Redis

SQLite database for ease of use

No starter kit is installed.


#### Installation

Clone the repo - XXXXXXXXX

```php
composer install
```


Add `POSTCODER_API_KEY=XXX-XX-XXXX` to your `.env`
---

After creating a user in your SQLite Database, visit your url followed by: `/api/sanctum/token`
This will return a Laravel Sanctum key.

Add this to Authorization header as a Bearer token value, you should have the user authenticated.


Afterwhich you can visit `/api/lookup?searchTerm=NR1 1NE` with any postcode search term to get a response from Postcoder API.
