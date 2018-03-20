<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $title = "Usuarios registrados";

        $users = User::with('payments')->get();

        return view('users.index', compact('users','title'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $title = "Detalles del usuario:";

        $usersfav = User::whereIn('id', function($query) use ($id) {
            $query->select('favoriteuser')
                ->from('favoriteusers')
                ->where('user_id','=',$id);
        })->get();

        $usersNotFav = User::whereNotIn('id', function($query) use ($id) {
                        $query->select('favoriteuser')
                            ->from('favoriteusers')
                            ->where('user_id','=',$id);
                    })->get();


        return view('users.show', compact('user', 'title', 'usersfav', 'usersNotFav'));
    }

    public function create()
    {

        $title = "Crear usuario:";

        return view('users.create', compact('title'));
    }

    public function store(Request $request)
    {
        $user = new User();

        $v = \Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'age'   => 'required|numeric|min:18|max:100',
            'password' => 'required|min:3|max:6'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user->create($request->all());

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        return "Borrando al usuario $id";
    }

    public function edit($id)
    {
        $title = "Editar usuario";

        $user = User::findOrfail($id);

        return view('users.edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrfail($id);

        $v = \Validator::make($request->all(), [
            'username' => 'required|unique:users,username,'.$user->id,
            'age'   => 'required|numeric|min:18|max:100',
            'password' => 'required|min:3|max:6'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user->update($request->all());

        return redirect()->route('user.index');
    }

    public function favorite(Request $request, $id)
    {

        if (count($request->fav) > 0) {
            foreach ($request->fav as $item) {

                if (count(DB::table('favoriteusers')->select('id')
                        ->where('user_id','=', $id)
                        ->where('favoriteuser','=', $item)
                        ->get()) == 0) {

                    DB::table('favoriteusers')->insert([
                        ['user_id' => $id,
                            'favoriteuser' => $item]
                    ]);

                }


            }
        }

        return redirect()->route('user.index');
    }
}
