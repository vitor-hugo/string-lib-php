# Release History <!-- omit in toc -->

- [1.2.4 (Sep 10 2024)](#124-sep-10-2024)
- [1.2.3 (Sep 10 2024)](#123-sep-10-2024)
- [1.2.2 (Sep 10 2024)](#122-sep-10-2024)
- [1.2.1 (Jul 04 2024)](#121-jul-04-2024)
- [1.2.0 (Jul 04 2024)](#120-jul-04-2024)
- [1.1.3 (Jul 02 2024)](#113-jul-02-2024)
- [1.1.2 (Jul 02 2024)](#112-jul-02-2024)
- [1.1.0 (Jul 01 2024)](#110-jul-01-2024)
- [1.0.0 (Jun 25 2024)](#100-jun-25-2024)

# 1.2.4 (Sep 10 2024)

Fixing collision between isCnpj and IsCpf verification digit validation.

# 1.2.3 (Sep 10 2024)

Fixing the visibility of validators:

- IsBase64
- IsCnpj
- isCpf
- isLength
- maxLength
- minLength
- maxVersion
- minVersion

# 1.2.2 (Sep 10 2024)

Fixing the visibility of isIP validator.

# 1.2.1 (Jul 04 2024)

Adding missing traits to TString class.

- isFQDN
- isIP
- isSemVer
- isUrl

# 1.2.0 (Jul 04 2024)

- Adding the validator isSemVer.

# 1.1.3 (Jul 02 2024)

- isNumeric validator is now validating negative numbers.

# 1.1.2 (Jul 02 2024)

- Fixes a bug where the IsUrl validator triggers a PHP warning.
- Moving UrlOptions properties to the class constructor so it can be
  instantiated with named arguments.

---

# 1.1.0 (Jul 01 2024)

Adding the validators:

- isUrl
- isIP
- isFQDN

---

# 1.0.0 (Jun 25 2024)

Initial version with following features:

### Handlers <!-- omit in toc -->

- toString
- toLowerCase
- toUpperCase
- toUpperCase

### Validators <!-- omit in toc -->

- contains
- isAlpha
- isAlphanumeric
- isBase64
- isCnpj
- isCpf
- IsEmail
- IsHexadecimal
- isLength
- isNumeric
- maxLength
- minLength
- maxVersion
- minVersion
