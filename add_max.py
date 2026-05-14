import os
import re

directory = 'site/blueprints/blocks'
for filename in os.listdir(directory):
    if filename.endswith('.yml'):
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r') as file:
            lines = file.read().split('\n')
        
        new_lines = []
        for line in lines:
            new_lines.append(line)
            if 'type: icon' in line:
                indent = line[:len(line) - len(line.lstrip())]
                # Check if next lines already have max: 1
                # To be safe, we just append it
                new_lines.append(indent + 'max: 1')
                
        new_content = '\n'.join(new_lines)
        with open(filepath, 'w') as file:
            file.write(new_content)

