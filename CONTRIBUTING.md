# Contributing to BeeCTF
BeeCTF is an Open Source, community-driven project. I would be very happy to receive help making this project better and contributions are very welcome. If you'd like to contribute, please read the following guidelines in this document.

## General

### Contributor Covenant
First of all, please note that this project is released with a [Contributor Covenant](https://www.contributor-covenant.org/). By contributing to this project you agree to abide by it's terms. 

### Creating Issues
One way you can make BeeCTF better project is by pointing out issues. This can be anything from pointing out typos to larger feature requests. Please put enough information for me to understand the issue properly. If you are reporting bugs, please include the following information:

- A description of the issue, and how to reproduce it.
- An example of location where this bug occurs. 

Especially the last one is very important so I can debug the issue and see where the bug occurs. There is a pre-made template. If you create an issue, please make sure to fill it.

## Contributing Code 

### Conventions
The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL
NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and
"OPTIONAL" in this document are to be interpreted as described in
[RFC 2119](https://www.ietf.org/rfc/rfc2119.txt).

### Architecture
As [Laravel](https://laravel.com/) project, BeeCTF is following [MVC](https://www.codecademy.com/articles/mvc) pattern. All new code added to BeeCTF must follow this pattern. Middleware, Guards, Facades and Contracts are part of Laravel application logic request cycle. In infrastructure level, BeeCTF supports Docker and native web servers, [Nginx](https://www.nginx.com/) or [Apache](https://httpd.apache.org/) is heavily recommended. Please see the Dockerfile and docker-compose.yml for details. 

### Code Style 
BeeCTF follows [PSR-2](https://www.php-fig.org/psr/psr-2/) code standard, and [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard. All code in BeeCTF must follow these standards. Before submitting your patch, please make sure these standards are being fulfilled.

### Dependencies
Since the idea is to create as light-weight application as possible, adding excessive dependencies (especially [npm](https://www.npmjs.com/) dependencies) should be avoided. 

### Migrations and Database
When creating new migrations, please make sure the table names specified in the schema are descriptive. In addition, due to performance reasons, the column count should be kept at minimum. It's better to create more tables with less columns than one big table with more columns.

### Continuous Integration
BeeCTF has a [Continuous Integration (CI)](https://en.wikipedia.org/wiki/Continuous_integration) pipeline. In order to pull request to be merged, all the checks have to pass. The CI pipeline includes a set of unit tests and [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) check. CodeSniffer uses PSR2 standard in the CI pipeline. If there are any issues found, build will fail.

### Unit Tests
BeeCTF has integrated unit tests as part of Laravel package. The unit test suite, [PHPUnit](https://phpunit.de/), uses in-memory [SQLite](https://www.sqlite.org/index.html) database to run the tests. To run the unit test suite, you must configure this in separate .env environment file in a following manner:

```
APP_NAME=BeeCTF
APP_ENV=testing
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost/

DB_CONNECTION=sqlite
DB_DATABASE=:memory:
DB_USERNAME=root
DB_PASSWORD=

BCRYPT_ROUNDS=4
CACHE_DRIVER=array
MAIL_DRIVER=array
QUEUE_CONNECTION=sync
SESSION_DRIVER=array
```

This file must be saved in project root. In addition of appropriate .env file, SQLite PHP extension must be enabled. With Debian-based Linux machines this can be enabled via:

```
sudo apt-get install php7.3-sqlite3
```

For Linux distributions using YUM:

```
sudo yum install php-sqlite3
```

### Pull Requests
Pull requests are welcome but must follow the best practices.
- Subject line should be kept under 50 characters.
- Description should be kept informative. For example: why was change necessary and how does the pull request address the problem? 
- If there is an issue open regarding the pull request, please link the open issue to description.

### Commit Messages
BeeCTF is following the 50/72 rule:
- First line of your commit message should be maximum 50 characters long.
- Each line in your description should wrap at the 72nd mark.

Please note that this rule is not strictly observed, it is more like "rule of thumb" guideline.But regardless it should be treated as best practice, even if not followed in a strict manner.

### Issues
You can create GitHub issues to report any issues with the software. For the sake of best practices, the issue report is already set up. Please be as detailed as possible and provide screenshots if applicable. If the issue you have found is a bug, then please provide instructions to reproduce it.
