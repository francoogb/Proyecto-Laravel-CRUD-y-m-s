<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Str;
use App\Models\Productos;
use App\Models\ProductosFotos;
use Illuminate\Support\Facades\File;



class BdController extends Controller
{
    //
    public function bd_inicio () {
        return view('bd.home');
    }

    public function bd_categorias () {
        $datos = Categorias::orderBy('id','asc')->get();

        return view('bd.categorias', compact('datos'));
    }
    public function bd_categorias_add () {
        
        return view( 'bd.categorias_add');

    }
    public function bd_categorias_add_post(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            // Añade más reglas de validación según tus necesidades
        ], [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre no puede ser mayor a 50 caracteres'
        ]);
    
        // Crear la nueva categoría
        Categorias::create([
            'nombre' => $request->input('nombre'),
            'slug' => Str::slug($request->input('nombre')), // Genera el slug a partir del nombre
        ]);
    
        // Configurar mensajes para la sesión
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', '¡La categoría se ha creado correctamente!');
    
        // Redirigir a la página de agregar categorías
        return redirect()->route('bd_categorias_add');
    }
    
    public function bd_categorias_editar($id)
    {
        // Encuentra la categoría o lanza una excepción si no se encuentra
        $categoria = Categorias::where('id', $id)->firstOrFail();
    
        // Retorna la vista para editar la categoría con los datos de la categoría encontrada
        return view('bd.categorias_edit', compact('categoria'));
    }
    

    public function bd_categorias_editar_post (Request $request, $id) {

        $request->validate([
            'nombre' => 'required|string|max:50',
            // Añade más reglas de validación según tus necesidades
        ],
        
        [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre no puede ser mayor a 50 caracteres'
        ]);

        $categoria = Categorias::where('id', $id)->firstOrFail();

        $categoria->nombre = $request->input('nombre');
        $categoria->slug = Str::slug($request->input('nombre'), '-');
        $categoria->save();
        // Configurar mensajes para la sesión
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', '¡La categoría se ha creado correctamente!');

        // Redirigir a la página de agregar categorías
        return redirect()->route('bd_categorias_editar', ['id'=>$id]);
    }

    public function bd_categorias_eliminar (Request $request, $id) {

      if (Productos::where(['categorias_id'=>$id])->count()==0) {

        Categorias::where(['id'=>$id])->delete();
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', 'Se elimino correctamente la Categoria ');

        // Redirigir a la página de agregar categorías
        return redirect()->route('bd_categorias');
        
    }
      else  {
        $request->session()->put('css', 'danger');
        $request->session()->put('mensaje', 'No es posible Eliminar la Categoria');

        // Redirigir a la página de agregar categorías
            return redirect()->route('bd_categorias');
      }
    }


    public function bd_productos()
    {
        $datos = Productos::orderBy('id', 'asc')->get();
        
        return view('bd.productos', compact('datos'));
    }

    public function bd_productos_add ( ) {
        
        $categorias = Categorias::get();
        return view('bd.productos_add', compact('categorias'));

    }

    public function bd_productos_add_post (Request $request) {
         // Validación de los campos del formulario
    $request->validate([
        'nombre' => 'required|string|max:100',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:1|max:10', // Valida que el stock esté entre 1 y 10
        'descripcion' => 'required|string',
    ],
    [
        'nombre.required' => 'El nombre es requerido',
        'nombre.string' => 'El nombre debe ser un texto',
        'nombre.max' => 'El nombre no puede ser mayor a 100 caracteres',
        'precio.required' => 'El precio es requerido',
        'precio.numeric' => 'El precio debe ser un número',
        'precio.min' => 'El precio no puede ser menor que cero',
        'stock.required' => 'El stock es requerido',
        'stock.integer' => 'El stock debe ser un número entero',
        'stock.min' => 'El stock debe ser al menos 1',
        'stock.max' => 'El stock no puede ser mayor que 10',
        'descripcion.required' => 'La descripción es requerida',
        'descripcion.string' => 'La descripción debe ser un texto',
    ]);

    Productos::create(

        [

            'nombre' => $request->input('nombre'),
            'slug' => Str::slug($request->input('nombre')), // Genera el slug a partir del nombre
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'descripcion' => $request->input('descripcion'),
            'categorias_id' => $request->input('categorias_id'),
            'fecha' => date('Y-m-d')
        ]

    ) ;

      // Configurar mensajes para la sesión
      $request->session()->put('css', 'success');
      $request->session()->put('mensaje', 'Producto se ha creado correctamente!');
  
      // Redirigir a la página de agregar categorías
      return redirect()->route('bd_productos_add');

    }


    public function bd_productos_editar ( $id) {

        
        $producto = Productos::where('id', $id)->firstOrFail();
        $categorias = Categorias::get();


        return view('bd.productos_edit', compact('producto','categorias'));



    }
    
    public function bd_productos_editar_post (Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1|max:10', // Valida que el stock esté entre 1 y 10
            'descripcion' => 'required|string',
        ],
        [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre no puede ser mayor a 100 caracteres',
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser menor que cero',
            'stock.required' => 'El stock es requerido',
            'stock.integer' => 'El stock debe ser un número entero',
            'stock.min' => 'El stock debe ser al menos 1',
            'stock.max' => 'El stock no puede ser mayor que 10',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.string' => 'La descripción debe ser un texto',
        ]);
        $producto = Productos::where('id', $id)->firstOrFail();
        $producto->nombre = $request->input('nombre');
        $producto->slug = Str::slug($request->input('nombre'), '-'); // Genera el slug a partir del nombre
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->descripcion = $request->input('descripcion');
        $producto->categorias_id = $request->input('categorias_id');
        $producto->save();

          // Configurar mensajes para la sesión
          $request->session()->put('css', 'success');
          $request->session()->put('mensaje', 'Producto Modificado Correctamente!');
      
          // Redirigir a la página de agregar categorías
          return redirect()->route('bd_productos');

    }

    public function bd_productos_eliminar (Request $request, $id) {
        

        if (ProductosFotos::where(['productos_id'=>$id])->count()==0) {

            Productos::where(['id'=>$id])->delete();
            $request->session()->put('css', 'success');
            $request->session()->put('mensaje', 'Se elimino correctamente el Producto ');
    
            // Redirigir a la página de agregar categorías
            return redirect()->route('bd_productos');
            
        }
          else  {
            $request->session()->put('css', 'danger');
            $request->session()->put('mensaje', 'No es posible eliminar el registro');
    
            // Redirigir a la página de agregar categorías
                return redirect()->route('bd_productos');
          }

    }

    public function bd_productos_categorias($id)
    {        
        $categoria = Categorias::where('id', $id)->firstOrFail();

        $datos = Productos::where('categorias_id', $id)->orderBy('id', 'asc')->get();
        
        return view('bd.productos_categorias', compact('datos', 'categoria'));
    }
    public function bd_productos_fotos($id)
    {
        // Obtener el producto por su ID
        $producto = Productos::findOrFail($id);

        // Obtener las fotos del producto
        $fotos = ProductosFotos::where('productos_id', $id)->get();

        // Devolver la vista con los datos del producto y las fotos
        return view('bd.productos_fotos', compact('producto', 'fotos'));
    }

    public function bd_productos_fotos_post(Request $request, $id)
    {        
        $producto = Productos::findOrFail($id);
    
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'foto.required' => 'La foto es requerida',
            'foto.image' => 'El archivo debe ser una imagen',
            'foto.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg, gif o svg',
            'foto.max' => 'La imagen no puede ser mayor a 2048 kilobytes',
        ]);
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $archivo = time() . '.' . $extension;
            $destinationPath = public_path('uploads/productos/');
    
            // Crear la carpeta si no existe
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
    
            // Mover el archivo a la carpeta de destino
            $file->move($destinationPath, $archivo);
    
            ProductosFotos::create([
                'productos_id' => $producto->id,
                'nombre' => $archivo,
                'descripcion' => 'Foto del producto', // Proporciona una descripción adecuada aquí
            ]);
        }
    
        $x_error = 'flash';  
        $request->session()->$x_error('css', 'success');
        $request->session()->$x_error('mensaje', 'Se creó el registro correctamente');
        return redirect()->route('bd_productos_fotos', ['id' => $id]);
    }

    public function bd_productos_fotos_delete (Request $request, $producto_id, $foto_id) {
        $producto = Productos::findOrFail($producto_id);
        $foto = ProductosFotos::findOrFail($foto_id);
        unlink(public_path('uploads/productos/' . $foto->nombre));
        ProductosFotos::where(['id'=>$foto_id])->delete();
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', 'Elimino el registro correctamente');
        return redirect()->route('bd_productos_fotos', ['id' => $producto_id]);

    }
    public function bd_productos_paginacion () {
        $datos = Productos::orderBy('id', 'desc')->paginate(2); 
        return view('bd.paginacion', compact('datos'));
    }
    public function bd_productos_buscar() {

        if (isset($_GET['b'])){
            $b = $_GET['b'];
            $datos = Productos::where('nombre', 'like', '%'.$_GET['b']. '%')->orderBy('id', 'asc')->get();

        }
        else {
            $b = '';
            $datos = Productos::orderBy('id', 'asc')->get();

        }

        return view ('bd.buscador',compact('datos', 'b')  );
    }

}



