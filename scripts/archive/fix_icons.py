import os
import re

directory = 'site/blueprints/blocks'
for filename in os.listdir(directory):
    if filename.endswith('.yml'):
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r') as file:
            content = file.read()
        
        # Replace 'type: text' with 'type: icon\n    folder: assets/icons' in context of icon fields
        # This is a bit tricky with regex, let's just do a simple replace on the label
        # Usually it's:
        # icon:
        #   label: Icon ...
        #   type: text
        
        lines = content.split('\n')
        for i, line in enumerate(lines):
            if 'label: Icon' in line and i + 1 < len(lines) and 'type: text' in lines[i+1]:
                lines[i+1] = lines[i+1].replace('type: text', 'type: icon\n' + line[:len(line) - len(line.lstrip())] + 'folder: assets/icons')
            # Fix my previous sed mistake:
            if 'folder: assets/icons' in line and 'default: check' in line:
                 lines[i] = line.replace('folder: assets/icons', 'folder: assets/icons\n' + line[:len(line) - len(line.lstrip())]).replace('        default: check', 'default: check')
            
        new_content = '\n'.join(lines)
        if new_content != content:
            with open(filepath, 'w') as file:
                file.write(new_content)

