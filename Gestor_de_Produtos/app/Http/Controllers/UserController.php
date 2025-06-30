<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.manage_users'));
            }
            return redirect()->intended(route('dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,                 
            'can_manage_products' => false,      
            'can_manage_categories' => false,
            'can_manage_brands' => false,
        ]);

        Auth::login($user);
        return redirect(route('dashboard'));
    }


    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Você precisa fazer login para acessar esta página.');
        }
        return view('dashboard');
    }

    public function adminDashboard()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Acesso negado. Você não tem permissão de administrador.');
        }
        return redirect()->route('admin.manage_users');
    }

    public function manageUsers()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Acesso negado. Apenas administradores podem gerenciar usuários.');
        }
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.manage_users', compact('users'));
    }

    public function updatePermission(Request $request, User $user)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('dashboard')->with('error', 'Acesso negado. Você não tem permissão para alterar permissões de usuários.');
        }

        $request->validate([
            'is_admin' => 'boolean',
            'can_manage_products' => 'boolean',
            'can_manage_categories' => 'boolean',
            'can_manage_brands' => 'boolean',
        ]);

        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Você não pode alterar suas próprias permissões por aqui.');
        }

        $user->is_admin = $request->boolean('is_admin');

        if ($user->is_admin) {
            $user->can_manage_products = false;
            $user->can_manage_categories = false;
            $user->can_manage_brands = false;
        } else {
            $user->can_manage_products = $request->boolean('can_manage_products');
            $user->can_manage_categories = $request->boolean('can_manage_categories');
            $user->can_manage_brands = $request->boolean('can_manage_brands');
        }

        $user->save();

        return redirect()->route('admin.manage_users')->with('success', 'Permissões do usuário ' . $user->name . ' atualizadas com sucesso!');
    }


   
    public function managePermissions()
    {
      
        return redirect()->route('dashboard')->with('error', 'Acesso restrito. Esta área não é para administradores ou usuários sem permissão específica.');
    }


    public function productManagementTest()
    {
        if (!Auth::check() || Auth::user()->is_admin || !Auth::user()->can_manage_products) {
             return redirect()->route('dashboard')->with('error', 'Acesso restrito. Administradores não acessam esta área de gestão de produtos.');
        }
        return view('product_management_test');
    }

    public function categoryManagementTest()
    {
        if (!Auth::check() || Auth::user()->is_admin || !Auth::user()->can_manage_categories) {
             return redirect()->route('dashboard')->with('error', 'Acesso restrito. Administradores não acessam esta área de gestão de categorias.');
        }
        return view('category_management_test');
    }

    public function brandManagementTest()
    {
        if (!Auth::check() || Auth::user()->is_admin || !Auth::user()->can_manage_brands) {
             return redirect()->route('dashboard')->with('error', 'Acesso restrito. Administradores não acessam esta área de gestão de marcas.');
        }
        return view('brand_management_test');
    }
}