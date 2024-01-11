

Route::middleware('auth')->get('layouts/Home', function () {
    return view('layouts/Home');
});