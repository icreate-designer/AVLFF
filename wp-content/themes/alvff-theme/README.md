# ALVFF WordPress Theme

## Installation

1. Copy the `alvff-theme/` folder into `/wp-content/themes/` on your WordPress server.
2. Copy **Bootstrap files** into `assets/css/bootstrap.min.css` and `assets/js/bootstrap.min.js`.
3. Copy your **images** into `assets/img/` (slide1.jpg, 0.jpg, 1.jpg, 2.jpg, 3.jpg, profile.jpg).
4. In the WordPress admin go to **Appearance → Themes** and activate **ALVFF Theme**.
5. Go to **Settings → Reading** and set "Your homepage displays" to **A static page**, then choose your homepage.
6. Go to **Appearance → Menus** and create a menu assigned to **Menu Principal**.

## File Structure

```
alvff-theme/
├── style.css           ← Theme header (required by WordPress)
├── functions.php       ← Enqueue assets, menus, image sizes
├── header.php          ← Navbar
├── footer.php          ← Footer + wp_footer()
├── front-page.php      ← Homepage (hero, stats, mission, projects, donation, blog)
├── index.php           ← Blog post list (fallback)
├── single.php          ← Single post view
├── page.php            ← Static page view
├── inc/
│   └── class-bootstrap-walker.php  ← Bootstrap 5 nav walker
└── assets/
    ├── css/
    │   ├── bootstrap.min.css   ← Add Bootstrap 5 CSS here
    │   └── custom.css
    ├── js/
    │   ├── bootstrap.min.js    ← Add Bootstrap 5 JS (bundle) here
    │   └── custom.js
    └── img/                    ← Copy your images here
```

## Dynamic Content

| Section        | Powered by                                |
|----------------|-------------------------------------------|
| Blog / News    | WordPress Posts                           |
| Projects       | Posts with category `projets` (or CPT `projet`) |
| Menus          | Appearance → Menus (primary + footer)     |
| Widgets        | Appearance → Widgets (sidebar, footer)    |
| Contact info   | Appearance → Customize (address, phone, email) |

## Adding the Bootstrap Files

The Bootstrap CSS/JS files from your original project are not included in this
theme ZIP (they are large). You can get them from:

- https://getbootstrap.com/docs/5.3/getting-started/download/

Or you can switch to a CDN by editing `functions.php` and replacing the local
Bootstrap enqueue calls with the CDN URLs.

## Notes

- The donation form currently highlights preset amounts. Connect a real payment
  processor (Stripe, PayPlug, etc.) by updating `#donateBtn`'s click handler
  in `assets/js/custom.js`.
- The newsletter form will work with the **Mailchimp for WordPress** plugin
  (`mc4wp_form()` is already called in `footer.php`).
