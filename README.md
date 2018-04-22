# Yii2 App

Yii2-app is Fast and Ready-to-production advanced project template.

Default, the template includes three tiers: `frontend`, `backend`, and `console`, each of which is a separate Yii application.
> **NOTE:** Template is in initial development. Anything may change at any time. 

## Features
* Admin template: [yiister/yii2-gentelella](https://github.com/yiister/yii2-gentelella), [Demo](https://colorlib.com/polygon/gentelella/)
* Yii2 User: [dektrium/yii2-user](https://github.com/dektrium/yii2-user) (login `adminus`, password `adminus`)
* Frontend and Backend User Controllers are filtered (by `dektrium/yii2-user`)
* Redis cache
* Yii2 queue (DB table `queue`)
* Log DB Target with backend (`/log/index`)
* **UrlManagerFrontend** for backend app (all url rules in file `frontend/config/urls.php`, hostInfo in `common/config/params.php`)
* i18n translations in `common/messages` with config
* ContactForm in frontend app is improved: [himiklab/yii2-recaptcha-widget](https://github.com/himiklab/yii2-recaptcha-widget),
 all email are saved to DB (`common/models/EmailForm` Model), optionally send message to Viber messenger via bot
  (install requirements and config, uncomment code in Model)
* **postcss** config


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

```
webstorm file-watcher

scope file[mites-site]:frontend/web/src/pcss//*.css

program C:\Users\user4957\AppData\Roaming\npm\postcss.cmd

arguments $ContentRoot$\frontend\web\css\style.css --config $ContentRoot$\post.config.js
```

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
