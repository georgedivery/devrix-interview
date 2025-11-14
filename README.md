# Webbeb Theme

Custom WordPress theme designed to work with the Advanced Custom Fields (ACF) plugin.  
The theme follows the **PSR-2** coding standard.

---

## Requirements

- WordPress 6.x+
- PHP 7.4+ (or 8.x, depending on the project stack)
- MySQL 5.7+ / MariaDB
- Composer (optional, if you use it in the project)
- Node.js & npm/yarn (if you decide to work with the frontend build tools)

Required plugins:

- Advanced Custom Fields (ACF)
- FakerPress (for generating dummy content)
- Theme-recommended plugins are pre-configured and will appear as **"required/recommended plugins"** inside the WordPress admin after theme activation.

---

## Theme Features

- Custom WordPress theme built specifically for this project/interview task.
- Tight integration with **ACF** for managing custom fields.
- Exported ACF field groups as JSON located in:  
  `sync/export.json` – used to import all custom fields on a fresh installation.
- A dedicated folder for **frontend-only implementation** (HTML/CSS/JS) to preview the UI separately from WordPress.
- Included **pixel-perfect reference screenshot** to compare the final implementation with the design.
- Dummy posts are generated with **FakerPress** for easier preview and testing.

---

## Installation

1. Clone the repository into your WordPress `wp-content/themes` directory:

   ```bash
   cd wp-content/themes
   git clone <repository-url> webbeb-theme

2. Activate the theme from Appearance → Themes in the WordPress admin.

3. Install and activate the required plugins (they will appear as required/recommended after theme activation).

4. Import ACF fields:

5. Go to Custom Fields → Tools.

Use the JSON file located in sync/export.json to Import Field Groups.

(Optional) Generate dummy content with FakerPress:

6. Go to FakerPress in the admin.

7. Configure the type and amount of posts you want.

Generate dummy data for visual testing.