# &#x1F95D; Application Development - Preparation

Emlog supports template themes and plug-ins extension. Developers can develop personalized template themes and functional plug-ins to enrich the functions and styles of the emlog site.

## Environmental requirements

- PHP 5.6 and above
- Git code repository, you can use Gitee or GitHub
- Editor recommendation: phpstorm, vscode
- Recommended browsers: Chrome, Edge
- Recommended local development integrated environment: [phpEnv](https://www.phpenv.cn/)

## Development specifications

- PHP coding follows standards: [PSR-1](https://phpfig.p2hp.com/psr/psr-1/), [PSR-12](https://phpfig.p2hp.com/psr/psr-12/)
  (Please follow this specification when adding new code, historical code can be gradually refactored)
- Recommended PHP tutorial: [The PHP Way](https://learnku.com/docs/php-the-right-way/PHP8.0)

## Set up development environment

Modify init.php in the emlog root directory and set it to development mode. The example is as follows. Eliminate all warning and notice errors (mostly caused by uninitialized variables or abnormal conditions of undetermined variables).

```php
<?php
const ENVIRONMENT = 'develop'; // Running environment: production production environment, develop development environment
```


## Precautions

1. It is recommended to adapt to PHP5.6 and above versions. There will be no obvious errors during installation and use. Please provide friendly prompts when relying on plug-ins.
2. Please indicate the original author of the transplanted works. Anything not specified will be deemed to be the original work of the developer. If there is any infringement, the developer will be held responsible.
3. Applications must not modify core database tables and fields, including adding fields to core tables, and cannot add fields without default values.
4. Closing or deleting the application must not affect the normal functions of the site.

## Development documentation

- [Template Development Guide](template.md)
- [Plug-in Development Guide](plugin.md)
- [API Development Documentation](api.md)
- [App Store API](api_store.md)

## Application release

- [Publish to App Store](https://www.emlog.net/my)

