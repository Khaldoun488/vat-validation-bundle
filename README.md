
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8d723972-c983-4a18-acde-d6e7a0bb26b9/big.png)](https://insight.sensiolabs.com/projects/8d723972-c983-4a18-acde-d6e7a0bb26b9)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Khaldoun/vat-validation-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Khaldoun/vat-validation-bundle/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/Khaldoun/vat-validation-bundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Khaldoun/vat-validation-bundle/build-status/master)

# vat-validation-bundle
Check the validity of a TVA Number for European Countries

# Installation

Add this to composer.json :

"require": {
    "khaldoun/vat-validation-bundle" : "dev-master"
},

# Use it

service key : "khaldoun.vat-validator"

method  : checkVatNumberForEuropeanCountry (codeCountry, VatNumber)
