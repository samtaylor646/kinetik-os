import os
import re

blocks_dir = "site/blueprints/blocks/"

for filename in os.listdir(blocks_dir):
    if not filename.endswith(".yml"): continue
    
    filepath = os.path.join(blocks_dir, filename)
    with open(filepath, 'r') as f:
        content = f.read()
    
    lines = content.split('\n')
    new_lines = []
    i = 0
    changed = False
    
    while i < len(lines):
        line = lines[i]
        
        match = re.match(r'^(\s+)theme:$', line)
        
        if match:
            indent = match.group(1)
            
            # Extract attributes
            label = "Theme"
            help_text = None
            width_text = None
            
            j = i + 1
            while j < len(lines) and (lines[j].startswith(indent + "  ") or lines[j].strip() == ""):
                if lines[j].strip() != "":
                    if "label:" in lines[j]: label = lines[j].split("label:")[1].strip()
                    if "help:" in lines[j]: help_text = lines[j].split("help:")[1].strip()
                    if "width:" in lines[j]: width_text = lines[j].split("width:")[1].strip()
                j += 1
                
            new_lines.append(f"{indent}theme:")
            new_lines.append(f"{indent}  label: {label}")
            new_lines.append(f"{indent}  type: select")
            new_lines.append(f"{indent}  placeholder: Default / Inherit")
            new_lines.append(f"{indent}  options: query")
            new_lines.append(f"{indent}  query:")
            new_lines.append(f"{indent}    fetch: kirby.page(\"theme\").color_profiles.toStructure")
            new_lines.append(f"{indent}    text: \"{{{{ item.profile_name }}}}\"")
            new_lines.append(f"{indent}    value: \"{{{{ item.profile_id }}}}\"")
            if help_text:
                new_lines.append(f"{indent}  help: {help_text}")
            if width_text:
                new_lines.append(f"{indent}  width: {width_text}")
                
            i = j - 1
            changed = True
        else:
            new_lines.append(line)
            
        i += 1
        
    if changed:
        with open(filepath, 'w') as f:
            f.write('\n'.join(new_lines))
        print(f"Updated {filename}")

