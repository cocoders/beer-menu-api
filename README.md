# Beer menu API
Example app for firebase. Presented on phpers meeting.

You first should add your private firebase.google.com key into key directory and you should name it `key.json`
In docker we set such variable which is used by firestore/firebase client `GOOGLE_APPLICATION_CREDENTIALS=/var/www/beer-menu/key/key.json`

## Project development env

Project run on docker and docker-compose. 

```bash
docker-compose up -d

# composer
composer install

# run test
docker-compose run php bin/behat

# run add beer command
docker-compose run php bin/console app:add:beer california

# run remove beer command
docker-compose run php bin/console app:remove:beer california
```
