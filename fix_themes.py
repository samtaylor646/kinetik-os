import os

blocks_dir = "site/blueprints/blocks/"

replacement = """  theme:
    label: Block Theme
    type: select
    placeholder: Default / Inherit
    options: query
    query:
      fetch: kirby.page("theme").color_profiles.toStructure
      text: "{{ item.profile_name }}"
      value: "{{ item.profile_id }}"
"""

for filename in os.listdir(blocks_dir):
    if not filename.endswith(".yml"): continue
    
    filepath = os.path.join(blocks_dir, filename)
    with open(filepath, 'r') as f:
        content = f.read()
    
    # We will find "  theme:" and replace it and the following indented lines until the next "  [a-z]" or end.
    lines = content.split('\n')
    new_lines = []
    i = 0
    in_theme = False
    theme_indent = "  "
    changed = False
    
    while i < len(lines):
        line = lines[i]
        
        if line.startswith("  theme:"):
            # skip until we hit a line that doesn't start with 4 spaces
            in_theme = True
            
            # Use original label if we can find one in the first few lines
            label = "Block Theme"
            j = i + 1
            while j < len(lines) and (lines[j].startswith("    ") or lines[j].strip() == ""):
                if "label:" in lines[j]:
                    label = lines[j].split("label:")[1].strip()
                j += 1
            
            help_text = None
            j = i + 1
            while j < len(lines) and (lines[j].startswith("    ") or lines[j].strip() == ""):
                if "help:" in lines[j]:
                    help_text = lines[j].split("help:")[1].strip()
                j += 1
            
            width_text = None
            j = i + 1
            while j < len(lines) and (lines[j].startswith("    ") or lines[j].strip() == ""):
                if "width:" in lines[j]:
                    width_text = lines[j].split("width:")[1].strip()
                j += 1
                
            new_lines.append(f"  theme:")
            new_lines.append(f"    label: {label}")
            new_lines.append(f"    type: select")
            new_lines.append(f"    placeholder: Default / Inherit")
            new_lines.append(f"    options: query")
            new_lines.append(f"    query:")
            new_lines.append(f"      fetch: kirby.page(\"theme\").color_profiles.toStructure")
            new_lines.append(f"      text: \"{{{{ item.profile_name }}}}\"")
            new_lines.append(f"      value: \"{{{{ item.profile_id }}}}\"")
            if help_text:
                new_lines.append(f"    help: {help_text}")
            if width_text:
                new_lines.append(f"    width: {width_text}")
                
            i = j - 1
            changed = True
        else:
            new_lines.append(line)
            
        i += 1
        
    if changed:
        with open(filepath, 'w') as f:
            f.write('\n'.join(new_lines))
        print(f"Updated {filename}")

