# CODING STYLE GUIDE


>* **Code MUST use TABS for intendent.**
>* **Lines SHOULD NOT be longer than 80 characters; lines longer than**
>  **that SHOULD be split into multiple subsequent lines of no more than 80 characters each.**
>* **Opening braces { MUST be on the same line, and closing braces } MUST go on the next line after the body.**
>* **The closing ?> tag MUST be omitted from files containing only PHP.**
>* **Blank lines MAY be added to improve readability and to indicate related blocks of code.**
>* **Always comment on the code unless it's obvious.**
>* **Class names must be defined in Pascalcase.**
>* **Method names must be defined in camelCase.**
>* **Variabel names must be defined in snakeCase.**
>* **Only <?php or <?= are allowed for PHP tags.**

## Examples
>An if structure looks like the following. Note the placement of parentheses, spaces, and braces; and that else and elseif are on the same line as the closing brace from the earlier body.

```php
	<?php
	if ($something1) {
	// if body
	} elseif ($something2) {
	// elseif body
	} else {
	// else body;
  }
```
