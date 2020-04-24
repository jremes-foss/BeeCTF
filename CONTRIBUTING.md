# Contributing to BeeCTF
BeeCTF is an Open Source, community-driven project. I would be very happy to receive help making this project better and contributions are very welcome. If you'd like to contribute, please read the following guidelines in this document.

## General

### Contributor Covenant
First of all, please note that this project is released with a [Contributor Covenant](https://www.contributor-covenant.org/). By contributing to this project you agree to abide by it's terms. 

### Creating Issues
One way you can make BeeCTF better project is by pointing out issues. This can be anything from pointing out typos to larger feature requests. Please put enough information for me to understand the issue properly. If you are reporting bugs, please include the following information:

- A description of the issue, and how to reproduce it.
- An example of location where this bug occurs. 

Especially the last one is very important so I can debug the issue and see where the bug occurs. 

## Contributing Code 

### Conventions
The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL
NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and
"OPTIONAL" in this document are to be interpreted as described in
[RFC 2119](https://www.ietf.org/rfc/rfc2119.txt).

### Architecture
As [Laravel](https://laravel.com/) project, BeeCTF is following [MVC](https://www.codecademy.com/articles/mvc) pattern. All new code added to BeeCTF must follow this pattern. Middleware, Guards, Facades and Contracts are part of Laravel application logic request cycle. In infrastructure level, BeeCTF supports Docker and native web servers, Nginx or Apache is heavily recommended. Please see the Dockerfile and docker-compose.yml for details. 

### Code Style 
BeeCTF follows [PSR-2](https://www.php-fig.org/psr/psr-2/) code standard, and [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard. All code in BeeCTF must follow these standards. Before submitting your patch, please make sure these standards are being fulfilled.

### Dependencies
Since the idea is to create as light-weight application as possible, adding excessive dependencies (especially [npm](https://www.npmjs.com/) dependencies) should be avoided. 

### Migrations and Database
When creating new migrations, please make sure the table names specified in the schema are descriptive. In addition, due to performance reasons, the column count should be kept at minimum. It's better to create more tables with less columns than one big table with more columns. 
