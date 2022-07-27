<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use PhpParser\Node\Expr\PostDec;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $usersPaginate = User::select('id', 'name', 'username', 'email', 'role', 'avatar')
          ->Paginate(5);
      // dd($usersPaginate);
      return view('admin.user.list', ['user_list' => $usersPaginate]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $user = new User();
      $user->name = '';
      $user->email = '';
      $user->password = '';
      $user->role = '';
      $user->code = '';
      $user->username = '';
      $user->avatar = '';
      $user->status = '';
      return view('admin.user.create', [
          "user" => $user,
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function saveFile($file, $prefixName = '', $folder = 'public') {
      if($file) {
          $fileName = $file->hashName();
          $fileName = isset($prefixName) ? $prefixName.'-'.$fileName : $fileName;
          return $file->storeAs($folder, $fileName);
      }
  }

  public function store(Request $request)
  {
      // dd($request->all());
      // Định nghĩa các điều kiện validate
      // $request->validate([
      //     'name' => 'required|min:6|max:50',
      //     // 'email' => 'required|min:6|max:50|email',
      // ]);
      // Nếu không thỏa mã thì redirect về form và kém errors
      $user = new User();
      $user->fill($request->all());

      // dd($user);
      if ($request->hasFile('avatar')) {
          $user->avatar = $this->saveFile($request->avatar, $user->username, 'images');
      } else {
          $user->avatar = "";
      }

      // dd($request->all());
      $user->save();
      return redirect()->route('users.list');
      // dd(true);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
      // dd($user);
      if ($user) {
          return view('admin.user.create')->with('user', $user);
      }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      // dd($request->all(), $id);
      // $user = new User();
      $user_db = User::find($id);
      $user_db->fill($request->all());

      if ($user_db) {
          if ($request->hasFile('avatar')) {
              $user_db->avatar = $this->saveFile($request->avatar, $request->username, 'images');
          }

          $user_db->save();
          return redirect()->route('users.list');
      }
  }

  public function change_status($id)
  {
      $user = User::find($id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $user = User::destroy($id);
      return redirect()->back();
  }

  public function delete(User $user)
  {
      if ($user) {
          // dd($user);
          $posts = Post::where('user_id', '=', $user->id)->get();
          $postIds = $posts->pluck('id');
          Post::whereIn('id', $postIds)->update(['user_id' => 0]);

          $user->delete();
          return redirect()->route('users.list');
      }
  }
}
