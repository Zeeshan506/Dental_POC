#!/usr/bin/env node

import { execSync } from 'node:child_process';
import { readFileSync, existsSync } from 'node:fs';

const MAX_LINES = 300;
const EXCLUDED_EXTENSIONS = new Set([
    '.png', '.jpg', '.jpeg', '.webp', '.svg', '.gif', '.ico',
    '.woff', '.woff2', '.ttf', '.eot', '.pdf'
]);
const EXCLUDED_FILES = new Set([
    'composer.lock',
    'package-lock.json',
    'pnpm-lock.yaml'
]);

function isExcluded(filePath) {
    if (filePath.startsWith('.tree/')) return true;
    if (EXCLUDED_FILES.has(filePath)) return true;
    const dotIndex = filePath.lastIndexOf('.');
    if (dotIndex !== -1) {
        const ext = filePath.slice(dotIndex).toLowerCase();
        if (EXCLUDED_EXTENSIONS.has(ext)) return true;
    }
    return false;
}

try {
    const stdout = execSync('git ls-files', { encoding: 'utf8' });
    const files = stdout.split('\n').map((f) => f.trim()).filter(Boolean);

    let violations = 0;
    let checkedCount = 0;

    for (const file of files) {
        if (isExcluded(file)) continue;
        if (!existsSync(file)) continue;

        const content = readFileSync(file, 'utf8');
        const lines = content.split('\n').length;
        checkedCount++;

        if (lines > MAX_LINES) {
            console.error(`[VIOLATION] ${file} has ${lines} lines (maximum allowed is ${MAX_LINES})`);
            violations++;
        }
    }

    console.log(`Audited ${checkedCount} tracked text/code files.`);
    if (violations > 0) {
        console.error(`Found ${violations} file(s) exceeding ${MAX_LINES} lines.`);
        process.exit(1);
    } else {
        console.log(`All ${checkedCount} tracked files adhere to the <= ${MAX_LINES} line constraint.`);
        process.exit(0);
    }
} catch (err) {
    console.error('Error running check-line-counts:', err.message);
    process.exit(1);
}
