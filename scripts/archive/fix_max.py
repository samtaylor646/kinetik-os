import os

directory = 'site/blueprints/blocks'
for filename in os.listdir(directory):
    if filename.endswith('.yml'):
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r') as file:
            lines = file.read().split('\n')
        
        new_lines = []
        for line in lines:
            if line.strip() == 'max: 1' and 'type: icon' not in line:
                # We need to skip this only if it was wrongly added, but some fields actually need max: 1!
                # Wait, my sed appended it directly below `type: icon`. So the previous line must be `type: icon`.
                pass
            new_lines.append(line)

        # Let's restore the blocks entirely to avoid messing up files fields max: 1
        pass
