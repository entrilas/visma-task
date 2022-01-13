# visma-task

<!-- ABOUT THE PROJECT -->

## About The Project (visma-task)

An application that allows users to register for apartment cleaning services. Users should be able to provide their personal information along with preferred date and time for the service. In addition, the administration should be able to print a list of everybody registered for a particular date. Application should be written in PHP and executed from CLI (https://www.php.net/manual/en/features.commandline.usage.php).


### Built With

This application is built without any frameworks, just a plain PHP with composer.

* [PHP]


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

Before using program user should create local database (MySQL database is used in the project) with name "visma" and run this migration command in the shell to create table, while being in the project folder:
* migrate
  ```
  php index.php --command='migrate'
  ```


<!-- USAGE EXAMPLES -->
## Usage

Possible commands:

[create,
edit,
delete,
print,
migrate]

Arguments:

command (create, edit, delete, print, migrate, import)
export (true, false)
name
email
phone_number
apartment_address
date ({year}-{month}-{day})
time ({13:15})


* create (example)
  ```
  php index.php --command='create' --name='Arnas' --email='testmail@mail.com' --phone_number='86543453212' --apartment_address='Street g. 3' --date='2011-	01-01' --time='13:15'
  ```

* edit (example)
  ```
  php index.php --command='edit' --id='2' --name='John' 
  ```

* delete (example)
  ```
  php index.php --command='delete' --id='1'
  ```

* print (example)
  if export==true data is printed to file(export.csv), otherwise its printed to console.
  ```
  php index.php --command='print' --export='true' --date='2011-01-01'
  php index.php --command='print' --export='false' --date='2011-01-01'
  ```

* migrate (example)
  ```
  php index.php --command='migrate'
  ```

* import (example)
  ```
  php index.php --command='import' --file='import.csv'
  ```


