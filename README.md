Only the value of the name field will be stored in the table, and the value of the label will be in the class. This can be used to define the name of the status, role, etc.

## Example #1
### TokenType class
```php
    use Mqlo\Nameable\Nameable;

    class TokenType extends Nameable
    {
        public const EMAIL_CONFIRMATION = 'email_confirmation';

        protected static array $all = [
            self::EMAIL_CONFIRMATION => 'Email confirmation token',
        ];

        public static function emailConfirmation(): self
        {
            return new self(self::EMAIL_CONFIRMATION);
        }

        public function isEmailConfirmation(): bool
        {
            return $this->name === self::EMAIL_CONFIRMATION;
        }
    }
```
### Tables
- tokens

| id | name | expire |
| ------ | ------ | ------ |
| 1 | email_confirmation | 2020-10-01 19:00:00 |
| 2 | password_reset | 2020-10-01 19:30:00 |
|...| ... | ... |

- users

| id | email | role |
| ------ | ------ | ------ |
| 1 | test1@t.t | user |
| 2 | test2@t.t | user |
|...| ... | ... |