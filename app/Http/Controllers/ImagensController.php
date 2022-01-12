<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagensController extends Controller
{
    public function index()
    {
        // pega as imagens no banco
        $imagens = Imagem::orderBy('id', 'desc')->get();
        
        // redireciona para a página da galeria, enviando os registros do banco e informando ao menu qual página é
        return view('imagens.index', ['imgs' => $imagens, 'pagina' => 'galeria']);
    }

    public function show(Imagem $img)
    {
        // redireciona para a página de visualização de imagem, enviando os dados da imagem
        return view('imagens.show', ['img' => $img, 'pagina' => 'galeria']);
    }

    public function create()
    {
        // redireciona para a página de inserção de imagem
        return view('imagens.create', ['pagina' => 'galeria']);
    }

    public function insert(Request $form)
    {
        // guarda a imagem na pasta adequada
        $imgPath = $form->file('imagem')->store('', 'imagens');
        
        $img = new Imagem();

        $img->arquivo = $imgPath;
        $img->titulo = $form->titulo;
        $img->descricao = $form->descricao;

        // insere os dados no banco
        $img->save();

        return redirect()->route('galeria');
    }
}
