<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FintechController extends Controller
{
    // public function index(Request $request)
    // {
    //     $toggle = $request->has('toggle') ? $request->input('toggle') : false;

    //     return view('pages.landingpage', compact('toggle'));
    // }

    public function index(Request $request){
        $toggle = $request->has('toggle') ? $request->input('toggle') : false;
        $products = Product::all(); // Ambil semua produk dari model Product
        return view("pages.fintech", compact("toggle", "products"));
    }

    public function dashboard()
    {
        $jumlahProduk = Product::count();
        $financials = Financial::get();
    
        $totalPemasukan = Financial::sum('pemasukan') ?? 0;
        $totalPengeluaran = Financial::sum('pengeluaran') ?? 0;
    
        $totalKeseluruhan = $totalPemasukan - $totalPengeluaran;
    
        $financialData = $financials->map(function ($financial) {
            return [
                'tanggal' => $financial->tanggal->format('Y-m-d'),
                'totalKeuangan' => $financial->pemasukan - $financial->pengeluaran,
            ];
        });
    
        return view('pages.admin.dashboard', compact('jumlahProduk', 'totalPemasukan', 'totalPengeluaran', 'totalKeseluruhan', 'financialData'));
    }
    public function produk(){
        $products = Product::with('rates')->get();

        return view('pages.admin.produk.produk', compact('products'));    
    }

    public function finansial(){
        $financials = Financial::all(); 
        $totalPemasukan = $financials->sum('pemasukan');
        $totalPengeluaran = $financials->sum('pengeluaran');
        $totalKeseluruhan = $totalPemasukan - $totalPengeluaran;
        return view('pages.admin.finansial.finansial', compact('financials', 'totalPemasukan', 'totalPengeluaran', 'totalKeseluruhan'));     
    }
    public function login(){
        return view('pages.auth.login');    
    }
    public function register(){
        return view('pages.auth.register');    
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function storeReg(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ], [
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 5 karakter.',
            'password.max' => 'Password maksimal 255 karakter.',
        ]);

        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Berhasil daftar! Mohon login');
        return redirect('masuk');
    }

    // Produk

    public function form_produk(){
        return view('pages.admin.produk.tambahproduk');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'deskripsi' => 'nullable|string',
        ]);



        $pindah_gambar = $request->gambar;
        $namafile_gambar = Str::random(40) . '.' . $pindah_gambar->getClientOriginalExtension();

        $nama_produk = $request->input('nama_produk');
        $harga = $request->input('harga');
        $kategori = $request->input('kategori');

        $deskripsi = $request->filled('deskripsi') ? $request->input('deskripsi') : "Tidak memiliki deskripsi";

        Product::create([
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'kategori' => $kategori,
            'gambar' => $namafile_gambar,
            'deskripsi' => $deskripsi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $pindah_gambar->move(public_path() . '/gambar', $namafile_gambar);

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id){
        $product = Product::find($id);

        return view('pages.admin.produk.editproduk', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'deskripsi' => 'nullable|string',
        ]);

      

        $product->deskripsi = $request->filled('deskripsi') ? $request->input('deskripsi') : "Tidak memiliki deskripsi";

        $product->nama_produk = $request->input('nama_produk');
        $product->harga = $request->input('harga');
        $product->kategori = $request->input('kategori');
        $product->deskripsi = $request->input('deskripsi');

        if($request->hasFile('gambar')){
            $pindah_gambar = $request->file('gambar');
            $namafile_gambar = Str::random(40) . '.' . $pindah_gambar->getClientOriginalExtension();

            $pindah_gambar->move(public_path() . '/gambar', $namafile_gambar);
            $product->gambar = $namafile_gambar;
        }  
        $product->save();
        return redirect()->route('produk')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id){
        Product::find($id)->delete();

        return redirect('produk');
    }

    public function product_detail($id){
        $product = Product::find($id);
    
        if (!$product) {
            // Handle jika produk tidak ditemukan
            abort(404);
        }
        
        $averageRating = $product->rates->avg('rate');
    
        $product->loadCount('rates'); 
        $reviews = $product->rates;
    
        return view('pages.detailproduk', compact('product', 'reviews', 'averageRating'));
    }
    // Finansial

    public function form_finansial(){
        return view('pages.admin.finansial.tambahfinansial');
    }

    public function storeFinansial(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'pemasukan' => 'nullable|numeric',
        'pengeluaran' => 'nullable|numeric',
        'deskripsi' => 'nullable|string',
    ]);

    $pemasukan = $request->filled('pemasukan') ? $request->input('pemasukan') : 0;
    $pengeluaran = $request->filled('pengeluaran') ? $request->input('pengeluaran') : 0;

    Financial::create([
        'tanggal' => $request->input('tanggal'),
        'pemasukan' => $pemasukan,
        'pengeluaran' => $pengeluaran,
        'deskripsi' => $request->input('deskripsi'),
    ]);

    return redirect()->route('finansial')->with('success', 'Data finansial berhasil ditambahkan');
}

public function editFinansial($id){
    $financial = Financial::find($id);

    return view('pages.admin.finansial.editFinansial', compact('financial'));
}

    public function updateFinansial($id, Request $request){

        $request->validate([
            'tanggal' => 'required|date',
            'pemasukan' => 'nullable|numeric',
            'pengeluaran' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $pemasukan = $request->filled('pemasukan') ? $request->input('pemasukan') : 0;
        $pengeluaran = $request->filled('pengeluaran') ? $request->input('pengeluaran') : 0;

        Financial::where('id', $id)->update([
            'tanggal' => $request->input('tanggal'),
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('finansial')->with('success', 'Data finansial berhasil diupdate');
    }

    public function destroyFinansial($id){
        Financial::find($id)->delete();
        return redirect('finansial');
    }

    public function storeRate(Request $request, $id)
{
    $request->validate([
        'rate' => 'required',
        'ulasan' => 'nullable|string',
    ]);

    $user = auth()->user();

    // Cek apakah pengguna sudah memberikan rating pada produk ini
    $existingReview = Review::where('user_id', $user->id)
        ->where('product_id', $id)
        ->first();

    if ($existingReview) {
        // Jika sudah, update rating yang sudah ada
        $existingReview->update([
            'rate' => $request->input('rate'),
            'ulasan' => $request->input('ulasan'),
        ]);

        return redirect()->back()->with('success', 'Rating berhasil diperbarui');
    }

    // Jika belum, buat rating baru
    $review = new Review([
        'user_id' => $user->id,
        'product_id' => $id,
        'rate' => $request->input('rate'),
        'ulasan' => $request->input('ulasan'),
    ]);

    $review->save();

    return redirect()->back()->with('success', 'Rating berhasil ditambahkan');
}

}
