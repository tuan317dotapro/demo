<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginPost as AdminLogin;
use App\Models\Admins as AdminModel;

class LoginController extends Controller
{
    public function loginView(Request $request)
    {
    	$messages = $request->session()->get('error');
    	// gọi file login_View.blade.php vào LoginController và truyền đến route
    	return view('admin.login.login_View')->with('error',$messages);
    }

    public function handleLogin(AdminLogin $request, AdminModel $admin)
    {
    	// thực hiện validation form 
    	$username = $request->username;
    	$username = trim(strip_tags($username));

    	$password = $request->password;
    	$password = trim(strip_tags($password));

    	// checkAdminLogin nằm trong thư mục Models
    	$infoData = $admin->checkAdminLogin($username,$password);
    	if (isset($infoData['id']) && isset($infoData['username'])) {
    		// lưu thông tin về session ở đây
    		$request->session()->put('user',$infoData['username']);
    		// $_SESSION['user'] = $infoData['username'] // cách cũ. 
    		$request->session()->put('email',$infoData['email']);
    		$request->session()->put('id',$infoData['id']);
    		$request->session()->put('role',$infoData['role']);
    		// cho vào trang dashboard admin
    		return redirect()->route('admin.dashboard');
    	} else {
    		// lưu lỗi vào session flash
    		// quay về lại đúng trang login
    		$request->session()->flash('error','Username or password invalid');
    		return redirect()->route('admin.loginView');

    	}
    }

    public function logout(Request $request)
    {
        // xoá session
        $request->session()->forget('user');
        $request->session()->forget('email');
        $request->session()->forget('id');
        $request->session()->forget('role');
        // quay lại trang Login
        return redirect()->route('admin.loginView');
    }
}
