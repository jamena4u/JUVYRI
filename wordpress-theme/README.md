# JUVYRI — WordPress theme

This is the WordPress version of the JUVYRI site, built so the day-to-day
owner can update almost everything from the normal wp-admin dashboard —
add a product, drop in a new lookbook photo, change a headline, list an
event — the same way they'd use any WordPress site, no code required.

It's a from-scratch custom theme (not a page builder), so it keeps the
exact design, layout and animations of the static prototype in the repo
root, but every piece of content behind it now lives in the database
instead of the HTML.

## 1. What's editable, and where

| What | Where in wp-admin | Notes |
|---|---|---|
| Products / "New Arrivals" | **Collection** (left sidebar) | Add New → set a **Featured Image** → fill in Price / Badge → Publish. Drag rows on the list screen to reorder. |
| Lookbook photos | **Lookbook** | Add New → Featured Image → optional caption → tick "Large tile" for a bigger grid cell if you want. |
| Testimonials | **Testimonials** | Add New → quote + attribution. |
| Events | **Events** | Add New → Featured Image, date, location, description, optional button. The whole "Upcoming Events" section on the homepage hides itself automatically once there are none coming up — nothing to switch off manually, and past events drop off the day after. |
| Instagram grid tiles | **Instagram Grid** | Add New → upload the photo → paste the link to the real Instagram post (optional). This does **not** pull from Instagram automatically — you upload the photos here yourself, same as everywhere else on the site. |
| Header menu | **Appearance → Menus** → assign to "Primary Menu (header)" | Until you create one, sensible default links are shown automatically. |
| Footer's two link columns | **Appearance → Menus** → "Footer — Shop column" / "Footer — Company column" | Same fallback behaviour. |
| Logo | **Appearance → Customize → Site Identity → Logo** | Falls back to the styled text wordmark if none is set. |
| Site icon (browser tab) | **Appearance → Customize → Site Identity → Site Icon** | Standard WordPress feature. |
| Everything else — hero headline, the two scrolling announcement bars, brand-story paragraphs & stats, Instagram section copy, newsletter heading, footer blurb, social/contact links | **Pages → Site Settings** | See below. |

### The "Site Settings" page

Global text that isn't tied to a specific product/post (hero copy, stats,
footer contact info, etc.) lives on one page: **Pages → Site Settings**.
It's created automatically the first time the theme is activated, and it
is intentionally not a page anyone can visit on the live site — editing
it changes the homepage, but there's nothing to "publish" separately.

Every field on it has a sensible default already filled in, matching the
original design, so the site never looks broken or empty — you only need
to change the fields you actually want to change.

## 2. Requirements

- WordPress (Hostinger's hPanel has a one-click WordPress installer).
- **Advanced Custom Fields** (the free plugin — search for it under
  Plugins → Add New). The theme is built to need only the free version,
  not ACF PRO. I've based that on ACF's traditional free/PRO split
  (Repeater, Gallery, Flexible Content, Clone and Options Pages are the
  PRO-only pieces, which is why this theme avoids all five); I couldn't
  verify that against ACF's current pricing page from this environment
  (network access to advancedcustomfields.com was blocked), so it's worth
  a quick check on the plugin's install screen before you rely on it —
  ACF clearly marks any PRO-only field type with a lock icon.

## 3. Installing on Hostinger

1. In hPanel, use **Websites → Manage → Auto Installer** (or similar,
   depending on your Hostinger plan) to install WordPress.
2. In wp-admin, go to **Plugins → Add New**, install and activate
   **Advanced Custom Fields**.
3. Zip the `wordpress-theme/juvyri` folder (zip the `juvyri` folder
   itself, not its contents at the top level — the zip should contain
   `juvyri/style.css`, `juvyri/functions.php`, etc.).
4. **Appearance → Themes → Add New → Upload Theme**, upload the zip,
   **Activate**.
5. Visit the homepage — it will already show the original sample content
   (placeholder products, lookbook photos, testimonials) so nothing looks
   empty. Replace it at your own pace via the post types in the table
   above.
6. Set your logo and site icon under **Appearance → Customize**.
7. Optional: create a menu under **Appearance → Menus** and a Mailchimp/
   Brevo sign-up URL under **Pages → Site Settings → Newsletter Section**
   once you're ready to actually collect subscribers.

## 4. Image sizes (for nicer results)

WordPress will resize whatever you upload, but for the sharpest results:

- Products / Lookbook photos: portrait, roughly **900×1200px**.
- Instagram grid photos: square, roughly **800×800px**.
- Events photos: roughly **800×600px**.
- Brand story photo: portrait, roughly **1000×1250px**.

## 5. Testing note (read before your first real edits)

This theme was built and reviewed without a live WordPress install
available in the environment it was built in (no internet access to
download WordPress core or ACF in that sandbox). It was validated by:

- Linting every PHP file (`php -l`) — no syntax errors.
- Running the actual template files through a small stand-in PHP harness
  that fakes the WordPress functions they call, once with no content
  (checking the sample-content fallbacks) and once with sample posts
  (checking the real data path) — both ran with zero PHP warnings,
  notices or fatal errors, and produced well-formed, balanced HTML.

That's meaningfully more checking than "it looks right," but it is not
the same as clicking through a real wp-admin on real WordPress + MySQL.
Please do a pass through every screen in the table above on your actual
Hostinger install before considering it launch-ready, and let me know if
anything doesn't render or save as expected.

## 6. Relationship to the static prototype in the repo root

`index.html` / `css/style.css` / `js/main.js` at the repo root are the
original static design prototype — useful for quickly previewing design
changes without a WordPress install. `wordpress-theme/juvyri/` is the
deployable version with the same design, wired up to WordPress/ACF for
editing. If you change the design going forward, the two will need to be
kept in sync manually (or you can retire the static prototype once the
WordPress site is live).
