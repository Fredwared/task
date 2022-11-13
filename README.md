### INSTALLATION

#### Classic way

##### Requirements

- Nginx
- MySQL or Postgres
- Redis
- PHP >= 8.0 and see [modules requirements](https://laravel.com/docs/9.x/deployment#server-requirements)
- Docker (optional)


##### Docker

You have to have latest version of docker installed on your machine

Container running steps
1) `docker-compose -f ./auth up -d`
2) `docker-compose -f ./medicine up -d`

or simply run `sh run.sh`


### Structure

- Auth service `./auth` lives on `8001`
- Appointment service located at `./medicine` on `8000`

For both service swagger documentation available on `{domain}:{port}/docs`
