<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', null)->get();
        $revisorRequests = User::where('is_revisor', null)->get();
        $writerRequests = User::where('is_writer', null)->get();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'categories', 'tags'));
    }

    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai reso {$user->name} Amministratore");
    }

    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai reso {$user->name} Revisore");
    }

    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();

        return redirect(route('admin.dashboard'))->with('message', "Hai reso {$user->name} Scrittore");
    }

    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag aggiornato correttamente');
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }

        $tag->delete();

        return redirect()->back()->with('message', 'Tag eliminato correttamente');
    }

    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria aggiornata correttamente');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('message', 'Categoria eliminata correttamente!');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria inserita correttamente');
    }
    public function storeTag(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name',
        ]);

        Tag::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag inserito correttamente');
    }
    public function destroy($id)
{
    $tag = Tag::findOrFail($id);
    $tag->delete();

    return redirect()->route('admin.tags.index')->with('success', 'Tag eliminato con successo.');
}

}
