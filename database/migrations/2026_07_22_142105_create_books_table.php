public function store(Request $request)
{
    $request->validate([

        'category_id'   => 'required',

        'judul'         => 'required',

        'penulis'       => 'required',

        'penerbit'      => 'required',

        'tahun_terbit'  => 'required',

        'harga'         => 'required|numeric',

        'stok'          => 'required|integer',

        'deskripsi'     => 'nullable',

        'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ]);

    $data = $request->all();

    if ($request->hasFile('gambar')) {

        $data['gambar'] = $request
            ->file('gambar')
            ->store('books', 'public');

    }

    Book::create($data);

    return redirect()
        ->route('books.index')
        ->with('success', 'Buku berhasil ditambahkan');
}