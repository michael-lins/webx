## Welcome to Webx (tiny) php framework

Tiny and simple framework to illustrate an implementation of a web framework with static routes using Php | Study purposes for programming classes.

This was a design POC architecture for academic use forged as a gift for a friend teaching classes in web programming.

You may use it as it is. There is no plan on continuing this project (well...who knows in the future!)

Feel free to send comments.

### Installation

```markdown
composer require longanime/webx
```

### Architectre

Simple View-Controller (no model) with static route approach.

Folder structure:

|-app/ _root folder of your application_
|--actions/ _your actions classes_
|--view/ _your view classes (matching actions' names)_
|-actions.php _Build your actions and rounting_
|-app.php _Your application configuration_
|-index.php _App caller_

### Usage

Create an `app.php` file in your root folder and inialize a new App.

```markdown
$app = new App( "app-name" );
```

You can create your actions/rountings direct inside the `app.php` file or you could create an `actions.php` file and inside of it require individual controllers (no enforced, for now).

When creating, for each action it will seek for
1. an action class: a file under /app/actions/[ActionName].class.php
2. a view: a file under /app/views/[ActionName].php
 
*If the action does not needs a view, just create the class file under (1)*

There is an example app called [webx-app](https://github.com/michael-lins/webx-app/) available on github.

### Support or Contact

You can reach me at michael@longanime.com.br

Good Coding!
