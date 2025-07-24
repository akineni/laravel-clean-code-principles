# SOLID Principles in Laravel (with Simple Explanations & Examples)

SOLID is an acronym for **5 key design principles** in object-oriented programming that help you write **clean**, **maintainable**, and **scalable** code.

> These principles are applicable to **all programming languages**, including **PHP** and **Laravel**.

---

## ✅ S — Single Responsibility Principle (SRP)

### Definition:

**A class should have only one reason to change.** It should do **only one thing**.

### Why?

- Easier to understand and maintain
- Less risk of breaking unrelated code when changing

### 🚫 Bad Example:

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);

    $user = User::create($validated);

    Mail::to($user->email)->send(new WelcomeMail($user));
}
```

> ❌ This method **validates**, **saves a user**, and **sends an email** — doing **too much**.

### ✅ Good Example:

- Validation in **Request class**
- Saving in **UserService**
- Emailing in **MailerService**

Each class now has **one responsibility**.

---

## ✅ O — Open/Closed Principle (OCP)

### Definition:

**Software entities should be open for extension, but closed for modification.**

### Why?

- You can **add new features** without changing existing, working code.
- Reduces risk of bugs.

### 🚫 Bad Example:

```php
public function pay($gateway, $amount)
{
    if ($gateway === 'stripe') {
        // Pay with Stripe
    } elseif ($gateway === 'paystack') {
        // Pay with Paystack
    }
}
```

> ❌ Every new gateway requires modifying this function.

### ✅ Good Example:

Use **interface** and **separate classes**:

```php
interface PaymentGatewayInterface {
    public function pay($amount);
}

class PaystackGateway implements PaymentGatewayInterface {
    public function pay($amount) {
        // Paystack logic
    }
}

class PaymentService {
    public function __construct(PaymentGatewayInterface $gateway) {
        $this->gateway = $gateway;
    }

    public function process($amount) {
        return $this->gateway->pay($amount);
    }
}
```

> ✅ You can now add new gateways **without changing** `PaymentService`.

---

## ✅ L — Liskov Substitution Principle (LSP)

### Definition:

**Subclasses should be substitutable for their parent classes** without breaking the app.

### Why?

- You can use child classes **anywhere** parent class/interface is expected
- Makes code **predictable** and **safe**

### 🚫 Bad Example:

```php
class Fish implements AnimalInterface {
    public function makeSound() {
        throw new \Exception("Fish can't make sound");
    }
}
```

> ❌ Violates LSP — Fish can't be safely used where other animals are used.

### ✅ Good Example:

Use a more specific interface:

```php
interface SoundMakingAnimalInterface {
    public function makeSound(): string;
}

class Dog implements SoundMakingAnimalInterface {
    public function makeSound() {
        return 'Bark';
    }
}

class Fish {
    public function swim() {
        return 'Swimming...';
    }
}
```

> ✅ Now Fish is not forced to implement something it can't do.

---

## ✅ I — Interface Segregation Principle (ISP)

### Definition:

**No class should be forced to implement methods it does not use.**

### Why?

- Keeps interfaces **small and specific**
- Classes only implement **what they need**

### 🚫 Bad Example:

```php
interface MediaPlayerInterface {
    public function playAudio();
    public function playVideo();
}

class AudioPlayer implements MediaPlayerInterface {
    public function playAudio() {
        // OK
    }
    public function playVideo() {
        throw new \Exception("Not supported");
    }
}
```

> ❌ ISP Violation — AudioPlayer must implement `playVideo()` even though it can’t.

### ✅ Good Example:

Break into smaller interfaces:

```php
interface AudioPlayable {
    public function playAudio();
}

interface VideoPlayable {
    public function playVideo();
}

class AudioPlayer implements AudioPlayable {
    public function playAudio() {
        return "Playing audio...";
    }
}
```

> ✅ Now each player only implements what it supports.

---

## ✅ D — Dependency Inversion Principle (DIP)

### Definition:

**Depend on abstractions, not concrete classes.**

### Why?

- High-level classes aren’t tightly coupled to low-level details
- Easier to **swap implementations**, and easier to **test**

### 🚫 Bad Example:

```php
class FileUploader {
    public function upload($file) {
        return Storage::disk('local')->put('uploads', $file);
    }
}
```

> ❌ Hardcoded to local disk, not flexible.

### ✅ Good Example:

Use an interface:

```php
interface FileStorageInterface {
    public function upload($file): string;
}

class LocalStorageService implements FileStorageInterface {
    public function upload($file): string {
        return Storage::disk('local')->put('uploads', $file);
    }
}

class FileUploader {
    public function __construct(FileStorageInterface $storage) {
        $this->storage = $storage;
    }

    public function uploadFile($file) {
        return $this->storage->upload($file);
    }
}
```

> ✅ Now you can switch storage (e.g., S3) by changing the implementation, not the logic.

---

# 🧠 Final Thoughts

| Principle | One-line Summary                                   |
| --------- | -------------------------------------------------- |
| SRP       | Class does **one thing** only                      |
| OCP       | **Extend** behavior without changing existing code |
| LSP       | Subclasses can be **safely substituted**           |
| ISP       | Keep interfaces **small and specific**             |
| DIP       | Depend on **abstractions**, not concrete things    |

---

✅ Apply SOLID in Laravel to build apps that are:

- **Easy to test**
- **Easy to extend**
- **Hard to break**

---

### Feel free to clone this repo and use it as a **quick reference or review guide** before interviews or code reviews!

