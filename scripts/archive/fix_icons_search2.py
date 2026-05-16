filepath = 'site/snippets/design-system/icons.php'
with open(filepath, 'r') as f:
    content = f.read()

# Replace the search container entirely
old_container = """    <div class="relative w-full max-w-2xl mb-12 flex items-center">
        <div class="absolute left-6 pointer-events-none flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-ink/40"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <input type="text" id="icon-search" placeholder="Search icons..." class="w-full px-6 py-5 pl-16 text-lg border border-ink/20 rounded-xl bg-canvas text-ink focus:outline-none focus:border-oceanic focus:ring-1 focus:ring-oceanic transition-all">
    </div>"""

new_container = """    <div class="relative w-full max-w-2xl mb-12">
        <div class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-ink/40"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <input type="text" id="icon-search" placeholder="Search icons..." class="w-full py-5 pr-6 pl-16 text-lg border-2 border-ink/10 rounded-xl hover:border-ink/20 bg-canvas text-ink focus:outline-none focus:border-oceanic focus:ring-1 focus:ring-oceanic transition-colors">
    </div>"""

content = content.replace(old_container, new_container)
with open(filepath, 'w') as f:
    f.write(content)
