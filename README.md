Step 1  Change directory to root directory of the project in terminal or command promopt
<br>
Step 2  Enter -:
```html
php init
```

It will show like this -:

```html
Yii Application Initialization Tool v1.0

Which environment do you want the application to be initialized in?

  [0] Development
  [1] Production

  Your choice [0-1, or "q" to quit]
```
Step 3  Enter <strong>0</strong>
<br>
It will show like this -:
```html
Initialize the application under 'Development' environment? [yes|no] 
```
Step 4 Enter <strong>yes</strong>
<br>
Step 5 go to ```root -> common -> config ->main-local.php ```
<br>
Config your database
<br>
<strong>DATABASE_NAME</strong>
<br>
<strong>DATABASE_USER_NAME </strong>
<br>
<strong>DATABASE_PASSWORD </strong>

```html
<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname="DATABASE_NAME',  
            'username' => 'DATABASE_USER_NAME',
            'password' => 'DATABASE_PASSWORD',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
```
Step 6 Enter -:
```html
composer install
```
Step 7 Enter -:
```html
php yii migrate/up
```
If user table alreay exist it will show like this -:
```html
Yii Migration Tool (based on Yii v2.0.39.3)

No new migrations found. Your system is up-to-date.
```
If not exist it wil show like this -:
```html
Yii Migration Tool (based on Yii v2.0.39.3)

Creating migration history table "migration"...Done.
Total 2 new migrations to be applied:
	m130524_201442_init
	m190124_110200_add_verification_token_column_to_user_table

Apply the above migrations? (yes|no) [no]:
```
Enter <strong>yes</strong>
<br>
Roll back access controll 
<br>
run this two commands in root directory

```
php yii migrate --migrationPath=@yii/rbac/migrations
php yii rbac/init
```
You can check database now extra table is created for roll back access control now if a new user login it will asign user role to new user
<br>
Step 8 Either run -:
```html
composer require --prefer-dist yiisoft/yii2-authclient
```
or add
```html
"yiisoft/yii2-authclient": "~2.2.0"
```
to the ```require ```section of your composer.json.
<br>
Step 9 got to   ```root -> frontend -> config -> main.php ```
<br>
now paste below code in main.php under ```component ``` section 
```html
'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxx',
            ],
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'instagram' => [
                'class' => 'kotchuprik\authclient\Instagram',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
           'twitter' => [
                'class' => 'yii\authclient\clients\Twitter',
                'attributeParams' => [
                    'include_email' => 'true'
                ],
                'consumerKey' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',
                'consumerSecret' =>  'xxxxxxxxxxxxxxxxxxxxxxxxx',,
            ],
        ],
```
<br>
Then put your clientId and clientSecret 
<br>
You will get keys in there devlope sites



