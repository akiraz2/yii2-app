# Yii2 Fast Simple Advanced App

Yii2-app is Fast and Ready-to-production advanced project template.

Default, the template includes three tiers: `frontend`, `backend`, and `console`, each of which is a separate Yii application.

> **NOTE:** Template is in initial development. Anything may change at any time. 


## Features
* Admin template is beautiful and simple bootstrap, compatible with yii2 assets: [yiister/yii2-gentelella](https://github.com/yiister/yii2-gentelella), [Demo](https://colorlib.com/polygon/gentelella/)
* Yii2 User is strong and proved user-module with many features: [dektrium/yii2-user](https://github.com/dektrium/yii2-user) (login `adminus`, password `adminus`)
* Frontend and Backend User Controllers are filtered (by `dektrium/yii2-user`)
* Redis cache is really fast (you may change to DB-cache, but don't forget apply migration `yii migrate --migrationPath=@yii/log/migrations/`)
* Yii2 queue (DB table `queue`), but you can use *Redis-queue* or other
* Queue Manager with backend (`/queuemanager/default/index`) using [ignatenkovnikita/yii2-queuemanager](https://github.com/ignatenkovnikita/yii2-queuemanager)
* Log DB Target with backend (`/log/index`) - simply view log messages 
* .htaccess - config for **pretty urls** (rewrite index.php), *may be later add nginx config*
* **UrlManagerFrontend** for backend app (all url rules in file `frontend/config/urls.php`, hostInfo in `common/config/params.php`)
* i18n translations in `common/messages` with config
* ContactForm in frontend app is improved: [himiklab/yii2-recaptcha-widget](https://github.com/himiklab/yii2-recaptcha-widget),
 all email are saved to DB (`common/models/EmailForm` Model), optionally send message to Viber messenger via bot
  (install requirements [Bogdaan/viber-bot-php](https://github.com/Bogdaan/viber-bot-php) and config, uncomment code in Model)
* **postcss** config (`frontend/web/src/pcss//*.css`)
* Gii generator: added **yii2-queue**, may be later - [schmunk42/yii2-giiant](https://github.com/schmunk42/yii2-giiant) - really steroid, but in development with bugs


## Available modules
These modules can be easy installed to Yii2-App using Composer:

* Yii2 Super Blog Module (semantic, seo): [akiraz2/yii2-blog](https://github.com/akiraz2/yii2-blog)
* Yii2 many web-statictic counters (all-in-one) *(yandex, google, own db-counter)*: [akiraz2/yii2-stat](https://github.com/akiraz2/yii2-stat)
* yii2 opengraph component: [dragonjet/yii2-opengraph](https://github.com/dragonjet/yii2-opengraph)
* yii2 settings (db+cache): [yii2mod/yii2-settings](https://github.com/yii2mod/yii2-settings)
* etc...


## Installation
Yii2-app template can be installed using composer. Run following command to download and install Yii2-app:
```
composer create-project --prefer-dist akiraz2/yii2-app my-site
```
After installation run `init`

### Migrations

> **NOTE:** Make sure that you have properly configured `db` application component and run the following command

```
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
php yii migrate --migrationPath=@yii/log/migrations/
php yii migrate --migrationPath=vendor/ignatenkovnikita/yii2-queuemanager/migrations/
php yii migrate/up
```


## Development

### Messages
Change in `common/config/main.php`
```
'language' => 'ru-RU',
'sourceLanguage' => 'en-US',
```
In shell 
```
php yii message/extract common/messages/config.php
```

**POSTCSS**

Add WebStorm file-watcher, postcss.config.js is ready for use
> **NOTE:** Dont forget install nodejs :) and run command `npm install`
1. scope file[mites-site]:frontend/web/src/pcss//*.css
2. program C:\Users\user4957\AppData\Roaming\npm\postcss.cmd
3. arguments $ContentRoot$\frontend\web\css\style.css --config $ContentRoot$\post.config.js


## Support

If you have any questions or problems with Yii2-App you can ask them directly
 by using following email address: `akiraz@bk.ru`.


## Contributing

If you'd like to contribute, please fork the repository and use a feature branch. Pull requests are warmly welcome.
+PSR-2 style coding.

I can apply patch, PR in 2-3 days! If not, please write me `akiraz@bk.ru`

## Licensing

Yii2-App is released under the BSD License. See the bundled [LICENSE.md](LICENSE.md)
for details. 
