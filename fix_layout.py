import re

with open('site/blueprints/fields/layout-builder.yml', 'r') as f:
    content = f.read()

# Fix min_height
content = re.sub(
    r'min_height:\s+label: Minimum Height \(Hero Setting\)\s+type: select\s+options:\s+auto: Auto \(Content Height\)\s+vh-50: Half Screen \(50vh\)\s+vh-75: Large \(75vh\)\s+vh-100: Full Screen Hero \(100vh\)\s+default: auto',
    r'''min_height:
          label: Minimum Height (Hero Setting)
          type: select
          empty: false
          options:
            "": Inherit Global Baseline (Auto)
            vh-50: Half Screen (50vh)
            vh-75: Large (75vh)
            vh-100: Full Screen Hero (100vh)
          default: ""''',
    content
)

# Fix vertical_align
content = re.sub(
    r'vertical_align:\s+label: Vertical Content Alignment\s+type: select\s+options:\s+start: Top\s+center: Middle\s+end: Bottom\s+default: start',
    r'''vertical_align:
          label: Vertical Content Alignment
          type: select
          empty: false
          options:
            "": Inherit Global Baseline (Top)
            center: Middle
            end: Bottom
          default: ""''',
    content
)

# Fix row_padding
content = re.sub(
    r'row_padding:\s+label: Row Padding \(Y\)\s+type: select\s+options:\s+none: None\s+sm: Small \(Airy-SM\)\s+md: Medium \(Airy-MD\)\s+lg: Large \(Airy-LG\)\s+xl: Massive \(Airy-XL\)\s+default: md',
    r'''row_padding:
          label: Row Padding (Y)
          type: select
          empty: false
          options:
            "": Inherit Global Baseline
            none: None
            sm: Small (Airy-SM)
            md: Medium (Airy-MD)
            lg: Large (Airy-LG)
            xl: Massive (Airy-XL)
          default: ""''',
    content
)

# Fix row_width
content = re.sub(
    r'row_width:\s+label: Row Width Container\s+type: select\s+options:\s+contained: Contained \(Max-Width\)\s+full: Full Bleed\s+default: contained',
    r'''row_width:
          label: Row Width Container
          type: select
          empty: false
          options:
            "": Inherit Global Baseline (Contained)
            full: Full Bleed
          default: ""''',
    content
)

# Fix row_bg
content = re.sub(
    r'row_bg:\s+label: Background Color / Theme\s+type: select\s+options:\s+transparent: Transparent\s+canvas: Canvas \(Main Background\)\s+ink: Ink \(Dark Text/Background\)\s+oceanic: Oceanic Dark\s+gold: Warm Gold\s+soft-smoke: Soft Smoke\s+brand-accent: Brand Accent\s+default: transparent',
    r'''row_bg:
          label: Background Color / Theme
          type: select
          empty: false
          options:
            "": Inherit Context (Transparent)
            canvas: Canvas (Main Background)
            ink: Ink (Dark Text/Background)
            oceanic: Oceanic Dark
            gold: Warm Gold
            soft-smoke: Soft Smoke
            brand-accent: Brand Accent
          default: ""''',
    content
)

# Fix background_media_size
content = re.sub(
    r'background_media_size:\s+label: Media Size\s+type: select\s+options:\s+cover: Cover \(Fill Area, Crop\)\s+contain: Contain \(Show All, Letterbox\)\s+auto: Auto \(Original Size\)\s+default: cover',
    r'''background_media_size:
          label: Media Size
          type: select
          empty: false
          options:
            cover: Cover (Fill Area, Crop)
            contain: Contain (Show All, Letterbox)
            auto: Auto (Original Size)
          default: cover''',
    content
)

# Fix background_media_position
content = re.sub(
    r'background_media_position:\s+label: Media Position\s+type: select\s+options:\s+center: Center\s+top: Top\s+bottom: Bottom\s+left: Left\s+right: Right\s+default: center',
    r'''background_media_position:
          label: Media Position
          type: select
          empty: false
          options:
            center: Center
            top: Top
            bottom: Bottom
            left: Left
            right: Right
          default: center''',
    content
)

with open('site/blueprints/fields/layout-builder.yml', 'w') as f:
    f.write(content)


with open('site/blueprints/blocks/hero-content.yml', 'r') as f:
    content = f.read()

# Fix alignment
content = re.sub(
    r'alignment:\s+label: Content Alignment\s+type: select\s+options:\s+left: Left Aligned\s+center: Center Aligned\s+right: Right Aligned\s+default: left',
    r'''alignment:
    label: Content Alignment
    type: select
    empty: false
    options:
      "": Inherit Context (Left)
      center: Center Aligned
      right: Right Aligned
    default: ""''',
    content
)

# Fix theme
content = re.sub(
    r'theme:\s+label: Block Theme\s+type: select\s+options:\s+transparent: Inherit from Layout \(Default\)\s+canvas: Canvas \(Light\)\s+ink: Ink \(Dark\)\s+oceanic: Oceanic Dark\s+gold: Warm Gold\s+soft-smoke: Soft Smoke\s+brand-accent: Brand Accent\s+default: transparent',
    r'''theme:
    label: Block Theme
    type: select
    empty: false
    options:
      "": Inherit from Layout (Default)
      canvas: Canvas (Light)
      ink: Ink (Dark)
      oceanic: Oceanic Dark
      gold: Warm Gold
      soft-smoke: Soft Smoke
      brand-accent: Brand Accent
    default: ""''',
    content
)

# Fix backdrop_tint
content = re.sub(
    r'backdrop_tint:\s+label: Backdrop Tint \(Glass Effect\)\s+type: select\s+options:\s+transparent: Transparent \(None\)\s+frost-light: Frost Light \(Light Glass\)\s+frost-dark: Frost Dark \(Dark Glass\)\s+solid-canvas: Solid Canvas\s+solid-ink: Solid Ink\s+default: transparent',
    r'''backdrop_tint:
    label: Backdrop Tint (Glass Effect)
    type: select
    empty: false
    options:
      "": Inherit Context (Transparent)
      frost-light: Frost Light (Light Glass)
      frost-dark: Frost Dark (Dark Glass)
      solid-canvas: Solid Canvas
      solid-ink: Solid Ink
    default: ""''',
    content
)

with open('site/blueprints/blocks/hero-content.yml', 'w') as f:
    f.write(content)
