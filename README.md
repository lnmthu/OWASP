<p align="center">
  <img width="320" src="https://owasp.org/assets/images/logo.png">
</p>
<p align="center">
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/laravel-8.0-brightgreen.svg" alt="laravel">
  </a>
  <a href="https://github.com/vuejs/vue">
    <img src="https://img.shields.io/badge/laradock-8.0-brightgreen.svg" alt="laradock">
  </a>
  </a>
</p>

# OWASP Framwork
It is a framework that helps users and developers understand 10 common web attacks listed by OWASP
<!-- Documentation: [https://doc.laravue.dev](https://doc.laravue.dev)

## Screenshot
<p align="center">
  <img width="900" src="https://cdn.laravue.dev/screenshot.png">
</p> -->

## Getting started

### Prerequisites
 Docker Desktop is an application for MacOS and Windows machines for the building and sharing of containerized applications


### Installing
#### Manual

```bash
# Clone the project 
git clone https://github.com/lnmthu/OWASP.git

# Enter the OWASP folder and generate key 
cd OWASP
php artisan key:generate

# Rename env-example to .env.
cp .env.example .env

# Open OWASP project’s .env file and set the following:
DB_HOST=mysql
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
REDIS_HOST=redis
QUEUE_HOST=beanstalkd



```

#### Docker
```sh
# Clone the laradock
git clone https://github.com/Laradock/laradock.git

# Enter the laradock folder and rename env-example to .env
cd laradock
cp env-example .env

# Run your containers:
docker-compose up -d nginx mysql phpmyadmin redis workspace 

# Enter the Workspace container
docker-compose exec workspace bash

# Create database
php artisan migrate --seed

```
#### Build on develop (Option for Developer)
```sh
# Install node modules
npm install

# Build on develop
npm run watch
```
Open http://localhost to access OWASP Framework

<!-- ## Running the tests
* Tests system is under development -->

<!-- ## Deployment and/or CI/CD
This project uses [Envoy](https://laravel.com/docs/5.8/envoy) for deployment, and [GitLab CI/CD](https://about.gitlab.com/product/continuous-integration/). Please check `Envoy.blade.php` and `.gitlab-ci.yml` for more detail. -->

## Built with
* [Laravel](https://laravel.com/) - The PHP Framework For Web Artisans
* [Laradock](https://laradock.io/introduction/) - A full PHP development environment for Docker 

<!-- ## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, please look at the [release tags](https://github.com/tuandm/laravue/tags) on this repository. -->

## Authors

* **Minh Thu** - *Web Developer* - [lnmthu](https://github.com/lnmthu).
* **Nhu Quynh** - *Web Security and Designer* - [quinhuyn](https://github.com/quinhuyn).
