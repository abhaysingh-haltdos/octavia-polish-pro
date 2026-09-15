@extends('admin.layouts.app')

@section('title', 'Media Library')
@section('page-title', 'Media Assets Library')

@section('content')
<div class="space-y-6" x-data="{
    copyUrl(url) {
        navigator.clipboard.writeText(url);
        alert('Copied URL to clipboard:\n' + url);
    },
    selectedMedia: null
}">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Media Library</h1>
            <p class="text-xs text-slate-400">Secure asset management for marketing imagery, case study graphics, and client deliverables.</p>
        </div>
    </div>

    <!-- Upload Dropzone Card -->
    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5">
        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300 mb-3">Upload New Media</h2>
        <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">
            @csrf
            <div class="w-full sm:flex-1">
                <label for="file" class="block text-xs font-semibold text-slate-300 mb-1.5">Select Image Asset (JPEG, PNG, WebP, SVG, AVIF - Max 10MB)</label>
                <input
                    type="file"
                    id="file"
                    name="file"
                    required
                    accept="image/jpeg,image/png,image/webp,image/svg+xml,image/gif,image/avif"
                    class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-slate-300 file:mr-4 file:py-1.5 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-500 file:text-slate-950 hover:file:bg-amber-400 file:cursor-pointer"
                />
            </div>

            <div class="w-full sm:w-60">
                <label for="alt_text" class="block text-xs font-semibold text-slate-300 mb-1.5">Alt Text (Accessibility)</label>
                <input
                    type="text"
                    id="alt_text"
                    name="alt_text"
                    placeholder="Short description..."
                    class="w-full px-3.5 py-2.5 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                />
            </div>

            <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20 whitespace-nowrap flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                <span>Upload Asset</span>
            </button>
        </form>
    </div>

    <!-- Search Bar -->
    <div class="flex items-center justify-between">
        <form method="GET" action="{{ route('admin.media.index') }}" class="relative w-full max-w-sm">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search assets by name or alt text..."
                class="w-full pl-9 pr-4 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
            />
            <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </form>
        <span class="text-xs text-slate-400">{{ $media->total() }} total assets</span>
    </div>

    <!-- Media Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($media as $item)
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl overflow-hidden group hover:border-slate-700 transition-all flex flex-col justify-between">
                <!-- Image Preview Area -->
                <div class="aspect-square bg-slate-950 relative overflow-hidden flex items-center justify-center p-2">
                    <img
                        src="{{ $item->file_path }}"
                        alt="{{ $item->alt_text }}"
                        loading="lazy"
                        class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform"
                    />
                    @if($item->dimensions)
                        <span class="absolute bottom-1.5 right-1.5 px-1.5 py-0.5 rounded bg-slate-950/80 text-[9px] font-mono text-slate-300 backdrop-blur-sm border border-slate-800">
                            {{ $item->dimensions }}
                        </span>
                    @endif
                </div>

                <!-- Info and Actions -->
                <div class="p-3 border-t border-slate-800 space-y-2">
                    <div class="truncate text-[11px] font-bold text-white" title="{{ $item->original_name }}">
                        {{ $item->original_name }}
                    </div>
                    <div class="flex items-center justify-between text-[10px] text-slate-400 font-mono">
                        <span>{{ number_format($item->file_size / 1024, 1) }} KB</span>
                        <span>{{ strtoupper(pathinfo($item->filename, PATHINFO_EXTENSION)) }}</span>
                    </div>

                    <div class="pt-2 border-t border-slate-800/80 flex items-center justify-between">
                        <button
                            type="button"
                            @click="copyUrl('{{ $item->file_path }}')"
                            class="text-[10px] font-semibold text-amber-400 hover:text-amber-300 transition-colors flex items-center gap-1"
                            title="Copy file path"
                        >
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            <span>Copy URL</span>
                        </button>

                        <form method="POST" action="{{ route('admin.media.destroy', $item) }}" onsubmit="return confirm('Delete this media file permanently?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-slate-500 hover:text-rose-400 transition-colors p-1" title="Delete asset">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-slate-500 bg-slate-900/30 rounded-2xl border border-slate-800">
                <svg class="w-10 h-10 mx-auto text-slate-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p class="text-xs">No media assets found. Upload an image above.</p>
            </div>
        @endforelse
    </div>

    @if($media->hasPages())
        <div class="p-4 border-t border-slate-800 bg-slate-900/40 rounded-2xl">
            {{ $media->links() }}
        </div>
    @endif

</div>
@endsection
