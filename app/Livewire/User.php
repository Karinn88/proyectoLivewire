<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


// class UserForm extends Component
// {
//     public $user, $name, $email, $character, $history, $formId;
    
    
//     protected $rules = [
//          'name' => 'required|string',
//          'email' => 'required|email',
//          'character' => 'nullable',
//          'history' => 'nullable|min:6',
//      ];
     
//      protected $message = [
//          'name.required' => 'El nombre es requerido',
//          'email.required' => 'El correo electrónico es requerido',
//          'history.min' => 'El mensaje ha de tener mínimo 6 letras',
//      ];
  
//      public function mount($id = null){
 
//          if ($id) {
//              $user = User::findOrFail($id);
//              $this->formId = $user->id;
//              $this->name = $user->name;
//              $this->email = $user->email;
//              $this->character = $user->character;
//              $this->history = $user->history;
     
          
//          } else {
//              $this->resetForm();
//          }
 
//       }
     
//      public function saveData(){
       
//          if ($this->formId) {
//              $this->validate();
//              $user = User::findOrFail($this->formId);
//              $user->update([
//                  'name' => $this->name,
//                  'email' => $this->email,
//                  'character' => $this->character,
//                  'history' => $this->history,
//              ]);
//              } else {
//              $this->validate();
//              $user = User::create([
//                      'name' => $this->name,
//                      'email' => $this->email,
//                      'character' => $this->character,
//                      'history' => $this->history,
//                  ]);
//              }
 
//          $this->validate();
//          $this->resetForm();
//          $this->user = User::all();
 
//          $this->redirect('/table');
//      }
//      public function resetForm(){
//          $this->formId = null;
//          $this->name = '';
//          $this->email = '';
//          $this->character = '';
//          $this->history = '';
//          }
     
//      public function edit($id){ 
         
//          $user = User::findOrFail($id); 
//          $this->formId = $user->id;
//          $this->name = $user->name; 
//          $this->email = $user->email; 
//          $this->character = $user->character; 
//          $this->history = $user->history;
     
//      }
    
//      public function delete(User $user){
//          $user->delete();
//      }  
//     public function render()
//     {
//         return view('livewire.form');
//     }
// }
