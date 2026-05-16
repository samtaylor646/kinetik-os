import os

filepath = 'site/blueprints/blocks/tabbed-interface.yml'
with open(filepath, 'r') as f:
    content = f.read()

content = content.replace('type: text\n        label: Lucide Icon Name', 'type: icon\n        folder: assets/icons\n        label: Lucide Icon Name')
with open(filepath, 'w') as f:
    f.write(content)
