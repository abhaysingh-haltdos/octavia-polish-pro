@props(['name' => 'content', 'value' => '', 'label' => 'Content Body', 'placeholder' => 'Write your content in HTML or Markdown...'])

<div x-data="{
    content: @js(old($name, $value)),
    mode: 'write',
    insertTag(before, after = '') {
        const textarea = this.$refs.editorTextarea;
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selected = textarea.value.substring(start, end);
        const replacement = before + selected + after;
        textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
        this.content = textarea.value;
        textarea.focus();
        textarea.setSelectionRange(start + before.length, end + before.length);
    }
}" class="space-y-2">
    <div class="flex items-center justify-between">
        <label class="text-xs font-semibold text-slate-200">{{ $label }}</label>
        
        <!-- Mode Switcher -->
        <div class="flex items-center gap-1 bg-slate-900 border border-slate-800 rounded-lg p-0.5">
            <button type="button" @click="mode = 'write'" :class="mode === 'write' ? 'bg-amber-500/20 text-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="px-2.5 py-1 rounded-md text-[11px] font-medium transition-colors">
                Write (HTML/Markdown)
            </button>
            <button type="button" @click="mode = 'preview'" :class="mode === 'preview' ? 'bg-amber-500/20 text-amber-400 font-bold' : 'text-slate-400 hover:text-white'" class="px-2.5 py-1 rounded-md text-[11px] font-medium transition-colors">
                Live Preview
            </button>
        </div>
    </div>

    <!-- Formatting Toolbar (Visible in Write Mode) -->
    <div x-show="mode === 'write'" class="flex flex-wrap items-center gap-1 p-2 bg-slate-900/90 border border-slate-800 rounded-t-xl text-slate-300">
        <button type="button" @click="insertTag('<strong>', '</strong>')" class="px-2 py-1 rounded text-xs font-bold hover:bg-slate-800 hover:text-white" title="Bold (Ctrl+B)">B</button>
        <button type="button" @click="insertTag('<em>', '</em>')" class="px-2 py-1 rounded text-xs italic hover:bg-slate-800 hover:text-white" title="Italic">I</button>
        <div class="h-4 w-px bg-slate-800 mx-1"></div>
        <button type="button" @click="insertTag('<h2>', '</h2>')" class="px-2 py-1 rounded text-xs font-semibold hover:bg-slate-800 hover:text-white" title="Heading 2">H2</button>
        <button type="button" @click="insertTag('<h3>', '</h3>')" class="px-2 py-1 rounded text-xs font-semibold hover:bg-slate-800 hover:text-white" title="Heading 3">H3</button>
        <button type="button" @click="insertTag('<p>', '</p>')" class="px-2 py-1 rounded text-xs font-semibold hover:bg-slate-800 hover:text-white" title="Paragraph">P</button>
        <div class="h-4 w-px bg-slate-800 mx-1"></div>
        <button type="button" @click="insertTag('<blockquote>', '</blockquote>')" class="px-2 py-1 rounded text-xs hover:bg-slate-800 hover:text-white" title="Blockquote">&ldquo; Quote</button>
        <button type="button" @click="insertTag('<ul>\n  <li>', '</li>\n</ul>')" class="px-2 py-1 rounded text-xs hover:bg-slate-800 hover:text-white" title="Bullet List">&bull; List</button>
        <button type="button" @click="insertTag('<a href=\x22#\x22>', '</a>')" class="px-2 py-1 rounded text-xs hover:bg-slate-800 hover:text-white" title="Hyperlink">&infin; Link</button>
        <button type="button" @click="insertTag('<code>', '</code>')" class="px-2 py-1 rounded text-xs font-mono hover:bg-slate-800 hover:text-white" title="Inline Code">&lt;/&gt;</button>
        <div class="h-4 w-px bg-slate-800 mx-1"></div>
        <button type="button" @click="insertTag('<img src=\x22', '\x22 alt=\x22description\x22 class=\x22rounded-xl my-4\x22 />')" class="px-2 py-1 rounded text-xs hover:bg-slate-800 hover:text-white" title="Insert Image Tag">&#128444; Image</button>
    </div>

    <!-- Textarea Editor Area -->
    <div x-show="mode === 'write'">
        <textarea
            x-ref="editorTextarea"
            name="{{ $name }}"
            x-model="content"
            rows="14"
            placeholder="{{ $placeholder }}"
            class="w-full px-4 py-3 bg-slate-950/90 border border-slate-800 rounded-b-xl text-slate-100 font-mono text-xs leading-relaxed focus:outline-none focus:border-amber-500 transition-colors resize-y"
            required
        ></textarea>
    </div>

    <!-- Live Preview Area -->
    <div x-show="mode === 'preview'" x-cloak class="p-5 bg-slate-950/80 border border-slate-800 rounded-xl min-h-[300px] prose prose-invert prose-amber max-w-none text-xs text-slate-200">
        <div x-html="content || '<span class=\'text-slate-500 italic\'>Nothing to preview yet...</span>'"></div>
    </div>
</div>
