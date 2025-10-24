# 📦 Models & Relationships Documentation

## 🗂️ **Models Created:**

### 1. **Category** (`app/Models/Category.php`)
Kategori produk (Putih, Warna, Premium, Industri)

**Fields:**
- `id`, `name`, `slug`, `description`, `icon`, `is_active`, `order`

**Relationships:**
- `hasMany` → Products
- `hasMany` → Active Products

**Scopes:**
- `active()` - Get active categories
- `ordered()` - Order by order field

---

### 2. **Product** (`app/Models/Product.php`)
Produk kain majun

**Fields:**
- `id`, `category_id`, `name`, `slug`, `description`, `short_description`
- `price_min`, `price_max`, `unit`, `min_order`, `stock`
- `image`, `images` (JSON), `features` (JSON)
- `is_featured`, `is_active`, `order`

**Relationships:**
- `belongsTo` → Category
- `hasMany` → OrderItems

**Scopes:**
- `active()` - Active products
- `featured()` - Featured products
- `inStock()` - Products with stock > 0
- `ordered()` - Order by order field

**Attributes:**
- `price_range` - Formatted price range (Rp 8.000 - Rp 25.000)

**Auto-generate:**
- Slug from name

---

### 3. **Testimonial** (`app/Models/Testimonial.php`)
Testimoni customer

**Fields:**
- `id`, `customer_name`, `customer_company`, `customer_position`
- `customer_photo`, `testimonial`, `rating`, `is_active`, `order`

**Scopes:**
- `active()` - Active testimonials
- `ordered()` - Order by order field

**Attributes:**
- `stars` - Star rating HTML (⭐⭐⭐⭐⭐)

---

### 4. **Order** (`app/Models/Order.php`)
Pesanan customer

**Fields:**
- `id`, `order_number`, `customer_name`, `customer_phone`, `customer_email`
- `customer_address`, `city`, `province`, `postal_code`
- `subtotal`, `shipping_cost`, `total`, `status`, `notes`
- `confirmed_at`, `shipped_at`, `delivered_at`

**Status:**
- `pending`, `confirmed`, `processing`, `shipped`, `delivered`, `cancelled`

**Relationships:**
- `hasMany` → OrderItems

**Scopes:**
- `pending()`, `confirmed()`, `processing()`, `shipped()`, `delivered()`

**Attributes:**
- `status_color` - Badge color (yellow, blue, green, etc)
- `status_label` - Indonesian label (Menunggu Konfirmasi, Dikonfirmasi, etc)

**Auto-generate:**
- Order number (ORD-20241010-ABC123)

---

### 5. **OrderItem** (`app/Models/OrderItem.php`)
Item dalam pesanan

**Fields:**
- `id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `subtotal`

**Relationships:**
- `belongsTo` → Order
- `belongsTo` → Product

---

### 6. **SiteSetting** (`app/Models/SiteSetting.php`)
Pengaturan website (CMS)

**Fields:**
- `id`, `key`, `value`, `type`, `group`, `label`

**Types:**
- `text`, `textarea`, `image`, `boolean`

**Groups:**
- `general`, `hero`, `about`, `contact`, `social`

**Static Methods:**
```php
SiteSetting::get('hero_title', 'Default Title');
SiteSetting::set('hero_title', 'New Title');
SiteSetting::getByGroup('hero');
SiteSetting::clearCache();
```

**Cache:**
- Settings cached for 1 hour
- Auto-clear on update

---

### 7. **User** (`app/Models/User.php`)
User & Admin

**Fields:**
- `id`, `name`, `email`, `phone`, `address`, `role`, `is_active`, `password`

**Roles:**
- `admin` - Full access
- `staff` - Limited access
- `customer` - Customer access

**Methods:**
```php
$user->isAdmin();
$user->isStaff();
$user->isCustomer();
$user->hasAdminAccess();
```

**Scopes:**
- `admins()` - Admin users only
- `active()` - Active users

---

## 🔗 **Relationships Diagram:**

```
Category
  └─ hasMany → Product
                 └─ hasMany → OrderItem
                                └─ belongsTo → Order

User (Admin/Staff/Customer)

Testimonial (Independent)

SiteSetting (Independent)
```

---

## 📝 **Usage Examples:**

### Get all active products with category:
```php
$products = Product::with('category')
    ->active()
    ->inStock()
    ->ordered()
    ->get();
```

### Get featured products:
```php
$featured = Product::featured()->active()->take(6)->get();
```

### Get products by category:
```php
$category = Category::where('slug', 'kain-majun-putih')->first();
$products = $category->activeProducts;
```

### Get all pending orders with items:
```php
$orders = Order::with('items.product')
    ->pending()
    ->latest()
    ->get();
```

### Get site settings:
```php
$heroTitle = SiteSetting::get('hero_title');
$heroSettings = SiteSetting::getByGroup('hero');
```

### Check admin access:
```php
if (auth()->user()->hasAdminAccess()) {
    // Allow access to admin panel
}
```

---

## ✅ **All Models Ready!**

Next Step: **Authentication & Login Admin** 🔐
