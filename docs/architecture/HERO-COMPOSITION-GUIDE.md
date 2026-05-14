# Hero Composition Guide (Layout Builder)

With KINETIK-OS, we use a **Compositional Layout Builder** instead of rigid, hard-coded Hero blocks. This means you can create infinite Hero variations simply by configuring a Layout Row and placing standard blocks inside it.

Here are the blueprints for building common Hero styles.

## 1. The Centered Image Hero (Classic)

A full-screen, dramatic hero with a background image and centered text.

**Layout Row Settings:**
* **Layout Grid:** `1/1` (Single full-width column)
* **Minimum Height:** `Full Screen Hero (100vh)`
* **Vertical Alignment:** `Middle`
* **Row Padding:** `None` (or `Medium` to keep text off edges on mobile)
* **Background Image:** [Select your image]
* **Image Dark Overlay:** `Medium Dim (50%)` (Ensures text is legible)
* **Background Color / Theme:** `Transparent`

**Blocks to Add (inside the 1/1 column):**
1. **Section Header:** Set alignment to `Center`, add your H1 and Overline. Because of the dark overlay, the text will naturally contrast.
2. **Text:** Keep it brief, centered.
3. **CTA Banner / Button:** Center aligned.

---

## 2. The Split Hero (50/50)

A highly converting professional hero with text on the left, and an image/video on the right.

**Layout Row Settings:**
* **Layout Grid:** `1/2, 1/2`
* **Minimum Height:** `Large (75vh)`
* **Vertical Alignment:** `Middle`
* **Background Color / Theme:** `Oceanic Dark` or `Warm Gold`
* **Row Padding:** `Large (Airy-LG)`

**Blocks to Add:**
* **Left Column:**
  1. **Section Header:** Left aligned.
  2. **Text:** Left aligned.
  3. **Button/CTA:** Left aligned.
* **Right Column:**
  1. **Image Block:** Upload a high-res image.
  *(Alternatively, you can leave the right column empty and use the row's Background Image setting if you want the image to bleed to the edges, but standard Split heroes work best with an Image Block).*

---

## 3. The Minimalist Typography Hero

A clean, text-driven hero with no heavy imagery. Relies on the "Airy" spacing scale.

**Layout Row Settings:**
* **Layout Grid:** `2/3, 1/3` (Or just `1/1`)
* **Minimum Height:** `Auto (Content Height)`
* **Row Padding:** `Massive (Airy-XL)`
* **Vertical Alignment:** `Top`
* **Background Color / Theme:** `Soft Smoke`

**Blocks to Add:**
* **Left Column (2/3):**
  1. **Section Header:** Massive H1 typography.
  2. **Text Block:** Intro paragraph.
* **Right Column (1/3):**
  1. **Bento Stat Block** or a small **Image Block** to provide asymmetry.

---

### Pro-Tips for the DX-Curator:
* **Text Legibility:** If you set a `Background Image`, always set the `Image Dark Overlay` to Light, Medium, or Heavy. The text color will automatically invert to white.
* **Motion:** Go to the Advanced tab and toggle `GSAP Scroll Reveal` to add a cinematic entrance to the hero content.
* **Copy & Paste:** Once you build a perfect Hero layout, click the three dots on the Layout Row and select **Copy**. You can paste this entire pre-configured hero onto any other page!