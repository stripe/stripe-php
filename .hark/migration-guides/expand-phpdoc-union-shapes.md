# Expanded PHPDoc union parameter shapes

Request-parameter PHPDoc now preserves complete object and list shapes within unions instead of representing those variants as a generic `array`.

For example, timestamp filters that were previously documented as:

```php
int|array
```

are now documented with their accepted fields:

```php
int|array{gt?: int, gte?: int, lt?: int, lte?: int}
```

Update reported arguments to use the fields and value types shown in the method's PHPDoc. If a diagnostic is caused by an imprecisely inferred local variable, add an accurate array-shape annotation to that variable.

No PHP runtime upgrade is required for this change because these types appear only in PHPDoc comments.
