import os
import glob

theme_field = """
  theme:
    label: Block Theme
    type: select
    options:
      transparent: Inherit from Layout (Default)
      canvas: Canvas (Light)
      ink: Ink (Dark)
      oceanic: Oceanic Dark
      gold: Warm Gold
      soft-smoke: Soft Smoke
      brand-accent: Brand Accent
    default: transparent
    width: 1/1
"""

files = [
    "site/blueprints/blocks/data-table.yml",
    "site/blueprints/blocks/tabbed-interface.yml",
    "site/blueprints/blocks/video-modal.yml"
]

for file in files:
    with open(file, 'r') as f:
        content = f.read()
    if 'theme:' not in content:
        content += theme_field
        with open(file, 'w') as f:
            f.write(content)
