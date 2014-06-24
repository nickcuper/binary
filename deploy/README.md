# Waka Deploy

A bunch of shell scripts to update yii projects with git.

## Features

* Logs every update.
* Checks your app on your host before deploying.

	Default checks are:
	
	* You working dir is clean (everything is commited).
	* All git conflicts are merged.
	* All your php files have no syntax errors.

* Checks your servers working dir is clean.
* Calls commands on server after update.

	By default there is one command: `yiic migrate`.
	
	There are two more commented commands: `./protected/init.sh` and `composer install`.
	
	There is a var `$env` which can affect the build logic.

## Howto

1. Unpack this to your `protected/deploy` directory.
2. Update your server manually
3. Profit.

Now you can call `protected/deploy/run.sh user@host /path/to/app/` to deploy your app.

Or you can create separate comand for deploying to every server. Template for this command is in `deploy.tpl.sh`.

And you can call `update.sh prod` manually on the server 

## You may want to change

* **Application directory** - it is stored in `common.sh` in var `$appdir`.
* **Log file path** - it is stored in `common.sh` in var `$appdir`.
* **Validations before deploy** - all validations are stored in `check-valid.sh`.
* **Commands after deploy** - all commands are stored in `build.sh`.
