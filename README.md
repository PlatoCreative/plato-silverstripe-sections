# plato-silverstripe-sections
Plato's Sections module for the base installer. Please see requirements before installing.

### Requirements
+ SilverStripe 3.1.*
+ Foundation 5 (html/css framework)

### Installation
```json
composer require plato-creative/plato-silverstripe-sections dev-master
```

### Configuration
There is currently on config option. That is to include the section from both the CMS and frontend based on ClassName.
```yaml
Page:
  SectionIncludedPageTypes:
    - HomePage
    - AnotherPage
```
### Extending
To add a new section type just create a new class that extends Section
```php
class ImageSection extends Section {
        ...
```
