<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Form as TForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class Form extends Component
{
    public $form, $name, $email, $character, $history, $formId;
    
    
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
 
    public function mount($id = null){
       
        if ($id) {
            $user = TForm::findOrFail($id);
            $this->formId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->character = $user->character;
            $this->history = $user->history;

        } else {
            $this->resetForm();
        }
     }
    
    public function saveData(){
        if ($this->formId) {
            $this->validate();
            $form = TForm::findOrFail($this->formId);
            
            $form->update([
                'name' => $this->name,
                'email' => $this->email,
                'character' => $this->character,
                'history' => $this->history,
                'user_id' =>auth()->user()->id,
                
            ]);
            } else {
            $this->validate();
            $form = TForm::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'character' => $this->character,
                    'history' => $this->history,
                    'user_id' => auth()->user()->id,
                    
                ]);
            }
          
        $this->validate();
        $this->resetForm();
        $this->form = TForm::all();

        $this->redirect('/table');
    }
    public function resetForm(){
        $this->formId = null;
        $this->name = '';
        $this->email = '';
        $this->character = '';
        $this->history = '';
        }
    
    public function edit($id){ 
        
        $form = TForm::findOrFail($id); 
        $this->formId = $form->id;
        $this->name = $form->name; 
        $this->email = $form->email; 
        $this->character = $form->character; 
        $this->history = $form->history;
    
    }
   
    public function delete(TForm $form){
        $form->delete();
    }  
    public function render()
    {
        $forms = TForm::all()->reverse();
        return view('livewire.form',compact('forms'));
    }

}