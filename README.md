<p align="center">
  <img width="320" src="https://owasp.org/assets/images/logo.png">
</p>
<p align="center">
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/laravel-7.3-brightgreen.svg" alt="laravel">
  </a>
  <a href="https://github.com/vuejs/vue">
    <img src="https://img.shields.io/badge/vue-2.6.10-brightgreen.svg" alt=";laradock">
  </a>
  </a>
</p>

# OWASP Framwork
<!-- [Laravue](https://laravue.dev) (pronounced /ˈlarəvjuː/) is a beautiful dashboard combination of [Laravel](https://laravel.com/), [Vue.js](https://github.com/vuejs/vue) and the UI Toolkit [Element](https://github.com/ElemeFE/element). The work is inspired by  [vue-element-admin](http://panjiachen.github.io/vue-element-admin) with our love on top of that. With the powerful Laravel framework as the backend, Vue.js as the high performance on the frontend,  Laravue appears to be a full-stack solution for an enterprise application level. -->

<!-- Documentation: [https://doc.laravue.dev](https://doc.laravue.dev)

## Screenshot
<p align="center">
  <img width="900" src="https://cdn.laravue.dev/screenshot.png">
</p> -->

## Getting started

### Prerequisites
<!-- 
 * Laravue is positioned as an enterprise management solution, and it is highly recommended to use it to start from scratch.
 * For existing Laravel project, you should check [Laravue Core](https://github.com/tuandm/laravue-core) for integration.
 * Your machine needs to be ready for the latest [Laravel](https://laravel.com/docs/6.x#installation) and [Node.js](https://nodejs.org). -->


### Installing
#### Manual

```bash
# Clone the project 
git clone https://github.com/lnmthu/OWASP.git
cd OWASP

# Rename env-example to .env.
cp env-example .env

# Open OWASP project’s .env file and set the following:
DB_HOST=mysql
REDIS_HOST=redis
QUEUE_HOST=beanstalkd

```

#### Docker
```sh
# Run your containers:
cd laradock
docker-compose up -d nginx mysql phpmyadmin redis workspace 
```
#### Build on develop
```sh
# Install node modules
npm install

# Build on develop
npm run dev
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

* **Minh Thu** - *Initial work* - [lnmthu](https://github.com/lnmthu).
* **Nhu Quynh** - *Designer* - [quinhuyn](https://github.com/quinhuyn).
<!-- 
See also the list of [contributors](https://github.com/tuandm/laravue/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details.

## Related projects

* [Laravue-core](https://github.com/tuandm/laravue-core) - Laravel package which provides core functionalities of Laravue.

## Acknowledgements

* [vue-element-admin](https://panjiachen.github.io/vue-element-admin/#/) A magical vue admin which insprited Laravue project.
* [tui.editor](https://github.com/nhnent/tui.editor) - Markdown WYSIWYG Editor.
* [Echarts](http://echarts.apache.org/) - A powerful, interactive charting and visualization library for browser.

## Donate
If you find this project useful, you can [buy me a coffee](https://www.buymeacoffee.com/tuandm) -->
