import os
import glob
import re

blocks_dir = 'site/snippets/blocks/'

for filepath in glob.glob(os.path.join(blocks_dir, '*.php')):
    with open(filepath, 'r') as f:
        content = f.read()

    original_content = content
    
    # Replace the container div
    content = content.replace('<div class="container mx-auto px-4 sm:px-6 lg:px-8">', '<div class="w-full">')
    content = content.replace('<div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">', '<div class="w-full relative">')
    
    # Remove px-4 from section tags where it's immediately after an airy class or theme class
    content = re.sub(r'(<section class="[^"]*?)\s+px-4([^"]*?")', r'\1\2', content)

    if content != original_content:
        with open(filepath, 'w') as f:
            f.write(content)
        print(f"Fixed {filepath}")

print("Done")
