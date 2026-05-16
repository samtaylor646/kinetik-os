filepath = 'site/snippets/design-system/icons.php'
with open(filepath, 'r') as f:
    content = f.read()

# Let's extract everything from "<!-- SEARCH -->" if there was one, but there isn't.
# We know exactly where the grid starts: <div class="grid grid-cols-2
import re

# Split by the grid start
parts = content.split('<div class="grid grid-cols-2')

# The top part has the mess. Replace everything after <div class="mb-12">
top_part = parts[0]
good_top = top_part.split('<div class="mb-12">')[0]

new_top = good_top + """<div class="mb-12">
    <div class="relative w-full mb-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute text-ink/40 pointer-events-none" style="margin: 25px 0 0 15px;">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" id="icon-search" placeholder="Search icons..." class="w-full text-lg border-2 border-ink/10 rounded-xl hover:border-ink/20 bg-transparent text-ink focus:outline-none focus:border-oceanic focus:ring-1 focus:ring-oceanic transition-colors" style="padding: 20px 20px 20px 50px;">
    </div>

    """

content = new_top + '<div class="grid grid-cols-2' + parts[1]

with open(filepath, 'w') as f:
    f.write(content)
