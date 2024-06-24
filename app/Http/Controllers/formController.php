<?php


namespace App\Http\Controllers;
use App\Models\Form;


use Illuminate\Http\Request;


class formController extends Controller
{
    public function create()
    {
        return view('forms.create', [
            "form" => new Form,
            "name" => __("Añadir nombre"),
            "email" => __("Email de contacto"),
            "character" => __("Nombre del personaje"),
            "history" => __("Historia de personaje"),
            "textButton" => __("Enviar"),
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
}
