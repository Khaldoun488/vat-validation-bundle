![European commision VAT validation](http://ec.europa.eu/wel/template-2013/images/logo/logo_en.gif) 
# (VAT Information Validation) Bundle

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8d723972-c983-4a18-acde-d6e7a0bb26b9/big.png)](https://insight.sensiolabs.com/projects/8d723972-c983-4a18-acde-d6e7a0bb26b9)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Khaldoun488/vat-validation-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Khaldoun488/vat-validation-bundle/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Khaldoun488/vat-validation-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Khaldoun488/vat-validation-bundle/build-status/master)


Check the validity of a TVA Number for European Countries

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Add the following to your composer.json

```json
{
	"require": {
  	  	"khaldoun488/vat-validation-bundle" : "dev-master"
	}
}
```


Update your dependencies

```bash
$ php composer.phar update
```

## Usage

Add the following code to our controller:

```php
/**
 * @var string  $codeCountry
 * @var integer $vatNumber
 */
public function indexAction($codeCountry, $vatNumber)
{
    $vatValidator = $this->get('khaldoun488.vat-validator');
    $response     = $vatValidator->checkVatNumberForEuropeanCountry(
    	$codeCountry,
    	$vatNumber
    );
}
```

If you want more information, click here: [VIES (VAT Information Exchange System)](http://ec.europa.eu/taxation_customs/vies/vieshome.do?selectedLanguage=en)
