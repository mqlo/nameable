Only the value of the name field will be stored in the table, and the value of the label will be in the class. This can be used to define the name of the status, role, etc.

## Example #1
### PostStatus class
```php
    use Mqlo\Nameable\Nameable;

    class PostStatus extends Nameable
    {
        public const DRAFT = 'draft';
        public const PUBLISHED = 'published';

        protected static array $all = [
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
        ];

        public static function draft(): self
        {
            return new self(self::DRAFT);
        }

        public static function published(): self
        {
            return new self(self::PUBLISHED);
        }

        public function isDraft(): bool
        {
            return $this->name === self::DRAFT;
        }
        
        public function isPublished(): bool
        {
            return $this->name === self::PUBLISHED;
        }
    }
```
### Used
```php
    $postStatus = new PostStatus(PostStatus::draft);
    // or
    $postStatus = PostStatus::draft();

    echo $postStatus->isDraft() ? 'This post draft' : '...';

    PostStatus::all(true); // with descriptions
    PostStatus::all(false); // without descriptions
````
### Example tables when this package can be applied (token type and post status)
- tokens

| id | type | expire |
| ------ | ------ | ------ |
| 1 | email_confirmation | 2020-10-01 19:00:00 |
| 2 | password_reset | 2020-10-01 19:30:00 |
|...| ... | ... |

- posts

| id | title | status |
| ------ | ------ | ------ |
| 1 | Post 1 | draft |
| 2 | Post 2 | published |
|...| ... | ... |