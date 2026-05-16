import json
import re
import sys

def read_file(path):
    with open(path, 'r', encoding='utf-8') as f:
        return f.read()

def write_file(path, content):
    with open(path, 'w', encoding='utf-8') as f:
        f.write(content)

home_txt = read_file('content/1_home/home.txt')
# Extract layout from home.txt
layout_match = re.search(r'^Layout: (\[.*\])$', home_txt, re.MULTILINE)
if not layout_match:
    print("Could not find Layout in home.txt")
    sys.exit(1)

home_layout = json.loads(layout_match.group(1))

# Find the hero-content block in home layout
hero_content_block = None
for row in home_layout:
    for col in row.get('columns', []):
        for block in col.get('blocks', []):
            if block.get('type') == 'hero-content':
                hero_content_block = block
                break

if not hero_content_block:
    print("Could not find hero-content block in home.txt")
    sys.exit(1)

def fix_sandbox(path):
    txt = read_file(path)
    match = re.search(r'^Layout: (\[.*\])$', txt, re.MULTILINE)
    if not match:
        return
    layout = json.loads(match.group(1))
    
    modified = False
    for row in layout:
        for col in row.get('columns', []):
            blocks = col.get('blocks', [])
            for i, block in enumerate(blocks):
                # The previous regex changed "type":"split-hero" to "type":"hero-content"
                # so we look for "hero-content" that has the wrong content schema (like "image" which hero-content doesn't have usually, but let's just replace the first hero-content we find)
                if block.get('type') == 'hero-content':
                    # Replace its content with the correct one
                    block['content'] = hero_content_block['content']
                    modified = True
                    
    if modified:
        new_layout_str = json.dumps(layout, separators=(',', ':'))
        new_txt = txt[:match.start(1)] + new_layout_str + txt[match.end(1):]
        write_file(path, new_txt)
        print(f"Fixed {path}")

fix_sandbox('content/3_sb-homepage/sandbox.txt')
fix_sandbox('content/6_sb-employment/sandbox.txt')
