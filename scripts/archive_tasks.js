import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');

const srcDir = path.join(rootDir, '.roo-tasks/tasks');
const destDir = path.join(rootDir, '.roo-tasks-archive/tasks');
const indexFile = path.join(srcDir, '_index.json');
const archiveIndexFile = path.join(destDir, '_index.json');

if (!fs.existsSync(destDir)) {
    fs.mkdirSync(destDir, { recursive: true });
}

let index = { version: 1, updatedAt: Date.now(), entries: [] };
if (fs.existsSync(indexFile)) {
    index = JSON.parse(fs.readFileSync(indexFile, 'utf8'));
}

let archiveIndex = { version: 1, updatedAt: Date.now(), entries: [] };
if (fs.existsSync(archiveIndexFile)) {
    archiveIndex = JSON.parse(fs.readFileSync(archiveIndexFile, 'utf8'));
}

// Sort entries by time (newest first)
index.entries.sort((a, b) => b.updatedAt - a.updatedAt);

const toKeep = index.entries.slice(0, 2);
const toArchive = index.entries.slice(2);

const foldersToKeep = new Set(toKeep.map(e => e.id));

// Move folders
if (fs.existsSync(srcDir)) {
    const folders = fs.readdirSync(srcDir).filter(f => fs.statSync(path.join(srcDir, f)).isDirectory());

    for (const folder of folders) {
        if (!foldersToKeep.has(folder)) {
            fs.renameSync(path.join(srcDir, folder), path.join(destDir, folder));
        }
    }
}

// Update indexes
if (toArchive.length > 0) {
    archiveIndex.entries.push(...toArchive);
    archiveIndex.updatedAt = Date.now();
    fs.writeFileSync(archiveIndexFile, JSON.stringify(archiveIndex, null, 2));
}

index.entries = toKeep;
index.updatedAt = Date.now();
fs.writeFileSync(indexFile, JSON.stringify(index, null, 2));

console.log('Archived older tasks, kept 2 most recent.');
