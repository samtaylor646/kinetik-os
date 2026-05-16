filepath = 'site/snippets/design-system/icons.php'
with open(filepath, 'r') as f:
    content = f.read()

import re
new_block = """    <div class="relative w-full max-w-2xl mb-12">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute text-ink/40 pointer-events-none" style="margin: 25px 0 0 15px;">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" id="icon-search" placeholder="Search icons..." class="w-full text-lg border-2 border-ink/10 rounded-xl hover:border-ink/20 bg-transparent text-ink focus:outline-none focus:border-oceanic focus:ring-1 focus:ring-oceanic transition-colors" style="padding: 20px 20px 20px 50px;">
    </div>"""

content = re.sub(r'    <div class="relative w-full max-w-2xl mb-12">.*?    </div>', new_block, content, flags=re.DOTALL)

with open(filepath, 'w') as f:
    f.write(content)
