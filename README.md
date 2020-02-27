# Decrypt Ruby-generated encrypted data

To generate the examples, run:

```bash
$ ruby generate_examples.rb
> PHP Examples:
>
> Replace this in `waiting_id.php`
>
> ```php
>
> $examples = [['encrypt_client_key' => 'r3pShrcTlORyheB2ExgrPg==', 'ab' => 'cCepf5ZvkP3rnZsepg04Zw==', 'encrypted' => 'flEjslQ=', 'waiting_id' => '65309'],
> ['encrypt_client_key' => '2i-JAI434HvWJ0NvuKj2Mw==', 'ab' => 'OKxjufbPxp7iXHqboz9FIw==', 'encrypted' => 'k89j5CE=', 'waiting_id' => '61577'],
> ['encrypt_client_key' => '2e4uFnQ2kFyn5LUFQK9ZRA==', 'ab' => 'OIRVljrwuD1Kyg1esB1M2A==', 'encrypted' => 'F1f7oWk=', 'waiting_id' => '62007'],
> ['encrypt_client_key' => '_HpnxYyKJKIDTj0_QjPvXg==', 'ab' => '7DPVdxvIz_hJoIU4Nix9jA==', 'encrypted' => 'cQck9s8=', 'waiting_id' => '60811'],
> ['encrypt_client_key' => '5Ejngjb5okZs9nzgGcZW6w==', 'ab' => 'T1zt9qTKofgt7EMnwbej5g==', 'encrypted' => 'YH6mOfk=', 'waiting_id' => '60400']];
>
> ```
```

Replace `$examples` with this in `waiting_id.php` and then run `php waiting_id.php`
