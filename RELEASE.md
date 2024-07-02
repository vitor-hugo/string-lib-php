# Release History <!-- omit in toc -->

- [1.1.2 (Jul 02 2024)](#112-jul-02-2024)
- [1.1.0 (Jul 01 2024)](#110-jul-01-2024)
- [1.0.0 (Jun 25 2024)](#100-jun-25-2024)

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
