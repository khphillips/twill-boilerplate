# Laravel Twill Vue Vuetify Boilerplate

## Adding Model Modules and Resources
```
php artisan make:model Models/Todo -mcr
php artisan twill:module Todo -TSMBR.  //translatable sluggable mediable blocks revisions 
```

### Adding blocks?
```
php artisan twill:blocks
npm run twill-build
```

### Compiles and minifies for production
```
npm run build
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).


### Blueprint for models and controllers
Unfortunately does not put them in App/Models so we have to do that manually. 

```

```

### Create new twill module
```
php artisan twill:module Models/page -TSMBR
```

