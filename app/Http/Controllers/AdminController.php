<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function dashboard(){
    $adminRequests = User::where('is_admin', NULL)->get();
    $revisorequests = User::where('is_revisor', NULL)->get();
    $writerRequests = User::where('is_writer', NULL)->get();

    return view('admin.dashboard', compact('adminRequests','revisorRequests','writerRequests'));

}
public function setAdmin(User $user){
    $user->update([
        'is_admin' => true,
    ]);

    return redirect(route('admin.dashboard'))->with('message' , 'hai correttamente reso amministratore l\'utenteselezionato');
}
public function setRevisor(User $user){
    $user->update([
        'is_revisor' => true,
    ]);

    return redirect(route('admin.dashboard'))->with('message' , 'hai correttamente reso revisore l\'utenteselezionato');
}
public function setWriter(User $user){
    $user->update([
        'is_writer' => true,
    ]);

    return redirect(route('admin.dashboard'))->with('message' , 'hai correttamente reso redattore l\'utenteselezionato');

}
public function editTag(Request $request, Tag $tag){
    $request->validate([
        'name' => 'required|uinque:tags',
    ]);

    $tag->update([
        'name' => strtolower($request->name),

    ]);
    return redirect(route('admin.dashboard'))->with('message', 'hai correttamente aggiornato il tag');
}
public function delteTag(Tag $tag){
    foreach($tag->articles as $article){
        $article->tags()->detach($tag);
    }
    $tag->delete();
    return redirect(route('admin.dashboard'))->with('message', 'hai correttamente eliminato il tag');
}
public function editCategory(Request $request, Category $category){
    $request->validate([
        'name' => 'required|uinque:categories',
    ]);

    $category->update([
        'name' => strtolower($request->name),

    ]);
    return redirect(route('admin.dashboard'))->with('message', 'hai correttamente aggiornato la categoria');
}
public function delteCategory(Category $category){
    $category->delete();
    return redirect(route('admin.dashboard'))->with('message', 'hai correttamente eliminato il tag');
}
public function storeCategory(Request $request){
    Category::create([
        'name' => strtolower($request->name),

    ]);
    return redirect(route('admin.dashboard'))->with('message', 'hai correttamene inserito la categoria');
}
}
