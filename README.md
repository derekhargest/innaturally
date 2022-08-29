# WPEngine Workflow for GMMB

This repository is a starting point for a modern WordPress workflow for GMMB and leverages the WPEngine hosting platform. This development product includes local development through lando, dependency management through webpack and deployment through GitHub actions. It uses WPEngine's deploy action to connect to the WPEngine Servers and deploy to each environment.

:exclamation: Before installing this workflow, it is good practice to make sure all development work is paused on the project. We will be using the production server's version of the theme code as a starting spot for all environments, if any work on development needs to be approved and pushed to production, complete that work before installing this workflow. :exclamation:

## Prerequisites

### For CI / CD through GitHub Actions:

GitHub: This product assumes the use of GitHub for version control and CI / CD ( this step only needs to be completed for one key )
* Generate a new SSH KEY - https://wpengine.com/support/ssh-keys-for-shell-access/#Generate_New_SSH_Key
* Add PRIVATE KEY to Organization Secrets

WPEngine: This product assumes a hosting provider of WPEngine. 
* Aquire access to GMMB's WPEngine account.
* Add the PUBLIC KEY to your WPEngine account by navigating to Profile > SSH keys > Create SSH key and pasting your public key in the field

### For Development:

* Install NVM - https://github.com/nvm-sh/nvm
* Install Lando - https://docs.lando.dev/getting-started/installation.html

:exclamation: Make sure all repo branches are up to date: we will be creating a new repo with the code on the PRODUCTION server as a base. :exclamation:

## Installation

### As part of an existing project that does not have a repo currently and this workflow has not been installed:

* Create new local installation of site if one has not already been set up:
	* Create new backup point in WPEngine, preferably from the dev environment so any code updates being worked on are included in your work. This backup will also include plugins and any other code added to the site. If media uploads are desired, feel free to add them as part of this backup.
	* Prepare Zip from backup point
	* Download Zip when preparation is complete
	* Unzip to desired folder
	* run:
		```
		lando init #select current folder as root
		```
			
		```
		lando db-import wp-content/mysql.sql #imports database from wpengine backup
		```
		```
		lando wp search-replace '//wpengineurl.wpengine.com' '//desiredurl.lndo.site' #Replaces database entries for local developement
		```
	* change wp-config file to point to the lando database:
		
		```
		DB_NAME - wordpress
		DB_USER - wordpress
		DB_PASSWORD - wordpress
		DB_HOST - database
		```
* Add working files from this repo and remove this repo's git folder
	
	```
	git remote add origin https://github.com/derekhargest/workflow-wpe.git
	```
	```
	git pull origin minimal
	```
	```
	rm -rf .git
	```
* edit the .env file in the root of the theme, editing the variables with the names of the corresponding environments from WPEngine:
	
	```
	PROD_ENVIRONMENT=prodname
	STG_ENVIRONMENT=stgname
	DEV_ENVIRONMENT=devname
	THEME_NAME=themename
	```
* Change the proxy address in webpack.config.js > plugins > BrowserSyncPlugin if not done already
* Create repo in github
* In terminal, in the theme folder, initialize git, add contents of the folder to the local repo, change the name of master to main, add the remote origin, push the main branch. The main branch needs to be created and pushed before other branches are created. This step will push code to the live server.

	```
	git init
	git add .
	git commit -m "first commit"
	git branch -M main
	git remote add origin git@github.com:[GMMBDevelopment/repo-name.git]
	git push origin main - THIS WILL DEPLOY TO THE LIVE SITE
	```

* Create the staging and development branches, based on the main branch

	```
	git checkout -b stage main
	git checkout -b dev main
	```

* At this point, development can be started (see development) on your local machine until first desired push
* When ready to push first commit:
	```
	git add (files to be added)
	git commit -m "commit message"
	git push -u origin dev
	```
* If developing on a feature branch, merge changes into the development repo when ready.
* This will deploy any code changes to the development environment in WPEngine
* When ready, commit and deploy to the staging and production environments
* GitHub actions will run 'npm run build' and deploy the necessary files to the corresponding environments

### As part of an existing project that has already had this workflow installed

* Create new local installation of site if one has not already been set up:
	* Create new backup point in WPEngine, preferably from the dev environment so any code updates being worked on are included in your work. This backup will also include plugins and any other code added to the site. If media uploads are desired, feel free to add them as part of this backup.
	* Prepare Zip from backup point
	* Download Zip when preparation is complete
	* Unzip to desired folder
	* run:
		```
		lando init #select current folder as root
		```
			
		```
		lando db-import wp-content/mysql.sql #imports database from wpengine backup
		```
		```
		lando wp search-replace '//wpengineurl.wpengine.com' '//desiredurl.lndo.site' #Replaces database entries for local developement
		```
	* change wp-config file to point to the lando database:
		
		```
		DB_NAME - wordpress
		DB_USER - wordpress
		DB_PASSWORD - wordpress
		DB_HOST - database
		```
* Clone project's repo into the themes folder in WordPress
* Develop on the projects dev branch and make commits, or make your own branch and merge your work accordingly
* Any work commited and pushed to the dev, stage, and main branches will deploy to the corresponding environments

### To start a new project:

* Create a new repo in GitHub or have someone with access rights create one
* Spin up a new WordPress site locally using lando: https://docs.lando.dev/wordpress/getting-started.html
* Using terminal, navigate to the wp-content/themes folder
* git clone this repo into the themes folder
* change the name of the folder to the desired theme name
* delete .git folder in the theme folder
* create a new site in wpengine
* create staging and dev environments for this new site in wpengine noting the name of the environments
* edit the .env file in the root of the theme, updating the variables with the names of the corresponding environments and theme name:

	``` 
	PROD_ENVIRONMENT=prodname
	STG_ENVIRONMENT=stgname
	DEV_ENVIRONMENT=devname
	THEME_NAME=themename
	```

* Change the proxy address in webpack.config.js > plugins > BrowserSyncPlugin
* Add any additional theme files you would like to initialize the repo with. Alternativley, development work on the theme can be started now, continue these instructions when ready to commit for the first time.
* In terminal, in the theme folder, initialize git, add contents of the folder to the local repo, change the name of master to main, add the remote origin, push the main branch. The main branch needs to be created and pushed before other branches are created. This step will push code to the live server.

	```
	git init
	git add .
	git commit -m "first commit"
	git branch -M main
	git remote add origin git@github.com:GMMBDevelopment/repo-name.git
	git push origin main - THIS WILL DEPLOY TO THE LIVE SITE
	```
* Create the staging and development branches, based on the main branch

	```
	git checkout -b stage main
	git checkout -b dev main
	```

* At this point, development can be started on your local until desired push
* When ready to push first commit:
	```
	git add ...
	git commit -m ...
	git push -u origin dev
	```
	
* If developing on a feature branch, merge changes into the development repo when ready.
* This will deploy any code changes to the development environment in WPEngine
* When ready, commit and deploy to the staging and production environments
* Don't forget to select your theme as the active theme in wordpress' admin for each environment
* GitHub actions will run 'npm run build' and deploy the necessary files to the corresponding environments

## Development:

* In terminal, navigate to the local site's root
* run:
	* lando start
* In terminal, navigate to the desired theme folder
* run:
	* nvm install 14
	* nvm use 14
	* npm install
	* npm run start

## Notes:

This product comes with an exclude.txt file in the root, any files listed here will NOT be deployed to the environments. There is a preloaded default, just be aware this is where the node_modules folder, gitignore, etc are taken out of the payload deployed to the environments. It works like any .gitignore file.

That's it! Happy Developing! :smile: test