# Huboo Todo List 

This is a todo list application built with Laravel, Vue JS and Postgres.

Test user credentials:

User: user1
    email: user1@example.com
password: secret

Once all commands below have been run you should be able to access the application at http://localhost:8772/

## Quick Start 

```bash
docker-compose build
```

```bash
docker-compose up
```

## Requirements

Docker and Docker Compose must both be installed on the host. Once the containers are started you can create databases with the following commands

You will need to create the main database and a test database:

```sql
 docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list;'"
```

```sql
 docker exec -it db bash -c "psql --username=postgres -c 'CREATE DATABASE todo_list_test;'"
```

```bash
bash ./commands.sh
```

Or run each command in the shell script manually.

This project can be setup with the commands below. Which will also run all migrations and seed database.

Additional SQL files have been provided in the sql directory. These can also be used to get a demo database up and running.

## Commands

Build the containers
```bash
docker-compose build
```

Start the containers
```bash
docker-compose up
```

Install PHP dependencies 
```bash
docker exec -it web bash -c "composer install"
```

Database rerun all migrations and seed
```bash
docker exec -it web bash -c "php artisan migrate:fresh && php artisan db:seed"
```

Install JS dependencies 
```bash
docker exec -it web bash -c "npm install"
```


Watch JS
```bash
docker exec -it web bash -c "npm run watch"
```

Run Tests:
```bash
docker exec -it web bash -c "php vendor/bin/phpunit" 
```

# New Feature

## Story 

As a user

I want a task to be created to change my password if it has been pwned 

So that my valuable information stays secret

## Acceptance Criteria 

Given I am logging in 

When I enter my password 

And I have not been pwned

Then I receive a message informing me I'm all secure

---

Given I am logging in 

When I enter my password 

And I have been pwned

Then a task will be created in the todo list to change my password

## Tech Spec

sha1 the unhashed password and split at char 5 into suffix and prefix.

The prefix is sent to haveibeenpwned.com and the suffix is used to compare against the response.

API Documentation: https://haveibeenpwned.com/API/v3

Searching by range
In order to protect the value of the source password being searched for, Pwned Passwords also implements a k-Anonymity model that allows a password to be searched for by partial hash. This allows the first 5 characters of a SHA-1 password hash (not case-sensitive) to be passed to the API (testable by clicking here):

GET https://api.pwnedpasswords.com/range/{first 5 hash chars}
When a password hash with the same first 5 characters is found in the Pwned Passwords repository, the API will respond with an HTTP 200 and include the suffix of every hash beginning with the specified prefix, followed by a count of how many times it appears in the data set. The API consumer can then search the results of the response for the presence of their source hash and if not found, the password does not exist in the data set. A sample response for the hash prefix "21BD1" would be as follows:

0018A45C4D1DEF81644B54AB7F969B88D65:1
00D4F6E8FA6EECAD2A3AA415EEC418D38EC:2
011053FD0102E94D6AE2F8B83D76FAF94F6:1
012A7CA357541F0AC487871FEEC1891C49C:2
0136E006E24E7D152139815FB0FC6A50B15:2
...
A range search typically returns approximately 500 hash suffixes, although this number will differ depending on the hash prefix being searched for and will increase as more passwords are added. There are 1,048,576 different hash prefixes between 00000 and FFFFF (16^5) and every single one will return HTTP 200; there is no circumstance in which the API should return HTTP 404.

Code	Body	Description
200	Hash suffixes   counts	Ok — all password hashes beginning with the searched prefix are returned alongside prevalence counts
Read more about how k-Anonymity and the Pwned Passwords range search protects searched passwords.

