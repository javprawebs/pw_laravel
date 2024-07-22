<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Seccion;
use Illuminate\Support\Facades\File;

class ArticuloController extends Controller
{
    public function index()
    {
        $secciones = Seccion::all();
        // $articulos = Articulo::all();
        return view('control_panel.articulos', compact('secciones'));
    }

    public function create()
    {
        $secciones = Seccion::all();
        return view('control_panel.create_articulo', compact('secciones'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'colores' => 'nullable|string',
            'tallas' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'seccion_id' => 'nullable|exists:secciones,id',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Procesamiento de la imagen
            if ($request->hasFile('imagen')) {
                $filename = $this->handleImageUpload($request->file('imagen'));
            } else {
                $filename = null; // Permitir que la imagen sea nula
            }
    
            // Crear el artículo con los valores validados
            $articulo = new Articulo([
                'nombre' => $validatedData['nombre'] ?? null,
                'descripcion' => $validatedData['descripcion'] ?? null,
                'precio' => $validatedData['precio'] ?? null,
                'colores' => !empty($validatedData['colores']) ? json_encode(explode(',', $validatedData['colores']), JSON_UNESCAPED_UNICODE) : null,
                'tallas' => !empty($validatedData['tallas']) ? json_encode(explode(',', $validatedData['tallas']), JSON_UNESCAPED_UNICODE) : null,
                'imagen' => $filename,
                'seccion_id' => $validatedData['seccion_id'] ?? null,
            ]);
    
            $articulo->save();
            DB::commit();
    
            return redirect()->route('admin.articulos')->with('success', 'Artículo creado con éxito.');
    
        } catch (\Exception $e) {
            DB::rollBack();
            // Eliminar la imagen si ya se subió pero hubo un error
            if (isset($filename) && $filename && Storage::exists($filename)) {
                Storage::delete($filename);
            }
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el artículo: ' . $e->getMessage()]);
        }
    }
    
    
    private function handleImageUpload($file)
    {
        $destination = 'images/articulos/';
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path($destination), $filename);
        return $destination . $filename;
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        $secciones = Seccion::all();
        return view('control_panel.edit_articulo', compact('articulo','secciones'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'colores' => 'nullable|string',
            'tallas' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'seccion_id' => 'nullable|exists:secciones,id',
        ]);
    
        DB::beginTransaction();
    
        try {
            $articulo = Articulo::findOrFail($id);
    
            // Procesamiento de la imagen
            if ($request->hasFile('imagen')) {
                // Eliminar la imagen anterior si existe
                if ($articulo->imagen && Storage::exists($articulo->imagen)) {
                    Storage::delete($articulo->imagen);
                }
                $filename = $this->handleImageUpload($request->file('imagen'));
            } else {
                $filename = $articulo->imagen; // Mantener la imagen existente si no se sube una nueva
            }
    
            // Actualizar el artículo con los valores validados
            $articulo->update([
                'nombre' => $validatedData['nombre'] ?? $articulo->nombre,
                'descripcion' => $validatedData['descripcion'] ?? $articulo->descripcion,
                'precio' => $validatedData['precio'] ?? $articulo->precio,
                'colores' => !empty($validatedData['colores']) ? json_encode(explode(',', $validatedData['colores']), JSON_UNESCAPED_UNICODE) : $articulo->colores,
                'tallas' => !empty($validatedData['tallas']) ? json_encode(explode(',', $validatedData['tallas']), JSON_UNESCAPED_UNICODE) : $articulo->tallas,
                'imagen' => $filename,
                'seccion_id' => $validatedData['seccion_id'] ?? $articulo->seccion_id,
            ]);
    
            DB::commit();
    
            return redirect()->route('admin.articulos')->with('success', 'Artículo actualizado con éxito.');
    
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Hubo un problema al actualizar el artículo: ' . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();
        return redirect()->route('admin.articulos')->with('success', 'Artículo eliminado con éxito.');
    }

    public function infoView()
    {
        return view('control_panel.info');
    }

    public function mainWeb()
    {
        $secciones = Seccion::all();
        return view('welcome', compact('secciones'));
    }
}
