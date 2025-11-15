# DevriX Theme

Custom WordPress theme designed to work with the Advanced Custom Fields (ACF) plugin.

---

## Requirements

- WordPress 6.x+
- PHP 7.4+ (or 8.x, depending on the project stack)
- MySQL 5.7+ / MariaDB

Required plugins:

- Advanced Custom Fields (ACF)
- FakerPress (for generating dummy content)

Theme-recommended plugins are pre-configured and will appear as **required/recommended plugins** in the WordPress admin after theme activation.

---

## Theme Features

- Custom WordPress theme built specifically for this project/interview task.
- Tight integration with **ACF** for managing custom fields.
- Exported ACF field groups stored as JSON in:  
  `sync/export.json` — used to import all custom fields on a fresh installation.
- Dedicated folder for **frontend-only implementation** (HTML/CSS/JS) to preview the UI separately.
- Included **pixel-perfect reference screenshot** for design comparison.
- Dummy posts generated via **FakerPress** for visual testing.

---

## Installation

1. Clone the repository into your WordPress `wp-content/themes` directory:

   ```bash
   cd wp-content/themes
   git clone <repository-url> webbeb-theme

2. Activate the theme from
Appearance → Themes in the WordPress admin.

3. Install and activate required plugins
(they will appear as required/recommended after theme activation).

4. Import ACF fields:

Go to Custom Fields → Tools

Use the JSON file located in:
sync/export.json
to Import Field Groups

5. (Optional) Generate dummy content with FakerPress:

Go to FakerPress in the admin

Configure the amount and type of posts

Generate dummy data for testing layouts

## Archived Project Version

You can download the full archived version of the project (ready for installation) here:

👉 https://drive.google.com/drive/folders/16AY8JgQZx0fy43URUCVwxlqdcoYgWWKo?usp=sharing

## Admin Credentials (Demo Environment)

These credentials are provided for testing purposes:

Username: admin
Password: VrQwcc0lDQ%4Wg*b&j
 