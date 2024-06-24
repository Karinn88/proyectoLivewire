<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Form as TForm;

class Table extends Component
{
    public $form, $name, $email, $character, $history, $formId, $user;
 
    
    
    protected $rules = [
         'name' => 'required|string',
         'email' => 'required|email',
         'character' => 'nullable',
         'history' => 'nullable|min:6',
     ];
     
     protected $message = [
         'name.required' => 'El nombre es requerido',
         'email.required' => 'El correo electrónico es requerido',
         'history.min' => 'El mensaje ha de tener mínimo 6 letras',
     ];
     public function mount(){
        $this->form = TForm::all();
       
    }

     public function resetForm(){
         $this->formId = null;
         $this->name = '';
         $this->email = '';
         $this->character = '';
         $this->history = '';
         }
 
     
     public function delete(TForm $form){
         $form->delete();
     }  
     public function render()
     {
        $forms = TForm::all()->reverse();
        return view('livewire.table',compact('forms'));
     }
 }