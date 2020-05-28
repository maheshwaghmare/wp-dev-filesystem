# WP Dev Filesystem

Work on files &amp; folders in WordPress with easy to use functions.


## How to use?

Simply use the function `wp_dev_fs_create_file()` which accpet 2 parameters.

- path - File absolute path.
- content - Content which need to store into the file.

###Syntax

```php
wp_dev_fs_create_file( $abs_path, $content );
```

### Examples

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\test.txt', 'Hello World' );
```

Here, the file `test.txt` is created in the directory `c:\xampp\htdocs\dev\` with content `Hello World`.

**Note: ** Before adding content into the function sanitize and validate these content.

Now, It support only 1 directory level.

**Example 1:**

If you have a directory `c:\xampp\htdocs\dev\` in which you want to create a file `test.txt` so you can use:

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\test.txt', 'Hello World' );
```

Here, The `test.txt` file is created and store into the `c:\xampp\htdocs\dev\` directory.

**Example 2:**

If you have a directory `c:\xampp\htdocs\dev\` in which you want to create a file `test.txt` **BUT in another directory** which is not exist.

Suppose you want to create directory `new-directory` and then store the file into it then you can use.

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-directory\test.txt', 'Hello World' );
```

Here, The new directory `new-directory` is created with new file `test.txt`.

*Example 3:*

If you have a directory `c:\xampp\htdocs\dev\` in which you want to create a file `test.txt` **BUT in 2 new directories** which is not exist.

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-dir-1\new-dir-2\test.txt', 'Hello World' );
```

**It not works!**

---

#### Summery

**Works**

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\test.txt', 'Hello World' );
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-dir\test.txt', 'Hello World' );
```

**Not works.**

```php
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-dir\dir1\test.txt', 'Hello World' );
wp_dev_fs_create_file( 'c:\xampp\htdocs\dev\new-dir\dir2\dir3\test.txt', 'Hello World' );
```
