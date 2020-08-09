# RecipeJournal
 RecipeJournal with API, used for RecipeJournalApp data.
 
## Getting Started

 The RecipeJournal is divided into two parts, the RecipeJournalAPI and the RecipeJournalApp. The app can be compiled using Expo. For more information on running and compiling the app, please visit the RecipeJournalApp submodule - https://github.com/JohnVicious/RecipeJournalApp. The api needs to be placed on a server and the app needs to be able to point to that database on that server to gather its information
 
 ### Server Requirements
 
 In order to run the api, the following will be needed:
 
 * Apache
 * MySQL
 * PHP

### Prerequisites

Composer will be needed to install the dependencies.

* [Composer](https://getcomposer.org/download/) - Dependency Manager for PHP

### Installing

After cloning the repository, please copy the env.example file and rename it to .env. Then add your mysql connections parameters and create your database.

Pull composer dependencies via composer.json
```
composer install
```

## Authors

* **John Klein** - https://github.com/JohnVicious - https://www.johnklein.dev

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Future Plans

Please see the RecipeJournalApp github page for more information - https://github.com/JohnVicious/RecipeJournalApp