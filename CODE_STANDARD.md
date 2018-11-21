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

---
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
---
>The keyword elseif SHOULD be used instead of else if so that all control keywords look like single words.

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
---
>A switch structure looks like the following. Note the placement of parentheses, spaces, and braces. The case statement MUST be indented once from switch, and the break keyword (or other terminating keyword) MUST be indented at the same level as the case body. There MUST be a comment such as // no break when fall-through is intentional in a non-empty case body.

```php
<?php
switch ($something) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```
---
>A while statement looks like the following. Note the placement of parentheses, spaces, and braces.
```php
<?php
while ($something) {
    // structure body
}
```
---
>Similarly, a do while statement looks like the following. Note the placement of parentheses, spaces, and braces.
```php
<?php
do {
    // structure body;
} while ($something);
```
---
>A for statement looks like the following. Note the placement of parentheses, spaces, and braces.
```php
<?php
for ($i = 0; $i < 10; $i++) {
    // for body
}
```
---
>A foreach statement looks like the following. Note the placement of parentheses, spaces, and braces.
```php
<?php
foreach ($iterable as $key => $value) {
    // foreach body
}
```
---
>A try catch block looks like the following. Note the placement of parentheses, spaces, and braces.
```php
<?php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```
---
## Alternative syntax for control structures  
```php
<?php 
if ($a == 5): ?>
A is equal to 5
<?php endif; ?>
```

```php
<?php
if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif; ?>
```
