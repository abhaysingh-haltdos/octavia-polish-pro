<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Services\AuditLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display menu management builder.
     */
    public function index(Request $request): View
    {
        $menus = Menu::orderBy('name')->get();
        $selectedMenuId = $request->input('menu_id', $menus->first()?->id);
        $activeMenu = $menus->firstWhere('id', $selectedMenuId) ?: $menus->first();

        $menuItems = $activeMenu
            ? MenuItem::where('menu_id', $activeMenu->id)->whereNull('parent_id')->with('children')->orderBy('order')->get()
            : collect();

        $allParents = $activeMenu
            ? MenuItem::where('menu_id', $activeMenu->id)->whereNull('parent_id')->orderBy('order')->get()
            : collect();

        return view('admin.menus.index', compact('menus', 'activeMenu', 'menuItems', 'allParents'));
    }

    /**
     * Add a new item to a menu.
     */
    public function storeItem(Request $request, Menu $menu): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'url' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:internal,external'],
            'target' => ['required', 'in:_self,_blank'],
            'parent_id' => ['nullable', 'exists:menu_items,id'],
            'order' => ['nullable', 'integer'],
        ]);

        $maxOrder = MenuItem::where('menu_id', $menu->id)->max('order') ?? 0;
        $validated['menu_id'] = $menu->id;
        $validated['order'] = $validated['order'] ?? ($maxOrder + 1);

        $item = MenuItem::create($validated);
        AuditLogger::log('MENU_ITEM_CREATED', "Menu item [{$item->title}] added to menu [{$menu->name}]");

        return redirect()->route('admin.menus.index', ['menu_id' => $menu->id])
            ->with('success', "Menu item '{$item->title}' added successfully.");
    }

    /**
     * Update an existing menu item.
     */
    public function updateItem(Request $request, MenuItem $item): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'url' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:internal,external'],
            'target' => ['required', 'in:_self,_blank'],
            'parent_id' => ['nullable', 'exists:menu_items,id'],
            'order' => ['nullable', 'integer'],
        ]);

        // Prevent item from being its own parent
        if (!empty($validated['parent_id']) && $validated['parent_id'] == $item->id) {
            $validated['parent_id'] = null;
        }

        $item->update($validated);
        AuditLogger::log('MENU_ITEM_UPDATED', "Menu item [{$item->title}] updated in menu [{$item->menu_id}]");

        return redirect()->route('admin.menus.index', ['menu_id' => $item->menu_id])
            ->with('success', "Menu item '{$item->title}' updated.");
    }

    /**
     * Remove a menu item.
     */
    public function destroyItem(MenuItem $item): RedirectResponse
    {
        $menuId = $item->menu_id;
        $title = $item->title;

        // Nullify parent for children
        $item->children()->update(['parent_id' => null]);
        $item->delete();

        AuditLogger::log('MENU_ITEM_DELETED', "Menu item [{$title}] deleted from menu [{$menuId}]");

        return redirect()->route('admin.menus.index', ['menu_id' => $menuId])
            ->with('success', "Menu item '{$title}' was removed.");
    }
}
