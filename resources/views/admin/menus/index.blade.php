@extends('admin.layouts.app')

@section('title', 'Navigation Menus')
@section('page-title', 'Menu Manager')

@section('content')
<div class="space-y-6" x-data="{
    editingItem: null,
    editTitle: '',
    editUrl: '',
    editType: 'internal',
    editTarget: '_self',
    editParentId: '',
    editOrder: 0,
    editAction: '',
    startEdit(item, updateUrl) {
        this.editingItem = item;
        this.editTitle = item.title;
        this.editUrl = item.url;
        this.editType = item.type;
        this.editTarget = item.target;
        this.editParentId = item.parent_id || '';
        this.editOrder = item.order;
        this.editAction = updateUrl;
    },
    cancelEdit() {
        this.editingItem = null;
    }
}">

    <!-- Header & Menu Switcher -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg font-bold text-white">Navigation Menus</h1>
            <p class="text-xs text-slate-400">Configure site header navigation bars, footer link hierarchies, and legal links.</p>
        </div>

        <!-- Menu Selector Dropdown -->
        <form method="GET" action="{{ route('admin.menus.index') }}" class="flex items-center gap-2">
            <label for="menu_id" class="text-xs text-slate-400 font-medium">Select Menu:</label>
            <select
                id="menu_id"
                name="menu_id"
                onchange="this.form.submit()"
                class="px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-semibold"
            >
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $activeMenu && $activeMenu->id === $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }} ({{ $menu->location }})
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    @if($activeMenu)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column: Add / Edit Item Form (1 Col) -->
        <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 self-start space-y-4">
            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-300" x-text="editingItem ? 'Edit Menu Item' : 'Add Link to ' + '{{ $activeMenu->name }}'">
                Add Link to {{ $activeMenu->name }}
            </h2>

            <!-- Create Form -->
            <form x-show="!editingItem" method="POST" action="{{ route('admin.menus.items.store', $activeMenu) }}" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-xs font-semibold text-slate-200 mb-1">Navigation Label <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        placeholder="e.g. Services, About Us, Contact"
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500"
                    />
                </div>

                <div>
                    <label for="url" class="block text-xs font-semibold text-slate-200 mb-1">Destination URL <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        id="url"
                        name="url"
                        required
                        placeholder="/services or https://..."
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="type" class="block text-xs font-semibold text-slate-400 mb-1">Link Type</label>
                        <select id="type" name="type" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="internal">Internal Route</option>
                            <option value="external">External Link</option>
                        </select>
                    </div>

                    <div>
                        <label for="target" class="block text-xs font-semibold text-slate-400 mb-1">Target Window</label>
                        <select id="target" name="target" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="_self">Same Tab (_self)</option>
                            <option value="_blank">New Tab (_blank)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="parent_id" class="block text-xs font-semibold text-slate-400 mb-1">Parent Item (For Submenus)</label>
                    <select id="parent_id" name="parent_id" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                        <option value="">None (Top-Level Item)</option>
                        @foreach($allParents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="order" class="block text-xs font-semibold text-slate-400 mb-1">Sort Order Position</label>
                    <input
                        type="number"
                        id="order"
                        name="order"
                        placeholder="Leave blank for next order"
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                    Add to Menu
                </button>
            </form>

            <!-- Edit Form -->
            <form x-show="editingItem" x-cloak :action="editAction" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-200 mb-1">Navigation Label <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        name="title"
                        x-model="editTitle"
                        required
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500"
                    />
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-200 mb-1">Destination URL <span class="text-rose-400">*</span></label>
                    <input
                        type="text"
                        name="url"
                        x-model="editUrl"
                        required
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Link Type</label>
                        <select name="type" x-model="editType" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="internal">Internal Route</option>
                            <option value="external">External Link</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Target Window</label>
                        <select name="target" x-model="editTarget" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                            <option value="_self">Same Tab (_self)</option>
                            <option value="_blank">New Tab (_blank)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Parent Item</label>
                    <select name="parent_id" x-model="editParentId" class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500">
                        <option value="">None (Top-Level Item)</option>
                        @foreach($allParents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-400 mb-1">Sort Order Position</label>
                    <input
                        type="number"
                        name="order"
                        x-model="editOrder"
                        class="w-full px-3.5 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white focus:outline-none focus:border-amber-500 font-mono"
                    />
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2.5 px-4 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs transition-all shadow-lg shadow-amber-500/20">
                        Update Item
                    </button>
                    <button type="button" @click="cancelEdit()" class="py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-xs transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column: Menu Structure Tree (2 Cols) -->
        <div class="lg:col-span-2 bg-slate-900/60 border border-slate-800 rounded-2xl p-5 space-y-3">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-300">
                    Menu Structure: <span class="text-amber-400">{{ $activeMenu->name }}</span>
                </h3>
                <span class="text-[11px] text-slate-500 font-mono">Location: {{ $activeMenu->location }}</span>
            </div>

            <div class="space-y-2">
                @forelse($menuItems as $item)
                    <div class="bg-slate-950/70 border border-slate-800 rounded-xl p-3 hover:border-slate-700 transition-all">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-lg bg-slate-800 text-slate-400 flex items-center justify-center font-mono text-[10px] font-bold">
                                    {{ $item->order }}
                                </span>
                                <div>
                                    <span class="font-bold text-xs text-white">{{ $item->title }}</span>
                                    <span class="ml-2 font-mono text-[11px] text-slate-500">{{ $item->url }}</span>
                                    @if($item->target === '_blank')
                                        <span class="ml-1 text-[10px] text-amber-400 font-mono">↗</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button
                                    type="button"
                                    @click="startEdit({{ json_encode($item) }}, '{{ route('admin.menus.items.update', $item) }}')"
                                    class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors"
                                >
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('admin.menus.items.destroy', $item) }}" onsubmit="return confirm('Remove \'{{ addslashes($item->title) }}\' from this menu?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Nested Children Submenu -->
                        @if($item->children->count() > 0)
                            <div class="mt-2.5 pt-2 border-t border-slate-900 pl-8 space-y-1.5">
                                @foreach($item->children as $child)
                                    <div class="flex items-center justify-between p-2 rounded-lg bg-slate-900/50 border border-slate-800/60">
                                        <div class="flex items-center gap-2">
                                            <span class="text-slate-600">&rdsh;</span>
                                            <span class="text-xs font-medium text-slate-200">{{ $child->title }}</span>
                                            <span class="font-mono text-[10px] text-slate-500">{{ $child->url }}</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <button
                                                type="button"
                                                @click="startEdit({{ json_encode($child) }}, '{{ route('admin.menus.items.update', $child) }}')"
                                                class="text-xs font-semibold text-amber-400 hover:text-amber-300 transition-colors"
                                            >
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('admin.menus.items.destroy', $child) }}" onsubmit="return confirm('Remove \'{{ addslashes($child->title) }}\'?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs font-semibold text-rose-400 hover:text-rose-300 transition-colors">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="py-10 text-center text-slate-500">
                        This menu is currently empty. Use the form to add items.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
    @endif

</div>
@endsection
