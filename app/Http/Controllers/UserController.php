<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function dashboard() {
        return view('Dashboard');
    }

    public function index(Request $request)
    {        
        $listUser = User::latest('updated_at')->paginate(10);
        return view('users.index', compact('listUser'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            report($e);
            return redirect()->route('users.index');
        }
    }

    /**
     * Reset user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetPass($id)
    {
        try {

            $user = User::findOrFail($id);

            $user->password = Hash::make(config('custom.default_password'));
            $user->save();

            return response()->json(['message'=>"Password has been reset to"], 200);
        } 
        catch (ModelNotFoundException $e) {
            return response()->json(['message'=>"User not found"], 404);
        }
        catch (\Exception $e) {
            return response()->json(['message'=>"Some error has occured"], 500);
        }
    }
}
